<?php
/**
 * player.php — Dynamic SAAVI scene player.
 *
 * Reads course content from MySQL, renders scenes server-side.
 * Audio URLs are HMAC-signed proxies (/api/audio.php) — real R2 URLs
 * never appear in page source.
 *
 * URL forms (all route here via .htaccess):
 *   /learn-english/hindi/day-1-greetings-self-introduction/play/
 *   /learn-english/marathi/day-2-vartaman-kaal-daily-actions/play/
 *   /player.php?lang=hi&day=1   (fallback / internal)
 */

// ── config ────────────────────────────────────────────────────────────────────
$db_cfg    = require __DIR__ . '/config/db.php';
$audio_cfg = require __DIR__ . '/config/audio_secret.php';

$AUDIO_SECRET = $audio_cfg['secret'];

// ── lang word ↔ code map ─────────────────────────────────────────────────────
$lang_word_map = ['hindi' => 'hi', 'marathi' => 'mr', 'telugu' => 'te'];

// ── DB ────────────────────────────────────────────────────────────────────────
try {
    $pdo = new PDO(
        "mysql:host={$db_cfg['host']};dbname={$db_cfg['dbname']};charset={$db_cfg['charset']}",
        $db_cfg['username'], $db_cfg['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (Exception $e) {
    http_response_code(503);
    echo '<h1>Service unavailable</h1>';
    exit;
}

// ── resolve lang + day from URL params ───────────────────────────────────────
$lang = '';
$day  = 0;

if (!empty($_GET['lang_word']) && !empty($_GET['slug'])) {
    // Pretty URL: /learn-english/hindi/day-1-greetings/play/
    $lang_word = strtolower(preg_replace('/[^a-z]/', '', $_GET['lang_word']));
    $slug      = strtolower(preg_replace('/[^a-z0-9-]/', '', $_GET['slug']));
    $lang      = $lang_word_map[$lang_word] ?? '';

    if ($lang && $slug) {
        // Match either player_slug (preferred) or url_slug (fallback — matches
        // how generate_landing_pages_php.py builds links: player_slug OR url_slug).
        $s = $pdo->prepare(
            "SELECT day_number FROM seo_pages
             WHERE lang = ? AND (player_slug = ? OR url_slug = ?)
             ORDER BY (player_slug = ?) DESC LIMIT 1"
        );
        $s->execute([$lang, $slug, $slug, $slug]);
        $found = $s->fetch();
        if ($found) {
            $day = (int)$found['day_number'];
        } else {
            http_response_code(404);
            echo '<h1>Lesson not found.</h1>';
            exit;
        }
    }
} elseif (!empty($_GET['lang']) && !empty($_GET['day'])) {
    // Direct: player.php?lang=hi&day=1
    $allowed_langs = ['hi', 'mr', 'te'];
    $lang = in_array($_GET['lang'], $allowed_langs) ? $_GET['lang'] : '';
    $day  = max(1, min(50, (int)$_GET['day']));
}

if (!$lang || !$day) {
    http_response_code(400);
    echo '<h1>Invalid request.</h1>';
    exit;
}

$stmt = $pdo->prepare("
    SELECT cd.tab_json, cd.title_source,
           s.url_slug, s.player_slug, s.meta_title, s.meta_description
    FROM   course_days cd
    JOIN   courses c ON c.id = cd.course_id
    LEFT JOIN seo_pages s ON s.lang = ? AND s.day_number = ?
    WHERE  c.course_code = ?
      AND  cd.day_number = ?
    LIMIT 1
");

$course_code = "english-speaking-50-{$lang}";
$stmt->execute([$lang, $day, $course_code, $day]);
$row = $stmt->fetch();

if (!$row) {
    http_response_code(404);
    echo '<h1>Day not found.</h1>';
    exit;
}

$data  = json_decode($row['tab_json'], true);
$title = $row['title_source'] ?? "Day {$day}";
$meta_title = $row['meta_title'] ?? "Day {$day}: {$title} | Shrutam";
$meta_desc  = $row['meta_description'] ?? "Learn English in Hindi with SAAVI — Day {$day}.";

// ── signed audio URL helper ───────────────────────────────────────────────────
function au(string $lang, int $day, string $key, string $secret): string {
    $r2  = sprintf('tts/%s/day_%02d/%s.mp3', $lang, $day, $key);
    $exp = (int)(ceil((time() + 1) / 3600) * 3600);   // expires end of next hour
    $sig = hash_hmac('sha256', $r2 . ':' . $exp, $secret);
    return '/api/audio.php?r2=' . rawurlencode($r2) . '&exp=' . $exp . '&sig=' . $sig;
}

// ── HTML helpers ──────────────────────────────────────────────────────────────
function esc(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

function ex_field(array $d, string ...$keys): string {
    foreach ($keys as $k) {
        if (!empty($d[$k])) return (string)$d[$k];
    }
    return '';
}

function scene_div(int $idx, string $stype, array $audios, string $inner, bool $active = false): string {
    $cls   = $active ? 'scene active' : 'scene';
    $attrs = "id=\"sc{$idx}\" class=\"{$cls}\" data-type=\"{$stype}\"";
    foreach ($audios as $i => $url) {
        $n = $i + 1;
        $attrs .= ' data-a' . $n . '="' . esc($url) . '"';
    }
    return "<div {$attrs}>{$inner}</div>\n";
}

// ── SAAVI Avatar ─────────────────────────────────────────────────────────────
function saavi_avatar(string $lang, int $day): string {
    $thumb_url = "https://images.shrutam.ai/thumbnails/{$lang}/day_" . sprintf('%02d', $day) . ".png";
    return <<<HTML
<div class="saavi-avatar">
  <img src="{$thumb_url}" alt="SAAVI - Day {$day}" class="saavi-img" loading="lazy">
  <div class="saavi-pulse"></div>
</div>
HTML;
}
$SAAVI_SVG = saavi_avatar($lang ?? 'hi', $day ?? 1);

// ── scene renderers ───────────────────────────────────────────────────────────
function render_intro(int $idx, int $day, string $title, string $saavi_svg, string $badge = ''): string {
    $title_e = esc($title);
    $badge_html = $badge
        ? '<div class="intro-badge">🏆 ' . esc($badge) . '</div>'
        : '';
    $inner = <<<HTML
<div class="si-wrap">
  {$saavi_svg}
  <div class="si-day">Day {$day}</div>
  <h1 class="si-title">{$title_e}</h1>
  {$badge_html}
  <div class="si-hint">▶ Play करें</div>
</div>
HTML;
    return scene_div($idx, 'intro', [], $inner, true);
}

function render_section_header(int $idx, string $title, string $subtitle): string {
    global $SAAVI_SVG;
    $title_e = esc($title);
    $subtitle_e = esc($subtitle);
    $inner = <<<HTML
<div class="si-wrap">
  {$SAAVI_SVG}
  <h2 class="si-title">{$title_e}</h2>
  <p class="si-sub">{$subtitle_e}</p>
</div>
HTML;
    return scene_div($idx, 'section', [], $inner);
}

function render_word(int $idx, int $wi, array $word_obj, string $lang, int $day, string $secret): string {
    $ww   = sprintf('%02d', $wi);
    $word = esc(ex_field($word_obj, 'word', 'english'));
    $pron = esc(ex_field($word_obj, 'pronunciation', 'hindi_pronunciation'));
    $mean = esc(ex_field($word_obj, 'meaning', 'hindi_meaning', 'source_meaning'));
    $wicon = esc($word_obj['word_icon'] ?? '');
    $exs  = array_slice($word_obj['examples'] ?? [], 0, 5);

    $ex_items = '';
    foreach ($exs as $ei => $ex) {
        $n  = $ei + 1;
        $en = esc(ex_field($ex, 'sentence', 'english', 'en'));
        $tr = esc(ex_field($ex, 'translation', 'hindi_translation', 'source_translation'));
        $ex_items .= "<div class=\"ex-row\"><span class=\"ex-num\">{$n}</span>"
                   . "<span class=\"ex-en\">\"{$en}\"</span>"
                   . "<span class=\"ex-tr\">{$tr}</span></div>";
    }

    $audios = [
        au($lang, $day, "t1_w{$ww}_ex01_en",    $secret),
        au($lang, $day, "t1_w{$ww}_ex01_saavi", $secret),
    ];
    $icon_html = $wicon ? "<div class=\"w-icon\">{$wicon}</div>" : '';
    $inner = <<<HTML
<div class="word-wrap">
  <div class="word-main">
    {$icon_html}
    <div class="w-word">{$word}</div>
    <div class="w-pron">({$pron})</div>
    <div class="w-mean">{$mean}</div>
  </div>
  <div class="word-exs">{$ex_items}</div>
</div>
HTML;
    return scene_div($idx, 'word', $audios, $inner);
}

function render_mistake(int $idx, int $wi, array $word_obj, string $lang, int $day, string $secret): string {
    $ww      = sprintf('%02d', $wi);
    $word    = esc(ex_field($word_obj, 'word', 'english'));
    $mistake = $word_obj['common_mistake'] ?? [];
    $wrong   = esc(ex_field($mistake, 'wrong', 'wrong_sentence'));
    $right   = esc(ex_field($mistake, 'right', 'correct_sentence', 'right_sentence'));
    $tip     = esc(ex_field($mistake, 'why_wrong', 'saavi_tip', 'tip', 'explanation'));

    if (!$wrong && !$right) return '';

    $audios = [
        au($lang, $day, "t1_w{$ww}_mistake_wrong",  $secret),
        au($lang, $day, "t1_w{$ww}_mistake_right",  $secret),
        au($lang, $day, "t1_w{$ww}_mistake_saavi",  $secret),
    ];
    $inner = <<<HTML
<div class="mis-wrap">
  <div class="mis-head">⚠️ Common Mistake — <em>{$word}</em></div>
  <div class="mis-pair">
    <div class="mis-wrong"><div class="mis-icon">❌</div><div class="mis-text">{$wrong}</div></div>
    <div class="mis-right"><div class="mis-icon">✅</div><div class="mis-text">{$right}</div></div>
  </div>
  <div class="mis-tip">{$tip}</div>
</div>
HTML;
    return scene_div($idx, 'mistake', $audios, $inner);
}

function render_listen(int $idx, int $si, array $sent, string $lang, int $day, string $secret): string {
    $ss   = sprintf('%02d', $si);
    $en   = esc(ex_field($sent, 'english', 'en', 'sentence'));
    $pron = esc(ex_field($sent, 'pronunciation', 'hindi_pronunciation'));
    $tr   = esc(ex_field($sent, 'translation', 'hindi_translation', 'source_translation'));
    $audios = [au($lang, $day, "t2_s{$ss}_v", $secret)];
    $inner = <<<HTML
<div class="listen-wrap">
  <div class="listen-num">Sentence {$si}</div>
  <div class="listen-en">"{$en}"</div>
  <div class="listen-pron">({$pron})</div>
  <div class="listen-tr">{$tr}</div>
  <div class="listen-hint">🎧 सुनिए और दोहराइए</div>
</div>
HTML;
    return scene_div($idx, 'listen', $audios, $inner);
}

function render_dialogue(int $idx, int $li, array $line, string $lang, int $day, string $secret, array $char_map = []): string {
    $ll      = sprintf('%02d', $li);
    $char_id = ex_field($line, 'character_id', 'speaker', 'character');
    $ch      = $char_map[$char_id] ?? [];
    $cname   = ex_field($ch, 'character_name', 'name');
    $cicon   = ex_field($ch, 'character_icon', 'icon');
    $crole   = ex_field($ch, 'character_role', 'role');

    // fallback when char_map missing: humanize "char_1" → "Person 1"
    if (!$cname) $cname = str_replace('char_', 'Person ', (string)$char_id);

    $chip_icon = $cicon ? "<span class=\"dlg-char-icon\">" . esc($cicon) . "</span>" : '';
    $chip      = '<div class="dlg-char-chip">' . $chip_icon . esc($cname) . '</div>';
    $role_html = $crole ? '<div class="dlg-char-role">' . esc($crole) . '</div>' : '';

    $en      = esc(ex_field($line, 'english', 'en'));
    $pron    = esc(ex_field($line, 'pronunciation', 'hindi_pronunciation'));
    $tr      = esc(ex_field($line, 'translation', 'hindi_translation', 'source_translation'));
    $audios  = [
        au($lang, $day, "t3_d{$ll}_v",     $secret),
        au($lang, $day, "t3_d{$ll}_saavi", $secret),
    ];
    $inner = <<<HTML
<div class="dlg-wrap">
  {$chip}
  {$role_html}
  <div class="dlg-en">"{$en}"</div>
  <div class="dlg-pron">({$pron})</div>
  <div class="dlg-tr">{$tr}</div>
</div>
HTML;
    return scene_div($idx, 'dialogue', $audios, $inner);
}

function render_summary(int $idx, array $tab4, string $lang, int $day, string $secret): string {
    $points  = $tab4['points'] ?? $tab4['key_points'] ?? [];
    $closing = esc($tab4['saavi_closing'] ?? '');
    $pts_html = '';
    foreach (array_slice($points, 0, 6) as $i => $pt) {
        $n    = $i + 1;
        $text = esc(is_string($pt) ? $pt : ex_field($pt, 'text', 'en', 'english'));
        $pts_html .= "<div class=\"sum-pt\"><span class=\"sum-num\">{$n}</span><span class=\"sum-text\">{$text}</span></div>";
    }
    $close_html = $closing ? "<div class=\"sum-closing\">{$closing}</div>" : '';
    $audios = [au($lang, $day, 't4_summary_saavi', $secret)];
    $inner = <<<HTML
<div class="sum-wrap">
  <div class="sum-title">🎯 आज की सीख</div>
  <div class="sum-pts">{$pts_html}</div>
  {$close_html}
</div>
HTML;
    return scene_div($idx, 'summary', $audios, $inner);
}

function render_recap(int $idx, array $recap, string $lang, int $day, string $secret): string {
    $icon   = esc(($recap['visuals']['intro_icon'] ?? '') ?: '🔄');
    $title  = esc($recap['title'] ?? 'कल का रीकैप');
    $points = $recap['recap_points'] ?? [];
    $narr   = esc($recap['saavi_recap'] ?? '');

    if (!$points && !$narr) return '';

    $pts_html = '';
    foreach (array_slice($points, 0, 5) as $pt) {
        $t = esc(is_string($pt) ? $pt : ex_field($pt, 'text', 'point', 'en'));
        if ($t !== '') $pts_html .= "<div class=\"recap-point\">{$t}</div>";
    }
    $pts_block  = $pts_html ? "<div class=\"recap-points\">{$pts_html}</div>" : '';
    $narr_block = $narr     ? "<div class=\"recap-narration\">{$narr}</div>"   : '';

    $audios = [au($lang, $day, 't1_recap_saavi', $secret)];
    $inner = <<<HTML
<div class="recap-wrap">
  <div class="recap-icon">{$icon}</div>
  <div class="recap-title">{$title}</div>
  {$pts_block}
  {$narr_block}
</div>
HTML;
    return scene_div($idx, 'recap', $audios, $inner);
}

function render_concept(int $idx, array $concept, string $lang_label_native, string $lang, int $day, string $secret): string {
    $icon   = esc(($concept['visuals']['concept_icon'] ?? '') ?: '💡');
    $title  = esc($concept['concept_title'] ?? '');
    $intro  = esc($concept['saavi_intro'] ?? '');
    $main   = esc($concept['main_explanation'] ?? '');
    $bridge = $concept['visuals']['hindi_english_bridge'] ?? [];
    $h_side = esc($bridge['hindi_side'] ?? $bridge['native_side'] ?? '');
    $e_side = esc($bridge['english_side'] ?? '');
    $arrow  = esc(($bridge['arrow'] ?? '') ?: '➡️');

    if (!$title && !$main && !$h_side) return '';

    $native_label = esc($lang_label_native);
    $bridge_html = ($h_side && $e_side) ? <<<HTML
<div class="concept-bridge">
  <div class="bridge-side bridge-hindi">
    <div class="bridge-label">{$native_label}</div>
    <div class="bridge-text">{$h_side}</div>
  </div>
  <div class="bridge-arrow">{$arrow}</div>
  <div class="bridge-side bridge-english">
    <div class="bridge-label">English</div>
    <div class="bridge-text">{$e_side}</div>
  </div>
</div>
HTML : '';

    $intro_html = $intro ? "<div class=\"concept-text\">{$intro}</div>" : '';
    $main_html  = $main  ? "<div class=\"concept-text\">{$main}</div>"  : '';

    $audios = [
        au($lang, $day, 't1_concept_saavi', $secret),
        au($lang, $day, 't1_concept_main',  $secret),
    ];
    $inner = <<<HTML
<div class="concept-wrap">
  <div class="concept-head">
    <span class="concept-icon">{$icon}</span>
    <div class="concept-title">{$title}</div>
  </div>
  {$bridge_html}
  {$intro_html}
  {$main_html}
</div>
HTML;
    return scene_div($idx, 'concept', $audios, $inner);
}

function render_closing(int $idx, int $day, array $tab4, string $badge, string $lang, string $secret): string {
    $tomorrow = $tab4['tomorrow_preview'] ?? [];
    $t_icon   = esc($tomorrow['icon'] ?? '🎯');
    $t_text   = esc($tomorrow['text'] ?? '');
    $closing  = esc($tab4['saavi_closing'] ?? '');

    $tomorrow_html = $t_text ? "<div class=\"closing-tomorrow\">{$t_icon} {$t_text}</div>" : '';
    $badge_html    = $badge  ? '<div class="closing-badge">🏆 ' . esc($badge) . '</div>' : '';
    $closing_html  = $closing ? "<div class=\"recap-narration\">{$closing}</div>" : '';

    $audios = [au($lang, $day, 't4_closing_saavi', $secret)];
    $inner = <<<HTML
<div class="closing-wrap">
  <div class="closing-big">🎉</div>
  <div class="closing-shaabash">शाबाश!</div>
  <div class="closing-done">Day {$day} Complete!</div>
  {$badge_html}
  {$tomorrow_html}
  {$closing_html}
</div>
HTML;
    return scene_div($idx, 'closing', $audios, $inner);
}

function render_quiz(int $idx, array $t5c, string $lang_name): string {
    // Flashcards
    $fc_html = '';
    foreach (array_slice($t5c['flashcards'] ?? [], 0, 8) as $fc) {
        $front = esc(ex_field($fc, 'front', 'word', 'english'));
        $back  = esc(ex_field($fc, 'back',  'meaning', 'translation'));
        $fc_html .= "<div class=\"fc-card\" onclick=\"this.classList.toggle('flipped')\">"
                  . "<div class=\"fc-front\">{$front}</div>"
                  . "<div class=\"fc-back\">{$back}</div></div>";
    }

    // True/False
    $tf_html = '';
    foreach (array_slice($t5c['true_false'] ?? [], 0, 5) as $q) {
        $stmt   = esc(ex_field($q, 'statement', 'question'));
        $answer = !empty($q['answer']) ? 'true' : 'false';
        $tf_html .= "<div class=\"tf-item\"><p class=\"tf-stmt\">{$stmt}</p>"
                  . "<div class=\"tf-btns\">"
                  . "<button class=\"tf-btn\" data-val=\"true\"  data-correct=\"{$answer}\" onclick=\"checkTF(this)\">True ✓</button>"
                  . "<button class=\"tf-btn\" data-val=\"false\" data-correct=\"{$answer}\" onclick=\"checkTF(this)\">False ✗</button>"
                  . "</div></div>";
    }

    // MCQ
    $mcq_html = '';
    $mcq_items = array_slice($t5c['mcq'] ?? [], 0, 5);
    foreach ($mcq_items as $i => $q) {
        $n     = $i + 1;
        $qtext = esc(ex_field($q, 'question'));
        $opts  = '';
        foreach ($q['options'] ?? [] as $o) {
            $otext   = esc(is_array($o) ? ($o['text'] ?? '') : (string)$o);
            $correct = (is_array($o) && !empty($o['is_correct'])) ? 'true' : 'false';
            $opts   .= "<button class=\"mcq-opt\" data-correct=\"{$correct}\" onclick=\"checkMCQBool(this)\">{$otext}</button>";
        }
        $mcq_html .= "<div class=\"mcq-item\"><p class=\"mcq-q\">Q{$n}. {$qtext}</p>"
                   . "<div class=\"mcq-opts\">{$opts}</div></div>";
    }

    // Matching
    $mtc         = $t5c['match_the_column'] ?? [];
    $match_items = array_slice(is_array($mtc) ? ($mtc['pairs'] ?? $mtc) : [], 0, 5);
    $match_html  = "<p style=\"color:#888\">No matching items.</p>";
    if ($match_items) {
        $lefts    = array_map(fn($m) => ex_field($m, 'left', 'english', 'english_phrase'), $match_items);
        $rights   = array_map(fn($m) => ex_field($m, 'right', 'translation', 'hindi'),     $match_items);
        $shuffled = $rights;
        shuffle($shuffled);
        $left_html = implode('', array_map(fn($t) => "<div class=\"match-item\">" . esc($t) . "</div>", $lefts));
        $right_html = '';
        foreach ($shuffled as $i => $t) {
            $answer      = esc($rights[$i] ?? '');
            $right_html .= "<div class=\"match-item match-right\" data-answer=\"{$answer}\" onclick=\"checkMatch(this)\">" . esc($t) . "</div>";
        }
        $match_html = "<div class=\"match-cols\"><div class=\"match-col\">{$left_html}</div><div class=\"match-col\">{$right_html}</div></div>";
    }

    $quiz_inner = <<<HTML
<div class="quiz-wrap">
  <div class="quiz-hdr">📝 Practice Quiz</div>
  <div class="quiz-tabs">
    <button class="qtab active" data-panel="flashcards">🃏 Flashcards</button>
    <button class="qtab" data-panel="tf">✔ True/False</button>
    <button class="qtab" data-panel="mcq">📝 MCQ</button>
    <button class="qtab" data-panel="match">🔗 Match</button>
  </div>
  <div class="qpanel" id="qp-flashcards">
    <p class="quiz-hint">Card पर click करें — flip होगा</p>
    <div class="fc-grid">{$fc_html}</div>
  </div>
  <div class="qpanel" id="qp-tf" style="display:none">{$tf_html}</div>
  <div class="qpanel" id="qp-mcq" style="display:none">{$mcq_html}</div>
  <div class="qpanel" id="qp-match" style="display:none">
    <p class="quiz-hint">English ↔ {$lang_name} match करें</p>
    {$match_html}
  </div>
</div>
HTML;

    // Quiz scene (shown in player area — just a pointer to scroll down)
    $quiz_scene_inner = '<div class="si-wrap"><div class="si-title">📝 Quiz</div><div class="si-sub">नीचे देखें</div></div>';
    return scene_div($idx, 'quiz', [], $quiz_scene_inner) . '<!-- QUIZ_HTML_MARKER -->' . $quiz_inner;
}

// ── build scenes ──────────────────────────────────────────────────────────────
$lang_meta = [
    'hi' => ['label' => 'हिंदी',    'name' => 'Hindi',   'flag' => '🇮🇳', 'html_lang' => 'hi-IN'],
    'mr' => ['label' => 'मराठी',   'name' => 'Marathi',  'flag' => '🏛️',  'html_lang' => 'mr'],
    'te' => ['label' => 'తెలుగు', 'name' => 'Telugu',   'flag' => '🌾',  'html_lang' => 'te'],
];
$lm = $lang_meta[$lang];

$tab1 = $data['tab_1_video']       ?? [];
$tab2 = $data['tab_2_listen_repeat'] ?? [];
$tab3 = $data['tab_3_dialogue']    ?? [];
$tab4 = $data['tab_4_summary']     ?? [];
$tab5 = $data['tab_5_quiz']        ?? [];

$t1c = $tab1['content'] ?? $tab1;
$t2c = $tab2['content'] ?? $tab2;
$t3c = $tab3['content'] ?? $tab3;
$t4c = $tab4['content'] ?? $tab4;
$t5c = $tab5['content'] ?? $tab5;

$scenes_html = [];
$sections    = [];
$quiz_html   = '';
$idx         = 0;

// Scene 0: Day intro card (with badge if present)
$day_badge = $data['badge'] ?? '';
$scenes_html[] = render_intro($idx, $day, $title, $SAAVI_SVG, $day_badge);
$sec_start_intro = $idx;
$idx++;

// Scene 1 (optional): Previous Day Recap
$recap = $t1c['previous_day_recap'] ?? [];
if ($recap) {
    $r_html = render_recap($idx, $recap, $lang, $day, $AUDIO_SECRET);
    if ($r_html) { $scenes_html[] = $r_html; $idx++; }
}

// Scene 2: SAAVI intro story
$saavi_intro = $t1c['saavi_intro'] ?? [];
$si_story    = $saavi_intro['story'] ?? '';
$si_goal     = esc($saavi_intro['goal']  ?? '');
$si_title    = esc($saavi_intro['title'] ?? 'मेरी कहानी');
if ($si_story) {
    $si_story_esc = esc($si_story);
    $goal_html    = $si_goal ? "<p class=\"saavi-goal-text\">🎯 {$si_goal}</p>" : '';
    $inner = <<<HTML
<div class="si-wrap">
  {$SAAVI_SVG}
  <div class="si-day">{$si_title}</div>
  <div class="saavi-story-card">
    <p class="saavi-story-text">{$si_story_esc}</p>
    {$goal_html}
  </div>
</div>
HTML;
    $scenes_html[] = scene_div($idx, 'saavi_intro', [au($lang, $day, 't1_saavi_intro', $AUDIO_SECRET)], $inner);
    $idx++;
}

// Scene 3 (optional): Concept bridge — native ↔ English
$concept = $t1c['concept'] ?? [];
if ($concept) {
    $c_html = render_concept($idx, $concept, $lm['label'], $lang, $day, $AUDIO_SECRET);
    if ($c_html) { $scenes_html[] = $c_html; $idx++; }
}

$sections[] = ['name' => 'Start', 'icon' => '🏁', 'start' => $sec_start_intro, 'end' => $idx - 1];

// Words section
$words = $t1c['word_teaching'] ?? [];
if ($words) {
    $sec_start = $idx;
    foreach ($words as $wi => $word_obj) {
        $scenes_html[] = render_word($idx, $wi + 1, $word_obj, $lang, $day, $AUDIO_SECRET);
        $idx++;
        $mis = render_mistake($idx, $wi + 1, $word_obj, $lang, $day, $AUDIO_SECRET);
        if ($mis) { $scenes_html[] = $mis; $idx++; }
    }
    $sections[] = ['name' => 'Words', 'icon' => '📖', 'start' => $sec_start, 'end' => $idx - 1];
}

// Listen & Repeat section
$sents = $t2c['sentences'] ?? [];
if ($sents) {
    $sec_start = $idx;
    $scenes_html[] = render_section_header($idx, '🎧 Listen & Repeat', 'सुनिए और दोहराइए');
    $idx++;
    foreach ($sents as $si => $sent) {
        $scenes_html[] = render_listen($idx, $si + 1, $sent, $lang, $day, $AUDIO_SECRET);
        $idx++;
    }
    $sections[] = ['name' => 'Listen', 'icon' => '🎧', 'start' => $sec_start, 'end' => $idx - 1];
}

// Dialogue section
$lines = $t3c['dialogue'] ?? $t3c['lines'] ?? [];
if ($lines) {
    $sec_start = $idx;
    $situation = esc($t3c['scenario'] ?? $t3c['situation'] ?? '');
    $scenes_html[] = render_section_header($idx, '🎭 Dialogue', $situation);
    $idx++;
    // Build character_id → character map for real names/icons instead of "Person 1"
    $char_map = [];
    foreach ($t3c['characters'] ?? [] as $ch) {
        $cid = $ch['character_id'] ?? ($ch['id'] ?? '');
        if ($cid) $char_map[$cid] = $ch;
    }
    foreach ($lines as $li => $line) {
        $scenes_html[] = render_dialogue($idx, $li + 1, $line, $lang, $day, $AUDIO_SECRET, $char_map);
        $idx++;
    }
    $sections[] = ['name' => 'Dialogue', 'icon' => '🎭', 'start' => $sec_start, 'end' => $idx - 1];
}

// Summary section
if ($t4c) {
    $sec_start = $idx;
    $scenes_html[] = render_summary($idx, $t4c, $lang, $day, $AUDIO_SECRET);
    $idx++;
    $sections[] = ['name' => 'Summary', 'icon' => '✅', 'start' => $sec_start, 'end' => $idx - 1];
}

// Quiz section
if ($t5c) {
    $sec_start = $idx;
    $quiz_result  = render_quiz($idx, $t5c, $lm['name']);
    // Split at marker: first part is the scene div, second is the quiz panel HTML
    $parts = explode('<!-- QUIZ_HTML_MARKER -->', $quiz_result, 2);
    $scenes_html[] = $parts[0];
    $quiz_html     = $parts[1] ?? '';
    $idx++;
    $sections[] = ['name' => 'Quiz', 'icon' => '📝', 'start' => $sec_start, 'end' => $idx - 1];
}

// Closing celebration scene (uses summary closing + tomorrow + root badge)
if ($t4c) {
    $sec_start = $idx;
    $scenes_html[] = render_closing($idx, $day, $t4c, $data['badge'] ?? '', $lang, $AUDIO_SECRET);
    $idx++;
    $sections[] = ['name' => 'Done', 'icon' => '🎉', 'start' => $sec_start, 'end' => $idx - 1];
}

$total       = $idx;
$all_scenes  = implode('', $scenes_html);
$sections_js = json_encode($sections, JSON_UNESCAPED_UNICODE);

// ── canonical URL for this page ──────────────────────────────────────────────
// Prefer player_slug; fall back to url_slug so every day has a pretty canonical.
$canonical_slug = $row['player_slug'] ?? $row['url_slug'] ?? null;
$lang_word_rev  = array_flip($lang_word_map);  // hi → hindi, mr → marathi, te → telugu
$lang_word      = $lang_word_rev[$lang] ?? $lang;
$canonical_player = $canonical_slug
    ? "https://shrutam.ai/learn-english/{$lang_word}/{$canonical_slug}/play/"
    : "https://shrutam.ai/player.php?lang={$lang}&day={$day}";

// ── lang pills (use pretty URLs when slugs exist) ─────────────────────────────
// Pre-fetch both slug types for the same day in all 3 languages
$slugs_by_lang = [];
$ps = $pdo->prepare("SELECT lang, player_slug, url_slug FROM seo_pages WHERE day_number = ?");
$ps->execute([$day]);
foreach ($ps->fetchAll() as $sr) {
    $slugs_by_lang[$sr['lang']] = $sr['player_slug'] ?: $sr['url_slug'];
}

$lang_pills = '';
foreach ($lang_meta as $lc => $lm2) {
    $active = $lc === $lang ? 'active' : '';
    $lw     = $lang_word_rev[$lc] ?? $lc;
    $href   = !empty($slugs_by_lang[$lc])
        ? "/learn-english/{$lw}/{$slugs_by_lang[$lc]}/play/"
        : "/player.php?lang={$lc}&day={$day}";
    $lang_pills .= "<a href=\"{$href}\" class=\"lang-pill {$active}\">{$lm2['flag']} {$lm2['label']}</a>";
}

// ── section tab buttons ───────────────────────────────────────────────────────
$sec_tab_html = '';
foreach ($sections as $i => $sec) {
    $active = $i === 0 ? 'active' : '';
    $sec_tab_html .= "<button class=\"sec-tab {$active}\" data-sec=\"{$i}\">{$sec['icon']} {$sec['name']}</button>";
}

$title_esc = esc($title);

// ── output ────────────────────────────────────────────────────────────────────
// Tokens all expire at the same clock-hour boundary, so the whole page can be
// cached until then.  Cloudflare will cache this at the edge; same-user browsers
// will cache it locally.  After expiry the next request mints fresh tokens.
$token_exp  = (int)(ceil((time() + 1) / 3600) * 3600);  // same boundary as au()
$max_age    = max(0, $token_exp - time());
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: public, max-age=' . $max_age . ', s-maxage=' . $max_age);
header('Expires: ' . gmdate('D, d M Y H:i:s', $token_exp) . ' GMT');
header('Vary: Accept-Language');
?>
<!DOCTYPE html>
<html lang="<?= esc($lm['html_lang']) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= esc($meta_title) ?></title>
<meta name="description" content="<?= esc($meta_desc) ?>">
<link rel="canonical" href="<?= esc($canonical_player) ?>">
<meta name="robots" content="noindex"><!-- player is dynamic; SEO page handles indexing -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#08080F;--bg2:#12121C;--bg3:#1C1C28;--bg4:#24243A;
  --acc:#F5A623;--acc2:#4ADE80;--danger:#F87171;
  --txt:#F0EDE6;--txt2:#A8A8C0;--txt3:#60607A;
  --border:rgba(255,255,255,0.07);
  --radius:14px;--font:'Nunito','Noto Sans Devanagari',sans-serif;
}
body{font-family:var(--font);background:var(--bg);color:var(--txt);min-height:100vh;line-height:1.6}
a{color:var(--acc);text-decoration:none}
.hdr{display:flex;align-items:center;gap:12px;padding:12px 16px;background:var(--bg2);
     border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.hdr-back{font-size:1.3rem;color:var(--txt2);padding:4px 8px;border-radius:8px;background:var(--bg3)}
.hdr-title{flex:1;font-weight:800;font-size:1rem;color:var(--txt)}
.hdr-langs{display:flex;gap:6px}
.lang-pill{padding:4px 10px;border-radius:20px;font-size:0.75rem;font-weight:700;
           background:var(--bg3);color:var(--txt2);cursor:pointer;border:1px solid var(--border)}
.lang-pill.active,.lang-pill:hover{background:var(--acc);color:#000;border-color:var(--acc)}
.player-area{padding:10px 12px 0;max-width:1200px;margin:0 auto}
.player-wrap{position:relative;background:#000;
             border-radius:var(--radius);overflow:hidden;border:1px solid var(--border);
             aspect-ratio:16/9;max-height:calc(100vh - 210px);
             max-width:min(100%, calc((100vh - 210px) * 16 / 9));margin:0 auto}
.scene{position:absolute;inset:0;display:none;flex-direction:column;
       align-items:safe center;justify-content:safe center;
       padding:18px 20px;overflow-y:auto;animation:fadeIn 0.35s ease;scrollbar-width:thin}
.scene.active{display:flex}
.scene::-webkit-scrollbar{width:6px}
.scene::-webkit-scrollbar-thumb{background:var(--bg4);border-radius:3px}
@keyframes fadeIn{from{opacity:0;transform:scale(0.97)}to{opacity:1;transform:scale(1)}}
.si-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:10px}
.si-day{font-size:0.8rem;font-weight:700;color:var(--acc);text-transform:uppercase;letter-spacing:.1em}
.si-title{font-size:clamp(1.1rem,3vw,1.8rem);font-weight:900;color:var(--txt)}
.si-sub{font-size:clamp(0.8rem,2vw,1rem);color:var(--txt2)}
.si-hint{font-size:0.75rem;color:var(--txt3);margin-top:4px}
.saavi-svg{animation:float 3s ease-in-out infinite}
.saavi-story-card{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
  padding:14px 18px;max-width:520px;margin-top:6px}
.saavi-story-text{font-size:clamp(0.8rem,2vw,0.95rem);color:var(--txt);line-height:1.7;
  font-family:'Noto Sans Devanagari',var(--font)}
.saavi-goal-text{font-size:clamp(0.75rem,1.8vw,0.88rem);color:var(--acc);margin-top:10px;
  font-weight:700;line-height:1.6}
.saavi-avatar{position:relative;display:inline-block;margin-bottom:8px}
.saavi-img{width:160px;height:160px;border-radius:50%;object-fit:cover;border:3px solid var(--acc);box-shadow:0 0 20px rgba(245,166,35,0.3)}
.saavi-pulse{position:absolute;inset:-6px;border-radius:50%;border:2px solid var(--acc);opacity:0}
.scene.playing .saavi-pulse{opacity:1;animation:saavi-speak 1.5s ease-in-out infinite}
@keyframes saavi-speak{0%{transform:scale(1);opacity:0.6}50%{transform:scale(1.08);opacity:0.2}100%{transform:scale(1);opacity:0.6}}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
.word-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:680px}
.word-main{text-align:center;background:var(--bg3);padding:18px 28px;border-radius:var(--radius);
           border:1px solid var(--border);width:100%}
.w-word{font-size:clamp(2rem,6vw,3.5rem);font-weight:900;color:var(--acc);line-height:1.1}
.w-pron{font-size:clamp(1rem,2.5vw,1.4rem);color:#93C5FD;margin:4px 0}
.w-mean{font-size:clamp(1rem,2.5vw,1.3rem);color:var(--txt)}
.word-exs{width:100%;display:flex;flex-direction:column;gap:6px}
.ex-row{display:flex;align-items:flex-start;gap:8px;background:var(--bg3);
        padding:8px 12px;border-radius:10px;font-size:0.85rem}
.ex-num{color:var(--acc);font-weight:800;min-width:18px}
.ex-en{color:var(--txt);font-style:italic;flex:1}
.ex-tr{color:var(--txt2);font-size:0.8rem;white-space:nowrap}
.mis-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:620px}
.mis-head{font-size:clamp(0.9rem,2.5vw,1.1rem);font-weight:800;color:var(--acc);text-align:center}
.mis-pair{display:flex;gap:14px;width:100%}
.mis-wrong,.mis-right{flex:1;padding:18px;border-radius:var(--radius);text-align:center}
.mis-wrong{background:rgba(248,113,113,0.12);border:1px solid rgba(248,113,113,0.3)}
.mis-right{background:rgba(74,222,128,0.1);border:1px solid rgba(74,222,128,0.3)}
.mis-icon{font-size:2rem;margin-bottom:6px}
.mis-text{font-size:clamp(0.9rem,2.5vw,1.2rem);font-weight:700;color:var(--txt)}
.mis-tip{font-size:0.85rem;color:var(--txt2);text-align:center;max-width:480px}
.listen-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:12px;max-width:560px}
.listen-num{font-size:0.75rem;font-weight:700;color:var(--acc);text-transform:uppercase}
.listen-en{font-size:clamp(1.2rem,4vw,2rem);font-weight:800;color:var(--txt)}
.listen-pron{font-size:clamp(0.85rem,2vw,1.1rem);color:#93C5FD}
.listen-tr{font-size:clamp(0.85rem,2vw,1rem);color:var(--txt2)}
.listen-hint{font-size:0.8rem;color:var(--txt3);margin-top:4px}
.dlg-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:10px;max-width:560px}
.dlg-speaker{display:inline-block;padding:3px 14px;border-radius:20px;font-size:0.75rem;font-weight:800;
             background:var(--acc);color:#000;text-transform:uppercase;letter-spacing:.05em}
.dlg-en{font-size:clamp(1.1rem,3.5vw,1.7rem);font-weight:800;color:var(--txt)}
.dlg-pron{font-size:0.9rem;color:#93C5FD}
.dlg-tr{font-size:0.9rem;color:var(--txt2)}
.sum-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:580px}
.sum-title{font-size:clamp(1.1rem,3vw,1.5rem);font-weight:900;color:var(--acc)}
.sum-pts{width:100%;display:flex;flex-direction:column;gap:8px}
.sum-pt{display:flex;align-items:flex-start;gap:10px;background:var(--bg3);
        padding:10px 14px;border-radius:10px;font-size:0.9rem}
.sum-num{font-weight:900;color:var(--acc);min-width:22px}
.sum-text{color:var(--txt)}
.sum-closing{font-size:0.85rem;color:var(--txt2);text-align:center;font-style:italic}
.controls{display:flex;align-items:center;gap:8px;padding:10px 12px;background:var(--bg2);
          border-top:1px solid var(--border)}
.ctrl-btn{background:var(--bg3);border:1px solid var(--border);color:var(--txt);
          padding:8px 14px;border-radius:10px;cursor:pointer;font-size:0.9rem;font-weight:700;
          transition:all .2s}
.ctrl-btn:hover{background:var(--bg4)}
.ctrl-btn.primary{background:var(--acc);color:#000;border-color:var(--acc)}
.ctrl-btn.primary:hover{background:#f0c060}
.ctrl-btn:disabled{opacity:0.35;cursor:not-allowed}
.ctrl-prog{flex:1;display:flex;flex-direction:column;gap:4px}
.prog-bar{height:5px;background:var(--bg4);border-radius:3px;overflow:hidden;cursor:pointer}
.prog-fill{height:100%;background:var(--acc);border-radius:3px;transition:width .3s;width:0%}
.prog-label{font-size:0.7rem;color:var(--txt3)}
.audio-ind{width:10px;height:10px;border-radius:50%;background:var(--txt3);transition:background .2s}
.audio-ind.playing{background:var(--acc2);animation:pulse 1s ease infinite}
@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.4)}}
.sec-tabs{display:flex;gap:6px;padding:10px 12px;background:var(--bg);
          border-top:1px solid var(--border);overflow-x:auto;-webkit-overflow-scrolling:touch}
.sec-tab{flex-shrink:0;padding:7px 14px;border-radius:20px;font-size:0.8rem;font-weight:700;
         background:var(--bg3);color:var(--txt2);border:1px solid var(--border);cursor:pointer;
         transition:all .2s}
.sec-tab.active,.sec-tab:hover{background:var(--acc);color:#000;border-color:var(--acc)}
#quiz-area{padding:16px 12px 40px;display:none}
.quiz-wrap{background:var(--bg2);border-radius:var(--radius);border:1px solid var(--border);overflow:hidden}
.quiz-hdr{padding:14px 20px;font-size:1.1rem;font-weight:800;color:var(--acc);
          border-bottom:1px solid var(--border)}
.quiz-tabs{display:flex;gap:6px;padding:12px 16px;border-bottom:1px solid var(--border);overflow-x:auto}
.qtab{padding:6px 14px;border-radius:20px;font-size:0.78rem;font-weight:700;
      background:var(--bg3);color:var(--txt2);border:1px solid var(--border);cursor:pointer;white-space:nowrap}
.qtab.active{background:var(--acc);color:#000;border-color:var(--acc)}
.qpanel{padding:16px}
.quiz-hint{font-size:0.8rem;color:var(--txt3);margin-bottom:12px}
.fc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:10px}
.fc-card{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
         min-height:90px;display:flex;align-items:center;justify-content:center;
         text-align:center;cursor:pointer;padding:12px;position:relative;
         transition:transform .2s;font-weight:700}
.fc-card:hover{transform:scale(1.03)}
.fc-card .fc-back{display:none;color:var(--acc)}
.fc-card.flipped .fc-front{display:none}
.fc-card.flipped .fc-back{display:block}
.tf-item{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);padding:14px;margin-bottom:10px}
.tf-stmt{font-size:0.9rem;color:var(--txt);margin-bottom:10px}
.tf-btns{display:flex;gap:8px}
.tf-btn{flex:1;padding:8px;border-radius:8px;font-size:0.85rem;font-weight:700;cursor:pointer;
        background:var(--bg4);color:var(--txt2);border:1px solid var(--border)}
.tf-btn.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.tf-btn.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}
.mcq-item{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);padding:14px;margin-bottom:12px}
.mcq-q{font-size:0.9rem;color:var(--txt);margin-bottom:10px;font-weight:600}
.mcq-opts{display:flex;flex-direction:column;gap:6px}
.mcq-opt{padding:8px 12px;border-radius:8px;font-size:0.85rem;text-align:left;cursor:pointer;
         background:var(--bg4);color:var(--txt2);border:1px solid var(--border)}
.mcq-opt.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.mcq-opt.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}
.match-cols{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.match-col{display:flex;flex-direction:column;gap:6px}
.match-item{padding:8px 12px;border-radius:8px;font-size:0.85rem;font-weight:600;
            background:var(--bg3);color:var(--txt);border:1px solid var(--border);text-align:center}
.match-right{cursor:pointer}
.match-right:hover{border-color:var(--acc)}
.match-right.correct{background:rgba(74,222,128,0.2);color:var(--acc2);border-color:var(--acc2)}
.match-right.wrong{background:rgba(248,113,113,0.2);color:var(--danger);border-color:var(--danger)}
/* ── new scene styles: recap / concept / closing / word-icon / dialogue chars ── */
.recap-wrap{display:flex;flex-direction:column;align-items:center;gap:12px;width:100%;max-width:600px;text-align:center}
.recap-icon{font-size:2.8rem;animation:rotate 4s linear infinite;display:inline-block}
@keyframes rotate{from{transform:rotate(0)}to{transform:rotate(360deg)}}
.recap-title{font-size:clamp(1rem,2.8vw,1.4rem);font-weight:900;color:var(--acc)}
.recap-points{display:flex;flex-direction:column;gap:6px;width:100%}
.recap-point{background:var(--bg3);border:1px solid var(--border);border-radius:10px;
             padding:8px 14px;font-size:clamp(0.82rem,2vw,0.95rem);color:var(--txt);text-align:left;
             display:flex;gap:10px;align-items:flex-start}
.recap-point::before{content:'✓';color:var(--acc2);font-weight:900;flex-shrink:0}
.recap-narration{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
                 padding:10px 14px;font-size:clamp(0.78rem,1.8vw,0.9rem);color:var(--txt2);
                 font-style:italic;max-width:520px;line-height:1.6}
.concept-wrap{display:flex;flex-direction:column;align-items:center;gap:14px;width:100%;max-width:780px}
.concept-head{display:flex;align-items:center;gap:10px;justify-content:center;flex-wrap:wrap}
.concept-icon{font-size:1.8rem}
.concept-title{font-size:clamp(1rem,2.8vw,1.4rem);font-weight:900;color:var(--acc);text-align:center}
.concept-bridge{display:grid;grid-template-columns:1fr auto 1fr;gap:14px;align-items:center;width:100%}
.bridge-side{padding:16px 12px;border-radius:var(--radius);text-align:center;color:#fff;font-weight:700}
.bridge-hindi{background:linear-gradient(135deg,#4A90E2,#2E6BB8)}
.bridge-english{background:linear-gradient(135deg,#06A77D,#048060)}
.bridge-label{font-size:0.72rem;opacity:.85;text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px}
.bridge-text{font-size:clamp(0.95rem,2.3vw,1.2rem);line-height:1.3}
.bridge-arrow{font-size:clamp(1.2rem,3vw,1.8rem);color:var(--acc)}
.concept-text{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
              padding:10px 14px;font-size:clamp(0.8rem,1.9vw,0.92rem);color:var(--txt);line-height:1.65;max-width:620px}
.closing-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:12px;max-width:540px}
.closing-big{font-size:clamp(3rem,8vw,4.5rem);animation:celebrate 1.2s ease-in-out infinite alternate}
@keyframes celebrate{from{transform:scale(1) rotate(-5deg)}to{transform:scale(1.08) rotate(5deg)}}
.closing-shaabash{font-size:clamp(1.4rem,4vw,2.2rem);font-weight:900;color:var(--acc)}
.closing-done{font-size:clamp(0.9rem,2.2vw,1.1rem);font-weight:700;color:var(--txt2)}
.closing-tomorrow{background:var(--bg3);border:1px solid var(--border);border-radius:var(--radius);
                  padding:10px 14px;font-size:clamp(0.8rem,1.9vw,0.95rem);color:var(--txt);max-width:420px}
.closing-badge{display:inline-block;padding:6px 14px;border-radius:20px;font-size:0.85rem;font-weight:800;
               background:linear-gradient(135deg,#F5A623,#F0C060);color:#000;box-shadow:0 0 18px rgba(245,166,35,0.45)}
.w-icon{font-size:2.2rem;margin-bottom:4px}
.intro-badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:0.72rem;font-weight:800;
             background:linear-gradient(135deg,#F5A623,#F0C060);color:#000;margin-top:6px;
             text-transform:uppercase;letter-spacing:.08em}
.dlg-char-chip{display:inline-flex;align-items:center;gap:6px;padding:4px 14px;border-radius:20px;
               font-size:0.78rem;font-weight:800;background:var(--acc);color:#000;letter-spacing:.02em}
.dlg-char-icon{font-size:1rem}
.dlg-char-role{font-size:0.7rem;color:var(--txt3);font-weight:600;margin-top:2px}
/* ── responsive: desktop vs mobile ───────────────────────────────────────────── */
@media(min-width:1024px){
  .si-wrap{gap:14px}
  .word-wrap,.mis-wrap,.sum-wrap,.concept-wrap{gap:18px}
  .word-exs{max-width:580px;margin:0 auto}
}
@media(max-width:640px){
  .player-area{padding:6px 8px 0;max-width:none}
  .player-wrap{aspect-ratio:auto;height:calc(100vh - 150px);min-height:340px;max-height:none;max-width:100%}
  .scene{padding:14px 14px}
  .hdr{padding:10px 12px;gap:8px}
  .hdr-title{font-size:0.8rem;line-height:1.2}
  .hdr-langs{gap:4px}
  .lang-pill{padding:3px 8px;font-size:0.68rem}
  .controls{padding:8px 10px;gap:6px}
  .ctrl-btn{padding:7px 10px;font-size:0.85rem}
  .sec-tabs{padding:8px 10px;gap:4px}
  .sec-tab{padding:5px 10px;font-size:0.72rem}
  .concept-bridge{grid-template-columns:1fr;gap:8px}
  .bridge-arrow{transform:rotate(90deg)}
  .saavi-img{width:110px;height:110px}
}
@media(max-width:480px){
  .mis-pair{flex-direction:column}
  .fc-grid{grid-template-columns:repeat(2,1fr)}
}
</style>
</head>
<body>

<header class="hdr">
  <a href="/spoken-english/" class="hdr-back">←</a>
  <div class="hdr-title">Day <?= $day ?>: <?= $title_esc ?></div>
  <div class="hdr-langs"><?= $lang_pills ?></div>
</header>

<div id="player-area" class="player-area">
  <div class="player-wrap" id="player-stage">
    <?= $all_scenes ?>
  </div>

  <div class="controls">
    <button id="btn-prev" class="ctrl-btn" disabled>⏮</button>
    <button id="btn-play" class="ctrl-btn primary">▶</button>
    <button id="btn-next" class="ctrl-btn">⏭</button>
    <div class="ctrl-prog">
      <div class="prog-bar" id="prog-bar"><div class="prog-fill" id="prog-fill"></div></div>
      <div class="prog-label" id="prog-label">Scene 1 / <?= $total ?></div>
    </div>
    <div class="audio-ind" id="audio-ind" title="Audio status"></div>
  </div>
</div>

<div class="sec-tabs"><?= $sec_tab_html ?></div>

<div id="quiz-area"><?= $quiz_html ?></div>

<script>
const LANG = '<?= $lang ?>';
const DAY  = <?= $day ?>;
const TOTAL = <?= $total ?>;
const SECTIONS = <?= $sections_js ?>;

let cur = 0, playing = false, curAudio = null;

function getAudios(idx) {
  const el = document.getElementById('sc' + idx);
  if (!el) return [];
  const urls = [];
  for (let i = 1; i <= 6; i++) {
    const u = el.dataset['a' + i];
    if (u) urls.push(u);
  }
  return urls;
}

function playQueue(urls, onDone) {
  if (!urls.length) { setTimeout(onDone, 2500); return null; }
  let qi = 0;
  const a = new Audio();
  a.preload = 'auto';
  const next = () => {
    if (qi >= urls.length) { onDone(); return; }
    a.src = urls[qi++];
    a.play().catch(() => setTimeout(next, 600));
  };
  a.addEventListener('ended', () => setTimeout(next, 350));
  a.addEventListener('error', () => setTimeout(next, 600));
  next();
  return a;
}

function goTo(idx, autoplay) {
  if (idx < 0 || idx >= TOTAL) return;
  if (curAudio) { curAudio.pause(); curAudio = null; }
  document.querySelectorAll('.scene').forEach(s => s.classList.remove('active'));
  const el = document.getElementById('sc' + idx);
  if (el) el.classList.add('active');
  cur = idx;
  const isQuiz = el && el.dataset.type === 'quiz';
  document.getElementById('player-area').style.display = isQuiz ? 'none' : '';
  document.getElementById('quiz-area').style.display   = isQuiz ? 'block' : 'none';
  updateUI();
  if ((autoplay || playing) && !isQuiz) playNow();
}

function playNow() {
  const el = document.getElementById('sc' + cur);
  if (el && el.dataset.type === 'quiz') return;
  playing = true;
  document.getElementById('audio-ind').classList.add('playing');
  document.getElementById('btn-play').textContent = '⏸';
  curAudio = playQueue(getAudios(cur), () => {
    if (playing) {
      if (cur + 1 < TOTAL) goTo(cur + 1, true);
      else { playing = false; updateUI(); }
    }
  });
}

function pause() {
  playing = false;
  if (curAudio) { curAudio.pause(); curAudio = null; }
  document.getElementById('audio-ind').classList.remove('playing');
  document.getElementById('btn-play').textContent = '▶';
}

function updateUI() {
  const pct = TOTAL > 1 ? (cur / (TOTAL - 1) * 100).toFixed(1) : 0;
  document.getElementById('prog-fill').style.width  = pct + '%';
  document.getElementById('prog-label').textContent = 'Scene ' + (cur+1) + ' / ' + TOTAL;
  document.getElementById('btn-prev').disabled = cur === 0;
  document.getElementById('btn-next').disabled = cur === TOTAL - 1;
  let activeSection = -1;
  SECTIONS.forEach((s, i) => { if (cur >= s.start && cur <= s.end) activeSection = i; });
  document.querySelectorAll('.sec-tab').forEach((t, i) => t.classList.toggle('active', i === activeSection));
}

document.getElementById('btn-prev').addEventListener('click', () => { pause(); goTo(cur - 1, false); });
document.getElementById('btn-next').addEventListener('click', () => { if (playing) goTo(cur + 1, true); else goTo(cur + 1, false); });
document.getElementById('btn-play').addEventListener('click', () => { if (playing) pause(); else playNow(); });
document.querySelectorAll('.sec-tab').forEach((btn, i) => btn.addEventListener('click', () => { pause(); goTo(SECTIONS[i].start, false); }));
document.getElementById('prog-bar').addEventListener('click', e => {
  const rect = e.currentTarget.getBoundingClientRect();
  pause(); goTo(Math.round((e.clientX - rect.left) / rect.width * (TOTAL - 1)), false);
});

// quiz tab switching
document.querySelectorAll('.qtab').forEach(btn => btn.addEventListener('click', () => {
  document.querySelectorAll('.qtab').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.qpanel').forEach(p => p.style.display = 'none');
  btn.classList.add('active');
  document.getElementById('qp-' + btn.dataset.panel).style.display = 'block';
}));

// quiz answer checkers
function checkTF(btn) {
  const correct = btn.dataset.correct, item = btn.closest('.tf-item');
  item.querySelectorAll('.tf-btn').forEach(b => {
    b.disabled = true;
    if (b.dataset.val === correct) b.classList.add('correct');
    else if (b === btn) b.classList.add('wrong');
  });
}
function checkMCQBool(btn) {
  btn.closest('.mcq-item').querySelectorAll('.mcq-opt').forEach(b => {
    b.disabled = true;
    if (b.dataset.correct === 'true') b.classList.add('correct');
    else if (b === btn) b.classList.add('wrong');
  });
}
function checkMatch(btn) { btn.classList.add('correct'); }

// progress tracking
const PKEY = 'shrutam_' + LANG + '_d' + DAY, UKEY = 'shrutam_uid';
function uid() {
  let v = localStorage.getItem(UKEY);
  if (!v) { v = 'u' + Date.now().toString(36) + Math.random().toString(36).slice(2,7); localStorage.setItem(UKEY, v); }
  return v;
}
let lastSaved = -1;
function saveProgress() {
  if (cur === lastSaved) return; lastSaved = cur;
  localStorage.setItem(PKEY, JSON.stringify({ scene: cur, ts: Date.now() }));
  fetch('/api/progress.php', { method: 'POST', headers: {'Content-Type':'application/json'},
    body: JSON.stringify({ uid: uid(), lang: LANG, day: DAY, tabs: [cur] }), keepalive: true })
    .catch(() => {});
}
setInterval(saveProgress, 10000);
window.addEventListener('pagehide', saveProgress);

// keyboard shortcuts
document.addEventListener('keydown', e => {
  if (e.target.tagName === 'INPUT') return;
  if (e.key === 'ArrowRight') document.getElementById('btn-next').click();
  if (e.key === 'ArrowLeft')  document.getElementById('btn-prev').click();
  if (e.key === ' ') { e.preventDefault(); document.getElementById('btn-play').click(); }
});

// resume from localStorage
(function() {
  try {
    const p = JSON.parse(localStorage.getItem(PKEY) || '{}');
    if (p.scene && p.scene > 0 && p.scene < TOTAL) goTo(p.scene, false);
  } catch(e) {}
})();
</script>
</body>
</html>

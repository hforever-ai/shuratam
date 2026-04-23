#!/usr/bin/env bash
# run_tts_parallel.sh — Launch all 21 TTS jobs in parallel
# One process per (lang, day) combo. Logs to logs/tts_{lang}_{day}.log
# Key staggering: each job starts with a different key offset to avoid pile-up.
#
# Usage:
#   ./scripts/run_tts_parallel.sh          # all 21 combos
#   ./scripts/run_tts_parallel.sh --status  # show done/pending counts from DB

set -euo pipefail
REPO="$(cd "$(dirname "$0")/.." && pwd)"
cd "$REPO"

mkdir -p logs

# ── Status mode ───────────────────────────────────────────────────────────────
if [[ "${1:-}" == "--status" ]]; then
    python3 -c "
from pathlib import Path
import json

results_dir = Path('audio_output/results')
total_done = 0; total_err = 0
for lang in ['hi','mr','te']:
    for day in range(1,8):
        jf = results_dir / f'{lang}_day{day:02d}.jsonl'
        if jf.exists():
            lines = [json.loads(l) for l in jf.read_text().splitlines() if l.strip()]
            done = sum(1 for l in lines if l.get('status')=='done')
            err  = sum(1 for l in lines if l.get('status')=='error')
            total_done += done; total_err += err
            bar = '#'*(done//11)
            print(f'  {lang} Day {day:2d}: {done:3d} done  {err:2d} err  [{bar:<20}]')
        else:
            print(f'  {lang} Day {day:2d}: (not started)')
print(f'  TOTAL done: {total_done}  errors: {total_err}')
"
    echo ""
    echo "Running processes: $(ps aux | grep generate_tts_v4 | grep -v grep | wc -l | tr -d ' ') active"
    ps aux | grep generate_tts_v4 | grep -v grep | awk '{print "  PID",$2,$13,$14}' || true
    exit 0
fi

# ── Kill any existing TTS processes ─────────────────────────────────────────
EXISTING=$(ps aux | grep generate_tts_v4 | grep -v grep | awk '{print $2}' || true)
if [[ -n "$EXISTING" ]]; then
    echo "Stopping existing TTS processes: $EXISTING"
    echo "$EXISTING" | xargs kill 2>/dev/null || true
    sleep 2
fi

echo "Starting 21 parallel TTS jobs (hi/mr/te × days 1-7)..."
echo "Logs: logs/tts_{lang}_{day}.log"
echo ""

# Single paid API key (10 RPM limit) — one sequential process
TTS_KEY="${TTS_API_KEY:-AIzaSyCiVhzQ6y3LjHhuiNFlyzyu6pUwEXQQMSM}"
MODEL="${TTS_MODEL:-gemini-3.1-flash-tts-preview}"

# 1 key × 10 RPM = must run sequentially. ~7s/clip → 8 RPM.
# All 21 lang/day combos run back-to-back in one process.
# ETA: ~4,200 clips × 7s ≈ 8 hours.
LOG="logs/tts_all.log"
echo "" > "$LOG"
(
    for LANG in hi mr te; do
        for DAY in 1 2 3 4 5 6 7; do
            echo "=== $LANG Day $DAY ===" >> "$LOG"
            TTS_API_KEY="$TTS_KEY" TTS_MODEL="$MODEL" \
                python3 -u scripts/generate_tts_v4.py \
                --lang "$LANG" --day "$DAY" \
                >> "$LOG" 2>&1
        done
    done
    echo "=== ALL DONE ===" >> "$LOG"
) &
PID=$!
echo "  [all 21 combos] model=$MODEL  PID $PID → $LOG"

echo ""
echo "All 21 jobs launched. They write results to audio_output/results/*.jsonl"
echo "(no DB connections during generation)"
echo ""
echo "Wait for all to finish, then commit to DB with:"
echo "  python3 scripts/generate_tts_v4.py --commit"
echo ""
echo "Monitor:"
echo "  ./scripts/run_tts_parallel.sh --status   (shows JSONL result counts)"
echo "  tail -f logs/tts_hi_1.log"

<?php
$title = 'Login — Shrutam English Course';
$description = 'Sign in to track your progress';
$canonical = 'https://shrutam.ai/spoken-english/login/';
$htmlLang = 'hi-IN';
include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/nav.php';
?>

<main id="main" class="section" style="min-height: 80vh;">
<div class="container" style="max-width: 480px;">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-heading mb-2" style="color: var(--text-primary);">
            अंग्रेज़ी सीखें — Login
        </h1>
        <p style="color: var(--text-secondary);">Sign in to track progress & chat with SAAVI</p>
    </div>

    <!-- Login Card -->
    <div class="card p-6">

        <!-- Phone OTP Section -->
        <div id="phone-section">
            <label class="text-sm font-bold mb-2 block" style="color: var(--text-secondary);">📱 Phone Number</label>
            <div class="flex gap-2 mb-3">
                <span class="input" style="width:60px; text-align:center; flex-shrink:0;">+91</span>
                <input type="tel" id="phone-input" class="input" placeholder="98765 43210" maxlength="10" style="flex:1;">
            </div>
            <button id="send-otp-btn" class="btn btn-primary w-full" onclick="sendOTP()">
                OTP भेजें →
            </button>
            <div id="recaptcha-container" class="mt-3"></div>
        </div>

        <!-- OTP Verify Section (hidden initially) -->
        <div id="otp-section" style="display:none;">
            <label class="text-sm font-bold mb-2 block" style="color: var(--text-secondary);">🔢 Enter OTP</label>
            <input type="text" id="otp-input" class="input mb-3" placeholder="6-digit OTP" maxlength="6"
                   onkeypress="if(event.key==='Enter') verifyOTP()">
            <button class="btn btn-primary w-full" onclick="verifyOTP()">
                Verify करें ✓
            </button>
            <button class="mt-2 text-sm" style="color: var(--text-muted); background:none; border:none; cursor:pointer;"
                    onclick="document.getElementById('phone-section').style.display='block'; document.getElementById('otp-section').style.display='none';">
                ← Change number
            </button>
        </div>

        <!-- Divider -->
        <div class="flex items-center gap-3 my-6">
            <div style="flex:1; height:1px; background: var(--border-subtle);"></div>
            <span class="text-sm" style="color: var(--text-muted);">या</span>
            <div style="flex:1; height:1px; background: var(--border-subtle);"></div>
        </div>

        <!-- Google Sign In -->
        <button id="google-btn" class="btn btn-outline w-full" onclick="googleSignIn()" style="justify-content: center;">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="" style="width:20px; height:20px;">
            Google से Sign In करें
        </button>

        <!-- Skip -->
        <div class="text-center mt-6">
            <a href="/spoken-english/?day=1" class="text-sm" style="color: var(--text-muted);">
                बिना login के देखें →
            </a>
        </div>
    </div>

    <!-- Status message -->
    <div id="auth-status" class="mt-4 text-center text-sm" style="color: var(--text-muted);"></div>

</div>
</main>

<!-- Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-auth-compat.js"></script>

<script>
// Firebase config
firebase.initializeApp({
    apiKey: "AIzaSyB2ClXjJa24qZX72-M3LmQRuW15bwVUaWY",
    authDomain: "shrutam-8d1f9.firebaseapp.com",
    projectId: "shrutam-8d1f9",
    storageBucket: "shrutam-8d1f9.firebasestorage.app",
    messagingSenderId: "641199131178",
    appId: "1:641199131178:web:a92ad9f428d70b412a9153",
});

const auth = firebase.auth();
// Use reCAPTCHA Enterprise for phone verification
auth.settings.appVerificationDisabledForTesting = false;
let confirmationResult = null;

function status(msg, isError) {
    const el = document.getElementById('auth-status');
    el.textContent = msg;
    el.style.color = isError ? 'var(--error)' : 'var(--accent)';
}

// ── Phone OTP ──
function sendOTP() {
    const phone = document.getElementById('phone-input').value.replace(/\s/g, '');
    if (phone.length !== 10) {
        status('10 digit phone number daaliye', true);
        return;
    }

    const btn = document.getElementById('send-otp-btn');
    btn.textContent = 'Sending...';
    btn.disabled = true;

    // reCAPTCHA (invisible)
    if (!window.recaptchaVerifier) {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            size: 'invisible',
        });
    }

    auth.signInWithPhoneNumber('+91' + phone, window.recaptchaVerifier)
        .then(function(result) {
            confirmationResult = result;
            document.getElementById('phone-section').style.display = 'none';
            document.getElementById('otp-section').style.display = 'block';
            status('OTP bheja gaya +91' + phone + ' par');
            document.getElementById('otp-input').focus();
        })
        .catch(function(error) {
            status('OTP nahi bhej paya: ' + error.message, true);
            btn.textContent = 'OTP भेजें →';
            btn.disabled = false;
            // Reset reCAPTCHA
            if (window.recaptchaVerifier) {
                window.recaptchaVerifier.clear();
                window.recaptchaVerifier = null;
            }
        });
}

function verifyOTP() {
    const otp = document.getElementById('otp-input').value.trim();
    if (otp.length !== 6) {
        status('6 digit OTP daaliye', true);
        return;
    }

    confirmationResult.confirm(otp)
        .then(function(result) {
            onLoginSuccess(result.user);
        })
        .catch(function(error) {
            status('Galat OTP — phir se try kariye', true);
        });
}

// ── Google Sign In (popup with fallback) ──
function googleSignIn() {
    const provider = new firebase.auth.GoogleAuthProvider();
    // Try popup first, fallback to redirect
    auth.signInWithPopup(provider)
        .then(function(result) {
            onLoginSuccess(result.user);
        })
        .catch(function(error) {
            if (error.code === 'auth/popup-blocked' || error.code === 'auth/popup-closed-by-user') {
                // Fallback to redirect
                auth.signInWithRedirect(provider);
            } else {
                status('Google sign-in: ' + error.message, true);
            }
        });
}

// Handle redirect result (if coming back from Google)
auth.getRedirectResult().then(function(result) {
    if (result && result.user) {
        onLoginSuccess(result.user);
    }
}).catch(function(error) {
    if (error.code && error.code !== 'auth/credential-already-in-use') {
        // Ignore session storage errors on first load
    }
});

// ── Login Success ──
function onLoginSuccess(user) {
    status('Login successful! Redirecting...');

    // Save user info to PHP session
    user.getIdToken().then(function(token) {
        fetch('/api/auth/verify.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                token: token,
                uid: user.uid,
                name: user.displayName || '',
                email: user.email || '',
                phone: user.phoneNumber || '',
            }),
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data.success) {
                window.location.href = '/spoken-english/?day=1';
            }
        });
    });
}

// Check if already logged in
auth.onAuthStateChanged(function(user) {
    if (user) {
        onLoginSuccess(user);
    }
});
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>

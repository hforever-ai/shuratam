<!-- Waitlist Form -->
<form id="waitlist-form" class="flex flex-col gap-4 max-w-md mx-auto" action="/api/waitlist" method="POST">
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
    <div>
      <label for="wl-name" class="block text-sm mb-1" style="color: var(--text-secondary);">Name</label>
      <input type="text" id="wl-name" name="name" required placeholder="Tumhara naam" class="input">
    </div>
    <div>
      <label for="wl-email" class="block text-sm mb-1" style="color: var(--text-secondary);">Email</label>
      <input type="email" id="wl-email" name="email" required placeholder="email@example.com" class="input">
    </div>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
    <div>
      <label for="wl-class" class="block text-sm mb-1" style="color: var(--text-secondary);">Class</label>
      <select id="wl-class" name="class" class="input">
        <option value="">Select class</option>
        <option value="6">Class 6</option>
        <option value="7">Class 7</option>
        <option value="8">Class 8</option>
        <option value="9">Class 9</option>
        <option value="10">Class 10</option>
      </select>
    </div>
    <div>
      <label for="wl-board" class="block text-sm mb-1" style="color: var(--text-secondary);">Board</label>
      <select id="wl-board" name="board" class="input">
        <option value="">Select board</option>
        <option value="cg">CG Board</option>
        <option value="cbse">CBSE</option>
        <option value="mp">MP Board</option>
        <option value="other">Other</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary justify-center">Join Free Waitlist — Abhi →</button>
  <p class="text-center text-xs" style="color: var(--text-muted);">No credit card. No spam. Sirf launch pe ek message.</p>
  <div id="waitlist-success" class="hidden text-center p-4 rounded-lg" style="background: var(--success-bg); color: var(--success);">
    🎉 Welcome! Tum waitlist mein ho. Launch pe milte hain!
  </div>
  <div id="waitlist-error" class="hidden text-center p-4 rounded-lg" style="background: var(--error-bg); color: var(--error);">
    Kuch gadbad ho gayi. Please try again.
  </div>
</form>

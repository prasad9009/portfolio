/* =====================================================
   TYPING ANIMATION
   Cycles through role titles in the hero section
   ===================================================== */

(function () {
  const roles = [
    "Web Developer",
    "Java Programmer",
    "PHP Developer",
    "Python programmer",
    "Problem Solver"
  ];

  const el = document.getElementById("typedText");
  if (!el) return;

  const TYPE_SPEED = 90;
  const DELETE_SPEED = 45;
  const PAUSE_AFTER_TYPE = 1400;
  const PAUSE_AFTER_DELETE = 300;

  let roleIndex = 0;
  let charIndex = 0;
  let isDeleting = false;

  // Respect users who prefer reduced motion: show static text instead
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (prefersReducedMotion) {
    el.textContent = roles[0];
    return;
  }

  function tick() {
    const currentRole = roles[roleIndex];

    if (!isDeleting) {
      charIndex++;
      el.textContent = currentRole.substring(0, charIndex);

      if (charIndex === currentRole.length) {
        isDeleting = true;
        setTimeout(tick, PAUSE_AFTER_TYPE);
        return;
      }
      setTimeout(tick, TYPE_SPEED);
    } else {
      charIndex--;
      el.textContent = currentRole.substring(0, charIndex);

      if (charIndex === 0) {
        isDeleting = false;
        roleIndex = (roleIndex + 1) % roles.length;
        setTimeout(tick, PAUSE_AFTER_DELETE);
        return;
      }
      setTimeout(tick, DELETE_SPEED);
    }
  }

  tick();
})();

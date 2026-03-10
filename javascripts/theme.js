document.addEventListener('DOMContentLoaded', function () {
  var navCurrent = document.querySelector('.main-nav .current a');
  var menuToggle = document.querySelector('.menu-toggle');
  var navTools = document.querySelector('.nav-tools');
  var mobileBreakpoint = window.matchMedia('(max-width: 680px)');

  if (navCurrent) {
    navCurrent.setAttribute('aria-current', 'page');
  }

  if (!menuToggle || !navTools) {
    return;
  }

  function closeMenu() {
    menuToggle.setAttribute('aria-expanded', 'false');
    navTools.classList.remove('is-open');
  }

  function syncMenuState() {
    if (!mobileBreakpoint.matches) {
      closeMenu();
    }
  }

  menuToggle.addEventListener('click', function () {
    var isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
    menuToggle.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
    navTools.classList.toggle('is-open', !isExpanded);
  });

  window.addEventListener('resize', syncMenuState);
  syncMenuState();
});

document.addEventListener('DOMContentLoaded', function () {
  var navCurrent = document.querySelector('.main-nav .current a');
  var menuToggle = document.querySelector('.menu-toggle');
  var navTools = document.querySelector('.nav-tools');
  var mobileBreakpoint = window.matchMedia('(max-width: 680px)');

  if (navCurrent) {
    navCurrent.setAttribute('aria-current', 'page');
  }

  if (menuToggle && navTools) {
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
  }

  var switchers = document.querySelectorAll('[data-layout-switcher]');

  function applyLayout(target, switcher, layout) {
    var buttons = switcher.querySelectorAll('[data-layout]');
    var nextLayout = layout === 'list' ? 'list' : 'grid';

    target.classList.remove('record-layout-grid', 'record-layout-list');
    target.classList.add('record-layout-' + nextLayout);

    buttons.forEach(function (button) {
      var isActive = button.getAttribute('data-layout') === nextLayout;
      button.classList.toggle('is-active', isActive);
      button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
    });
  }

  switchers.forEach(function (switcher) {
    var targetId = switcher.getAttribute('data-layout-switcher');
    var storageKey = switcher.getAttribute('data-layout-storage');
    var defaultLayout = switcher.getAttribute('data-default-layout') || 'grid';
    var target = document.getElementById(targetId);

    if (!target) {
      return;
    }

    var savedLayout = null;

    try {
      if (storageKey) {
        savedLayout = window.localStorage.getItem(storageKey);
      }
    } catch (error) {
      savedLayout = null;
    }

    applyLayout(target, switcher, savedLayout || defaultLayout);

    switcher.querySelectorAll('[data-layout]').forEach(function (button) {
      button.addEventListener('click', function () {
        var layout = button.getAttribute('data-layout') || 'grid';

        applyLayout(target, switcher, layout);

        try {
          if (storageKey) {
            window.localStorage.setItem(storageKey, layout);
          }
        } catch (error) {
        }
      });
    });
  });
});

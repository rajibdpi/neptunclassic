document.addEventListener('DOMContentLoaded', function () {
  var navCurrent = document.querySelector('.main-nav .current a');
  if (navCurrent) {
    navCurrent.setAttribute('aria-current', 'page');
  }
});

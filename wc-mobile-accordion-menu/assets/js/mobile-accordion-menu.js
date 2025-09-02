(function () {
  'use strict';

  function initMenu(root) {
    if (!root) return;
    var list = root.querySelector('ul');
    if (!list) return;

    var bp = parseInt(root.getAttribute('data-breakpoint') || '960', 10);

    function applyVisibility() {
      var show = window.innerWidth < bp;
      root.classList.toggle('is-mobile-visible', show);
    }
    applyVisibility();
    window.addEventListener('resize', applyVisibility);

    var idCounter = 0;

    root.querySelectorAll('li.menu-item-has-children').forEach(function (li) {
      var link   = li.querySelector(':scope > a');
      var submenu = li.querySelector(':scope > ul');
      if (!submenu) return;

      idCounter++;
      var submenuId = 'wc-mam-submenu-' + idCounter;

      submenu.id = submenuId;
      submenu.hidden = true;
      submenu.classList.add('wc-mobile-accordion-menu__submenu');

      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'wc-mobile-accordion-menu__toggle';
      btn.setAttribute('aria-expanded', 'false');
      btn.setAttribute('aria-controls', submenuId);
      btn.setAttribute('aria-label', (link ? link.textContent.trim() : 'Submenu') + ' submenu');

      if (link && link.nextSibling) {
        li.insertBefore(btn, link.nextSibling);
      } else if (link) {
        li.appendChild(btn);
      } else {
        li.insertBefore(btn, submenu);
      }

      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var expanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', String(!expanded));
        submenu.hidden = expanded;
        li.classList.toggle('is-open', !expanded);
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wc-mobile-accordion-menu').forEach(initMenu);
  });
})();
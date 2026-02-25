(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initFaqSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var groups = section.querySelectorAll('.faq-section-item-group');
      if (!groups.length) return;

      function closeAll() {
        groups.forEach(function (g) {
          g.classList.remove('faq-section-item-group--open');
          var btn = g.querySelector('.faq-section-item');
          if (btn) btn.setAttribute('aria-expanded', 'false');
        });
      }

      function openGroup(group) {
        closeAll();
        group.classList.add('faq-section-item-group--open');
        var btn = group.querySelector('.faq-section-item');
        if (btn) btn.setAttribute('aria-expanded', 'true');
      }

      groups.forEach(function (group) {
        var trigger = group.querySelector('.faq-section-item');
        if (!trigger || trigger.dataset.jsBound) return;
        trigger.dataset.jsBound = 'true';

        function handleClick() {
          try {
            var isOpen = group.classList.contains('faq-section-item-group--open');
            closeAll();
            if (!isOpen) {
              group.classList.add('faq-section-item-group--open');
              trigger.setAttribute('aria-expanded', 'true');
            }
          } catch (err) {
            console.error('FaqSection click error:', err);
          }
        }

        trigger.addEventListener('click', handleClick);
        trigger.addEventListener('keydown', function (e) {
          try {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              handleClick();
            }
          } catch (err) {
            console.error('FaqSection keydown error:', err);
          }
        });
      });
    } catch (error) {
      console.error('FaqSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllFaqSections() {
    document.querySelectorAll('.faq-section-section').forEach(function (section) {
      try {
        initFaqSection(section);
      } catch (e) {
        console.error('FaqSection section init error:', e);
      }
    });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllFaqSections();
      } catch (e) {
        console.error('FaqSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=faq-section', function ($block) {
      try {
        if ($block && $block[0]) initFaqSection($block[0]);
      } catch (e) {
        console.error('FaqSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllFaqSections();
    } catch (e) {
      console.error('FaqSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

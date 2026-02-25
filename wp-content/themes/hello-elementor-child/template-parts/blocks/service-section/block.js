(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initServiceSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var tabs = section.querySelectorAll('.service-section-tab-item');
      var panels = section.querySelectorAll('.service-section-panel');

      if (!tabs.length || !panels.length) return;

      tabs.forEach(function (tab) {
        if (!tab || tab.dataset.jsBound) return;
        tab.dataset.jsBound = 'true';

        tab.addEventListener('click', function () {
          try {
            var targetIndex = tab.getAttribute('data-tab');
            if (targetIndex === null) return;

            tabs.forEach(function (t) {
              t.classList.remove('active');
              t.setAttribute('aria-selected', 'false');
              t.setAttribute('tabindex', '-1');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');
            tab.setAttribute('tabindex', '0');

            panels.forEach(function (p) {
              p.classList.remove('active');
              p.setAttribute('hidden', '');
            });

            var targetPanel = section.querySelector('.service-section-panel[data-panel="' + targetIndex + '"]');
            if (targetPanel) {
              targetPanel.classList.add('active');
              targetPanel.removeAttribute('hidden');
            }
          } catch (err) {
            console.error('ServiceSection tab click error:', err);
          }
        });

        tab.addEventListener('keydown', function (e) {
          try {
            var currentIndex = parseInt(tab.getAttribute('data-tab'), 10);
            var nextIndex = null;

            if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
              e.preventDefault();
              nextIndex = currentIndex + 1 < tabs.length ? currentIndex + 1 : 0;
            } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
              e.preventDefault();
              nextIndex = currentIndex - 1 >= 0 ? currentIndex - 1 : tabs.length - 1;
            } else if (e.key === 'Home') {
              e.preventDefault();
              nextIndex = 0;
            } else if (e.key === 'End') {
              e.preventDefault();
              nextIndex = tabs.length - 1;
            }

            if (nextIndex !== null && tabs[nextIndex]) {
              tabs[nextIndex].click();
              tabs[nextIndex].focus();
            }
          } catch (err) {
            console.error('ServiceSection keyboard nav error:', err);
          }
        });
      });
    } catch (error) {
      console.error('ServiceSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllServiceSections() {
    document.querySelectorAll('.service-section-section').forEach(function (section) {
      try {
        initServiceSection(section);
      } catch (e) {
        console.error('ServiceSection section init error:', e);
      }
    });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllServiceSections();
      } catch (e) {
        console.error('ServiceSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=service-section', function ($block) {
      try {
        if ($block && $block[0]) initServiceSection($block[0]);
      } catch (e) {
        console.error('ServiceSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllServiceSections();
    } catch (e) {
      console.error('ServiceSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

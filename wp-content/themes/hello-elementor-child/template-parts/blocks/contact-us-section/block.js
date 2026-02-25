(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initContactUsSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var variant = section.dataset.variant || '1';

      var forms = section.querySelectorAll('.contact-us-form');
      forms.forEach(function (form) {
        if (!form || form.dataset.jsBound) return;
        form.dataset.jsBound = 'true';

        form.addEventListener('submit', function (e) {
          try {
            e.preventDefault();
          } catch (err) {
            console.error('ContactUsSection form submit error:', err);
          }
        });
      });

      var selects = section.querySelectorAll('.contact-us-form select');
      selects.forEach(function (select) {
        if (!select || select.dataset.jsBound) return;
        select.dataset.jsBound = 'true';

        select.addEventListener('change', function () {
          try {
            if (this.value) {
              this.style.color = '';
            } else {
              this.style.color = '#757575';
            }
          } catch (err) {
            console.error('ContactUsSection select change error:', err);
          }
        });
      });

    } catch (error) {
      console.error('ContactUsSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllContactUsSections() {
    document.querySelectorAll('.contact-us-section-section').forEach(function (section) {
      try {
        initContactUsSection(section);
      } catch (e) {
        console.error('ContactUsSection section init error:', e);
      }
    });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllContactUsSections();
      } catch (e) {
        console.error('ContactUsSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=contact-us-section', function ($block) {
      try {
        if ($block && $block[0]) initContactUsSection($block[0]);
      } catch (e) {
        console.error('ContactUsSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllContactUsSections();
    } catch (e) {
      console.error('ContactUsSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initWhyChooseShopifySection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      // Feature/benefit table — no interactive behavior required.
      // Future enhancements (e.g. hover effects, accordion on mobile)
      // can be added here, scoped to `section`.

      var rows = section.querySelectorAll('.why-choose-shopify-section-row:not(.why-choose-shopify-section-row-header)');
      if (!rows || rows.length === 0) return;

      rows.forEach(function (row) {
        if (!row || row.dataset.jsBound) return;
        row.dataset.jsBound = "true";

        row.addEventListener('mouseenter', function () {
          try {
            row.style.transition = 'box-shadow 0.2s ease';
            row.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.06)';
          } catch (err) {
            console.error('WhyChooseShopifySection row hover error:', err);
          }
        });

        row.addEventListener('mouseleave', function () {
          try {
            row.style.boxShadow = 'none';
          } catch (err) {
            console.error('WhyChooseShopifySection row hover error:', err);
          }
        });
      });

    } catch (error) {
      console.error('WhyChooseShopifySection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllWhyChooseShopifySections() {
    document.querySelectorAll('.why-choose-shopify-section-section')
      .forEach(function (section) {
        try {
          initWhyChooseShopifySection(section);
        } catch (e) {
          console.error('WhyChooseShopifySection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllWhyChooseShopifySections();
      } catch (e) {
        console.error('WhyChooseShopifySection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=why-choose-shopify-section', function ($block) {
      try {
        if ($block && $block[0]) initWhyChooseShopifySection($block[0]);
      } catch (e) {
        console.error('WhyChooseShopifySection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER (optional)
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllWhyChooseShopifySections();
    } catch (e) {
      console.error('WhyChooseShopifySection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

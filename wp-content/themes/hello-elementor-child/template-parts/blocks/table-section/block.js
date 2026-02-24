(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initTableSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var variant = section.dataset.variant || '1';

      var table = section.querySelector('.table-section-table');
      if (!table) return;

      if (table.scrollWidth > table.clientWidth) {
        table.classList.add('table-section-table--scrollable');
      }

      window.addEventListener('resize', function () {
        try {
          if (table.scrollWidth > table.clientWidth) {
            table.classList.add('table-section-table--scrollable');
          } else {
            table.classList.remove('table-section-table--scrollable');
          }
        } catch (err) {
          console.error('TableSection resize error:', err);
        }
      });

    } catch (error) {
      console.error('TableSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllTableSections() {
    document.querySelectorAll('.table-section-section')
      .forEach(function (section) {
        try {
          initTableSection(section);
        } catch (e) {
          console.error('TableSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllTableSections();
      } catch (e) {
        console.error('TableSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=table-section', function ($block) {
      try {
        if ($block && $block[0]) initTableSection($block[0]);
      } catch (e) {
        console.error('TableSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllTableSections();
    } catch (e) {
      console.error('TableSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

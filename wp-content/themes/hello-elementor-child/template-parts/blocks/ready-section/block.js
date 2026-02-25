(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initReadySection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      // Static block — no interactive JS needed at this time
    } catch (error) {
      console.error('ReadySection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllReadySections() {
    document.querySelectorAll('.ready-section-section')
      .forEach(function (section) {
        try {
          initReadySection(section);
        } catch (e) {
          console.error('ReadySection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllReadySections();
      } catch (e) {
        console.error('ReadySection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=ready-section', function ($block) {
      try {
        if ($block && $block[0]) initReadySection($block[0]);
      } catch (e) {
        console.error('ReadySection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllReadySections();
    } catch (e) {
      console.error('ReadySection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

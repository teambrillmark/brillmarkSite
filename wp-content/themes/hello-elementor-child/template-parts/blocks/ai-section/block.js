(function () {

  /* ---
  INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initAiSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var dividers = section.querySelectorAll('.ai-section-divider');
      var featureItems = section.querySelectorAll('.ai-section-feature-item');

      dividers.forEach(function (divider, index) {
        if (!divider) return;
        if (index < featureItems.length && featureItems[index]) {
          divider.style.display = '';
        }
      });
    } catch (error) {
      console.error('AiSection block init error:', error);
    }
  }

  /* ---
  INIT ALL BLOCKS
  ---- */
  function initAllAiSections() {
    document.querySelectorAll('.ai-section-section').forEach(function (section) {
      try {
        initAiSection(section);
      } catch (e) {
        console.error('AiSection section init error:', e);
      }
    });
  }

  /* ---
  FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllAiSections();
      } catch (e) {
        console.error('AiSection load error:', e);
      }
    });
  }

  /* ---
  ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=ai-section', function ($block) {
      try {
        if ($block && $block[0]) initAiSection($block[0]);
      } catch (e) {
        console.error('AiSection preview error:', e);
      }
    });
  }

  /* ---
  GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllAiSections();
    } catch (e) {
      console.error('AiSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

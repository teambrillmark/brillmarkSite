(function () {

  /* ---
  INIT ONE BLOCK (ONCE ONLY)
  --- */
  function initHeroWithFormSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var form = section.querySelector('.hero-with-form-section-form');
      if (!form || form.dataset.jsBound) return;
      form.dataset.jsBound = "true";
      form.addEventListener('submit', function (e) {
        try {
          // Optional: client-side validation or AJAX submit
        } catch (err) {
          console.error('Hero with Form Section submit error:', err);
        }
      });
    } catch (error) {
      console.error('Hero with Form Section block init error:', error);
    }
  }

  /* ---
  INIT ALL BLOCKS
  --- */
  function initAllHeroWithFormSections() {
    document.querySelectorAll('.hero-with-form-section-section').forEach(function (section) {
      try {
        initHeroWithFormSection(section);
      } catch (e) {
        console.error('Hero with Form Section section init error:', e);
      }
    });
  }

  /* ---
  FRONTEND LOAD
  --- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllHeroWithFormSections();
      } catch (e) {
        console.error('Hero with Form Section load error:', e);
      }
    });
  }

  /* ---
  ACF EDITOR PREVIEW (must not break editor)
  --- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=hero-with-form-section', function ($block) {
      try {
        if ($block && $block[0]) initHeroWithFormSection($block[0]);
      } catch (e) {
        console.error('Hero with Form Section preview error:', e);
      }
    });
  }

})();

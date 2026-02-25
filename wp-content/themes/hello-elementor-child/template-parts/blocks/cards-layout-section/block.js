(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initCardsLayoutSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var variant = section.dataset.variant;

      var ctaBtn = section.querySelector('.cards-layout-cta-btn');
      if (ctaBtn && !ctaBtn.dataset.jsBound) {
        ctaBtn.dataset.jsBound = "true";
        ctaBtn.addEventListener('mouseenter', function () {
          try {
            var arrow = ctaBtn.querySelector('.cards-layout-arrow');
            if (arrow) {
              arrow.style.transform = 'translateX(4px)';
              arrow.style.transition = 'transform 0.2s ease';
            }
          } catch (err) {
            console.error('CardsLayoutSection arrow hover error:', err);
          }
        });
        ctaBtn.addEventListener('mouseleave', function () {
          try {
            var arrow = ctaBtn.querySelector('.cards-layout-arrow');
            if (arrow) {
              arrow.style.transform = 'translateX(0)';
            }
          } catch (err) {
            console.error('CardsLayoutSection arrow reset error:', err);
          }
        });
      }
    } catch (error) {
      console.error('CardsLayoutSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllCardsLayoutSections() {
    document.querySelectorAll('.cards-layout-section-section')
      .forEach(function (section) {
        try {
          initCardsLayoutSection(section);
        } catch (e) {
          console.error('CardsLayoutSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllCardsLayoutSections();
      } catch (e) {
        console.error('CardsLayoutSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=cards-layout-section', function ($block) {
      try {
        if ($block && $block[0]) initCardsLayoutSection($block[0]);
      } catch (e) {
        console.error('CardsLayoutSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllCardsLayoutSections();
    } catch (e) {
      console.error('CardsLayoutSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

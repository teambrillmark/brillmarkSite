(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initCaseStudySection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      // CTA button interaction
      var ctaButtons = section.querySelectorAll('.common-case-study-section-cta');
      ctaButtons.forEach(function (button) {
        if (!button || button.dataset.jsBound) return;
        button.dataset.jsBound = "true";

        button.addEventListener('mouseenter', function () {
          try {
            button.style.opacity = '0.9';
          } catch (err) {
            console.error('CaseStudySection hover error:', err);
          }
        });

        button.addEventListener('mouseleave', function () {
          try {
            button.style.opacity = '1';
          } catch (err) {
            console.error('CaseStudySection hover error:', err);
          }
        });
      });

      // Animate stat values on scroll into view
      var statValues = section.querySelectorAll('.common-case-study-section-stat-value');
      if (statValues.length > 0 && 'IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
          try {
            entries.forEach(function (entry) {
              if (entry.isIntersecting) {
                entry.target.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
              }
            });
          } catch (err) {
            console.error('CaseStudySection observer error:', err);
          }
        }, { threshold: 0.2 });

        statValues.forEach(function (el) {
          if (!el) return;
          el.style.opacity = '0';
          el.style.transform = 'translateY(10px)';
          observer.observe(el);
        });
      }

    } catch (error) {
      console.error('CaseStudySection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllCaseStudySections() {
    document.querySelectorAll('.common-case-study-section-section')
      .forEach(function (section) {
        try {
          initCaseStudySection(section);
        } catch (e) {
          console.error('CaseStudySection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllCaseStudySections();
      } catch (e) {
        console.error('CaseStudySection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=common-case-study-section', function ($block) {
      try {
        if ($block && $block[0]) initCaseStudySection($block[0]);
      } catch (e) {
        console.error('CaseStudySection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER (optional)
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllCaseStudySections();
    } catch (e) {
      console.error('CaseStudySection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

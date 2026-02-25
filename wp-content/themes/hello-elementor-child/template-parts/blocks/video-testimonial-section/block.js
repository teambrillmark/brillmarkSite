(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initVideoTestimonialSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var variant = section.dataset.variant || '1';

      /* — Swiper slider (variant 3): use bundle init so [data-swiper] is picked up — */
      if (variant === '3' && typeof window.initSwiperInRoot === 'function') {
        window.initSwiperInRoot(section);
      }
    } catch (error) {
      console.error('VideoTestimonialSection block init error:', error);
    }
  }


  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllVideoTestimonialSections() {
    document.querySelectorAll('.video-testimonial-section-section, .video-testimonial-section')
      .forEach(function (section) {
        try {
          initVideoTestimonialSection(section);
        } catch (e) {
          console.error('VideoTestimonialSection section init error:', e);
        }
      });
  }


  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllVideoTestimonialSections();
      } catch (e) {
        console.error('VideoTestimonialSection load error:', e);
      }
    });
  }


  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=video-testimonial-section', function ($block) {
      try {
        if ($block && $block[0]) initVideoTestimonialSection($block[0]);
      } catch (e) {
        console.error('VideoTestimonialSection preview error:', e);
      }
    });
  }


  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllVideoTestimonialSections();
    } catch (e) {
      console.error('VideoTestimonialSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

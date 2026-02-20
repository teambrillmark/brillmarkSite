(function () {

  function initTestimonialBlock(block) {
    if (!block || block.dataset.jsInitialized) return;

    const slider = block.querySelector('.testimonial-swiper');
    if (!slider) return;

    // Swiper not ready yet? Try later.
    if (typeof Swiper === 'undefined') return;

    block.dataset.jsInitialized = "true";

    new Swiper(slider, {
      direction: 'horizontal',
      loop: true,
      centeredSlides: true,
      allowTouchMove: true,
      pagination: {
        el: slider.querySelector('.swiper-pagination'),
        clickable: true,
      },
      navigation: {
        nextEl: slider.querySelector('.swiper-button-next'),
        prevEl: slider.querySelector('.swiper-button-prev'),
      }
    });
  }

  function initAllTestimonialBlocks() {
    document.querySelectorAll('.testimonial-wrapper')
      .forEach(initTestimonialBlock);
  }

  /* FRONTEND */
  document.addEventListener('DOMContentLoaded', initAllTestimonialBlocks);

  /* ACF EDITOR PREVIEW */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=testimonial-section', function ($block) {
      initTestimonialBlock($block[0]);
    });
  }

  /* GUTENBERG RERENDER WATCHER */
  const observer = new MutationObserver(mutations => {
    let shouldRun = false;
    mutations.forEach(m => {
      if (m.addedNodes.length) shouldRun = true;
    });
    if (shouldRun) initAllTestimonialBlocks();
  });

  observer.observe(document.body, { childList: true, subtree: true });

})();

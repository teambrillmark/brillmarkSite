(function () {

  /* ---------------------------
     INIT ONE BLOCK
  ---------------------------- */
  function initVideoTestimonialBlock(block) {
    if (!block || block.dataset.jsInitialized) return;
    block.dataset.jsInitialized = "true";

    const cards = block.querySelectorAll('.testimonial-card');
    if (!cards.length) return;

    cards.forEach(card => {
      /* ---- HOVER (bind once) ---- */
      if (!card.dataset.jsHoverBound) {
        card.dataset.jsHoverBound = "true";

        card.addEventListener('mouseenter', () => {
          card.style.transform = 'translateY(-5px)';
          card.style.transition = 'transform 0.3s ease';
        });

        card.addEventListener('mouseleave', () => {
          card.style.transform = 'translateY(0)';
        });
      }

      /* ---- VIDEO CLICK ---- */
      const thumb = card.querySelector('.testimonial-video-thumbnail');
      if (thumb && !thumb.dataset.jsBound) {
        thumb.dataset.jsBound = "true";
        thumb.style.cursor = 'pointer';

        thumb.addEventListener('click', () => {
          console.log('Video thumbnail clicked');
          // modal logic can go here later
        });
      }
    });
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllVideoTestimonialBlocks() {
    document.querySelectorAll('.video-testimonial-section')
      .forEach(initVideoTestimonialBlock);
  }

  /* ---------------------------
     FRONTEND LOAD
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllVideoTestimonialBlocks);

  /* ---------------------------
     ACF EDITOR PREVIEW
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=video-testimonial-section', function ($block) {
      initVideoTestimonialBlock($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(mutations => {
    if (mutations.some(m => m.addedNodes.length)) {
      initAllVideoTestimonialBlocks();
    }
  });

  observer.observe(document.body, { childList: true, subtree: true });

})();

(function () {

  /* ---------------------------
     INIT ONE BLOCK
  ---------------------------- */
  function initWhyChooseBlock(block) {
    if (!block || block.dataset.jsInitialized) return;
    block.dataset.jsInitialized = "true";

    /* --- CARD HOVER --- */
    const cards = block.querySelectorAll('.why-choose-section__card');

    cards.forEach(card => {
      if (card.dataset.jsHoverBound) return;
      card.dataset.jsHoverBound = "true";

      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-5px)';
        card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
      });
    });

    /* --- CTA CLICK TRACKING --- */
    const ctaButtons = block.querySelectorAll('.why-choose-section__cta-button');

    ctaButtons.forEach(button => {
      if (button.dataset.jsBound) return;
      button.dataset.jsBound = "true";

      button.addEventListener('click', () => {
        console.log('CTA button clicked:', button.textContent.trim());
      });
    });
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllWhyChooseBlocks() {
    document.querySelectorAll('.why-choose-section')
      .forEach(initWhyChooseBlock);
  }

  /* ---------------------------
     FRONTEND LOAD
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllWhyChooseBlocks);

  /* ---------------------------
     ACF EDITOR PREVIEW
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=why-choose-section', function ($block) {
      initWhyChooseBlock($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(mutations => {
    if (mutations.some(m => m.addedNodes.length)) {
      initAllWhyChooseBlocks();
    }
  });

  observer.observe(document.body, { childList: true, subtree: true });

})();

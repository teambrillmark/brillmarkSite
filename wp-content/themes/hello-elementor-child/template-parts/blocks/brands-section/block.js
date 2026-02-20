(function () {

  /* ---------------------------
     INIT ONE BLOCK
  ---------------------------- */
  function initBrandsBlock(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    /* --- Logo Entrance Animation --- */
    const logoItems = section.querySelectorAll('.brands-section-logo-item');

    logoItems.forEach((item, index) => {
      item.style.opacity = '0';
      item.style.transform = 'translateY(20px)';
      item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            setTimeout(() => {
              item.style.opacity = '1';
              item.style.transform = 'translateY(0)';
            }, index * 100);
            observer.unobserve(item);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      });

      observer.observe(item);
    });

    /* --- Hover Scale Effect --- */
    const logoImages = section.querySelectorAll('.brands-section-logo-img');

    logoImages.forEach(img => {
      img.addEventListener('mouseenter', () => {
        img.style.transform = 'scale(1.05)';
        img.style.transition = 'transform 0.3s ease';
      });

      img.addEventListener('mouseleave', () => {
        img.style.transform = 'scale(1)';
      });
    });

  }

  /* ---------------------------
     INIT ALL EXISTING BLOCKS
  ---------------------------- */
  function initAllBrands() {
    document.querySelectorAll('.brands-section-section')
      .forEach(initBrandsBlock);
  }

  /* ---------------------------
     FRONTEND LOAD
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllBrands);

  /* ---------------------------
     ACF EDITOR PREVIEW
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=brands-section', function ($block) {
      initBrandsBlock($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RE-RENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(initAllBrands);
  observer.observe(document.body, { childList: true, subtree: true });

})();

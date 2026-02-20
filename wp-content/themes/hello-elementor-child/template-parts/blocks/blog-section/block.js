(function () {

  function initBlogSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true"; // 🚫 prevents duplicate init

    const blogCards = section.querySelectorAll('.blog-card');

    blogCards.forEach(card => {

      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-5px)';
        card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
      });

      card.addEventListener('focus', () => {
        card.style.outline = '2px solid #007aff';
        card.style.outlineOffset = '2px';
      });

      card.addEventListener('blur', () => {
        card.style.outline = 'none';
      });

    });

    const ctaButton = section.querySelector('.blog-section-cta-button');

    if (ctaButton) {
      ctaButton.addEventListener('mouseenter', () => {
        ctaButton.style.transform = 'translateY(-2px)';
      });

      ctaButton.addEventListener('mouseleave', () => {
        ctaButton.style.transform = 'translateY(0)';
      });
    }

    const categoryLinks = section.querySelectorAll('.blog-card-category-link');

    categoryLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href && href.startsWith('#') && href.length > 1) {
          e.preventDefault();
          const target = document.querySelector(href);
          if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
        }
      });
    });

  }

  function initAllBlogSections() {
    document.querySelectorAll('.blog-section-section')
      .forEach(initBlogSection);
  }

  // 🔹 FRONTEND
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', initAllBlogSections);
  }

  // 🔹 GUTENBERG / ACF PREVIEW
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=blog-section', function ($block) {
      initBlogSection($block[0]);
    });
  }

})();

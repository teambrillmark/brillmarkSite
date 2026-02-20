(function () {

    /* ---------------------------
       INIT ONE BLOCK
    ---------------------------- */
    function initFlexibleModal(section) {
      if (!section || section.dataset.jsInitialized) return;
      section.dataset.jsInitialized = "true";
  
      /* --- CARD HOVER --- */
      const cards = section.querySelectorAll('.flexible-card');
  
      cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
          card.style.transform = 'translateY(-5px)';
          card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
  
        card.addEventListener('mouseleave', () => {
          card.style.transform = 'translateY(0)';
        });
      });
  
      /* --- BUTTON CLICK TRACKING --- */
      const buttons = section.querySelectorAll('.flexible-card-btn');
  
      buttons.forEach((button, index) => {
        button.addEventListener('click', function () {
          const card = this.closest('.flexible-card');
          const title = card?.querySelector('.flexible-card-title')?.textContent || 'Unknown';
  
          if (typeof gtag === 'function') {
            gtag('event', 'click', {
              event_category: 'Flexible Engagement',
              event_label: title,
              value: index + 1
            });
          }
  
          console.log('Flexible Modal Card Click:', title);
        });
      });
  
    }
  
    /* ---------------------------
       INIT ALL BLOCKS
    ---------------------------- */
    function initAllFlexibleModals() {
      document.querySelectorAll('.flexible-modal-section-section')
        .forEach(initFlexibleModal);
    }
  
    /* ---------------------------
       FRONTEND LOAD
    ---------------------------- */
    document.addEventListener('DOMContentLoaded', initAllFlexibleModals);
  
    /* ---------------------------
       ACF PREVIEW (EDITOR)
    ---------------------------- */
    if (window.acf) {
      window.acf.addAction('render_block_preview/type=flexible-modal-section', function ($block) {
        initFlexibleModal($block[0]);
      });
    }
  
    /* ---------------------------
       GUTENBERG RERENDER WATCHER
    ---------------------------- */
    const observer = new MutationObserver(initAllFlexibleModals);
    observer.observe(document.body, { childList: true, subtree: true });
  
  })();
  
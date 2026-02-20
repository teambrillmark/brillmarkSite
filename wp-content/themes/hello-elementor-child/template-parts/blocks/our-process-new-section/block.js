(function () {

  function initProcessNewBlock(block) {
    if (!block || block.dataset.jsInitialized) return;
    block.dataset.jsInitialized = "true";

    const tabButtons = Array.from(block.querySelectorAll('.our-process-new-section-tab-button'));
    const tabContentsMobile = Array.from(block.querySelectorAll('.our-process-new-section-accordion-item .our-process-new-section-tab-content'));
    const tabContentsDesktop = Array.from(block.querySelectorAll('.our-process-new-section-tab-content-desktop'));

    const isMobileView = () => window.matchMedia('(max-width: 821px)').matches;
    const getTabContents = () => isMobileView() ? tabContentsMobile : tabContentsDesktop;

    /* ---------- Initial Active Tab ---------- */
    if (!tabButtons.some(btn => btn.classList.contains('active')) && tabButtons[0]) {
      tabButtons[0].classList.add('active');
      tabButtons[0].setAttribute('aria-selected', 'true');
      const contents = getTabContents();
      contents[0]?.classList.add('active');
    }

    /* ---------- Title Switch (Mobile/Desktop) ---------- */
    function updateMobileTitles() {
      tabButtons.forEach(button => {
        const titleEl = button.querySelector('.our-process-new-section-tab-title');
        if (!titleEl) return;

        const shortTitle = titleEl.dataset.titleShort;
        const fullTitle = titleEl.dataset.titleFull;

        titleEl.textContent = isMobileView() ? shortTitle : fullTitle;
      });
    }

    updateMobileTitles();

    /* ---------- Tab Switch (Desktop) ---------- */
    function switchTab(index) {
      const contents = getTabContents();

      tabButtons.forEach((btn, i) => {
        btn.classList.remove('active');
        btn.setAttribute('aria-selected', 'false');
        contents[i]?.classList.remove('active');
      });

      tabButtons[index]?.classList.add('active');
      tabButtons[index]?.setAttribute('aria-selected', 'true');
      contents[index]?.classList.add('active');
    }

    /* ---------- Accordion Toggle (Mobile) ---------- */
    function toggleAccordion(index) {
      const contents = getTabContents();
      const button = tabButtons[index];
      const content = contents[index];
      const isActive = button.classList.contains('active');

      tabButtons.forEach((btn, i) => {
        btn.classList.remove('active');
        btn.setAttribute('aria-selected', 'false');
        contents[i]?.classList.remove('active');
      });

      if (!isActive) {
        button.classList.add('active');
        button.setAttribute('aria-selected', 'true');
        content.classList.add('active');
        setTimeout(() => content.scrollIntoView({ behavior: 'smooth', block: 'nearest' }), 100);
      }
    }

    /* ---------- Button Events ---------- */
    tabButtons.forEach((button, index) => {
      if (button.dataset.jsBound) return;
      button.dataset.jsBound = "true";

      button.addEventListener('click', e => {
        e.preventDefault();
        isMobileView() ? toggleAccordion(index) : switchTab(index);
      });

      button.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          isMobileView() ? toggleAccordion(index) : switchTab(index);
        }

        if (!isMobileView() && (e.key === 'ArrowLeft' || e.key === 'ArrowRight')) {
          e.preventDefault();
          const next = e.key === 'ArrowLeft'
            ? (index > 0 ? index - 1 : tabButtons.length - 1)
            : (index < tabButtons.length - 1 ? index + 1 : 0);
          switchTab(next);
          tabButtons[next]?.focus();
        }
      });
    });

    /* ---------- Resize Handling ---------- */
    if (!block.dataset.resizeBound) {
      block.dataset.resizeBound = "true";
      let resizeTimer;
      window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
          updateMobileTitles();
          if (!isMobileView() && !tabButtons.some(b => b.classList.contains('active'))) {
            switchTab(0);
          }
        }, 250);
      });
    }
  }

  function initAllProcessNewBlocks() {
    document.querySelectorAll('.our-process-new-section-section')
      .forEach(initProcessNewBlock);
  }

  document.addEventListener('DOMContentLoaded', initAllProcessNewBlocks);

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=our-process-new-section', function ($block) {
      initProcessNewBlock($block[0]);
    });
  }

  const observer = new MutationObserver(initAllProcessNewBlocks);
  observer.observe(document.body, { childList: true, subtree: true });

})();

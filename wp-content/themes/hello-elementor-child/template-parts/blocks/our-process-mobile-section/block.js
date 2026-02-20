(function () {

  /* ---------------------------
     INIT ONE BLOCK
  ---------------------------- */
  function initProcessBlock(block) {
    if (!block || block.dataset.jsInitialized) return;
    block.dataset.jsInitialized = "true";

    const accordionItems = block.querySelectorAll('.our-process-section-accordion-item');
    if (!accordionItems.length) return;

    accordionItems.forEach(item => {
      const header = item.querySelector('.our-process-section-accordion-header');
      const content = item.querySelector('.our-process-section-accordion-content');
      if (!header || !content) return;

      if (header.dataset.jsBound) return;
      header.dataset.jsBound = "true";

      header.setAttribute('tabindex', '0');
      header.setAttribute('role', 'button');
      header.setAttribute('aria-expanded', 'false');

      header.addEventListener('click', function (e) {
        e.preventDefault();

        const isActive = item.classList.contains('active');

        accordionItems.forEach(other => {
          if (other !== item) closeAccordionItem(other);
        });

        isActive ? closeAccordionItem(item) : openAccordionItem(item);
      });

      header.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          header.click();
        }
      });
    });
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllProcessBlocks() {
    document.querySelectorAll('.our-process-section-section')
      .forEach(initProcessBlock);
  }

  /* ---------------------------
     FRONTEND
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllProcessBlocks);

  /* ---------------------------
     ACF PREVIEW (EDITOR)
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=our-process-section', function ($block) {
      initProcessBlock($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(initAllProcessBlocks);
  observer.observe(document.body, { childList: true, subtree: true });

  function openAccordionItem(item) {
    const content = item.querySelector('.our-process-section-accordion-content');
    const header = item.querySelector('.our-process-section-accordion-header');
    if (!content || !header) return;
  
    content.style.maxHeight = 'none';
    const height = content.scrollHeight;
    content.style.maxHeight = '0px';
    content.offsetHeight;
  
    item.classList.add('active');
    header.setAttribute('aria-expanded', 'true');
  
    requestAnimationFrame(() => {
      content.style.maxHeight = height + 'px';
    });
  
    setTimeout(() => {
      if (item.classList.contains('active')) content.style.maxHeight = '';
    }, 400);
  }
  
  function closeAccordionItem(item) {
    const content = item.querySelector('.our-process-section-accordion-content');
    const header = item.querySelector('.our-process-section-accordion-header');
    if (!content || !header) return;
  
    const height = content.scrollHeight;
    content.style.maxHeight = height + 'px';
    content.offsetHeight;
  
    item.classList.remove('active');
    header.setAttribute('aria-expanded', 'false');
  
    requestAnimationFrame(() => {
      content.style.maxHeight = '0px';
    });
  
    setTimeout(() => {
      if (!item.classList.contains('active')) content.style.maxHeight = '';
    }, 400);
  }
  
})();

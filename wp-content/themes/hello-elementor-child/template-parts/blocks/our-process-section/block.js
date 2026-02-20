(function () {

  /* ---------------------------
     INIT ONE BLOCK
  ---------------------------- */
  function initProcessStepsBlock(block) {
    if (!block || block.dataset.jsInitialized) return;
    block.dataset.jsInitialized = "true";

    const stepNumbers = block.querySelectorAll('.our-process-section__step-number');
    const stepTitles = block.querySelectorAll('.our-process-section__step-title');
    const stepContents = block.querySelectorAll('.our-process-section__step-content');

    if (!stepNumbers.length) return;

    function switchToStep(stepIndex) {
      stepNumbers.forEach(number => {
        number.classList.toggle(
          'our-process-section__step-number--active',
          number.dataset.step === String(stepIndex)
        );
      });

      stepTitles.forEach(title => {
        title.classList.toggle(
          'our-process-section__step-title--active',
          title.dataset.step === String(stepIndex)
        );
      });

      stepContents.forEach(content => {
        content.classList.toggle(
          'our-process-section__step-content--active',
          content.dataset.step === String(stepIndex)
        );
      });
    }

    /* ---------- Step Numbers ---------- */
    stepNumbers.forEach(number => {
      if (number.dataset.jsBound) return;
      number.dataset.jsBound = "true";

      number.setAttribute('tabindex', '0');
      number.setAttribute('role', 'button');

      number.addEventListener('click', e => {
        e.preventDefault();
        switchToStep(parseInt(number.dataset.step, 10));
      });

      number.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          switchToStep(parseInt(number.dataset.step, 10));
        }
      });
    });

    /* ---------- Step Titles ---------- */
    stepTitles.forEach(title => {
      if (title.dataset.jsBound) return;
      title.dataset.jsBound = "true";

      title.setAttribute('tabindex', '0');
      title.setAttribute('role', 'button');

      title.addEventListener('click', e => {
        e.preventDefault();
        switchToStep(parseInt(title.dataset.step, 10));
      });

      title.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          switchToStep(parseInt(title.dataset.step, 10));
        }
      });
    });
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllProcessStepsBlocks() {
    document.querySelectorAll('.our-process-section')
      .forEach(initProcessStepsBlock);
  }

  /* ---------------------------
     FRONTEND
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllProcessStepsBlocks);

  /* ---------------------------
     ACF PREVIEW (EDITOR)
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=our-process-section', function ($block) {
      initProcessStepsBlock($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(initAllProcessStepsBlocks);
  observer.observe(document.body, { childList: true, subtree: true });

})();

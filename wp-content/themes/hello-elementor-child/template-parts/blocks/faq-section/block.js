(function () {

  /* ---------------------------
     HEIGHT ANIMATION
  ---------------------------- */
  function animateHeight(element, targetHeight, duration) {
    const startHeight = element.offsetHeight;
    const startTime = performance.now();

    function animate(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);

      const ease = progress < 0.5
        ? 4 * progress * progress * progress
        : 1 - Math.pow(-2 * progress + 2, 3) / 2;

      element.style.height = startHeight + (targetHeight - startHeight) * ease + 'px';

      if (progress < 1) requestAnimationFrame(animate);
      else {
        element.style.height = '';
        element.style.overflow = '';
      }
    }

    requestAnimationFrame(animate);
  }

  function closeFAQ(item) {
    const answer = item.querySelector('.faq-section-answer');
    if (!answer) return;

    item.classList.remove('active');
    item.setAttribute('aria-expanded', 'false');

    const currentHeight = answer.offsetHeight;
    answer.style.height = currentHeight + 'px';
    answer.style.overflow = 'hidden';
    answer.offsetHeight;

    requestAnimationFrame(() => {
      answer.style.height = '0px';
      setTimeout(() => {
        answer.style.height = '';
        answer.style.overflow = '';
      }, 300);
    });
  }

  function openFAQ(item) {
    const answer = item.querySelector('.faq-section-answer');
    if (!answer) return;

    item.classList.add('active');
    item.setAttribute('aria-expanded', 'true');

    answer.style.height = '0px';
    answer.style.overflow = 'hidden';
    answer.offsetHeight;

    animateHeight(answer, answer.scrollHeight, 300);
  }

  /* ---------------------------
     INIT ONE FAQ BLOCK
  ---------------------------- */
  function initFAQSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    const faqItems = section.querySelectorAll('.faq-section-item');
    if (!faqItems.length) return;

    faqItems.forEach((item, index) => {
      const answer = item.querySelector('.faq-section-answer');
      if (!answer) return;

      answer.style.height = '0px';
      answer.style.overflow = 'hidden';

      const header = item.querySelector('.faq-section-item-header') || item;

      if (header.dataset.jsBound) return;
      header.dataset.jsBound = "true";

      header.setAttribute('tabindex', '0');
      header.setAttribute('role', 'button');
      header.setAttribute('aria-controls', 'faq-answer-' + index);

      answer.setAttribute('id', 'faq-answer-' + index);

      function handleToggle(e) {
        e.preventDefault();
        const isActive = item.classList.contains('active');

        faqItems.forEach(other => {
          if (other !== item && other.classList.contains('active')) closeFAQ(other);
        });

        isActive ? closeFAQ(item) : openFAQ(item);
      }

      header.addEventListener('click', handleToggle);
      header.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') handleToggle(e);
      });
    });
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllFAQ() {
    document.querySelectorAll('.faq-section-section')
      .forEach(initFAQSection);
  }

  /* ---------------------------
     FRONTEND
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllFAQ);

  /* ---------------------------
     ACF EDITOR PREVIEW
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=faq-section', function ($block) {
      initFAQSection($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(initAllFAQ);
  observer.observe(document.body, { childList: true, subtree: true });

})();

(function () {

  /* ---------------------------
     INIT ONE BLOCK (ONCE ONLY)
  ---------------------------- */
  function initContactSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    initFormValidation(section);
    initServicesDropdown(section);
    initFloatingLabels(section);
  }

  /* ---------------------------
     INIT ALL BLOCKS
  ---------------------------- */
  function initAllContactSections() {
    document.querySelectorAll('.contact-section-section')
      .forEach(initContactSection);
  }

  /* ---------------------------
     FRONTEND LOAD
  ---------------------------- */
  document.addEventListener('DOMContentLoaded', initAllContactSections);

  /* ---------------------------
     ACF EDITOR PREVIEW
  ---------------------------- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=contact-section', function ($block) {
      initContactSection($block[0]);
    });
  }

  /* ---------------------------
     GUTENBERG RERENDER WATCHER
  ---------------------------- */
  const observer = new MutationObserver(initAllContactSections);
  observer.observe(document.body, { childList: true, subtree: true });

  function initFormValidation(section) {
    const form = section.querySelector('.contact-section-form');
    if (!form || form.dataset.jsBound) return;
  
    form.dataset.jsBound = "true";
  
    form.addEventListener('submit', function(e) {
      e.preventDefault();
  
      const requiredFields = form.querySelectorAll('[required]');
      let isValid = true;
  
      requiredFields.forEach(field => {
        if (!validateField(field)) isValid = false;
      });
  
      if (isValid) {
        showFormMessage(form, 'success', 'Thank you! Your message has been sent successfully.');
      } else {
        showFormMessage(form, 'error', 'Please fill in all required fields correctly.');
      }
    });
  
    const inputs = form.querySelectorAll('.contact-section-input, .contact-section-textarea, .contact-section-select');
  
    inputs.forEach(input => {
      input.addEventListener('blur', () => validateField(input));
      input.addEventListener('input', () => {
        input.classList.remove('is-error');
        removeFieldError(input);
      });
    });
  }

  function initServicesDropdown(section) {
    const dropdown = section.querySelector('.contact-section-services-dropdown');
    if (!dropdown || dropdown.dataset.jsBound) return;
  
    dropdown.dataset.jsBound = "true";
  
    const selected = dropdown.querySelector('.contact-section-dropdown-selected');
  
    selected?.addEventListener('click', () => {
      dropdown.classList.toggle('is-open');
    });
  
    document.addEventListener('click', e => {
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('is-open');
      }
    });
  }

  function initFloatingLabels(section) {
    const inputs = section.querySelectorAll('.contact-section-input, .contact-section-textarea');
  
    inputs.forEach(input => {
      if (input.dataset.jsBound) return;
      input.dataset.jsBound = "true";
  
      if (input.value) input.classList.add('has-value');
  
      input.addEventListener('focus', () => input.classList.add('is-focused'));
      input.addEventListener('blur', () => {
        input.classList.remove('is-focused');
        input.classList.toggle('has-value', !!input.value);
      });
    });
  }
  
})();

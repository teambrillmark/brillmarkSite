(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initContactUsPageSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      // Floating label: keep label small when input has value
      var inputs = section.querySelectorAll('.contact-us-page-section-input, .contact-us-page-section-textarea, .contact-us-page-section-select');
      inputs.forEach(function (input) {
        if (!input || input.dataset.jsBound) return;
        input.dataset.jsBound = "true";
        input.addEventListener('focus', function () {
          try {
            var wrapper = this.closest('.contact-us-page-section-field-wrapper');
            if (wrapper) wrapper.classList.add('is-focused');
          } catch (err) {
            console.error('ContactUsPageSection focus error:', err);
          }
        });
        input.addEventListener('blur', function () {
          try {
            var wrapper = this.closest('.contact-us-page-section-field-wrapper');
            if (wrapper) wrapper.classList.remove('is-focused');
          } catch (err) {
            console.error('ContactUsPageSection blur error:', err);
          }
        });
      });

      // Custom multi-select dropdown
      var dropdowns = section.querySelectorAll('.contact-us-page-section-custom-dropdown');
      dropdowns.forEach(function (dropdown) {
        if (!dropdown || dropdown.dataset.jsBound) return;
        dropdown.dataset.jsBound = "true";

        var selected = dropdown.querySelector('.contact-us-page-section-dropdown-selected');
        var optionsPanel = dropdown.querySelector('.contact-us-page-section-dropdown-options');
        var placeholder = dropdown.querySelector('.contact-us-page-section-dropdown-placeholder');

        if (!selected || !optionsPanel) return;

        selected.addEventListener('click', function (e) {
          try {
            e.stopPropagation();
            var isOpen = dropdown.classList.toggle('is-open');
            optionsPanel.style.display = isOpen ? 'block' : 'none';
          } catch (err) {
            console.error('ContactUsPageSection dropdown toggle error:', err);
          }
        });

        var checkboxes = optionsPanel.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (cb) {
          cb.addEventListener('change', function () {
            try {
              var checked = optionsPanel.querySelectorAll('input[type="checkbox"]:checked');
              var labels = [];
              checked.forEach(function (c) {
                var span = c.nextElementSibling;
                if (span) labels.push(span.textContent.trim());
              });
              if (placeholder) {
                placeholder.textContent = labels.length > 0 ? labels.join(', ') : 'Select services';
              }
            } catch (err) {
              console.error('ContactUsPageSection checkbox change error:', err);
            }
          });
        });

        document.addEventListener('click', function (e) {
          try {
            if (!dropdown.contains(e.target)) {
              dropdown.classList.remove('is-open');
              optionsPanel.style.display = 'none';
            }
          } catch (err) {
            console.error('ContactUsPageSection outside click error:', err);
          }
        });
      });

      // Custom checkbox visual
      var checkboxWrappers = section.querySelectorAll('.contact-us-page-section-checkbox-wrapper');
      checkboxWrappers.forEach(function (wrapper) {
        if (!wrapper || wrapper.dataset.jsBound) return;
        wrapper.dataset.jsBound = "true";

        var checkbox = wrapper.querySelector('.contact-us-page-section-checkbox');
        var box = wrapper.querySelector('.contact-us-page-section-checkbox-box');
        if (!checkbox || !box) return;

        box.addEventListener('click', function () {
          try {
            checkbox.checked = !checkbox.checked;
            checkbox.dispatchEvent(new Event('change'));
          } catch (err) {
            console.error('ContactUsPageSection checkbox click error:', err);
          }
        });
      });

      // Form submit handler
      var form = section.querySelector('.contact-us-page-section-form-group');
      if (form && !form.dataset.jsBound) {
        form.dataset.jsBound = "true";
        form.addEventListener('submit', function (e) {
          try {
            e.preventDefault();
            var consent = section.querySelector('.contact-us-page-section-checkbox');
            if (consent && !consent.checked) {
              alert('Please agree to the Privacy Policy before submitting.');
              return;
            }
            var btn = section.querySelector('.contact-us-page-section-submit-btn');
            if (btn) {
              btn.textContent = 'Sending...';
              btn.disabled = true;
            }
            // Placeholder: integrate with actual form handler
            setTimeout(function () {
              if (btn) {
                btn.textContent = 'GET IN TOUCH';
                btn.disabled = false;
              }
            }, 2000);
          } catch (err) {
            console.error('ContactUsPageSection form submit error:', err);
          }
        });
      }

    } catch (error) {
      console.error('ContactUsPageSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllContactUsPageSections() {
    document.querySelectorAll('.contact-us-page-section-section')
      .forEach(function (section) {
        try {
          initContactUsPageSection(section);
        } catch (e) {
          console.error('ContactUsPageSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllContactUsPageSections();
      } catch (e) {
        console.error('ContactUsPageSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=contact-us-page-section', function ($block) {
      try {
        if ($block && $block[0]) initContactUsPageSection($block[0]);
      } catch (e) {
        console.error('ContactUsPageSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER (optional)
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllContactUsPageSections();
    } catch (e) {
      console.error('ContactUsPageSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

(function () {

  function initContactUsSection(section) {
    if (!section || section.dataset.jsInitialized === 'true') return;
    section.dataset.jsInitialized = 'true';

    try {
      var form = section.querySelector('.contact-us-section-form');
      if (!form) return;

      if (form.dataset.jsBound === 'true') return;
      form.dataset.jsBound = 'true';

      form.addEventListener('submit', function (e) {
        try {
          var btn = form.querySelector('.contact-us-section-submit');
          if (btn && !form.dataset.submitting) {
            form.dataset.submitting = 'true';
            btn.disabled = true;
            setTimeout(function () {
              form.dataset.submitting = '';
              if (btn) btn.disabled = false;
            }, 3000);
          }
        } catch (err) {
          console.error('ContactUsSection form submit handler error:', err);
        }
      });
    } catch (error) {
      console.error('ContactUsSection block init error:', error);
    }
  }

  function initAllContactUsSections() {
    document.querySelectorAll('.contact-us-section-section').forEach(function (section) {
      try {
        initContactUsSection(section);
      } catch (e) {
        console.error('ContactUsSection section init error:', e);
      }
    });
  }

  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllContactUsSections();
      } catch (e) {
        console.error('ContactUsSection load error:', e);
      }
    });
  }

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=contact-us-section', function ($block) {
      try {
        if ($block && $block[0]) initContactUsSection($block[0]);
      } catch (e) {
        console.error('ContactUsSection preview error:', e);
      }
    });
  }

})();

(function () {
  try {
      var debug = 0;
      var variation_name = "";
      function $(selector) {
          return document.querySelector(selector);
      }
      function $$(selector) {
          return document.querySelectorAll(selector);
      }
      function waitForElement(selector, trigger, delayInterval, delayTimeout) {
          var interval = setInterval(function () {
              if ($(selector)) {
                  clearInterval(interval);
                  trigger();
              }
          }, delayInterval);
          setTimeout(function () {
              clearInterval(interval);
          }, delayTimeout);
      }
      function applyFloatingLabels() {
          const fields = $$(".wpcf7-form input, .wpcf7-form textarea, .wpcf7-form select");
          if (!fields.length) return;
          fields.forEach((field, index) => {
              if (!field.hasAttribute("data-label-applied")) {
                  const wrapper = document.createElement("div");
                  wrapper.classList.add("floating-label-wrapper");
                  let labelText = field.getAttribute("placeholder") || "";
                  if (field.name === "Business-Type") {
                      labelText = "Business-Type";
                  } else if (field.name === "business-email-address") {
                      labelText = "Email Address";
                  }
                  if (!field.id) {
                      field.id = `floating-label-field-${index}`;
                  }
                  const label = document.createElement("label");
                  label.innerText = labelText;
                  label.classList.add("floating-label");
                  label.setAttribute("for", field.id);
                  field.setAttribute("placeholder", "");
                  field.parentNode.insertBefore(wrapper, field);
                  wrapper.append(label, field);
                  field.setAttribute("data-label-applied", "true");
                  field.addEventListener("focus", () => label.classList.add("active"));
                  field.addEventListener("blur", () => {
                      if (!field.value.trim()) label.classList.remove("active");
                  });
              }
          });
      }
      function convertCheckboxToDropdown() {
        const servicesWrapper = document.querySelector('[data-name="WhichServicesAreYouInterestedIn"]');
        if (!servicesWrapper) return;
    
        const checkboxes = [...servicesWrapper.querySelectorAll('input[type="checkbox"]')];
        if (!checkboxes.length) return;
    
        const labels = checkboxes.map((checkbox) => {
            let labelText = "";
    
            // ✅ Try to find the associated <label> element
            const label = checkbox.closest("label") || document.querySelector(`label[for="${checkbox.id}"]`);
            if (label) {
                labelText = label.textContent.trim();
            }
    
            return {
                value: checkbox.value,
                text: labelText || "Untitled",
            };
        });
    
        const dropdownContainer = document.createElement("div");
        dropdownContainer.classList.add("custom-dropdown");
        dropdownContainer.innerHTML = `
            <div class="dropdown-label">Which Services Are You Interested In?</div>
            <div class="dropdown-selected">Select services</div>
            <div class="dropdown-options">
                ${labels
                    .map(
                        (label) => `
                        <label class="dropdown-option">
                            <input type="checkbox" value="${label.value}" name="WhichServicesAreYouInterestedIn[]">
                            ${label.text}
                        </label>
                    `
                    )
                    .join("")}
            </div>
        `;
    
        servicesWrapper.innerHTML = "";
        servicesWrapper.appendChild(dropdownContainer);
    
        const dropdownSelected = dropdownContainer.querySelector(".dropdown-selected");
        const dropdownLabel = dropdownContainer.querySelector(".dropdown-label");
        const dropdownOptions = dropdownContainer.querySelector(".dropdown-options");
    
        dropdownSelected.addEventListener("click", () => {
            dropdownOptions.classList.toggle("show");
        });
    
        dropdownOptions.addEventListener("change", () => {
            const selectedValues = [...dropdownOptions.querySelectorAll("input:checked")].map((el) => el.value);
            dropdownLabel.classList.toggle("has-value", selectedValues.length > 0);
            dropdownSelected.textContent = selectedValues.length > 0 ? selectedValues.join(", ") : "Select services";
        });
    
        document.addEventListener("click", (event) => {
            if (!dropdownContainer.contains(event.target)) {
                dropdownOptions.classList.remove("show");
            }
        });
    
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", () => {
                const selectedValues = [...servicesWrapper.querySelectorAll("input:checked")].map((el) => el.value);
                dropdownLabel.classList.toggle("has-value", selectedValues.length > 0);
                dropdownSelected.textContent = selectedValues.length > 0 ? selectedValues.join(", ") : "Select services";
            });
        });
    }
    
      function init() {
          $$(".wpcf7-form").forEach(() => {
              convertCheckboxToDropdown();
              applyFloatingLabels();
          });
      }
      waitForElement('.wpcf7-form.init span[data-name="WhichServicesAreYouInterestedIn"]', init, 50, 25000);
  } catch (e) {
      if (debug) console.log("Error in Test " + variation_name, e);
  }
})();
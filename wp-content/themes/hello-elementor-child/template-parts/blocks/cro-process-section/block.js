(function () {

    /* ---------------------------
       INIT ONE CRO BLOCK
    ---------------------------- */
    function initCROSection(section) {
      if (!section || section.dataset.jsInitialized) return;
      section.dataset.jsInitialized = "true";
  
      initializeMobileAccordion(section);
      initializeDesktopTabs(section);
    }
  
    /* ---------------------------
       INIT ALL EXISTING BLOCKS
    ---------------------------- */
    function initAllCRO() {
      document.querySelectorAll('.cro-dev-wrapper')
        .forEach(initCROSection);
    }
  
    /* ---------------------------
       FRONTEND LOAD
    ---------------------------- */
    document.addEventListener('DOMContentLoaded', initAllCRO);
  
    /* ---------------------------
       ACF EDITOR PREVIEW
    ---------------------------- */
    if (window.acf) {
      window.acf.addAction('render_block_preview/type=cro-process-section', function ($block) {
        initCROSection($block[0]);
      });
    }
  
    /* ---------------------------
       GUTENBERG RERENDER WATCHER
    ---------------------------- */
    const observer = new MutationObserver(initAllCRO);
    observer.observe(document.body, { childList: true, subtree: true });
  
    function initializeMobileAccordion(section) {
        const accordionButtons = section.querySelectorAll('.mobile-tab-accordion-button');
        if (!accordionButtons.length) return;
      
        accordionButtons.forEach(button => {
          if (button.dataset.jsBound) return;
          button.dataset.jsBound = "true";
      
          button.addEventListener('click', function () {
            const content = this.nextElementSibling;
            const isActive = this.classList.contains('active');
      
            accordionButtons.forEach(btn => {
              btn.classList.remove('active');
              const c = btn.nextElementSibling;
              if (c) c.style.display = 'none';
            });
      
            if (!isActive) {
              this.classList.add('active');
              if (content) content.style.display = 'block';
            }
          });
        });
      }

      function initializeDesktopTabs(section) {
        if (section.dataset.tabsBound) return;
        section.dataset.tabsBound = "true";
      
        const boxes = section.querySelectorAll('.cro-stepper-box');
        const stepCounters = section.querySelectorAll('.step-counter');
        const ulSections = section.querySelectorAll('.pro-tab-content');
        const displayHeroImage = section.querySelector('.display-cro-hero-image');
      
        if (!boxes.length) return;
      
        let heroImages = [];
        if (displayHeroImage?.dataset.images) {
          try { heroImages = JSON.parse(displayHeroImage.dataset.images); } catch {}
        }
      
        function selectBox(box, index) {
          boxes.forEach((b, i) => {
            b.classList.remove('active-Box');
            b.querySelector('.active-image')?.style.setProperty('display','none');
            b.querySelector('.inactive-image')?.style.setProperty('display','block');
          });
      
          stepCounters.forEach((c, i) => {
            c.classList.toggle('completed', i <= index);
          });
      
          ulSections.forEach((ul, i) => {
            ul.classList.toggle('active', i === index);
          });
      
          box.classList.add('active-Box');
          box.querySelector('.active-image')?.style.setProperty('display','block');
          box.querySelector('.inactive-image')?.style.setProperty('display','none');
      
          if (displayHeroImage && heroImages[index]) {
            displayHeroImage.style.opacity = '0';
            setTimeout(() => {
              displayHeroImage.src = heroImages[index];
              displayHeroImage.style.opacity = '1';
            }, 150);
          }
        }
      
        boxes.forEach((box, i) => {
          box.addEventListener('click', () => selectBox(box, i));
          stepCounters[i]?.addEventListener('click', () => selectBox(box, i));
        });
      
        section.addEventListener('keydown', e => {
          const activeIndex = [...boxes].findIndex(b => b.classList.contains('active-Box'));
          if (e.key === 'ArrowLeft' && activeIndex > 0) selectBox(boxes[activeIndex - 1], activeIndex - 1);
          if (e.key === 'ArrowRight' && activeIndex < boxes.length - 1) selectBox(boxes[activeIndex + 1], activeIndex + 1);
        });
      
        if (boxes[0]) selectBox(boxes[0], 0);
      }
      
  })();
  
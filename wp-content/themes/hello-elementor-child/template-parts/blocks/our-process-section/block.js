(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function activatePanel(section, targetIndex) {
    var tabs = section.querySelectorAll('.our-process-section-tab');
    var panels = section.querySelectorAll('.our-process-section-panel');
    var triggers = section.querySelectorAll('.our-process-section-panel-mobile-trigger');

    tabs.forEach(function (t) {
      t.classList.remove('our-process-section-tab--active');
      t.setAttribute('aria-selected', 'false');
    });
    panels.forEach(function (p) {
      p.classList.remove('our-process-section-panel--active');
      p.setAttribute('hidden', '');
    });
    triggers.forEach(function (tr) {
      tr.setAttribute('aria-expanded', 'false');
    });

    var tab = section.querySelector('.our-process-section-tab[data-tab="' + targetIndex + '"]');
    if (tab) {
      tab.classList.add('our-process-section-tab--active');
      tab.setAttribute('aria-selected', 'true');
    }
    var targetPanel = section.querySelector('.our-process-section-panel[data-panel="' + targetIndex + '"]');
    if (targetPanel) {
      targetPanel.classList.add('our-process-section-panel--active');
      targetPanel.removeAttribute('hidden');
    }
    var trigger = section.querySelector('.our-process-section-panel-mobile-trigger[data-panel="' + targetIndex + '"]');
    if (trigger) {
      trigger.setAttribute('aria-expanded', 'true');
    }
  }

  function initOurProcessSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = 'true';

    try {
      var tabs = section.querySelectorAll('.our-process-section-tab');
      var panels = section.querySelectorAll('.our-process-section-panel');
      var triggers = section.querySelectorAll('.our-process-section-panel-mobile-trigger');

      if (!tabs.length || !panels.length) return;

      tabs.forEach(function (tab) {
        if (!tab || tab.dataset.jsBound) return;
        tab.dataset.jsBound = 'true';

        tab.addEventListener('click', function () {
          try {
            var targetIndex = tab.getAttribute('data-tab');
            if (targetIndex === null) return;
            activatePanel(section, targetIndex);
          } catch (err) {
            console.error('OurProcessSection tab click error:', err);
          }
        });
      });

      triggers.forEach(function (trigger) {
        if (!trigger || trigger.dataset.jsBound) return;
        trigger.dataset.jsBound = 'true';

        trigger.addEventListener('click', function () {
          try {
            var targetIndex = trigger.getAttribute('data-panel');
            if (targetIndex === null) return;
            activatePanel(section, targetIndex);
          } catch (err) {
            console.error('OurProcessSection accordion trigger click error:', err);
          }
        });
      });
    } catch (error) {
      console.error('OurProcessSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllOurProcessSections() {
    document.querySelectorAll('.our-process-section-section').forEach(function (section) {
      try {
        initOurProcessSection(section);
      } catch (e) {
        console.error('OurProcessSection section init error:', e);
      }
    });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllOurProcessSections();
      } catch (e) {
        console.error('OurProcessSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=our-process-section', function ($block) {
      try {
        if ($block && $block[0]) initOurProcessSection($block[0]);
      } catch (e) {
        console.error('OurProcessSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllOurProcessSections();
    } catch (e) {
      console.error('OurProcessSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

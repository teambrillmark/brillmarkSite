(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initShopifyDevServicesSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";
    try {
		console.log('inside try')
      var tabs = section.querySelectorAll('.shopify-dev-services-section-tab');
      var panels = section.querySelectorAll('.shopify-dev-services-section-panel');

		
      if (!tabs.length || !panels.length) return;

      var isMobile = function () {
        return window.innerWidth <= 768;
      };

      tabs.forEach(function (tab) {
        if (!tab || tab.dataset.jsBound) return;
        tab.dataset.jsBound = "true";

        tab.addEventListener('click', function () {
          try {
            if (isMobile()) return;

            var index = tab.getAttribute('data-tab-index');
            if (index === null) return;
            tabs.forEach(function (t) {
              t.classList.remove('active');
            });
            tab.classList.add('active');

            panels.forEach(function (p) {
              p.classList.remove('active');
            });

            var targetPanel = section.querySelector('.shopify-dev-services-section-panel[data-panel-index="' + index + '"]');
            if (targetPanel) {
              targetPanel.classList.add('active');
            }
          } catch (err) {
            console.error('ShopifyDevServicesSection tab click error:', err);
          }
        });
      });

      function handleResize() {
        try {
          if (isMobile()) {
            panels.forEach(function (p) {
              p.classList.add('active');
            });
          } else {
            var activeTab = section.querySelector('.shopify-dev-services-section-tab.is-active');
            var activeIndex = activeTab ? activeTab.getAttribute('data-tab-index') : '0';

            panels.forEach(function (p) {
              p.classList.remove('active');
            });

            var targetPanel = section.querySelector('.shopify-dev-services-section-panel[data-panel-index="' + activeIndex + '"]');
            if (targetPanel) {
              targetPanel.classList.add('active');
            }
          }
        } catch (err) {
          console.error('ShopifyDevServicesSection resize error:', err);
        }
      }

      window.addEventListener('resize', handleResize);
      handleResize();

    } catch (error) {
      console.error('ShopifyDevServicesSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllShopifyDevServicesSections() {
	  console.log('inside')
    document.querySelectorAll('.shopify-dev-services-section-section')
      .forEach(function (section) {
        try {
			console.log(document.querySelectorAll('.shopify-dev-services-section-section'), section)
          initShopifyDevServicesSection(section);
        } catch (e) {
          console.error('ShopifyDevServicesSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
		console.log('dev services loaded')
      try {
        initAllShopifyDevServicesSections();
      } catch (e) {
        console.error('ShopifyDevServicesSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=shopify-dev-services-section', function ($block) {
      try {
        if ($block && $block[0]) initShopifyDevServicesSection($block[0]);
      } catch (e) {
        console.error('ShopifyDevServicesSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER (optional)
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllShopifyDevServicesSections();
    } catch (e) {
      console.error('ShopifyDevServicesSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

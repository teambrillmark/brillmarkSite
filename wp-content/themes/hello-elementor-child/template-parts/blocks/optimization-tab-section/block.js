(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initOptimizationTabSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var tabs       = section.querySelectorAll('.optimization-tab-section-tab');
      var panels     = section.querySelectorAll('.optimization-tab-section-tab-panel');
      var prevBtn    = section.querySelector('.optimization-tab-section-nav-prev');
      var nextBtn    = section.querySelector('.optimization-tab-section-nav-next');
      var tabList    = section.querySelector('.optimization-tab-section-tabs-nav');
      var scrollPrev = section.querySelector('.optimization-tab-section-tabs-scroll-prev');
      var scrollNext = section.querySelector('.optimization-tab-section-tabs-scroll-next');
      var activeIndex = 0;

      if (!tabs.length || !panels.length) return;

      function scrollActiveTabIntoView() {
        try {
          if (!tabList || !tabs[activeIndex]) return;
          var tab = tabs[activeIndex];
          tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
        } catch (err) {
          console.error('OptimizationTabSection scrollIntoView error:', err);
        }
      }

      function updateTabsScrollButtons() {
        if (!tabList || !scrollPrev || !scrollNext) return;
        var scrollLeft = tabList.scrollLeft;
        var maxScroll = tabList.scrollWidth - tabList.clientWidth;
        scrollPrev.classList.toggle('tabs-scroll-disabled', scrollLeft <= 0);
        scrollNext.classList.toggle('tabs-scroll-disabled', maxScroll <= 0 || scrollLeft >= maxScroll - 1);
      }

      /* ── Desktop Tab Switching ── */
      function activateTab(index) {
        try {
          if (index < 0 || index >= tabs.length) return;
          activeIndex = index;

          tabs.forEach(function (tab, i) {
            var isActive = i === index;
            tab.classList.toggle('active', isActive);
            tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
          });

          panels.forEach(function (panel, i) {
            panel.classList.toggle('active', i === index);
          });

          updateNavState();
          scrollActiveTabIntoView();
        } catch (err) {
          console.error('OptimizationTabSection activateTab error:', err);
        }
      }

      function updateNavState() {
        if (prevBtn) {
          prevBtn.classList.toggle('disabled', activeIndex === 0);
        }
        if (nextBtn) {
          nextBtn.classList.toggle('disabled', activeIndex === tabs.length - 1);
        }
      }

      tabs.forEach(function (tab, i) {
        if (tab.dataset.jsBound) return;
        tab.dataset.jsBound = "true";
        tab.addEventListener('click', function () {
          try {
            activateTab(i);
          } catch (err) {
            console.error('OptimizationTabSection tab click error:', err);
          }
        });
      });

      if (prevBtn && !prevBtn.dataset.jsBound) {
        prevBtn.dataset.jsBound = "true";
        prevBtn.addEventListener('click', function () {
          try {
            if (activeIndex > 0) activateTab(activeIndex - 1);
          } catch (err) {
            console.error('OptimizationTabSection prev click error:', err);
          }
        });
      }

      if (nextBtn && !nextBtn.dataset.jsBound) {
        nextBtn.dataset.jsBound = "true";
        nextBtn.addEventListener('click', function () {
          try {
            if (activeIndex < tabs.length - 1) activateTab(activeIndex + 1);
          } catch (err) {
            console.error('OptimizationTabSection next click error:', err);
          }
        });
      }

      /* ── Tab strip scroll arrows ── */
      if (scrollPrev && !scrollPrev.dataset.jsBound) {
        scrollPrev.dataset.jsBound = "true";
        scrollPrev.addEventListener('click', function () {
          try {
            if (!tabList) return;
            var step = tabList.clientWidth * 0.6;
            tabList.scrollLeft = Math.max(0, tabList.scrollLeft - step);
            updateTabsScrollButtons();
          } catch (err) {
            console.error('OptimizationTabSection tabs scroll prev error:', err);
          }
        });
      }
      if (scrollNext && !scrollNext.dataset.jsBound) {
        scrollNext.dataset.jsBound = "true";
        scrollNext.addEventListener('click', function () {
          try {
            if (!tabList) return;
            var step = tabList.clientWidth * 0.6;
            var maxScroll = tabList.scrollWidth - tabList.clientWidth;
            tabList.scrollLeft = Math.min(maxScroll, tabList.scrollLeft + step);
            updateTabsScrollButtons();
          } catch (err) {
            console.error('OptimizationTabSection tabs scroll next error:', err);
          }
        });
      }
      if (tabList) {
        tabList.addEventListener('scroll', updateTabsScrollButtons);
      }
      if (window.ResizeObserver) {
        var ro = new ResizeObserver(function () {
          updateTabsScrollButtons();
        });
        if (tabList) ro.observe(tabList);
      }
      updateTabsScrollButtons();

      /* ── Keyboard Navigation ── */
      if (tabList && !tabList.dataset.jsBound) {
        tabList.dataset.jsBound = "true";
        tabList.addEventListener('keydown', function (e) {
          try {
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
              e.preventDefault();
              if (activeIndex < tabs.length - 1) {
                activateTab(activeIndex + 1);
                tabs[activeIndex].focus();
              }
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
              e.preventDefault();
              if (activeIndex > 0) {
                activateTab(activeIndex - 1);
                tabs[activeIndex].focus();
              }
            } else if (e.key === 'Home') {
              e.preventDefault();
              activateTab(0);
              tabs[0].focus();
            } else if (e.key === 'End') {
              e.preventDefault();
              activateTab(tabs.length - 1);
              tabs[tabs.length - 1].focus();
            }
          } catch (err) {
            console.error('OptimizationTabSection keyboard nav error:', err);
          }
        });
      }

      updateNavState();

    } catch (error) {
      console.error('OptimizationTabSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllOptimizationTabSections() {
    document.querySelectorAll('.optimization-tab-section-section')
      .forEach(function (section) {
        try {
          initOptimizationTabSection(section);
        } catch (e) {
          console.error('OptimizationTabSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllOptimizationTabSections();
      } catch (e) {
        console.error('OptimizationTabSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=optimization-tab-section', function ($block) {
      try {
        if ($block && $block[0]) initOptimizationTabSection($block[0]);
      } catch (e) {
        console.error('OptimizationTabSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllOptimizationTabSections();
    } catch (e) {
      console.error('OptimizationTabSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();

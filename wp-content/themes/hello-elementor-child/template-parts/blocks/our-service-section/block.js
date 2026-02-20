(function () {

    function initServiceBlock(block) {
      if (!block) return;
  
      const slider = block.querySelector('.our-service-section__slider');
      if (!slider) return;
  
      // Prevent double init
      if (block._swiperInstance) return;
  
      // Swiper not ready yet
      if (typeof Swiper === "undefined") return;
  
      const swiper = new Swiper(slider, {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 30,
        speed: 600,
        loop: true,
        grabCursor: true,
        breakpoints: {
          320: { slidesPerView: 1, spaceBetween: 20 },
          768: { slidesPerView: 'auto', spaceBetween: 30 }
        },
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev')
        },
        on: {
          init: function () {
            setTimeout(() => syncUI(block, this), 200); // ✅ use "this"
          },
          slideChange: function () {
            syncUI(block, this); // ✅ use "this"
          }
        }
      });
  
      block._swiperInstance = swiper;
  
      block.querySelectorAll('.our-service-section__tab').forEach(tab => {
        tab.addEventListener('click', e => {
          e.preventDefault();
          const index = parseInt(tab.dataset.tabIndex, 10);
          if (!isNaN(index)) swiper.slideToLoop(index);
        });
      });
    }
  
    function initAllBlocks() {
      document.querySelectorAll('.our-service-section').forEach(initServiceBlock);
    }
  
    function observeBlocks() {
      const observer = new MutationObserver(initAllBlocks);
      observer.observe(document.body, { childList: true, subtree: true });
    }
  
    document.addEventListener('DOMContentLoaded', initAllBlocks);
  
    if (window.acf) {
      window.acf.addAction('render_block_preview/type=our-service-section', function ($block) {
        initServiceBlock($block[0]);
      });
    }
  
    window.addEventListener('pageshow', function (e) {
      if (!e.persisted) return;
      document.querySelectorAll('.our-service-section').forEach(block => {
        if (block._swiperInstance) syncUI(block, block._swiperInstance);
      });
    });
  
    observeBlocks();
  
    /* ---------------- UI Sync ---------------- */
  
    function syncUI(block, swiper) {
      const real = swiper.realIndex;
      requestAnimationFrame(() => {
        updateActiveTab(block, real);
        updateCTA(block, real);
        updateSlideBlur(block);
      });
    }
  
    function updateActiveTab(block, i) {
      block.querySelectorAll('.our-service-section__tab').forEach(tab => {
        tab.classList.toggle('our-service-section__tab--active',
          parseInt(tab.dataset.tabIndex, 10) === i);
      });
    }
  
    function updateCTA(block, i) {
      const slider = block.querySelector('.our-service-section__slider');
      const active = slider?.querySelector(`.swiper-slide[data-swiper-slide-index="${i}"]:not(.swiper-slide-duplicate)`);
      const wrapper = slider?.querySelector('.our-service-section__cta-wrapper');
      const btn = wrapper?.querySelector('.our-service-section__cta-btn');
      const text = wrapper?.querySelector('.our-service-section__cta-text');
      if (!btn) return;
  
      btn.href = active?.dataset.ctaUrl || '#';
      const t = active?.dataset.ctaText || '';
  
      if (t.trim()) {
        wrapper.classList.remove('is-hidden');
        if (text) text.textContent = t;
      } else wrapper.classList.add('is-hidden');
    }
  
    function updateSlideBlur(block) {
      block.querySelectorAll('.swiper-slide').forEach(s => {
        const active = s.classList.contains('swiper-slide-active');
        s.classList.toggle('swiper-slide-blurred', !active);
        s.classList.toggle('swiper-slide-active-custom', active);
      });
    }
  
  })();
  
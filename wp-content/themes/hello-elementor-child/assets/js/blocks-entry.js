/**
 * Single entry for all block CSS and JS (Vite bundle).
 * - Imports design system + common + all block CSS via glob.
 * - Imports all block JS via glob (IIFEs run when bundled).
 * Theme enqueues dist/css/blocks.min.css and dist/js/blocks.min.js once.
 */

// Design system + utilities + common
import '../css/design-system.css';

import Swiper from 'swiper';
import { Navigation, Autoplay } from 'swiper/modules';
import 'swiper/swiper-bundle.css';
import 'swiper/css/navigation';
import 'swiper/css/autoplay';

// All block CSS (eager so they are included in the build)
const blockCss = import.meta.glob('../../template-parts/**/blocks/**/block.css', { eager: true });
void Object.keys(blockCss); // prevent tree-shake

// All block JS (eager = executed when bundle loads; each block.js is an IIFE)
const blockJs = import.meta.glob('../../template-parts/**/blocks/**/block.js', { eager: true });
void Object.values(blockJs);

/**
 * Inits all [data-swiper] sliders under root that are not yet initialized.
 * Resolves navigationNextSelector/navigationPrevSelector relative to each slider.
 * @param {Document|Element} root
 */
function initSwiperSlidersInRoot(root) {
  const sliders = root.querySelectorAll ? root.querySelectorAll('[data-swiper]:not([data-swiper-initialized])') : [];
  sliders.forEach((slider) => {
    if (slider.dataset.swiperInitialized === 'true') return;
    try {
      let options = {};
      try {
        options = JSON.parse(slider.dataset.swiper || '{}');
      } catch (e) {
        console.error('blocks-entry: invalid data-swiper JSON', e);
        return;
      }
      const nextSel = options.navigationNextSelector;
      const prevSel = options.navigationPrevSelector;
      delete options.navigationNextSelector;
      delete options.navigationPrevSelector;
      if (nextSel != null && prevSel != null) {
        const nextEl = slider.querySelector(nextSel);
        const prevEl = slider.querySelector(prevSel);
        if (nextEl && prevEl) {
          options.navigation = { nextEl, prevEl };
        }
      }
      options.modules = [...(options.modules || []), Navigation, Autoplay];
      new Swiper(slider, options);
      slider.dataset.swiperInitialized = 'true';
    } catch (err) {
      console.error('blocks-entry: Swiper init error', err);
    }
  });
}

window.initSwiperInRoot = initSwiperSlidersInRoot;

function initAllSwiperSliders() {
  initSwiperSlidersInRoot(document.body);
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initAllSwiperSliders);
} else {
  initAllSwiperSliders();
}

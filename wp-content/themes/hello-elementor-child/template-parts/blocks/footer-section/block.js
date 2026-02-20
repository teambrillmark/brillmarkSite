/**
 * Footer Section Block
 * Optional: toggle #footer-call (mobile) / #footer-call-desk (desktop) via media query is handled in CSS.
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var footer = document.querySelector('.footer-section-block');
    if (!footer) return;
    // Add responsive class or JS behavior here if needed
  });

  if (typeof acf !== 'undefined') {
    acf.addAction('render_block_preview/type=acf/footer-section', function () {});
  }
})();

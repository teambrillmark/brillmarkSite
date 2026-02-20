(function () {

    /* ---
       INIT ONE BLOCK (ONCE ONLY)
       ---- */
    function initHeroSection(section) {
        if (!section || section.dataset.jsInitialized) return;
        section.dataset.jsInitialized = "true";

        try {
            var variant = section.dataset.variant;

            if (variant === '1') {
                initVariant1Slider(section);
            }

            if (variant === '3') {
                initVariant3Form(section);
            }
        } catch (error) {
            console.error('HeroSection block init error:', error);
        }
    }

    /* ---
       VARIANT 1: Testimonial Swiper
       ---- */
    function initVariant1Slider(section) {
        var swiperEl = section.querySelector('.hero-testimonial-slider');
        if (!swiperEl || swiperEl.dataset.jsBound) return;
        swiperEl.dataset.jsBound = "true";

        try {
            if (typeof Swiper !== 'undefined') {
                new Swiper(swiperEl, {
                    slidesPerView: 1,
                    loop: true,
                    autoplay: { delay: 5000, disableOnInteraction: false },
                    navigation: {
                        prevEl: section.querySelector('.hero-slider-prev'),
                        nextEl: section.querySelector('.hero-slider-next')
                    }
                });
            } else {
                initFallbackSlider(section, swiperEl);
            }
        } catch (err) {
            console.error('HeroSection slider init error:', err);
            initFallbackSlider(section, swiperEl);
        }
    }

    function initFallbackSlider(section, sliderEl) {
        try {
            var slides = sliderEl.querySelectorAll('.swiper-slide');
            if (slides.length <= 1) return;

            var currentIndex = 0;
            slides.forEach(function (slide, i) {
                slide.style.display = i === 0 ? 'block' : 'none';
            });

            var prevBtn = section.querySelector('.hero-slider-prev');
            var nextBtn = section.querySelector('.hero-slider-next');

            function showSlide(idx) {
                slides[currentIndex].style.display = 'none';
                currentIndex = (idx + slides.length) % slides.length;
                slides[currentIndex].style.display = 'block';
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    try { showSlide(currentIndex - 1); } catch (e) { console.error('HeroSection prev click error:', e); }
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    try { showSlide(currentIndex + 1); } catch (e) { console.error('HeroSection next click error:', e); }
                });
            }

            setInterval(function () {
                try { showSlide(currentIndex + 1); } catch (e) { /* silent */ }
            }, 5000);
        } catch (err) {
            console.error('HeroSection fallback slider error:', err);
        }
    }

    /* ---
       VARIANT 3: Form enhancement
       ---- */
    function initVariant3Form(section) {
        var form = section.querySelector('.hero-form');
        if (!form || form.dataset.jsBound) return;
        form.dataset.jsBound = "true";

        try {
            form.addEventListener('submit', function (e) {
                try {
                    var emailInput = form.querySelector('input[type="email"]');
                    if (emailInput && !emailInput.value.trim()) {
                        e.preventDefault();
                        emailInput.focus();
                    }
                } catch (err) {
                    console.error('HeroSection form submit error:', err);
                }
            });
        } catch (err) {
            console.error('HeroSection form init error:', err);
        }
    }

    /* ---
       INIT ALL BLOCKS
       ---- */
    function initAllHeroSections() {
        document.querySelectorAll('.hero-section-section')
            .forEach(function (section) {
                try {
                    initHeroSection(section);
                } catch (e) {
                    console.error('HeroSection section init error:', e);
                }
            });
    }

    /* ---
       FRONTEND LOAD
       ---- */
    if (!document.body.classList.contains('block-editor-page')) {
        document.addEventListener('DOMContentLoaded', function () {
            try {
                initAllHeroSections();
            } catch (e) {
                console.error('HeroSection load error:', e);
            }
        });
    }

    /* ---
       ACF EDITOR PREVIEW (must not break editor)
       ---- */
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=hero-section', function ($block) {
            try {
                if ($block && $block[0]) {
                    $block[0].removeAttribute('data-js-initialized');
                    var slider = $block[0].querySelector('.hero-testimonial-slider');
                    if (slider) slider.removeAttribute('data-js-bound');
                    var form = $block[0].querySelector('.hero-form');
                    if (form) form.removeAttribute('data-js-bound');
                    initHeroSection($block[0]);
                }
            } catch (e) {
                console.error('HeroSection preview error:', e);
            }
        });
    }

    /* ---
       GUTENBERG RERENDER WATCHER (optional)
       ---- */
    var observer = new MutationObserver(function () {
        try {
            initAllHeroSections();
        } catch (e) {
            console.error('HeroSection rerender error:', e);
        }
    });
    observer.observe(document.body, { childList: true, subtree: true });

})();

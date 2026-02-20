/**
 * FAQ Text Section Block JavaScript
 * 
 * Handles any interactive functionality for the FAQ text section block
 */

document.addEventListener('DOMContentLoaded', function() {
    try {
        // Get all FAQ text section blocks on the page
        const faqTextSections = document.querySelectorAll('.faq-txt-section-section');

        if (!faqTextSections || faqTextSections.length === 0) {
            return; // Exit if no blocks found
        }

        faqTextSections.forEach(function(section) {
            if (!section) {
                return;
            }

            // Add fade-in animation on scroll
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observerCallback = function(entries, observer) {
                entries.forEach(function(entry) {
                    try {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('faq-txt-section-visible');
                            observer.unobserve(entry.target);
                        }
                    } catch (error) {
                        console.error('FAQ Text Section observer error:', error);
                    }
                });
            };

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(observerCallback, observerOptions);
                observer.observe(section);
            } else {
                // Fallback for browsers without IntersectionObserver
                section.classList.add('faq-txt-section-visible');
            }
        });

    } catch (error) {
        console.error('FAQ Text Section block initialization error:', error);
    }
});

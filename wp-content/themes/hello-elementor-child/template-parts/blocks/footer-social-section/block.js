/**
 * Footer Social Section Block JavaScript
 * 
 * Handles interactive behavior for social icons
 */
document.addEventListener('DOMContentLoaded', function() {
    try {
        // Get all footer social section blocks
        const footerSocialSections = document.querySelectorAll('.footer-social-section-section');

        if (!footerSocialSections || footerSocialSections.length === 0) {
            return; // Exit if no blocks found
        }

        footerSocialSections.forEach(function(section) {
            if (!section) {
                return;
            }

            // Get all social icon links
            const socialLinks = section.querySelectorAll('.footer-social-icon');

            if (socialLinks && socialLinks.length > 0) {
                socialLinks.forEach(function(link) {
                    if (!link) {
                        return;
                    }

                    // Add keyboard accessibility
                    link.addEventListener('keydown', function(e) {
                        try {
                            if (e.key === 'Enter' || e.key === ' ') {
                                e.preventDefault();
                                link.click();
                            }
                        } catch (error) {
                            console.error('Footer Social Section: Keyboard event error:', error);
                        }
                    });

                    // Add touch feedback for mobile
                    link.addEventListener('touchstart', function() {
                        try {
                            link.classList.add('is-touched');
                        } catch (error) {
                            console.error('Footer Social Section: Touchstart error:', error);
                        }
                    }, { passive: true });

                    link.addEventListener('touchend', function() {
                        try {
                            link.classList.remove('is-touched');
                        } catch (error) {
                            console.error('Footer Social Section: Touchend error:', error);
                        }
                    }, { passive: true });
                });
            }
        });

    } catch (error) {
        console.error('Footer Social Section: Block initialization error:', error);
    }
});

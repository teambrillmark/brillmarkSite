/**
 * Navbar Section Block JavaScript
 * Handles dropdown menus, mobile navigation, and interactive behavior
 */

document.addEventListener('DOMContentLoaded', function() {
    try {
        // Get all navbar section instances
        const navbarSections = document.querySelectorAll('.navbar-section-section');
        
        if (!navbarSections.length) {
            return;
        }
        
        navbarSections.forEach(function(navbar) {
            try {
                initNavbar(navbar);
            } catch (error) {
                console.error('Navbar initialization error:', error);
            }
        });
        
    } catch (error) {
        console.error('Navbar Section block initialization error:', error);
    }
});

/**
 * Initialize navbar functionality
 * @param {HTMLElement} navbar - The navbar section element
 */
function initNavbar(navbar) {
    // Desktop dropdown functionality
    const dropdownTriggers = navbar.querySelectorAll('.navbar-section-dropdown-trigger');
    const dropdownMenu = navbar.querySelector('.navbar-section-dropdown-menu');
    
    if (dropdownTriggers.length && dropdownMenu) {
        dropdownTriggers.forEach(function(trigger) {
            if (!trigger) return;
            
            trigger.addEventListener('click', function(e) {
                try {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parentItem = trigger.closest('.navbar-section-has-dropdown');
                    const isActive = parentItem && parentItem.classList.contains('is-active');
                    
                    // Close any open dropdowns first
                    closeAllDropdowns(navbar);
                    
                    // Toggle current dropdown
                    if (!isActive) {
                        if (parentItem) {
                            parentItem.classList.add('is-active');
                        }
                        dropdownMenu.classList.add('is-active');
                        dropdownMenu.setAttribute('aria-hidden', 'false');
                        trigger.setAttribute('aria-expanded', 'true');
                    }
                } catch (error) {
                    console.error('Dropdown trigger click error:', error);
                }
            });
            
            // Keyboard accessibility
            trigger.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeAllDropdowns(navbar);
                }
            });
        });
    }
    
    // Mobile hamburger menu
    const hamburger = navbar.querySelector('.navbar-section-hamburger');
    const mobileMenu = navbar.querySelector('.navbar-section-mobile-menu');
    
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function(e) {
            try {
                e.preventDefault();
                
                const isActive = hamburger.classList.contains('is-active');
                
                hamburger.classList.toggle('is-active');
                mobileMenu.classList.toggle('is-active');
                
                // Update ARIA attributes
                hamburger.setAttribute('aria-expanded', !isActive);
                mobileMenu.setAttribute('aria-hidden', isActive);
                
                // Prevent body scroll when menu is open
                if (!isActive) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            } catch (error) {
                console.error('Hamburger click error:', error);
            }
        });
    }
    
    // Mobile submenu toggles
    const mobileDropdownTriggers = navbar.querySelectorAll('.navbar-section-mobile-dropdown-trigger');
    
    mobileDropdownTriggers.forEach(function(trigger) {
        if (!trigger) return;
        
        trigger.addEventListener('click', function(e) {
            try {
                e.preventDefault();
                
                const parentItem = trigger.closest('.navbar-section-mobile-has-dropdown');
                
                if (parentItem) {
                    const isActive = parentItem.classList.contains('is-active');
                    
                    // Close other mobile submenus
                    const allMobileDropdowns = navbar.querySelectorAll('.navbar-section-mobile-has-dropdown');
                    allMobileDropdowns.forEach(function(item) {
                        if (item !== parentItem) {
                            item.classList.remove('is-active');
                            const itemTrigger = item.querySelector('.navbar-section-mobile-dropdown-trigger');
                            if (itemTrigger) {
                                itemTrigger.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });
                    
                    // Toggle current submenu
                    parentItem.classList.toggle('is-active');
                    trigger.setAttribute('aria-expanded', !isActive);
                }
            } catch (error) {
                console.error('Mobile dropdown trigger click error:', error);
            }
        });
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        try {
            if (!navbar.contains(e.target)) {
                closeAllDropdowns(navbar);
            }
        } catch (error) {
            console.error('Outside click handler error:', error);
        }
    });
    
    // Close dropdown on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllDropdowns(navbar);
            closeMobileMenu(navbar);
        }
    });
    
    // Handle resize events
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            try {
                // Close mobile menu if viewport becomes larger
                if (window.innerWidth > 768) {
                    closeMobileMenu(navbar);
                }
                // Close desktop dropdown if viewport becomes smaller
                if (window.innerWidth <= 768) {
                    closeAllDropdowns(navbar);
                }
            } catch (error) {
                console.error('Resize handler error:', error);
            }
        }, 150);
    });
}

/**
 * Close all desktop dropdowns
 * @param {HTMLElement} navbar - The navbar section element
 */
function closeAllDropdowns(navbar) {
    try {
        const activeItems = navbar.querySelectorAll('.navbar-section-has-dropdown.is-active');
        activeItems.forEach(function(item) {
            item.classList.remove('is-active');
            const trigger = item.querySelector('.navbar-section-dropdown-trigger');
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
        
        const dropdownMenu = navbar.querySelector('.navbar-section-dropdown-menu');
        if (dropdownMenu) {
            dropdownMenu.classList.remove('is-active');
            dropdownMenu.setAttribute('aria-hidden', 'true');
        }
    } catch (error) {
        console.error('Close dropdowns error:', error);
    }
}

/**
 * Close mobile menu
 * @param {HTMLElement} navbar - The navbar section element
 */
function closeMobileMenu(navbar) {
    try {
        const hamburger = navbar.querySelector('.navbar-section-hamburger');
        const mobileMenu = navbar.querySelector('.navbar-section-mobile-menu');
        
        if (hamburger) {
            hamburger.classList.remove('is-active');
            hamburger.setAttribute('aria-expanded', 'false');
        }
        
        if (mobileMenu) {
            mobileMenu.classList.remove('is-active');
            mobileMenu.setAttribute('aria-hidden', 'true');
        }
        
        document.body.style.overflow = '';
        
        // Close all mobile submenus
        const mobileDropdowns = navbar.querySelectorAll('.navbar-section-mobile-has-dropdown.is-active');
        mobileDropdowns.forEach(function(item) {
            item.classList.remove('is-active');
            const trigger = item.querySelector('.navbar-section-mobile-dropdown-trigger');
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
    } catch (error) {
        console.error('Close mobile menu error:', error);
    }
}

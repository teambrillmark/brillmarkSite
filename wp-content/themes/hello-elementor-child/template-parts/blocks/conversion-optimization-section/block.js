/**
 * Conversion Optimization Section Block JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
  try {
    // Get all block instances
    const blocks = document.querySelectorAll('.conversion-optimization-section-section');
    
    if (!blocks || blocks.length === 0) {
      return;
    }
    
    blocks.forEach(function(block) {
      try {
        initBlock(block);
      } catch (error) {
        console.error('Error initializing conversion optimization block:', error);
      }
    });
    
  } catch (error) {
    console.error('Conversion optimization section initialization error:', error);
  }
});

/**
 * Initialize a single block instance
 * @param {HTMLElement} block - The block element
 */
function initBlock(block) {
  if (!block) return;
  
  const tabs = block.querySelectorAll('.conversion-optimization-section-tab');
  const comparisonWrappers = block.querySelectorAll('.conversion-optimization-section-comparison-wrapper');
  const prevButton = block.querySelector('.conversion-optimization-section-nav-dot[data-direction="prev"]');
  const nextButton = block.querySelector('.conversion-optimization-section-nav-dot[data-direction="next"]');
  
  let currentIndex = 0;
  const totalTabs = tabs ? tabs.length : 0;
  
  if (totalTabs === 0) {
    return;
  }
  
  /**
   * Switch to a specific tab
   * @param {number} index - Tab index to switch to
   */
  function switchToTab(index) {
    try {
      if (index < 0 || index >= totalTabs) return;
      
      // Update tabs
      tabs.forEach(function(tab, i) {
        if (tab) {
          if (i === index) {
            tab.classList.add('conversion-optimization-section-tab-active');
          } else {
            tab.classList.remove('conversion-optimization-section-tab-active');
          }
        }
      });
      
      // Update comparison wrappers
      if (comparisonWrappers && comparisonWrappers.length > 0) {
        comparisonWrappers.forEach(function(wrapper, i) {
          if (wrapper) {
            if (i === index) {
              wrapper.style.display = '';
            } else {
              wrapper.style.display = 'none';
            }
          }
        });
      }
      
      currentIndex = index;
      updateNavButtons();
      
    } catch (error) {
      console.error('Error switching tab:', error);
    }
  }
  
  /**
   * Update navigation button states
   */
  function updateNavButtons() {
    try {
      if (prevButton) {
        if (currentIndex === 0) {
          prevButton.classList.remove('conversion-optimization-section-nav-dot-active');
        } else {
          prevButton.classList.add('conversion-optimization-section-nav-dot-active');
        }
      }
      
      if (nextButton) {
        if (currentIndex === totalTabs - 1) {
          nextButton.classList.remove('conversion-optimization-section-nav-dot-active');
        } else {
          nextButton.classList.add('conversion-optimization-section-nav-dot-active');
        }
      }
    } catch (error) {
      console.error('Error updating nav buttons:', error);
    }
  }
  
  // Tab click handlers
  tabs.forEach(function(tab, index) {
    if (tab) {
      tab.addEventListener('click', function(e) {
        try {
          e.preventDefault();
          switchToTab(index);
        } catch (error) {
          console.error('Tab click error:', error);
        }
      });
      
      // Keyboard accessibility
      tab.setAttribute('tabindex', '0');
      tab.setAttribute('role', 'tab');
      tab.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          switchToTab(index);
        }
      });
    }
  });
  
  // Previous button handler
  if (prevButton) {
    prevButton.addEventListener('click', function(e) {
      try {
        e.preventDefault();
        if (currentIndex > 0) {
          switchToTab(currentIndex - 1);
        }
      } catch (error) {
        console.error('Prev button error:', error);
      }
    });
    
    prevButton.setAttribute('tabindex', '0');
    prevButton.setAttribute('role', 'button');
  }
  
  // Next button handler
  if (nextButton) {
    nextButton.addEventListener('click', function(e) {
      try {
        e.preventDefault();
        if (currentIndex < totalTabs - 1) {
          switchToTab(currentIndex + 1);
        }
      } catch (error) {
        console.error('Next button error:', error);
      }
    });
    
    nextButton.setAttribute('tabindex', '0');
    nextButton.setAttribute('role', 'button');
  }
  
  // Initialize first tab
  switchToTab(0);
}

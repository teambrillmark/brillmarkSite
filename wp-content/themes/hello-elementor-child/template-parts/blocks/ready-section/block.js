/**
 * Ready Section Block JavaScript
 * 
 * Handles counter animation for stat numbers.
 */

document.addEventListener('DOMContentLoaded', function() {
  try {
    // Get block elements with null checks
    const readySections = document.querySelectorAll('.ready-section-section');
    
    if (!readySections || readySections.length === 0) {
      return; // Exit if block not found
    }
    
    /**
     * Parse number from string (handles K, M, + suffixes)
     * @param {string} value - The number string (e.g., "10K+", "1M+", "1000+")
     * @returns {object} - Object with numeric value and suffix info
     */
    function parseNumber(value) {
      if (!value || typeof value !== 'string') {
        return { value: 0, suffix: '', hasPlus: false };
      }
      
      const trimmed = value.trim();
      const hasPlus = trimmed.endsWith('+');
      const cleanValue = hasPlus ? trimmed.slice(0, -1) : trimmed;
      
      // Check for K (thousands)
      if (cleanValue.toUpperCase().endsWith('K')) {
        const num = parseFloat(cleanValue.slice(0, -1));
        return {
          value: num * 1000,
          suffix: 'K',
          hasPlus: hasPlus,
          original: value
        };
      }
      
      // Check for M (millions)
      if (cleanValue.toUpperCase().endsWith('M')) {
        const num = parseFloat(cleanValue.slice(0, -1));
        return {
          value: num * 1000000,
          suffix: 'M',
          hasPlus: hasPlus,
          original: value
        };
      }
      
      // Plain number
      const num = parseFloat(cleanValue);
      return {
        value: isNaN(num) ? 0 : num,
        suffix: '',
        hasPlus: hasPlus,
        original: value
      };
    }
    
    /**
     * Format number with suffix
     * @param {number} value - The numeric value
     * @param {string} suffix - The suffix (K, M, or '')
     * @param {boolean} hasPlus - Whether to add + at the end
     * @returns {string} - Formatted string
     */
    function formatNumber(value, suffix, hasPlus) {
      let formatted;
      
      if (suffix === 'K') {
        formatted = (value / 1000).toFixed(value % 1000 === 0 ? 0 : 1) + 'K';
      } else if (suffix === 'M') {
        formatted = (value / 1000000).toFixed(value % 1000000 === 0 ? 0 : 1) + 'M';
      } else {
        formatted = Math.floor(value).toString();
      }
      
      // Remove trailing .0 if present
      formatted = formatted.replace(/\.0+$/, '');
      
      return formatted + (hasPlus ? '+' : '');
    }
    
    /**
     * Animate counter from start to end
     * @param {HTMLElement} element - The element to update
     * @param {number} start - Starting value
     * @param {number} end - Ending value
     * @param {object} formatInfo - Formatting information
     * @param {number} duration - Animation duration in ms
     */
    function animateCounter(element, start, end, formatInfo, duration) {
      if (!element) {
        return;
      }
      
      const startTime = performance.now();
      const difference = end - start;
      
      function updateCounter(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = start + (difference * easeOutQuart);
        
        // Update element text
        element.textContent = formatNumber(current, formatInfo.suffix, formatInfo.hasPlus);
        
        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        } else {
          // Ensure final value is exact
          element.textContent = formatInfo.original;
        }
      }
      
      requestAnimationFrame(updateCounter);
    }
    
    readySections.forEach(function(section) {
      if (!section) {
        return;
      }
      
      try {
        // Get all stat number elements
        const statNumbers = section.querySelectorAll('.ready-section-stat-number[data-target]');
        
        if (statNumbers && statNumbers.length > 0) {
          // Use IntersectionObserver to trigger animation when section comes into view
          if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
              entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                  try {
                    entry.target.classList.add('counted');
                    
                    const targetValue = entry.target.getAttribute('data-target');
                    if (targetValue) {
                      const formatInfo = parseNumber(targetValue);
                      
                      // Start animation from 0
                      animateCounter(
                        entry.target,
                        0,
                        formatInfo.value,
                        formatInfo,
                        2000 // 2 second animation
                      );
                    }
                  } catch (error) {
                    console.error('Counter animation error:', error);
                  }
                }
              });
            }, {
              threshold: 0.3,
              rootMargin: '0px 0px -100px 0px'
            });
            
            statNumbers.forEach(function(statNumber) {
              if (statNumber) {
                observer.observe(statNumber);
              }
            });
          } else {
            // Fallback for browsers without IntersectionObserver
            statNumbers.forEach(function(statNumber) {
              if (statNumber) {
                const targetValue = statNumber.getAttribute('data-target');
                if (targetValue) {
                  const formatInfo = parseNumber(targetValue);
                  animateCounter(
                    statNumber,
                    0,
                    formatInfo.value,
                    formatInfo,
                    2000
                  );
                }
              }
            });
          }
        }
        
      } catch (error) {
        console.error('Ready section item initialization error:', error);
      }
    });
    
  } catch (error) {
    console.error('Ready section block initialization error:', error);
  }
});

/**
 * Features Section Block - Interactive Behavior
 */
document.addEventListener('DOMContentLoaded', function () {
  try {
    // Get all features section blocks on the page
    var blocks = document.querySelectorAll('.features-section-section');

    if (!blocks || blocks.length === 0) {
      return; // Exit if no blocks found
    }

    blocks.forEach(function (block) {
      if (!block) {
        return;
      }

      // Get all stat cards within this block
      var cards = block.querySelectorAll('.features-section-stat-card');

      if (!cards || cards.length === 0) {
        return;
      }

      cards.forEach(function (card) {
        if (!card) {
          return;
        }

        // Add hover interaction for stat cards
        card.addEventListener('mouseenter', function () {
          try {
            card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
            card.style.transform = 'translateY(-4px)';
            card.style.boxShadow = '0 8px 24px rgba(0, 0, 0, 0.15)';
          } catch (error) {
            console.error('Features section card hover error:', error);
          }
        });

        card.addEventListener('mouseleave', function () {
          try {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
          } catch (error) {
            console.error('Features section card hover reset error:', error);
          }
        });
      });
    });
  } catch (error) {
    console.error('Features Section block initialization error:', error);
  }
});

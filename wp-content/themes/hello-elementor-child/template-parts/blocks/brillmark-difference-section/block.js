/**
 * Brillmark Difference Section Block - JavaScript
 *
 * Handles interactive behavior for the comparison table section.
 */
document.addEventListener('DOMContentLoaded', function () {
  try {
    // Get all block instances on the page
    var blocks = document.querySelectorAll('.brillmark-difference-section-section');

    if (!blocks || blocks.length === 0) {
      return; // Exit if no blocks found
    }

    blocks.forEach(function (block) {
      if (!block) {
        return;
      }

      try {
        // Add hover highlight to data rows
        var dataRows = block.querySelectorAll(
          '.brillmark-difference-section-row:not(.brillmark-difference-section-row--header)'
        );

        if (dataRows && dataRows.length > 0) {
          dataRows.forEach(function (row) {
            if (!row) {
              return;
            }

            row.addEventListener('mouseenter', function () {
              try {
                row.style.opacity = '0.9';
                row.style.transition = 'opacity 0.2s ease';
              } catch (error) {
                console.error('Brillmark Difference Section: Row hover error:', error);
              }
            });

            row.addEventListener('mouseleave', function () {
              try {
                row.style.opacity = '1';
              } catch (error) {
                console.error('Brillmark Difference Section: Row hover reset error:', error);
              }
            });
          });
        }
      } catch (error) {
        console.error('Brillmark Difference Section: Block setup error:', error);
      }
    });
  } catch (error) {
    console.error('Brillmark Difference Section: Initialization error:', error);
  }
});

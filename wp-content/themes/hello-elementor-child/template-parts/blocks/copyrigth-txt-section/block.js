/**
 * copyrigth-txt-section Block JavaScript
 * 
 * This file contains any interactive functionality for the block
 */

document.addEventListener('DOMContentLoaded', function() {
    try {
        // Get block elements with null checks
        const blockElements = document.querySelectorAll('.copyrigth-txt-section-section');
        
        if (!blockElements || blockElements.length === 0) {
            return; // Exit if block not found
        }
        
        blockElements.forEach(function(blockElement) {
            if (blockElement) {
                // Initialize block functionality if needed
                // This block is primarily static content, no interactive behavior required
                
                // Example: Add any future interactive features here
                // const copyrightText = blockElement.querySelector('.copyright-text');
                // const taglineText = blockElement.querySelector('.tagline-text');
            }
        });
        
    } catch (error) {
        console.error('copyrigth-txt-section block initialization error:', error);
    }
});

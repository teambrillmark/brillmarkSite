<?php
/**
 * copyrigth-txt-section Block Template
 * 
 * @package Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ACF-ANNOTATED: true -->
<section class="copyrigth-txt-section-section">
    <div class="container">
        <?php if (!empty(get_field('copyright_text'))): ?>
            <span class="copyright-text"><?php echo esc_html(get_field('copyright_text')); ?></span>
        <?php endif; ?>
        
        <?php if (!empty(get_field('tagline_text'))): ?>
            <span class="tagline-text"><?php echo esc_html(get_field('tagline_text')); ?></span>
        <?php endif; ?>
    </div>
</section>

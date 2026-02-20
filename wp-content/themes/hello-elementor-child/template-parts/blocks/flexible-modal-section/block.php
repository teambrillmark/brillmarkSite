<?php
/**
 * Flexible Modal Section Block Template
 * 
 * @package Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$wrapper = theme_get_block_wrapper_attributes($block, 'flexible-modal-section-section');

?>
<!-- ACF-ANNOTATED: true -->
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
    <div class="container">
        <div class="flexible-modal-header">
            <?php if (!empty(get_field('title'))): ?>
                <h2 class="flexible-modal-title"><?php echo esc_html(get_field('title')); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty(get_field('description'))): ?>
                <p class="flexible-modal-description"><?php echo wp_kses_post(get_field('description')); ?></p>
            <?php endif; ?>
        </div>
        
        <?php if (have_rows('engagement_cards')): ?>
            <div class="flexible-modal-cards">
                <?php while (have_rows('engagement_cards')): the_row(); ?>
                    <div class="flexible-card">
                        <div class="flexible-card-inner">
                            <div class="flexible-card-header">
                                <?php 
                                $card_icon = get_sub_field('card_icon');
                                if (!empty($card_icon)): 
                                ?>
                                    <div class="flexible-card-icon" style="background-image: url('<?php echo esc_url($card_icon); ?>');"></div>
                                <?php endif; ?>
                                
                                <div class="flexible-card-content">
                                    <?php if (!empty(get_sub_field('card_title'))): ?>
                                        <h3 class="flexible-card-title"><?php echo esc_html(get_sub_field('card_title')); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty(get_sub_field('card_description'))): ?>
                                        <p class="flexible-card-text"><?php echo wp_kses_post(get_sub_field('card_description')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="flexible-card-body">
                                <?php if (have_rows('features')): ?>
                                    <ul class="flexible-features-list">
                                        <?php while (have_rows('features')): the_row(); ?>
                                            <li class="flexible-feature-item">
                                                <?php 
                                                $feature_icon = get_sub_field('feature_icon');
                                                if (!empty($feature_icon)): 
                                                ?>
                                                    <span class="flexible-feature-icon" style="background-image: url('<?php echo esc_url($feature_icon); ?>');"></span>
                                                <?php endif; ?>
                                                
                                                <?php if (!empty(get_sub_field('feature_text'))): ?>
                                                    <span class="flexible-feature-text"><?php echo esc_html(get_sub_field('feature_text')); ?></span>
                                                <?php endif; ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                                
                                <?php 
                                $button_link = get_sub_field('button_link');
                                $button_text = get_sub_field('button_text');
                                if (!empty($button_text)): 
                                ?>
                                    <a href="<?php echo !empty($button_link) ? esc_url($button_link) : '#'; ?>" class="flexible-card-btn"><?php echo esc_html($button_text); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

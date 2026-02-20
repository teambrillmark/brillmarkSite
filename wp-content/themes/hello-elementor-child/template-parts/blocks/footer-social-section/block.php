<?php
/**
 * Footer Social Section Block Template
 * 
 * @package Theme
 */

// ACF-ANNOTATED: true


$wrapper = theme_get_block_wrapper_attributes($block, 'footer-social-section-section');

?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
    <div class="container">
        <?php if (have_rows('social_icons')): ?>
            <div class="footer-social-icons">
                <?php while (have_rows('social_icons')): the_row(); ?>
                    <?php
                    $icon_image = get_sub_field('icon_image');
                    $icon_link = get_sub_field('icon_link');
                    $icon_label = get_sub_field('icon_label');
                    ?>
                    <?php if (!empty($icon_link) && !empty($icon_image)): ?>
                        <a href="<?php echo esc_url($icon_link['url']); ?>" 
                           class="footer-social-icon" 
                           target="<?php echo esc_attr(!empty($icon_link['target']) ? $icon_link['target'] : '_blank'); ?>" 
                           rel="noopener noreferrer"
                           aria-label="<?php echo esc_attr(!empty($icon_label) ? $icon_label : 'Social Media Link'); ?>">
                            <div class="footer-social-icon-wrapper">
                                <?php if (is_array($icon_image)): ?>
                                    <img src="<?php echo esc_url($icon_image['url']); ?>" 
                                         alt="<?php echo esc_attr(!empty($icon_image['alt']) ? $icon_image['alt'] : $icon_label); ?>" 
                                         class="footer-social-icon-img">
                                <?php elseif (!empty($icon_image)): ?>
                                    <img src="<?php echo esc_url($icon_image); ?>" 
                                         alt="<?php echo esc_attr(!empty($icon_label) ? $icon_label : 'Social Icon'); ?>" 
                                         class="footer-social-icon-img">
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php elseif (!empty($icon_image)): ?>
                        <div class="footer-social-icon">
                            <div class="footer-social-icon-wrapper">
                                <?php if (is_array($icon_image)): ?>
                                    <img src="<?php echo esc_url($icon_image['url']); ?>" 
                                         alt="<?php echo esc_attr(!empty($icon_image['alt']) ? $icon_image['alt'] : 'Social Icon'); ?>" 
                                         class="footer-social-icon-img">
                                <?php elseif (!empty($icon_image)): ?>
                                    <img src="<?php echo esc_url($icon_image); ?>" 
                                         alt="<?php echo esc_attr(!empty($icon_label) ? $icon_label : 'Social Icon'); ?>" 
                                         class="footer-social-icon-img">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

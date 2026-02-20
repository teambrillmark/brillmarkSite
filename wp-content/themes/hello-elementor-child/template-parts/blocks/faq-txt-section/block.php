<?php
/**
 * FAQ Text Section Block Template
 *
 * @package theme
 */
?>
<!-- ACF-ANNOTATED: true -->
<section class="faq-txt-section-section">
    <div class="container">
        <?php if (!empty(get_field('badge'))): ?>
            <span class="faq-txt-section-badge"><?php echo esc_html(get_field('badge')); ?></span>
        <?php endif; ?>

        <?php if (!empty(get_field('heading'))): ?>
            <h2 class="faq-txt-section-heading"><?php echo esc_html(get_field('heading')); ?></h2>
        <?php endif; ?>

        <?php if (!empty(get_field('description'))): ?>
            <p class="faq-txt-section-description" title="<?php echo esc_attr(get_field('description')); ?>"><?php echo wp_kses_post(get_field('description')); ?></p>
        <?php endif; ?>
    </div>
</section>

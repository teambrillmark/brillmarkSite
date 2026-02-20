<!-- ACF-ANNOTATED: true -->
<?php
/**
 * brands-slider-section Block Template
 *
 * @package Theme
 */

// Get block fields
$heading  = get_field('heading');
$subtitle = get_field('subtitle');

$wrapper = theme_get_block_wrapper_attributes($block, 'brands-slider-section-section');
?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
    <div class="container">
        <div class="brands-slider-section-content">

            <div class="brands-slider-section-header">
                <?php if (!empty($heading)) : ?>
                    <h2 class="brands-slider-section-title"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if (!empty($subtitle)) : ?>
                    <p class="brands-slider-section-subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>

            <?php if (have_rows('brand_logos')) : ?>
                <div class="brands-slider-section-slider">
                    <div class="brands-wrapper">
                        <?php while (have_rows('brand_logos')) : the_row();
                            $logo_image = get_sub_field('logo_image');
                            $brand_name = get_sub_field('brand_name');
                        ?>
                            <div class="brands-slider-section-logo-item">
                                <div class="brands-slider-section-logo-wrapper">
                                    <?php if (!empty($logo_image)) : ?>
                                        <img
                                            src="<?php echo esc_url($logo_image); ?>"
                                            alt="<?php echo !empty($brand_name) ? esc_attr($brand_name) : ''; ?>"
                                            class="brands-slider-section-logo-img"
                                            loading="lazy"
                                        >
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

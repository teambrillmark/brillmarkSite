<?php
/**
 * Brands Section Block Template
 * 
 * @package theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$wrapper = theme_get_block_wrapper_attributes($block, 'brands-section-section');

?>
<!-- ACF-ANNOTATED: true -->
<section  id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="brands-section-wrapper">
      <div class="brands-section-header">
        <div class="brands-section-titles">
          <?php if (!empty(get_field('subtitle'))): ?>
            <span class="brands-section-subtitle"><?php echo esc_html(get_field('subtitle')); ?></span>
          <?php endif; ?>
          <?php if (!empty(get_field('heading'))): ?>
            <h2 class="brands-section-heading"><?php echo esc_html(get_field('heading')); ?></h2>
          <?php endif; ?>
        </div>
        <?php if (!empty(get_field('description'))): ?>
          <p class="brands-section-description"><?php echo wp_kses_post(get_field('description')); ?></p>
        <?php endif; ?>
      </div>
      
      <?php if (have_rows('brand_logos')): ?>
        <div class="brands-section-logos">
          <?php 
          $logo_count = 0;
          $logos_per_row = 6;
          $row_open = false;
          ?>
          <?php while (have_rows('brand_logos')): the_row(); ?>
            <?php 
            // Open new row if needed
            if ($logo_count % $logos_per_row === 0): 
              if ($row_open): ?>
                </div>
              <?php endif; ?>
              <div class="brands-section-logos-row">
              <?php $row_open = true;
            endif;
            ?>
            
            <div class="brands-section-logo-item">
              <?php 
              $logo_image = get_sub_field('logo_image');
              $logo_alt = get_sub_field('logo_alt');
			  $logo_width = get_sub_field('logo_width');
			  $logo_height = get_sub_field('logo_height');
              if (!empty($logo_image)): 
                $image_url = is_array($logo_image) ? $logo_image['url'] : $logo_image;
                $image_alt = !empty($logo_alt) ? $logo_alt : (is_array($logo_image) && !empty($logo_image['alt']) ? $logo_image['alt'] : 'Brand logo');
				$image_width = !empty($logo_width) ? $logo_width : (is_array($logo_image) && !empty($logo_image['width']) ? $logo_image['width'] : '100');
				$image_height = !empty($logo_height) ? $logo_height : (is_array($logo_image) && !empty($logo_image['height']) ? $logo_image['height'] : '30');
              ?>
                <img class="brands-section-logo-img" width="100" height="30" alt="<?php echo esc_attr($image_alt); ?>" src="<?php echo esc_url($image_url); ?>" style="width: <?php echo esc_html($image_width); ?>px; height: <?php echo esc_html($image_height); ?>px;">
              <?php endif; ?>
            </div>
            
            <?php $logo_count++; ?>
          <?php endwhile; ?>
          
          <?php if ($row_open): ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

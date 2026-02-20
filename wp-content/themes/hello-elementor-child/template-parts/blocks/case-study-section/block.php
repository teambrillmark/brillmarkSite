<?php
/**
 * Case Study Section Block Template
 *
 * @package theme
 */

// ACF-ANNOTATED: true

$wrapper = theme_get_block_wrapper_attributes($block, 'case-study-section-section');
$client_link  = get_field('client_link');
$client_label = get_field('client_label');

?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="case-study-section-row">
      <div class="case-study-section-info">
        <div class="case-study-section-title-block">
          <?php if (!empty(get_field('case_study_label'))): ?>
            <span class="case-study-section-label"><?php echo esc_html(get_field('case_study_label')); ?></span>
          <?php endif; ?>
          <?php if (!empty(get_field('headline'))): ?>
            <h2 class="case-study-section-headline"><?php echo esc_html(get_field('headline')); ?></h2>
          <?php endif; ?>
        </div>
        <div class="case-study-section-client-block">
          <?php if (get_field('client_label')): ?>
            <span class="case-study-section-client">
              Client :
					<a class="case-study-section-client-name" href="<?php echo esc_url(!empty($cta_link['url']) ? $cta_link['url'] : '/shopify-toplids-migration-revamp-drives-128-conversion-uplift/'); ?>"> <?php echo wp_kses_post(get_field('client_label')); ?> </a>

            </span>
          <?php endif; ?>

          <?php if (!empty(get_field('requirement_text'))): ?>
            <span class="case-study-section-requirement"><?php echo esc_html(get_field('requirement_text')); ?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="case-study-section-testimonial">
        <?php 
        $testimonial_image = get_field('testimonial_image');
        if (!empty($testimonial_image)) : 
        ?>
          <div class="case-study-section-testimonial-bg">
            <img 
              src="<?php echo esc_url($testimonial_image); ?>" 
              alt="Testimonial Image"
              loading="lazy"
            >
          </div>
        <?php endif; ?>
        <div class="case-study-section-testimonial-content">
          <?php if (!empty(get_field('testimonial_quote'))): ?>
            <p class="case-study-section-quote"><?php echo wp_kses_post(get_field('testimonial_quote')); ?></p>
          <?php endif; ?>
          <?php if (!empty(get_field('testimonial_attribution'))): ?>
            <span class="case-study-section-attribution"><?php echo esc_html(get_field('testimonial_attribution')); ?></span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

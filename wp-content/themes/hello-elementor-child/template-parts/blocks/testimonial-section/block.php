<?php
/**
 * Testimonial Section Block Template
 *
 * @package Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$section_label   = !empty(get_field('section_label')) ? get_field('section_label') : 'TESTIMONONIAL';
$section_heading = !empty(get_field('section_heading')) ? get_field('section_heading') : 'What Our Clients Say about Us?';
$quote_icon      = get_field('quote_icon');
?>
<!-- ACF-ANNOTATED: true -->
<section class="testimonial-wrapper" id="testimonial-section">
  <div class="testimonial-container">
    <div class="testimonial-main">
      <div class="testimonial-cols">
        <div class="testimonial-col-1">
          <div class="testimonial-txt-wrapper">
            <?php if (!empty($section_label)): ?>
              <p class="testimonial-txt"><?php echo esc_html($section_label); ?></p>
            <?php endif; ?>
            <?php if (!empty($section_heading)): ?>
              <h2 class="clients-say"><?php echo esc_html($section_heading); ?></h2>
            <?php endif; ?>
          </div>
        </div>
        <?php if (have_rows('testimonials')): ?>
          <div class="testimonial-col-2">
            <div class="swiper testimonial-swiper">
              <div class="swiper-wrapper swiper-wrapper-2">
                <?php while (have_rows('testimonials')): the_row();
                  $person_img   = get_sub_field('person_image');
                  $review_text  = get_sub_field('review_text');
                  $company_logo = get_sub_field('company_logo');
                  $person_name  = get_sub_field('person_name');
                  $designation  = get_sub_field('person_designation');
                ?>
                  <div class="swiper-slide swiper-slide-2">
                    <div class="col-2-cols">
                      <div class="col-2-col1">
                        <div class="col-2-col1-img-wrapper">
                          <?php if (!empty($person_img) && !empty($person_img['url'])): ?>
                            <img src="<?php echo esc_url($person_img['url']); ?>" alt="<?php echo esc_attr($person_img['alt'] ?? 'person'); ?>" class="col-2col1-img" />
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-2 col2">
                        <div class="col-2-col2-quote-wrapper">
                          <?php if (!empty($quote_icon) && !empty($quote_icon['url'])): ?>
                            <img src="<?php echo esc_url($quote_icon['url']); ?>" alt="<?php echo esc_attr($quote_icon['alt'] ?? 'quote'); ?>" class="col-2-col2-quote" />
                          <?php endif; ?>
                        </div>
                        <?php if (!empty($review_text)): ?>
                          <div class="bm-testimonial-review">
                            <p class="col-2-col2-txt"><?php echo wp_kses_post($review_text); ?></p>
                          </div>
                        <?php endif; ?>
                        <div class="bm-testimonial-img">
                          <?php if (!empty($company_logo) && !empty($company_logo['url'])): ?>
                            <div class="img">
                              <img src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt'] ?? ''); ?>">
                            </div>
                          <?php endif; ?>
                          <div class="col-2-col2-designation">
                            <?php if (!empty($person_name)): ?>
                              <p class="col-2-col2-name"><?php echo esc_html($person_name); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($designation)): ?>
                              <p><?php echo esc_html($designation); ?></p>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
              <div class="swiper-pagination"></div>
              <div class="swiper-button-prev swiper-btn-prev-2"></div>
              <div class="swiper-button-next swiper-btn-next-2"></div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

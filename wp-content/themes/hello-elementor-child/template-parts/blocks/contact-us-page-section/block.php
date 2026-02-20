<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'contact-us-page-section-section');

$title = !empty(get_field('title')) ? get_field('title') : '';
$subtitle = !empty(get_field('subtitle')) ? get_field('subtitle') : '';
$whats_next_title = !empty(get_field('whats_next_title')) ? get_field('whats_next_title') : '';
$email_address = !empty(get_field('email_address')) ? get_field('email_address') : '';
$email_label = !empty(get_field('email_label')) ? get_field('email_label') : '';
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?>">
  <div class="container">
    <div class="contact-us-page-section-inner bm-display-flex bm-flex-direction-column bm-align-items-center bm-gap-40-2 bm-gap-60 bm-gap-30-4">
      <div class="contact-us-page-section-header bm-display-flex bm-flex-direction-column bm-justify-content-center bm-align-items-center bm-gap-15 bm-align-items-flex-start">
        <?php if (!empty($title)): ?>
          <h2 class="contact-us-page-section-title bm-font-family-poppins-sans-ser bm-font-weight-400 bm-text-align-left bm-color-112446 bm-margin-0"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitle)): ?>
          <p class="contact-us-page-section-subtitle bm-font-family-poppins-sans-ser bm-font-weight-400 bm-text-align-left bm-margin-0 bm-line-height-1-5 bm-color-313f58 bm-font-size-16-2 bm-font-size-18 bm-font-size-15"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
      </div>
      <div class="contact-us-page-section-content bm-display-flex bm-flex-direction-row bm-gap-40-2 bm-flex-direction-column-2 bm-gap-40-3">
        <div class="contact-us-page-section-form-card bm-card-02d0">
          <div class="contact-us-page-section-form-wrapper bm-display-flex bm-flex-direction-column bm-padding-30px-22px bm-gap-18">
            <?php
              $form_code = !empty(get_field('form_code')) ? get_field('form_code') : '';
              if (!empty($form_code)):
            ?>
              <?php echo do_shortcode($form_code); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="contact-us-page-section-info-col bm-display-flex bm-flex-direction-column bm-gap-20">
          <div class="contact-us-page-section-info-wrapper bm-flex-col-6 bm-display-flex bm-flex-direction-column bm-gap-20">
            <div class="contact-us-page-section-whats-next bm-display-flex bm-flex-direction-column bm-gap-30">
              <?php if (!empty($whats_next_title)): ?>
                <h3 class="contact-us-page-section-whats-next-title bm-font-family-poppins-sans-ser bm-font-weight-400 bm-text-align-left bm-color-112446 bm-margin-0"><?php echo esc_html($whats_next_title); ?></h3>
              <?php endif; ?>
              <?php if (have_rows('steps')): ?>
                <div class="contact-us-page-section-steps bm-display-flex bm-flex-direction-column bm-gap-15">
                  <?php while (have_rows('steps')): the_row();
                    $step_title = !empty(get_sub_field('step_title')) ? get_sub_field('step_title') : '';
                    $step_description = !empty(get_sub_field('step_description')) ? get_sub_field('step_description') : '';
                    $step_extra_text = !empty(get_sub_field('step_extra_text')) ? get_sub_field('step_extra_text') : '';
                  ?>
                    <div class="contact-us-page-section-step bm-flex-col-5 bm-display-flex bm-flex-direction-column bm-gap-10">
                      <?php if (!empty($step_title)): ?>
                        <h4 class="contact-us-page-section-step-title bm-heading-h5 bm-font-family-poppins-sans-ser bm-line-height-1-4 bm-font-size-20 bm-font-weight-400 bm-text-align-left bm-color-112446 bm-margin-0 bm-font-size-18-2 bm-font-size-16-3"><?php echo wp_kses_post($step_title); ?></h4>
                      <?php endif; ?>
                      <?php if (!empty($step_extra_text)): ?>
                        <div class="contact-us-page-section-step-details bm-display-flex bm-flex-direction-column bm-gap-8">
                          <?php if (!empty($step_description)): ?>
                            <p class="contact-us-page-section-step-desc bm-font-family-poppins-sans-ser bm-font-weight-400 bm-text-align-left bm-margin-0 bm-line-height-1-5 bm-color-313f58 bm-font-size-16-2 bm-font-size-18 bm-font-size-15"><?php echo wp_kses_post($step_description); ?></p>
                          <?php endif; ?>
                          <p class="contact-us-page-section-step-desc"><?php echo wp_kses_post($step_extra_text); ?></p>
                        </div>
                      <?php else: ?>
                        <?php if (!empty($step_description)): ?>
                          <p class="contact-us-page-section-step-desc"><?php echo esc_html($step_description); ?></p>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
            <?php if (!empty($email_address)): ?>
              <a href="mailto:<?php echo esc_attr($email_address); ?>" class="contact-us-page-section-email-link bm-font-family-poppins-sans-ser bm-text-align-left bm-color-112446 bm-font-size-18 bm-font-size-16-3 bm-color-13367d"><?php echo esc_html($email_label); ?></a>
            <?php endif; ?>
          </div>
          <?php if (have_rows('social_links')): ?>
            <div class="contact-us-page-section-social-icons bm-display-flex bm-gap-10 bm-align-items-center bm-flex-direction-row">
              <?php while (have_rows('social_links')): the_row();
                $social_url = !empty(get_sub_field('url')) ? get_sub_field('url') : '#';
                $social_platform = !empty(get_sub_field('platform')) ? get_sub_field('platform') : '';
                $social_icon = !empty(get_sub_field('icon')) ? get_sub_field('icon') : '';
              ?>
                <a href="<?php echo esc_url($social_url); ?>" class="contact-us-page-section-social-icon contact-us-page-section-social-<?php echo esc_attr($social_platform); ?> bm-display-flex bm-justify-content-center bm-align-items-center" aria-label="<?php echo esc_attr(ucfirst($social_platform)); ?>" target="_blank" rel="noopener noreferrer">
                  <?php if (!empty($social_icon)): ?>
                    <img src="<?php echo esc_url($social_icon); ?>" alt="<?php echo esc_attr(ucfirst($social_platform)); ?>" width="20" height="20" />
                  <?php endif; ?>
                </a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Contact Section Block Template
 *
 * @package theme
 */

// Get ACF fields with safety checks
$show_heading_subheading = get_field('show_heading_subheading');
$heading = get_field('heading');
$subheading = get_field('subheading');
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$email_address = get_field('email_address');
$email_button_text = get_field('email_button_text');
$custom_code = get_field('custom_code');
$wrapper = theme_get_block_wrapper_attributes($block, 'contact-section-section');

?>

<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">

  <?php if (!empty($show_heading_subheading) && (!empty($heading) || !empty($subheading))): ?>
          <div class="contact-section-hero-heading">
            <?php if (!empty($heading)): ?>
              <h2 class="contact-section-hero-title"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
            <?php if (!empty($subheading)): ?>
              <p class="contact-section-hero-subheading"><?php echo wp_kses_post($subheading); ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        
    <div class="contact-section-wrapper">
      <!-- Left Column - Content -->
      <div class="contact-section-content">

        <div class="contact-section-header">
          <?php if (!empty($section_title)): ?>
            <h2 class="contact-section-title"><?php echo esc_html($section_title); ?></h2>
          <?php endif; ?>
          <?php if (!empty($section_description)): ?>
            <p class="contact-section-description"><?php echo esc_html($section_description); ?></p>
          <?php endif; ?>
        </div>
        
        <div class="contact-section-benefits">
          <?php if (have_rows('benefits')): ?>
            <div class="contact-section-benefits-list">
              <?php while (have_rows('benefits')): the_row(); 
                $benefit_icon = get_sub_field('icon');
                $benefit_text = get_sub_field('text');
              ?>
                <div class="contact-section-benefit-item">
                  <?php if (!empty($benefit_icon)): ?>
                    <img class="contact-section-tick-icon" width="38" height="38" alt="Checkmark icon" src="<?php echo esc_url($benefit_icon); ?>">
                  <?php endif; ?>
                  <?php if (!empty($benefit_text)): ?>
                    <span class="contact-section-benefit-text"><?php echo esc_html($benefit_text); ?></span>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          
          <?php if (!empty($email_address)): ?>
            <div class="contact-section-email-cta">
              <a href="mailto:<?php echo esc_attr($email_address); ?>" class="contact-section-email-button">
                <span class="contact-section-email-icon">
                  <img src="/assets/get-in-touch-mail.svg" alt="mail img">
                </span>
                <span class="contact-section-email-text"><?php echo !empty($email_button_text) ? esc_html($email_button_text) : esc_html($email_address); ?></span>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Right Column - Custom Form Code -->
      <div class="contact-section-form-wrapper">
        <div class="contact-section-form-card">
          <?php if (!empty($custom_code)): ?>
            <div class="contact-section-custom-form">
              <?php 
              // Output custom code - allows shortcodes and HTML
              // Use do_shortcode to process WordPress shortcodes
              echo do_shortcode($custom_code);
              ?>
            </div>
          <?php else: ?>
            <div class="contact-section-no-form">
              <p><?php _e('Please add custom form code in the block settings.', 'textdomain'); ?></p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

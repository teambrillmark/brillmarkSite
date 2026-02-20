<?php
/**
 * Why Choose Section Block Template
 *
 * @package theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ACF-ANNOTATED: true -->
<section class="why-choose-section">
  <div class="container">
    <div class="why-choose-section__wrapper">
      <div class="why-choose-section__header">
        <div class="why-choose-section__title-wrapper">
          <?php if (!empty(get_field('title_light'))): ?>
            <span class="why-choose-section__title-light"><?php echo esc_html(get_field('title_light')); ?></span>
          <?php endif; ?>
          <?php if (!empty(get_field('title_bold'))): ?>
            <span class="why-choose-section__title-bold"><?php echo esc_html(get_field('title_bold')); ?></span>
          <?php endif; ?>
        </div>
        <?php if (!empty(get_field('subtitle'))): ?>
          <p class="why-choose-section__subtitle"><?php echo esc_html(get_field('subtitle')); ?></p>
        <?php endif; ?>
      </div>
      <div class="why-choose-section__content">
        <div class="why-choose-section__cards">
          <?php if (have_rows('feature_cards')): ?>
            <div class="why-choose-section__cards-row why-choose-section__cards-row--top">
              <?php 
              $card_count = 0;
              while (have_rows('feature_cards')): the_row(); 
                $card_count++;
                $is_wide = get_sub_field('is_wide_card');
                
                // First 3 cards go in top row
                if ($card_count <= 3):
              ?>
                <div class="why-choose-section__card<?php echo $is_wide ? ' why-choose-section__card--wide' : ''; ?>">
                  <div class="why-choose-section__card-inner">
                    <div class="why-choose-section__icon-wrapper why-choose-section__icon-wrapper--circle">
                      <div class="why-choose-section__icon-circle"></div>
                      <?php if (!empty(get_sub_field('icon'))): ?>
                        <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="" class="why-choose-section__icon" />
                      <?php else: ?>
                        <svg class="why-choose-section__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 2L15 8L22 9L17 14L18 21L12 18L6 21L7 14L2 9L9 8L12 2Z" fill="#112446"/>
                        </svg>
                      <?php endif; ?>
                    </div>
                    <div class="why-choose-section__card-content">
                      <?php if (!empty(get_sub_field('card_title'))): ?>
                        <h3 class="why-choose-section__card-title"><?php echo esc_html(get_sub_field('card_title')); ?></h3>
                      <?php endif; ?>
                      <?php if (!empty(get_sub_field('card_description'))): ?>
                        <p class="why-choose-section__card-description"><?php echo esc_html(get_sub_field('card_description')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php 
                endif;
              endwhile; 
              ?>
            </div>
            <div class="why-choose-section__cards-row why-choose-section__cards-row--bottom">
              <?php 
              // Reset and loop again for bottom row
              $card_count = 0;
              while (have_rows('feature_cards')): the_row(); 
                $card_count++;
                $is_wide = get_sub_field('is_wide_card');
                
                // Cards 4+ go in bottom row
                if ($card_count > 3):
              ?>
                <div class="why-choose-section__card<?php echo $is_wide ? ' why-choose-section__card--wide' : ''; ?>">
                  <div class="why-choose-section__card-inner">
                    <div class="why-choose-section__icon-wrapper why-choose-section__icon-wrapper--circle">
                      <div class="why-choose-section__icon-circle"></div>
                      <?php if (!empty(get_sub_field('icon'))): ?>
                        <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="" class="why-choose-section__icon" />
                      <?php else: ?>
                        <svg class="why-choose-section__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 2L15 8L22 9L17 14L18 21L12 18L6 21L7 14L2 9L9 8L12 2Z" fill="#112446"/>
                        </svg>
                      <?php endif; ?>
                    </div>
                    <div class="why-choose-section__card-content">
                      <?php if (!empty(get_sub_field('card_title'))): ?>
                        <h3 class="why-choose-section__card-title"><?php echo esc_html(get_sub_field('card_title')); ?></h3>
                      <?php endif; ?>
                      <?php if (!empty(get_sub_field('card_description'))): ?>
                        <p class="why-choose-section__card-description"><?php echo esc_html(get_sub_field('card_description')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php 
                endif;
              endwhile; 
              ?>
              <!-- CTA Card -->
              <div class="why-choose-section__card why-choose-section__card--cta">
                <div class="why-choose-section__cta-content">
                  <?php if (!empty(get_field('cta_text'))): ?>
					<div class="why-choose-section-agency-wrapper">
                        <img src="/assets/Scroller/tick.svg" alt="approval sign" class="tick-mark">
                        <span class="scroller-trusted">Trusted by three of the top 10 CRO agencies.</span>
                    </div>
					<div class="why-choose-section-agency-wrapper">
						<img src="/assets/Scroller/tick.svg" alt="approval sign" class="tick-mark">
						<p class="why-choose-section__cta-text"><?php echo esc_html(get_field('cta_text')); ?></p>
					</div>
                  <?php endif; ?>
                  <?php 
                  $cta_button = get_field('cta_button');
                  if (!empty($cta_button)): 
                    $cta_url = isset($cta_button['url']) ? $cta_button['url'] : '#';
                    $cta_title = isset($cta_button['title']) ? $cta_button['title'] : 'Start Free Trial';
                    $cta_target = isset($cta_button['target']) && $cta_button['target'] ? $cta_button['target'] : '_self';
                  ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="why-choose-section__cta-button" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_title); ?></a>
                  <?php else: ?>
                    <a href="#" class="why-choose-section__cta-button">Start Free Trial</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

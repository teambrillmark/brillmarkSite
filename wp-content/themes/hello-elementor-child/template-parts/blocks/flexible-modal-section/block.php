<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'flexible-modal-section-section');

$title       = get_field('title');
$description = get_field('description');
$check_icon  = get_field('check_icon');
$cards       = get_field('cards');
$background  = get_field('background');

$section_style = '';
if (!empty($background)) {
    $section_style = ' style="background: ' . esc_attr(trim($background)) . ';"';
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> flexible-modal-section-section"<?php echo $section_style; ?>>
  <div class="container">
    <div class="flexible-modal-section-wrapper flex flex-col justify-center items-center gap-10">
      <div class="flexible-modal-section-header flex flex-col items-center">
        <?php if (!empty($title)): ?>
          <h2 class="flexible-modal-section-title text-center m-0 text-primary"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="flexible-modal-section-description text-center m-0 text-secondary"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php if (!empty($cards) && is_array($cards)): ?>
        <div class="flexible-modal-section-cards flex flex-row justify-center gap-8 items-stretch flexible-modal-section-cards--responsive">
          <?php foreach ($cards as $card): ?>
            <div class="flexible-modal-section-card flex gap-3 justify-center items-center flex-row">
              <div class="flexible-modal-section-card-inner flex flex-col gap-5">
                <div class="flexible-modal-section-card-top flex flex-col gap-5">
                  <?php if (!empty($card['card_icon'])): ?>
                    <div class="flexible-modal-section-card-icon-wrap">
                      <img
                        src="<?php echo esc_url(is_array($card['card_icon']) ? $card['card_icon']['url'] : $card['card_icon']); ?>"
                        alt="<?php echo esc_attr(is_array($card['card_icon']) ? ($card['card_icon']['alt'] ?: $card['card_title']) : ''); ?>"
                        class="flexible-modal-section-card-icon"
                      >
                    </div>
                  <?php endif; ?>
                  <div class="flexible-modal-section-card-text-wrap flex flex-col gap-3">
                    <?php if (!empty($card['card_title'])): ?>
                      <h3 class="flexible-modal-section-card-title m-0 text-primary text-left"><?php echo esc_html($card['card_title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($card['card_description'])): ?>
                      <p class="flexible-modal-section-card-desc m-0 text-secondary text-left text-body"><?php echo wp_kses_post($card['card_description']); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="flexible-modal-section-card-bottom flex flex-col gap-10">
                  <?php if (!empty($card['features']) && is_array($card['features'])): ?>
                    <div class="flexible-modal-section-features-list flex flex-col gap-3">
                      <?php foreach ($card['features'] as $feature): ?>
                        <div class="flexible-modal-section-feature-item flex items-center flex-row gap-2">
                          <?php if (!empty($check_icon)): ?>
                            <img
                              class="flexible-modal-section-check-icon"
                              src="<?php echo esc_url(is_array($check_icon) ? $check_icon['url'] : $check_icon); ?>"
                              alt="check"
                              width="15"
                              height="15"
                            >
                          <?php endif; ?>
                          <?php if (!empty($feature['feature_text'])): ?>
                            <span class="flexible-modal-section-feature-text text-primary text-left text-body"><?php echo esc_html($feature['feature_text']); ?></span>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                  <?php
                  $btn_text = !empty($card['button_text']) ? $card['button_text'] : 'Learn more';
                  $btn_link = !empty($card['button_link']) ? $card['button_link'] : '#';
                  ?>
                  <a href="<?php echo esc_url($btn_link); ?>" class="flexible-modal-section-card-btn btn btn-primary btn-sm">
                    <span class="flexible-modal-section-card-btn-text text-white"><?php echo esc_html($btn_text); ?></span>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Cards Layout Section — single card type, toggles for badge/icon/CTA, rich text content, section and per-card backgrounds.
 */

$wrapper   = theme_get_block_wrapper_attributes($block, 'cards-layout-section-section');
$variant_id = get_field('variant');
if (empty($variant_id)) {
  $variant_id = 'default';
}
$variant_id = sanitize_html_class($variant_id);

$title     = get_field('title');
$description = get_field('description');
$show_badge = (bool) get_field('show_badge');
$show_icon  = (bool) get_field('show_icon');
$last_card_is_cta = (bool) get_field('last_card_is_cta');
$cta_card_shows_checklist = (bool) get_field('cta_card_shows_checklist');
$section_bg = get_field('section_background');
$cta_button_text = get_field('cta_button_text');
$cta_button_url  = get_field('cta_button_url');
$cta_title       = get_field('cta_title');
$cta_description = get_field('cta_description');

$cards = get_field('cards');
$cards_count = is_array($cards) ? count($cards) : 0;

$section_style = '';
$section_class = $wrapper['class'] . ' cards-layout-section-section cards-layout-section-section--' . $variant_id . ' section';
if (!empty($section_bg)) {
  $section_style = ' style="background: ' . esc_attr($section_bg) . ';"';
} else {
  $section_class .= ' bg-light';
}
?>

<section
  id="<?php echo esc_attr($wrapper['id']); ?>"
  class="<?php echo esc_attr($section_class); ?>"
  data-style-variant="<?php echo esc_attr($variant_id); ?>"
  <?php echo $section_style; ?>
>
  <div class="cards-layout-container container flex flex-col items-center">
    <div class="cards-layout-header flex flex-col items-center gap-10 text-center bm-margin-bottom-space-10">
      <?php if (!empty($title)): ?>
        <h2 class="cards-layout-title component-title text-center text-primary m-0"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($description)): ?>
        <p class="cards-layout-description component-description text-center text-secondary m-0"><?php echo wp_kses_post($description); ?></p>
      <?php endif; ?>
    </div>

    <?php if ($cards_count > 0): ?>
      <div class="cards-layout-grid flex flex-wrap justify-center gap-5 bm-gap-space-5 bm-display-grid">
        <?php
        $row_index = 0;
        foreach ($cards as $card):
          $row_index++;
          $is_last = ($row_index === $cards_count);
          $is_cta_card = $last_card_is_cta && $is_last;

          $badge_text   = isset($card['badge_text']) ? $card['badge_text'] : '';
          $card_icon    = isset($card['card_icon']) && is_array($card['card_icon']) ? $card['card_icon'] : null;
          $card_title   = isset($card['card_title']) ? $card['card_title'] : '';
          $card_content = isset($card['card_content']) ? $card['card_content'] : '';
          $card_bg     = isset($card['card_background']) && $card['card_background'] !== '' ? $card['card_background'] : '';

          $card_style = $card_bg !== '' ? ' style="background: ' . esc_attr($card_bg) . ';"' : '';
          $card_class = 'cards-layout-card flex flex-col justify-center items-center';
          if ($is_cta_card) {
            $card_class .= ' cards-layout-card--cta';
          }
        ?>
          <div class="<?php echo esc_attr($card_class); ?>"<?php echo $card_style; ?>>
            <div class="cards-layout-card-inner flex flex-col justify-center gap-5">
              <?php if ($show_badge && $badge_text !== ''): ?>
                <span class="cards-layout-badge inline-flex justify-center items-center font-normal text-white bm-font-size-fs-small bm-line-height-lh-small"><?php echo esc_html($badge_text); ?></span>
              <?php endif; ?>
              <?php if ($show_icon && $card_icon && !empty($card_icon['url'])): ?>
                <img
                  class="cards-layout-card-icon bm-display-block"
                  src="<?php echo esc_url($card_icon['url']); ?>"
                  alt="<?php echo esc_attr(!empty($card_icon['alt']) ? $card_icon['alt'] : ''); ?>"
                  width="49"
                  height="49"
                >
              <?php endif; ?>
              <div class="cards-layout-card-content flex flex-col gap-10">
                <div class="cards-layout-card-text flex flex-col gap-10">
                  <?php if ($card_title !== ''): ?>
                    <h3 class="cards-layout-card-title text-primary m-0 bm-fw-var-font-wei bm-font-size-fs-h5 bm-line-height-lh-h5 bm-font-weight-font-weight-regular"><?php echo esc_html($card_title); ?></h3>
                  <?php endif; ?>
                  <?php if ($card_content !== ''): ?>
                    <div class="cards-layout-card-desc text-secondary m-0 text-body bm-text-ada5 bm-font-size-fs-body bm-line-height-lh-body"><?php echo wp_kses_post($card_content); ?></div>
                  <?php endif; ?>
                </div>

                <?php if ($is_cta_card): ?>
                  <div class="cards-layout-cta-content flex flex-col gap-10">
                    <?php if ($cta_card_shows_checklist && have_rows('cta_checklist_items')): ?>
                      <ul class="cards-layout-cta-checklist flex flex-col m-0 gap-10 p-0">
                        <?php while (have_rows('cta_checklist_items')): the_row();
                          $item_text = get_sub_field('item_text');
                        ?>
                          <?php if (!empty($item_text)): ?>
                            <li class="flex items-start gap-2">
                              <span class="cards-layout-check-icon text-primary mt-1" aria-hidden="true"><?php echo esc_html('✓'); ?></span>
                              <span><?php echo esc_html($item_text); ?></span>
                            </li>
                          <?php endif; ?>
                        <?php endwhile; ?>
                      </ul>
                    <?php elseif (!$cta_card_shows_checklist): ?>
                      <?php if (!empty($cta_title)): ?>
                        <h3 class="cards-layout-cta-title text-primary m-0 bm-fw-var-font-wei bm-font-size-fs-h5 bm-line-height-lh-h5 bm-font-weight-font-weight-regular"><?php echo esc_html($cta_title); ?></h3>
                      <?php endif; ?>
                      <?php if (!empty($cta_description)): ?>
                        <p class="cards-layout-cta-desc text-primary m-0 text-body bm-text-ada5 bm-font-size-fs-body bm-line-height-lh-body"><?php echo wp_kses_post($cta_description); ?></p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!empty($cta_button_text)): ?>
                      <a href="<?php echo !empty($cta_button_url) ? esc_url($cta_button_url) : '#'; ?>" class="btn btn-primary btn-sm cards-layout-cta-btn inline-flex items-center gap-2">
                        <span><?php echo esc_html($cta_button_text); ?></span>
                        <svg class="cards-layout-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none" aria-hidden="true"><path d="M1 5H17M17 5L13 1M17 5L13 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      </a>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

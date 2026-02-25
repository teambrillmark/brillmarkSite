<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'case-study-section-section');

$title         = get_field('title');
$description   = get_field('description');
$card_title    = get_field('card_title');
$stats         = get_field('stats');
$cta_text      = get_field('cta_text');
$cta_link      = get_field('cta_link');
$card_image    = get_field('card_image');
$content_order = get_field('content_order');

if (empty($content_order)) {
    $content_order = 'default';
}

$content_class = $content_order === 'flipped' ? ' case-study-section-card-content--flipped' : '';

$stats_row_1 = [];
$stats_row_2 = [];
if (!empty($stats) && is_array($stats)) {
    $stats_row_1 = array_slice($stats, 0, 2);
    $stats_row_2 = array_slice($stats, 2);
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> section">
  <div class="container">
    <div class="case-study-section-inner flex flex-col items-center gap-10">
      <div class="case-study-section-header flex flex-col gap-4 items-center">
        <?php if (!empty($title)): ?>
          <h2 class="case-study-section-title text-center m-0 font-weight-light text-primary"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="case-study-section-description text-center m-0 text-h6 text-secondary"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>
      <div class="case-study-section-card-group">
        <div class="case-study-section-card flex flex-col gap-4 justify-center items-center">
          <div class="case-study-section-card-content<?php echo esc_attr($content_class); ?>">
            <div class="case-study-section-card-text flex flex-col gap-10">
              <?php if (!empty($card_title)): ?>
                <h3 class="case-study-section-card-title m-0 text-left text-primary"><?php echo esc_html($card_title); ?></h3>
              <?php endif; ?>
              <?php if (!empty($stats_row_1) || !empty($stats_row_2)): ?>
                <div class="case-study-section-stats-wrapper flex flex-col gap-8">
                  <?php if (!empty($stats_row_1)): ?>
                    <div class="case-study-section-stats-row flex flex-row gap-8">
                      <?php foreach ($stats_row_1 as $stat): ?>
                        <div class="case-study-section-stat-item flex flex-col gap-4 items-center">
                          <?php if (!empty($stat['stat_label'])): ?>
                            <span class="case-study-section-stat-label text-left text-primary text-h6"><?php echo esc_html($stat['stat_label']); ?></span>
                          <?php endif; ?>
                          <?php if (!empty($stat['stat_value'])): ?>
                            <span class="case-study-section-stat-value text-left text-secondary"><?php echo esc_html($stat['stat_value']); ?></span>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($stats_row_2)): ?>
                    <div class="case-study-section-stats-row flex flex-row gap-8">
                      <?php foreach ($stats_row_2 as $stat): ?>
                        <div class="case-study-section-stat-item flex flex-col gap-4 items-center">
                          <?php if (!empty($stat['stat_label'])): ?>
                            <span class="case-study-section-stat-label text-primary text-h6"><?php echo esc_html($stat['stat_label']); ?></span>
                          <?php endif; ?>
                          <?php if (!empty($stat['stat_value'])): ?>
                            <span class="case-study-section-stat-value text-secondary"><?php echo esc_html($stat['stat_value']); ?></span>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if (!empty($cta_text) || !empty($cta_link)): ?>
                <a href="<?php echo !empty($cta_link) ? esc_url($cta_link) : '#'; ?>" class="case-study-section-cta btn btn-primary flex items-center justify-center gap-4">
                  <span class="case-study-section-cta-text text-white"><?php echo !empty($cta_text) ? esc_html($cta_text) : esc_html__('Read Full Case Study', 'theme'); ?></span>
                </a>
              <?php endif; ?>
            </div>
            <?php if (!empty($card_image)): ?>
              <?php
                $img_url = is_array($card_image) ? ($card_image['url'] ?? '') : (string) $card_image;
                $img_alt = is_array($card_image) ? ($card_image['alt'] ?? 'Case study image') : 'Case study image';
              ?>
              <img class="case-study-section-card-image" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

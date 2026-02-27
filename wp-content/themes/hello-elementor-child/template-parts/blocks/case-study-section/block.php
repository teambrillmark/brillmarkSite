<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'case-study-section-section');

$title         = get_field('title');
$description   = get_field('description');
$case_studies  = get_field('case_studies');

$slide_count = !empty($case_studies) && is_array($case_studies) ? count($case_studies) : 0;

$swiper_options = [
    'slidesPerView'          => 1,
    'spaceBetween'           => 24,
    'loop'                   => $slide_count > 1,
    'speed'                  => 600,
    'navigationNextSelector' => '.case-study-section-slider-next',
    'navigationPrevSelector' => '.case-study-section-slider-prev',
    'breakpoints'            => [
        768  => ['slidesPerView' => 1],
        1024 => ['slidesPerView' => 1],
    ],
];
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> case-study-section-section section">
  <div class="container">
    <div class="case-study-section-inner flex flex-col items-center gap-10">
      <div class="case-study-section-header flex flex-col gap-4 items-center">
        <?php if (!empty($title)): ?>
          <h2 class="case-study-section-title text-center m-0 font-weight-light text-primary"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="case-study-section-description text-center m-0 text-h6 text-secondary bm-line-height-1-6"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php if ($slide_count > 0): ?>
      <div class="case-study-section-card-group case-study-section-slider-wrap">
        <div class="swiper case-study-section-slider" data-swiper="<?php echo esc_attr(wp_json_encode($swiper_options)); ?>">
          <div class="swiper-wrapper">
            <?php foreach ($case_studies as $index => $slide): ?>
              <?php
              $card_title   = $slide['card_title'] ?? '';
              $stats        = isset($slide['stats']) && is_array($slide['stats']) ? $slide['stats'] : [];
              $cta_text     = $slide['cta_text'] ?? '';
              $cta_link     = $slide['cta_link'] ?? '';
              $card_image   = $slide['card_image'] ?? null;
              $content_order = !empty($slide['content_order']) ? $slide['content_order'] : 'default';
              $content_class = $content_order === 'flipped' ? ' case-study-section-card-content--flipped' : '';

              $stats_row_1 = array_slice($stats, 0, 2);
              $stats_row_2 = array_slice($stats, 2);
              ?>
              <div class="swiper-slide">
                <div class="case-study-section-card flex flex-col gap-4 justify-center items-center">
                  <div class="case-study-section-card-content<?php echo esc_attr($content_class); ?>">
                    <div class="case-study-section-card-text flex flex-col gap-10">
                      <?php if ($card_title !== ''): ?>
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
                      <?php if ($cta_text !== '' || $cta_link !== ''): ?>
                        <a href="<?php echo $cta_link !== '' ? esc_url($cta_link) : '#'; ?>" class="case-study-section-cta btn btn-primary flex items-center justify-center gap-4">
                          <span class="case-study-section-cta-text text-white"><?php echo $cta_text !== '' ? esc_html($cta_text) : esc_html__('Read Full Case Study', 'theme'); ?></span>
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
            <?php endforeach; ?>
          </div>
          <button type="button" class="case-study-section-slider-prev swiper-button-prev" aria-label="<?php esc_attr_e('Previous', 'theme'); ?>"></button>
          <button type="button" class="case-study-section-slider-next swiper-button-next" aria-label="<?php esc_attr_e('Next', 'theme'); ?>"></button>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ACF-ANNOTATED: true -->
<?php
$wrapper       = theme_get_block_wrapper_attributes($block, 'our-service-section-section');
$section_title = get_field('section_title');
$check_icon    = get_field('check_icon');
$left_decor    = get_field('left_decorative_image');
$right_decor   = get_field('right_decorative_image');
$services      = get_field('services');
$block_id      = $wrapper['id'];

$first_cta_text = '';
$first_cta_link = '#';
if (!empty($services) && isset($services[0])) {
    $first_cta_text = $services[0]['cta_text'] ?? '';
    $first_cta_link = $services[0]['cta_link'] ?? '#';
}

$swiper_options = [
    'slidesPerView'               => 1,
    'spaceBetween'                => 0,
    'loop'                        => false,
    'allowTouchMove'              => true,
    'navigationNextSelector'      => '.our-service-section-nav-next',
    'navigationPrevSelector'     => '.our-service-section-nav-prev',
];
$swiper_options_json = wp_json_encode($swiper_options);
?>
<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr( str_replace( 'our-service-section-section', 'our-service-section', $wrapper['class'] ) ); ?> section bg-light">
  <div class="container">
    <div class="our-service-section-wrapper flex flex-col items-center justify-center gap-10">
      <div class="our-service-section-header flex flex-col items-center justify-center gap-5">
        <div class="our-service-section-title-wrap flex flex-col items-center justify-center gap-5">
          <?php if (!empty($section_title)): ?>
            <h2 class="our-service-section-title text-center text-primary m-0 bm-text-transform-capitalize bm-font-size-fs-h2 bm-font-weight-font-weight-light bm-line-height-lh-h2"><?php echo esc_html($section_title); ?></h2>
          <?php endif; ?>
        </div>
        <?php if (!empty($services)): ?>
        <div class="our-service-section-tabs-outer">
          <div class="our-service-section-tabs-area flex flex-row flex-wrap items-center justify-center gap-5" role="tablist">
            <?php foreach ($services as $i => $service): ?>
              <button
                class="our-service-section-tab text-white <?php echo $i === 0 ? ' active' : ''; ?>"
                role="tab"
                aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                data-tab-index="<?php echo (int) $i; ?>"
                type="button"
                id="<?php echo esc_attr($block_id); ?>-tab-<?php echo (int) $i; ?>"
                aria-controls="<?php echo esc_attr($block_id); ?>-panel-<?php echo (int) $i; ?>"
              >
                <span class="our-service-section-tab-label text-white bm-font-size-fs-small"><?php echo esc_html($service['tab_label'] ?? ''); ?></span>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <?php if (!empty($services)): ?>
      <div class="our-service-section-slider flex flex-col items-center justify-center gap-10">
        <div class="our-service-section-slider-row flex flex-row justify-center items-stretch gap-5 bm-display-flex bm-flex-direction-row bm-justify-content-center bm-flex-direction-column-2 bm-gap-space-8 bm-align-items-stretch bm-gap-space-5-3 bm-flex-wrap-nowrap">
          <?php if (!empty($left_decor)): ?>
            <img class="our-service-section-decor-left" src="<?php echo esc_url($left_decor); ?>" alt="" aria-hidden="true" width="100" height="509" />
          <?php endif; ?>

          <div class="swiper our-service-section-swiper" data-swiper="<?php echo esc_attr($swiper_options_json); ?>">
            <div class="swiper-wrapper bm-align-items-stretch bm-display-flex-2 bm-flex-direction-column-2 bm-gap-space-10-2 bm-gap-space-8">
              <?php foreach ($services as $i => $service):
                $srv_title    = $service['service_title'] ?? '';
                $srv_image    = $service['service_image'] ?? null;
                $srv_cta_text = $service['cta_text'] ?? '';
                $srv_cta_link = $service['cta_link'] ?? '#';
                $srv_features = $service['features'] ?? [];
                $tab_label    = $service['tab_label'] ?? $srv_title;
              ?>
              <div class="swiper-slide<?php echo $i === 0 ? ' swiper-slide--open' : ''; ?>" data-slide-index="<?php echo (int) $i; ?>">
                <button
                  type="button"
                  class="our-service-section-panel-mobile-trigger bm-display-none bm-display-none-2"
                  data-panel-index="<?php echo (int) $i; ?>"
                  aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                  aria-controls="<?php echo esc_attr($block_id); ?>-panel-<?php echo (int) $i; ?>"
                  id="<?php echo esc_attr($block_id); ?>-accordion-trigger-<?php echo (int) $i; ?>"
                >
                  <span class="our-service-section-panel-mobile-trigger-label"><?php echo esc_html($tab_label); ?></span>
                  <span class="our-service-section-panel-mobile-trigger-chevron" aria-hidden="true"></span>
                </button>
                <div
                  class="our-service-section-panel bm-display-flex bm-flex-direction-column bm-align-items-center bm-justify-content-center bm-gap-10 bm-display-flex-2 mb-10"
                  role="tabpanel"
                  data-panel-index="<?php echo (int) $i; ?>"
                  data-cta-text="<?php echo esc_attr($srv_cta_text); ?>"
                  data-cta-link="<?php echo esc_url($srv_cta_link); ?>"
                  id="<?php echo esc_attr($block_id); ?>-panel-<?php echo (int) $i; ?>"
                  aria-labelledby="<?php echo esc_attr($block_id); ?>-tab-<?php echo (int) $i; ?>"
                >
                  <div class="our-service-section-panel-inner flex flex-col items-center gap-5">
                    <div class="our-service-section-panel-body flex flex-col items-center gap-10 bm-gap-space-5-2">
                      <?php if (!empty($srv_title)): ?>
                      <div class="our-service-section-panel-title-wrap flex flex-col items-center">
                        <h3 class="our-service-section-panel-title text-center text-primary m-0 bm-font-size-fs-h3 bm-line-height-lh-h3"><?php echo esc_html($srv_title); ?></h3>
                      </div>
                      <?php endif; ?>
                      <div class="our-service-section-panel-columns flex items-center justify-center gap-15 bm-flex-direction-column-2 bm-gap-30 bm-gap-60-2">
                        <?php if (!empty($srv_image)): ?>
                          <img
                            class="our-service-section-panel-image"
                            src="<?php echo esc_url(is_array($srv_image) ? ($srv_image['url'] ?? '') : $srv_image); ?>"
                            alt="<?php echo esc_attr(is_array($srv_image) ? ($srv_image['alt'] ?? $srv_title) : $srv_title); ?>"
                            width="400"
                            height="400"
                          />
                        <?php endif; ?>
                        <?php if (!empty($srv_features)): ?>
                        <div class="our-service-section-features-list flex flex-col gap-5">
                          <?php foreach ($srv_features as $feature):
                            $f_title = $feature['feature_title'] ?? '';
                            $f_desc  = $feature['feature_description'] ?? '';
                          ?>
                          <div class="our-service-section-feature-item flex gap-3">
                            <?php if (!empty($check_icon)): ?>
                              <?php $check_icon_url = is_array($check_icon) ? ($check_icon['url'] ?? '') : $check_icon; ?>
                              <img class="our-service-section-check-icon" src="<?php echo esc_url($check_icon_url); ?>" alt="" aria-hidden="true" width="15" height="15" />
                            <?php endif; ?>
                            <div class="our-service-section-feature-content flex flex-col justify-center bm-gap-5 bm-util-2863">
                              <?php if (!empty($f_title)): ?>
                                <h5 class="our-service-section-feature-title text-primary m-0"><?php echo esc_html($f_title); ?></h5>
                              <?php endif; ?>
                              <?php if (!empty($f_desc)): ?>
                                <p class="our-service-section-feature-desc text-secondary m-0 text-body"><?php echo wp_kses_post($f_desc); ?></p>
                              <?php endif; ?>
                            </div>
                          </div>
                          <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <?php if (!empty($srv_cta_text)): ?>
                <div class="our-service-section-panel-cta flex justify-center mobile-cta">
                  <a class="our-service-section-cta btn btn-primary" href="<?php echo esc_url($srv_cta_link); ?>">
                    <span class="our-service-section-cta-text text-white"><?php echo esc_html($srv_cta_text); ?></span>
                  </a>
                </div>
                <?php endif; ?>
                </div>
                <?php if (!empty($srv_cta_text)): ?>
                <div class="our-service-section-panel-cta flex justify-center desktop-cta">
                  <a class="our-service-section-cta btn btn-primary" href="<?php echo esc_url($srv_cta_link); ?>">
                    <span class="our-service-section-cta-text text-white"><?php echo esc_html($srv_cta_text); ?></span>
                  </a>
                </div>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
            <button class="our-service-section-nav-prev" aria-label="<?php esc_attr_e('Previous service', 'textdomain'); ?>" type="button">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <button class="our-service-section-nav-next bm-padding-0 bm-display-none-2 bm-display-none" aria-label="<?php esc_attr_e('Next service', 'textdomain'); ?>" type="button">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
          </div>

          <?php if (!empty($right_decor)): ?>
            <img class="our-service-section-decor-right" src="<?php echo esc_url($right_decor); ?>" alt="" aria-hidden="true" width="100" height="509" />
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

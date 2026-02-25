<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'service-section-section');

$section_title       = get_field('section_title');
$section_description = get_field('section_description');
$services            = get_field('services');
?>

<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> section">
  <div class="container">
    <div class="service-section-inner flex flex-col items-center gap-10">
      <div class="service-section-header flex flex-col gap-4 justify-center items-center">
        <?php if (!empty($section_title)): ?>
          <h2 class="service-section-title font-weight-light text-center text-primary m-0"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($section_description)): ?>
          <p class="service-section-description text-center m-0 text-h6 text-secondary"><?php echo wp_kses_post($section_description); ?></p>
        <?php endif; ?>
      </div>

      <?php if (!empty($services) && is_array($services)): ?>
        <div class="service-section-content flex flex-row gap-8 items-start">
          <!-- Tab navigation (left column - desktop) -->
          <div class="service-section-tabs flex flex-col gap-4" role="tablist" aria-label="<?php echo esc_attr($section_title ?: 'Services'); ?>">
            <?php foreach ($services as $index => $service): ?>
              <?php
                $tab_title  = !empty($service['tab_title']) ? $service['tab_title'] : '';
                $is_active  = ($index === 0) ? ' active' : '';
                $panel_id   = 'service-panel-' . $wrapper['id'] . '-' . $index;
                $tab_id     = 'service-tab-' . $wrapper['id'] . '-' . $index;
              ?>
              <div class="service-section-tab-item<?php echo $is_active; ?>"
                   data-tab="<?php echo esc_attr($index); ?>"
                   role="tab"
                   id="<?php echo esc_attr($tab_id); ?>"
                   aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                   aria-controls="<?php echo esc_attr($panel_id); ?>"
                   tabindex="<?php echo $index === 0 ? '0' : '-1'; ?>">
                <div class="service-section-tab-inner flex items-center flex-row justify-between">
                  <?php if (!empty($tab_title)): ?>
                    <span class="service-section-tab-title text-primary text-h6 text-left"><?php echo esc_html($tab_title); ?></span>
                  <?php endif; ?>
                  <div class="service-section-tab-arrow-wrap flex gap-4 justify-center items-center flex-row">
                    <svg class="service-section-tab-arrow text-primary" width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path d="M1 1L5 5.5L1 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Content panels (right column) -->
          <div class="service-section-panels-wrapper flex flex-col gap-4">
            <?php foreach ($services as $index => $service): ?>
              <?php
                $panel_title = !empty($service['panel_title']) ? $service['panel_title'] : '';
                $panel_desc  = !empty($service['panel_description']) ? $service['panel_description'] : '';
                $bullets     = !empty($service['bullet_points']) ? $service['bullet_points'] : [];
                $cta_text    = !empty($service['cta_text']) ? $service['cta_text'] : '';
                $cta_url     = !empty($service['cta_url']) ? $service['cta_url'] : '#';
                $is_active   = ($index === 0) ? ' active' : '';
                $panel_id    = 'service-panel-' . $wrapper['id'] . '-' . $index;
                $tab_id      = 'service-tab-' . $wrapper['id'] . '-' . $index;
              ?>
              <div class="service-section-panel<?php echo $is_active; ?>"
                   data-panel="<?php echo esc_attr($index); ?>"
                   role="tabpanel"
                   id="<?php echo esc_attr($panel_id); ?>"
                   aria-labelledby="<?php echo esc_attr($tab_id); ?>"
                   <?php echo $index !== 0 ? 'hidden' : ''; ?>>
                <div class="service-section-panel-inner flex flex-col items-center gap-10">
                  <div class="service-section-panel-content flex flex-col items-center">
                    <div class="service-section-panel-header flex flex-col gap-4 items-center">
                      <?php if (!empty($panel_title)): ?>
                        <h3 class="service-section-panel-title text-primary m-0 text-left"><?php echo esc_html($panel_title); ?></h3>
                      <?php endif; ?>
                      <?php if (!empty($panel_desc)): ?>
                        <p class="service-section-panel-desc text-secondary m-0 text-body text-left"><?php echo wp_kses_post($panel_desc); ?></p>
                      <?php endif; ?>
                    </div>

                    <?php if (!empty($bullets) && is_array($bullets)): ?>
                      <div class="service-section-panel-bullets flex flex-col gap-4">
                        <?php foreach ($bullets as $bullet): ?>
                          <?php if (!empty($bullet['bullet_text'])): ?>
                            <div class="service-section-bullet-item flex gap-4 flex-row">
                              <div class="service-section-bullet-dot-wrap flex gap-4 flex-row items-start">
                                <span class="service-section-bullet-dot"></span>
                              </div>
                              <span class="service-section-bullet-text text-secondary text-left text-body"><?php echo esc_html($bullet['bullet_text']); ?></span>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <?php if (!empty($cta_text)): ?>
                    <a class="service-section-cta btn btn-primary flex justify-center items-center gap-4" href="<?php echo esc_url($cta_url); ?>">
                      <span class="service-section-cta-text text-white text-body"><?php echo esc_html($cta_text); ?></span>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

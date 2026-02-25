<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'optimization-tab-section-section');

$title       = get_field('title');
$description = get_field('description');
$tabs        = get_field('tabs');
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> optimization-tab-section-section section">
  <div class="container flex flex-col items-center gap-2">
    <div class="optimization-tab-section-wrapper flex flex-col items-center gap-10">
      <div class="optimization-tab-section-header flex flex-col items-center gap-10">
        <div class="optimization-tab-section-heading-group flex flex-col items-center gap-2">
          <?php if (!empty($title)): ?>
            <h2 class="optimization-tab-section-title text-center text-primary m-0"><?php echo esc_html($title); ?></h2>
          <?php endif; ?>
          <?php if (!empty($description)): ?>
            <p class="optimization-tab-section-description text-center m-0 text-secondary"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
        </div>
      </div>

      <?php if (!empty($tabs) && is_array($tabs)): ?>
        <div class="optimization-tab-section-content flex flex-col">
          <div class="optimization-tab-section-tabs-strip flex flex-row items-stretch">
            <button type="button" class="optimization-tab-section-tabs-scroll-prev" aria-label="<?php esc_attr_e('Scroll tabs left', 'textdomain'); ?>">
              <span class="optimization-tab-section-tabs-scroll-circle flex items-center justify-center">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 1L3 6L8 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </button>
            <div class="optimization-tab-section-tabs-nav-wrapper">
              <div class="optimization-tab-section-tabs-nav flex flex-row items-center" role="tablist">
            <?php foreach ($tabs as $i => $tab): ?>
              <?php
              $tab_label = isset($tab['tab_label']) ? $tab['tab_label'] : '';
              $is_active = ($i === 0) ? ' active' : '';
              $aria_sel  = ($i === 0) ? 'true' : 'false';
              $tab_id    = 'opt-tab-' . $i;
              $panel_id  = 'opt-panel-' . $i;
              ?>
              <?php if (!empty($tab_label)): ?>
                <button
                  class="optimization-tab-section-tab<?php echo $is_active; ?>"
                  role="tab"
                  aria-selected="<?php echo $aria_sel; ?>"
                  data-tab="<?php echo esc_attr($i); ?>"
                  id="<?php echo esc_attr($tab_id); ?>"
                  aria-controls="<?php echo esc_attr($panel_id); ?>"
                >
                  <span class="optimization-tab-section-tab-label text-center text-primary"><?php echo esc_html($tab_label); ?></span>
                </button>
              <?php endif; ?>
            <?php endforeach; ?>
              </div>
            </div>
            <button type="button" class="optimization-tab-section-tabs-scroll-next" aria-label="<?php esc_attr_e('Scroll tabs right', 'textdomain'); ?>">
              <span class="optimization-tab-section-tabs-scroll-circle flex items-center justify-center">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 1L9 6L4 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </button>
          </div>

          <?php foreach ($tabs as $i => $tab): ?>
            <?php
            $is_active_panel = ($i === 0) ? ' active' : '';
            $tab_label       = isset($tab['tab_label']) ? $tab['tab_label'] : '';
            $old_label       = isset($tab['old_label']) ? $tab['old_label'] : '';
            $old_description = isset($tab['old_description']) ? $tab['old_description'] : '';
            $old_image       = isset($tab['old_image']) ? $tab['old_image'] : null;
            $new_label       = isset($tab['new_label']) ? $tab['new_label'] : '';
            $new_description = isset($tab['new_description']) ? $tab['new_description'] : '';
            $new_image       = isset($tab['new_image']) ? $tab['new_image'] : null;
            $tab_id          = 'opt-tab-' . $i;
            $panel_id        = 'opt-panel-' . $i;
            $aria_expanded   = ($i === 0) ? 'true' : 'false';
            ?>
            <div
              class="optimization-tab-section-tab-panel<?php echo $is_active_panel; ?>"
              role="tabpanel"
              data-panel="<?php echo esc_attr($i); ?>"
              id="<?php echo esc_attr($panel_id); ?>"
              aria-labelledby="<?php echo esc_attr($tab_id); ?>"
            >
              <?php if (!empty($tab_label)): ?>
                <button class="optimization-tab-section-panel-mobile-title bm-display-none bm-display-flex-2 bm-align-items-center-2 bm-justify-content-space-between bm-text-align-left-2" aria-expanded="<?php echo esc_attr($aria_expanded); ?>"><?php echo esc_html($tab_label); ?></button>
              <?php endif; ?>
              <div class="optimization-tab-section-panels flex flex-row items-start justify-between bm-flex-direction-column-2">
                <div class="optimization-tab-section-panel-old flex flex-col gap-2 bm-padding-space-15">
                  <div class="optimization-tab-section-panel-inner flex flex-col items-center justify-center gap-2">
                    <div class="optimization-tab-section-panel-body flex flex-col items-center gap-10">
                      <div class="optimization-tab-section-panel-text-group flex flex-col items-center gap-5">
                        <?php if (!empty($old_label)): ?>
                          <h3 class="optimization-tab-section-panel-label text-center text-primary m-0"><?php echo esc_html($old_label); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($old_description)): ?>
                          <p class="optimization-tab-section-panel-desc text-center m-0 text-secondary"><?php echo wp_kses_post($old_description); ?></p>
                        <?php endif; ?>
                      </div>
                      <?php if (!empty($old_image)): ?>
                        <img
                          class="optimization-tab-section-panel-image"
                          src="<?php echo esc_url($old_image['url']); ?>"
                          alt="<?php echo esc_attr(!empty($old_image['alt']) ? $old_image['alt'] : $old_label . ' - old design'); ?>"
                          loading="lazy"
                        >
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="optimization-tab-section-panel-new flex flex-col gap-2 bm-padding-space-15">
                  <div class="optimization-tab-section-new-body flex flex-col items-center gap-10 justify-center">
                    <div class="optimization-tab-section-new-text-group flex flex-col items-center gap-5">
                      <?php if (!empty($new_label)): ?>
                        <h3 class="optimization-tab-section-panel-label"><?php echo esc_html($new_label); ?></h3>
                      <?php endif; ?>
                      <?php if (!empty($new_description)): ?>
                        <p class="optimization-tab-section-panel-desc"><?php echo wp_kses_post($new_description); ?></p>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($new_image)): ?>
                      <img
                        class="optimization-tab-section-panel-image"
                        src="<?php echo esc_url($new_image['url']); ?>"
                        alt="<?php echo esc_attr(!empty($new_image['alt']) ? $new_image['alt'] : $new_label . ' - new design'); ?>"
                        loading="lazy"
                      >
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="optimization-tab-section-nav flex flex-row items-center justify-center bm-display-none-2">
      <button class="optimization-tab-section-nav-prev disabled" aria-label="Previous tab" type="button">
        <span class="optimization-tab-section-nav-circle flex items-center justify-center">
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 1L3 6L8 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
      </button>
      <button class="optimization-tab-section-nav-next p-0" aria-label="Next tab" type="button">
        <span class="optimization-tab-section-nav-circle flex items-center justify-center">
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 1L9 6L4 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
      </button>
    </div>
  </div>
</section>

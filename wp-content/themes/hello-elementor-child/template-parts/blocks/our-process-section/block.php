<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Our Process Section Block Template
 *
 * @var array $block The block settings and attributes.
 */

$wrapper = theme_get_block_wrapper_attributes($block, 'our-process-section-section');

$title       = get_field('title');
$description = get_field('description');
$check_icon  = get_field('check_icon');
$tabs        = get_field('tabs');
?>

<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> section bg-blue-tint">
  <div class="container">
    <div class="our-process-section-inner flex flex-col items-center gap-10">

      <div class="our-process-section-header flex flex-col items-center text-center gap-10">
        <?php if (!empty($title)): ?>
          <h2 class="our-process-section-title text-primary font-weight-light m-0 bm-font-family-font-primary"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="our-process-section-description text-secondary m-0 bm-font-family-font-primary"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php if (!empty($tabs) && is_array($tabs)): ?>
        <div class="our-process-section-tabs-wrapper">
          <div class="our-process-section-tabs-layout flex flex-col">

            <div class="our-process-section-tab-bar flex flex-row items-center" role="tablist">
              <?php foreach ($tabs as $index => $tab):
                $tab_title = isset($tab['tab_title']) ? $tab['tab_title'] : '';
                $tab_icon  = isset($tab['tab_icon']) ? $tab['tab_icon'] : '';
                $is_active = ($index === 0);
              ?>
                <button
                  class="our-process-section-tab<?php echo $is_active ? ' our-process-section-tab--active' : ''; ?>"
                  role="tab"
                  aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                  data-tab="<?php echo esc_attr($index); ?>"
                >
                  <div class="our-process-section-tab-inner flex flex-col items-center gap-8">
                    <?php if (!empty($tab_icon)): ?>
                      <div class="our-process-section-tab-icon flex items-center justify-center">
                        <img src="<?php echo esc_url($tab_icon); ?>" alt="<?php echo esc_attr($tab_title); ?>">
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($tab_title)): ?>
                      <span class="our-process-section-tab-label text-center"><?php echo esc_html($tab_title); ?></span>
                    <?php endif; ?>
                  </div>
                </button>
              <?php endforeach; ?>
            </div>

            <div class="our-process-section-panel-wrapper">
              <?php foreach ($tabs as $index => $tab):
                $tab_description  = isset($tab['tab_description']) ? $tab['tab_description'] : '';
                $tab_image        = isset($tab['tab_image']) ? $tab['tab_image'] : '';
                $tab_title        = isset($tab['tab_title']) ? $tab['tab_title'] : '';
                $checklist_items  = isset($tab['checklist_items']) ? $tab['checklist_items'] : [];
                $cta_text         = isset($tab['cta_text']) ? $tab['cta_text'] : '';
                $cta_link         = isset($tab['cta_link']) ? $tab['cta_link'] : '#';
                $is_active        = ($index === 0);
              ?>
                <?php $tab_icon = isset($tab['tab_icon']) ? $tab['tab_icon'] : ''; ?>
                <div
                  class="our-process-section-panel<?php echo $is_active ? ' our-process-section-panel--active' : ''; ?>"
                  data-panel="<?php echo esc_attr($index); ?>"
                  role="tabpanel"
                  <?php echo !$is_active ? 'hidden' : ''; ?>
                >
                  <button
                    type="button"
                    class="our-process-section-panel-mobile-trigger"
                    data-panel="<?php echo esc_attr($index); ?>"
                    aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>"
                    aria-controls="our-process-section-panel-content-<?php echo esc_attr($index); ?>"
                    id="our-process-section-panel-trigger-<?php echo esc_attr($index); ?>"
                  >
                    <?php if (!empty($tab_icon)): ?>
                      <span class="our-process-section-panel-mobile-trigger-icon">
                        <img src="<?php echo esc_url($tab_icon); ?>" alt="" width="30" height="30">
                      </span>
                    <?php endif; ?>
                    <?php if (!empty($tab_title)): ?>
                      <span class="our-process-section-panel-mobile-trigger-label"><?php echo esc_html($tab_title); ?></span>
                    <?php endif; ?>
                    <span class="our-process-section-panel-mobile-trigger-chevron" aria-hidden="true"></span>
                  </button>
                  <div
                    id="our-process-section-panel-content-<?php echo esc_attr($index); ?>"
                    class="our-process-section-panel-inner flex flex-row items-center gap-10 bm-flex-direction-column-2"
                    role="region"
                    aria-labelledby="our-process-section-panel-trigger-<?php echo esc_attr($index); ?>"
                  >
                    <?php if (!empty($tab_image)): ?>
                      <div class="our-process-section-panel-image">
                        <img src="<?php echo esc_url($tab_image); ?>" alt="<?php echo esc_attr($tab_title); ?>">
                      </div>
                    <?php endif; ?>

                    <div class="our-process-section-panel-body flex flex-col gap-6 bm-util-2863">
                      <div class="our-process-section-panel-text-group flex flex-col gap-10">
                        <?php if (!empty($tab_description)): ?>
                          <p class="our-process-section-panel-description text-primary m-0 bm-text-ada5 bm-font-size-fs-body bm-line-height-lh-body"><?php echo wp_kses_post($tab_description); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($checklist_items) && is_array($checklist_items)): ?>
                          <div class="our-process-section-checklist flex flex-col gap-5">
                            <?php foreach ($checklist_items as $item):
                              $item_text = isset($item['item_text']) ? $item['item_text'] : '';
                            ?>
                              <?php if (!empty($item_text)): ?>
                                <div class="our-process-section-checklist-item flex flex-row items-center gap-5">
                                  <?php if (!empty($check_icon)): ?>
                                    <img class="our-process-section-check-icon" src="<?php echo esc_url($check_icon); ?>" alt="" width="15" height="15">
                                  <?php endif; ?>
                                  <span class="our-process-section-checklist-text text-secondary bm-text-ada5 bm-font-size-fs-body bm-line-height-lh-body"><?php echo esc_html($item_text); ?></span>
                                </div>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </div>
                        <?php endif; ?>
                      </div>

                      <?php if (!empty($cta_text)): ?>
                        <div class="our-process-section-cta-wrapper flex">
                          <a href="<?php echo esc_url($cta_link); ?>" class="our-process-section-cta btn btn-primary">
                            <span class="our-process-section-cta-text text-white"><?php echo esc_html($cta_text); ?></span>
                          </a>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

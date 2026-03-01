<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'brands-section-section');

$variant_id = get_field('variant');
if (empty($variant_id)) {
    $variant_id = 'default';
}
$variant_id = sanitize_html_class($variant_id);

$title            = get_field('title');
$description      = get_field('description');
$logo_layout      = get_field('logo_layout');
$background       = get_field('background_color'); // Accepts color or gradient CSS
$show_cta         = get_field('show_cta');
$cta_text         = get_field('cta_text');
$cta_url          = get_field('cta_url');
$slides_to_show   = get_field('slides_to_show');

if (empty($logo_layout)) {
    $logo_layout = 'grid';
}

$layout_class = 'brands-section-section--' . esc_attr($logo_layout);
$section_style = '';
if (!empty($background)) {
    $section_style = ' style="background: ' . esc_attr($background) . ';"';
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> brands-section-section <?php echo $layout_class; ?> brands-section-section--<?php echo esc_attr($variant_id); ?>" data-variant="<?php echo esc_attr($variant_id); ?>"<?php echo $section_style; ?>>
  <div class="container brands-section-container bm-margin-left-auto bm-margin-right-auto">
    <div class="brands-section-content flex flex-col items-center gap-6">
      <div class="brands-section-header flex flex-col items-center gap-3 bm-util-3ad7">
        <?php if (!empty($title)): ?>
          <h2 class="brands-section-title m-0 bm-font-family-font-primary bm-font-size-fs-h2 bm-font-weight-font-weight-light bm-line-height-lh-h2 bm-color-color-primary bm-text-align-center"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="brands-section-description m-0 text-center bm-font-family-font-primary bm-font-size-fs-h6 bm-line-height-lh-h6 bm-font-weight-font-weight-regular bm-color-color-secondary bm-font-size-fs-small"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php
      $brand_logos = get_field('brand_logos');
      if (!empty($brand_logos) && is_array($brand_logos)): ?>
        <?php if ($logo_layout === 'slider'): ?>
          <?php
          $brand_logos_filtered = array_values(array_filter($brand_logos, function ($row) {
              $img = is_array($row['logo_image']) ? ($row['logo_image']['url'] ?? '') : (string) ($row['logo_image'] ?? '');
              return !empty($img);
          }));
          ?>
          <div class="brands-section-slider-wrap brands-section-slider-wrap--desktop">
            <div class="brands-section-slider" aria-label="<?php esc_attr_e('Brand logos', 'theme'); ?>">
              <ul class="brands-section-slider-track">
                <?php
                /* Render two copies for seamless loop (animation translates -50%) */
                for ($copy = 0; $copy < 2; $copy++) {
                    foreach ($brand_logos_filtered as $logo_index => $row):
                        $logo_image = is_array($row['logo_image']) ? ($row['logo_image']['url'] ?? '') : (string) ($row['logo_image'] ?? '');
                        $logo_alt   = $row['logo_alt'] ?? '';
                        $logo_index_1based = $logo_index + 1;
                ?>
                <li class="brands-section-slider-slide">
                  <div class="brands-section-logo-item flex justify-center items-center">
                    <img src="<?php echo esc_url($logo_image); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index_1based); ?>" loading="lazy" width="120" height="40">
                  </div>
                </li>
                <?php
                    endforeach;
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="brands-section-logos--mobile brands-section-logos brands-section-logos--mobile-only flex flex-col items-center gap-4">
            <div class="brands-section-logos-grid flex flex-wrap justify-center items-center">
              <?php foreach ($brand_logos as $logo_index_m => $row_m):
                  $logo_image_m = is_array($row_m['logo_image']) ? ($row_m['logo_image']['url'] ?? '') : (string) ($row_m['logo_image'] ?? '');
                  $logo_alt_m   = $row_m['logo_alt'] ?? '';
                  if (empty($logo_image_m)) continue;
                  $logo_index_m_1based = $logo_index_m + 1;
              ?>
                <div class="brands-section-logo-item flex justify-center items-center">
                  <img src="<?php echo esc_url($logo_image_m); ?>" alt="<?php echo esc_attr(!empty($logo_alt_m) ? $logo_alt_m : 'Brand logo ' . $logo_index_m_1based); ?>">
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php else: ?>
          <div class="brands-section-logos flex flex-col items-center gap-4 bm-gap-space-6">
            <div class="brands-section-logo-row brands-section-logo-row-1 flex justify-center items-center gap-3">
              <?php
              $logo_index = 0;
              foreach ($brand_logos as $row):
                  $logo_index++;
                  $logo_image = is_array($row['logo_image']) ? ($row['logo_image']['url'] ?? '') : (string) ($row['logo_image'] ?? '');
                  $logo_alt   = $row['logo_alt'] ?? '';
                  if ($logo_index === 7): ?>
            </div>
            <div class="brands-section-logo-row brands-section-logo-row-2 gap-6 ">
                  <?php endif; ?>
                  <?php if (!empty($logo_image)): ?>
              <div class="brands-section-logo-item brands-section-logo-item--<?php echo esc_attr($logo_index); ?> flex justify-center items-center">
                <img src="<?php echo esc_url($logo_image); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index); ?>">
              </div>
                  <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (!empty($show_cta) && (!empty($cta_text) || !empty($cta_url))): ?>
        <div class="brands-section-cta text-center">
          <a href="<?php echo !empty($cta_url) ? esc_url($cta_url) : '#'; ?>" class="brands-section-cta-link bm-font-family-font-primary bm-color-color-primary bm-font-size-fs-body bm-line-height-lh-body bm-color-color-white"><?php echo !empty($cta_text) ? esc_html($cta_text) : esc_html__('Learn more', 'theme'); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

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
  <div class="container bm-margin-0-auto bm-util-2fe4">
    <div class="brands-section-content bm-gap-50 bm-display-flex bm-gap-30-3 bm-gap-24-2 bm-flex-direction-column bm-align-items-center">
      <div class="brands-section-header bm-gap-20 bm-display-flex bm-flex-direction-column bm-align-items-center bm-gap-12">
        <?php if (!empty($title)): ?>
          <h2 class="brands-section-title bm-margin-0 bm-font-family-poppins-sans-ser bm-text-align-center bm-color-112446 bm-line-height-1-3 bm-font-size-clamp-24px-5vw-3 bm-font-size-22 bm-font-size-40"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="brands-section-description bm-margin-0 bm-font-size-14 bm-font-family-poppins-sans-ser bm-text-align-center bm-font-size-18 bm-line-height-1-6 bm-line-height-1-5 bm-font-weight-400"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php if (have_rows('brand_logos')): ?>
        <?php if ($logo_layout === 'slider'): ?>
          <?php
          $slides_per_view = (int) $slides_to_show;
          if ($slides_per_view < 1) {
              $slides_per_view = 'auto';
          }
          $brands_swiper_options = [
              'slidesPerView'          => $slides_per_view,
              'spaceBetween'          => 24,
              'loop'                   => true,
              'wrapperClass'           => 'brands-section-slider-track',
              'slideClass'             => 'brands-section-slider-slide',
              'navigationNextSelector' => '.brands-section-slider-next',
              'navigationPrevSelector' => '.brands-section-slider-prev',
              'autoplay'              => [
                  'delay'                => 3000,
                  'disableOnInteraction' => false,
              ],
          ];
          ?>
          <div class="brands-section-slider bm-display-flex bm-align-items-center" data-swiper="<?php echo esc_attr(wp_json_encode($brands_swiper_options)); ?>">
            <button type="button" class="brands-section-slider-prev" aria-label="<?php esc_attr_e('Previous', 'theme'); ?>">&larr;</button>
            <div class="brands-section-slider-track bm-gap-40 bm-display-flex bm-gap-24 bm-align-items-center bm-flex-direction-row bm-gap-0">
              <?php
              $logo_index = 0;
              while (have_rows('brand_logos')): the_row();
                  $logo_index++;
                  $logo_image = get_sub_field('logo_image');
                  $logo_alt   = get_sub_field('logo_alt');
                  $logo_url   = is_array($logo_image) ? ($logo_image['url'] ?? '') : (string) $logo_image;
                  if (empty($logo_url)) continue;
              ?>
                <div class="brands-section-slider-slide bm-justify-content-center bm-display-flex bm-align-items-center">
                  <div class="brands-section-logo-item bm-flex-center bm-justify-content-center bm-display-flex bm-align-items-center">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index); ?>">
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
            <button type="button" class="brands-section-slider-next bm-util-b888 bm-justify-content-center bm-display-flex bm-align-items-center bm-color-112446 bm-font-size-18 bm-padding-0 bm-color-fff" aria-label="<?php esc_attr_e('Next', 'theme'); ?>">&rarr;</button>
          </div>
        <?php else: ?>
          <div class="brands-section-logos bm-gap-30 bm-display-flex bm-gap-20-2 bm-gap-16 bm-flex-direction-column bm-align-items-center">
            <div class="brands-section-logo-row brands-section-logo-row-1 bm-gap-30 bm-justify-content-center bm-flex-wrap-wrap bm-display-flex bm-justify-content-center-2 bm-align-items-center bm-flex-direction-row bm-gap-12">
              <?php
              $logo_index = 0;
              while (have_rows('brand_logos')): the_row();
                  $logo_index++;
                  $logo_image = get_sub_field('logo_image');
                  $logo_alt   = get_sub_field('logo_alt');
                  $logo_url   = is_array($logo_image) ? ($logo_image['url'] ?? '') : (string) $logo_image;
                  if ($logo_index === 7): ?>
            </div>
            <div class="brands-section-logo-row brands-section-logo-row-2 bm-gap-40">
                  <?php endif; ?>
                  <?php if (!empty($logo_url)): ?>
              <div class="brands-section-logo-item brands-section-logo-item--<?php echo esc_attr($logo_index); ?> bm-justify-content-center bm-display-flex bm-align-items-center">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index); ?>">
              </div>
                  <?php endif; ?>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (!empty($show_cta) && (!empty($cta_text) || !empty($cta_url))): ?>
        <div class="brands-section-cta bm-text-align-center">
          <a href="<?php echo !empty($cta_url) ? esc_url($cta_url) : '#'; ?>" class="brands-section-cta-link bm-util-b888 bm-font-family-poppins-sans-ser bm-color-112446 bm-font-weight-500 bm-color-fff"><?php echo !empty($cta_text) ? esc_html($cta_text) : esc_html__('Learn more', 'theme'); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

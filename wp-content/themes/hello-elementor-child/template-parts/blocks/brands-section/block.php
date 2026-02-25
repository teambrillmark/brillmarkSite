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
  <div class="container brands-section-container">
    <div class="brands-section-content flex flex-col items-center gap-6">
      <div class="brands-section-header flex flex-col items-center gap-3">
        <?php if (!empty($title)): ?>
          <h2 class="brands-section-title m-0"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <p class="brands-section-description m-0 text-center"><?php echo wp_kses_post($description); ?></p>
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
          <div class="brands-section-slider flex items-center" data-swiper="<?php echo esc_attr(wp_json_encode($brands_swiper_options)); ?>">
            <button type="button" class="brands-section-slider-prev" aria-label="<?php esc_attr_e('Previous', 'theme'); ?>">&larr;</button>
            <div class="brands-section-slider-track flex flex-row items-center">
              <?php
              $logo_index = 0;
              while (have_rows('brand_logos')): the_row();
                  $logo_index++;
                  $logo_image = get_sub_field('logo_image');
                  $logo_alt   = get_sub_field('logo_alt');
                  $logo_url   = is_array($logo_image) ? ($logo_image['url'] ?? '') : (string) $logo_image;
                  if (empty($logo_url)) continue;
              ?>
                <div class="brands-section-slider-slide flex justify-center items-center">
                  <div class="brands-section-logo-item flex justify-center items-center">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index); ?>">
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
            <button type="button" class="brands-section-slider-next flex justify-center items-center" aria-label="<?php esc_attr_e('Next', 'theme'); ?>">&rarr;</button>
          </div>
        <?php else: ?>
          <div class="brands-section-logos flex flex-col items-center gap-4">
            <div class="brands-section-logo-row brands-section-logo-row-1 flex flex-wrap justify-center items-center gap-3">
              <?php
              $logo_index = 0;
              while (have_rows('brand_logos')): the_row();
                  $logo_index++;
                  $logo_image = get_sub_field('logo_image');
                  $logo_alt   = get_sub_field('logo_alt');
                  $logo_url   = is_array($logo_image) ? ($logo_image['url'] ?? '') : (string) $logo_image;
                  if ($logo_index === 7): ?>
            </div>
            <div class="brands-section-logo-row brands-section-logo-row-2 gap-6">
                  <?php endif; ?>
                  <?php if (!empty($logo_url)): ?>
              <div class="brands-section-logo-item brands-section-logo-item--<?php echo esc_attr($logo_index); ?> flex justify-center items-center">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(!empty($logo_alt) ? $logo_alt : 'Brand logo ' . $logo_index); ?>">
              </div>
                  <?php endif; ?>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (!empty($show_cta) && (!empty($cta_text) || !empty($cta_url))): ?>
        <div class="brands-section-cta text-center">
          <a href="<?php echo !empty($cta_url) ? esc_url($cta_url) : '#'; ?>" class="brands-section-cta-link"><?php echo !empty($cta_text) ? esc_html($cta_text) : esc_html__('Learn more', 'theme'); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

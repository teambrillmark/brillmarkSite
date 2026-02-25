<!-- ACF-ANNOTATED: true -->
<?php
if (function_exists('theme_get_block_wrapper_attributes') && !empty($block)) {
    $wrapper = theme_get_block_wrapper_attributes($block, 'case-study-content-section-section');
} else {
    $wrapper = [
        'id'    => (!empty($block) && isset($block['id'])) ? esc_attr($block['id']) : '',
        'class' => 'case-study-content-section-section',
    ];
}

$subtitle           = get_field('subtitle');
$title              = get_field('title');
$client_label       = get_field('client_label');
$requirement        = get_field('requirement');
$testimonial_image  = get_field('testimonial_image');
$testimonial_quote  = get_field('testimonial_quote');
$testimonial_author = get_field('testimonial_author');
$content_order      = get_field('content_order');

if (empty($content_order)) {
    $content_order = 'default';
}

$flip_class = ($content_order === 'flipped') ? ' case-study-content-section-section--flipped' : '';

$image_url = '';
if (!empty($testimonial_image)) {
    $image_url = is_array($testimonial_image) ? ($testimonial_image['url'] ?? '') : (string) $testimonial_image;
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> section bg-blue-tint<?php echo esc_attr($flip_class); ?>">
  <div class="container mx-auto">
    <div class="case-study-content-section-wrapper flex flex-col gap-8 items-center">
      <div class="case-study-content-section-info flex flex-col gap-4">
        <div class="case-study-content-section-heading-group flex flex-col gap-5">
          <?php if (!empty($subtitle)): ?>
            <span class="case-study-content-section-subtitle text-secondary text-h6 text-center"><?php echo esc_html($subtitle); ?></span>
          <?php endif; ?>
          <?php if (!empty($title)): ?>
            <h3 class="case-study-content-section-title text-primary m-0 text-left"><?php echo esc_html($title); ?></h3>
          <?php endif; ?>
        </div>
        <div class="case-study-content-section-details flex flex-col gap-5">
          <?php if (!empty($client_label)): ?>
            <h6 class="case-study-content-section-client text-primary m-0 text-left"><?php echo esc_html($client_label); ?></h6>
          <?php endif; ?>
          <?php if (!empty($requirement)): ?>
            <p class="case-study-content-section-requirement text-primary m-0 text-left text-body"><?php echo wp_kses_post($requirement); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="case-study-content-section-testimonial-card">
        <div class="case-study-content-section-card-bg"></div>
        <div class="case-study-content-section-card-image"<?php if (!empty($image_url)): ?> style="background-image: url('<?php echo esc_url($image_url); ?>');"<?php endif; ?>></div>
        <div class="case-study-content-section-quote-wrapper flex flex-col gap-4 justify-center items-center">
          <?php if (!empty($testimonial_quote)): ?>
            <p class="case-study-content-section-quote-text text-primary m-0 text-h6 text-left"><?php echo wp_kses_post($testimonial_quote); ?></p>
          <?php endif; ?>
          <?php if (!empty($testimonial_author)): ?>
            <cite class="case-study-content-section-quote-author text-secondary text-body text-left"><?php echo esc_html($testimonial_author); ?></cite>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

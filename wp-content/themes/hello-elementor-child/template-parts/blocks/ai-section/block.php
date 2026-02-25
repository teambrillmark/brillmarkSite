<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'ai-section-section');

$title        = get_field('title');
$subtitle     = get_field('subtitle');
$image        = get_field('image');
$bottom_text  = get_field('bottom_text');
$content_order = get_field('content_order');

$flip_class = '';
if (!empty($content_order) && $content_order === 'flipped') {
    $flip_class = ' ai-section-section--flipped';
}

$image_url = '';
if (!empty($image)) {
    $image_url = is_array($image) ? ($image['url'] ?? '') : (string) $image;
}
$image_alt = '';
if (is_array($image) && !empty($image['alt'])) {
    $image_alt = $image['alt'];
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?><?php echo esc_attr($flip_class); ?> section bg-white">
  <div class="container">
    <div class="ai-section-inner flex flex-col items-center gap-10">
      <div class="ai-section-header flex flex-col items-center gap-4">
        <?php if (!empty($title)): ?>
          <h2 class="ai-section-title text-center text-primary m-0 font-weight-light"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitle)): ?>
          <p class="ai-section-subtitle text-center text-secondary m-0 text-h6"><?php echo wp_kses_post($subtitle); ?></p>
        <?php endif; ?>
      </div>
      <div class="ai-section-content flex items-center gap-10">
        <?php if (!empty($image_url)): ?>
          <div class="ai-section-image" style="background-image: url('<?php echo esc_url($image_url); ?>');" role="img" aria-label="<?php echo esc_attr($image_alt); ?>"></div>
        <?php else: ?>
          <div class="ai-section-image"></div>
        <?php endif; ?>
        <div class="ai-section-features-group">
          <div class="ai-section-features-list flex flex-col gap-6">
            <?php if (have_rows('features')): ?>
              <?php while (have_rows('features')): the_row();
                $feature_title = get_sub_field('feature_title');
                $feature_description = get_sub_field('feature_description');
              ?>
                <div class="ai-section-feature-item flex flex-row gap-5">
                  <div class="ai-section-dot-wrapper flex items-center gap-4 flex-row">
                    <div class="ai-section-dot"></div>
                  </div>
                  <div class="ai-section-feature-text flex flex-col gap-5">
                    <?php if (!empty($feature_title)): ?>
                      <h5 class="ai-section-feature-title text-primary m-0 font-weight-light text-left"><?php echo esc_html($feature_title); ?></h5>
                    <?php endif; ?>
                    <?php if (!empty($feature_description)): ?>
                      <p class="ai-section-feature-description text-secondary m-0 text-body text-left"><?php echo wp_kses_post($feature_description); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php if (!empty($bottom_text)): ?>
              <div class="ai-section-bottom-text-row flex flex-row gap-5">
                <div class="ai-section-bottom-text-wrapper flex flex-col gap-4">
                  <p class="ai-section-bottom-text m-0 text-h6 text-secondary text-left"><?php echo wp_kses_post($bottom_text); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

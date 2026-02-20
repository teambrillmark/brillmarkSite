<?php
// <!-- ACF-ANNOTATED: true -->

$section_title = get_field('video_testimonial_2_section_title');
$testimonials = get_field('video_testimonial_2_section_testimonials');
?>

<section class="video-testimonial-2-section-section">
  <div class="video-testimonial-2-section-container">
    <?php if (!empty($section_title)): ?>
      <h1 class="video-testimonial-2-section-title"><?php echo esc_html($section_title); ?></h1>
    <?php endif; ?>
    <div class="video-testimonial-2-section-content">
      <?php if (!empty($testimonials) && is_array($testimonials)): ?>
        <?php foreach ($testimonials as $testimonial): ?>
          <div class="video-testimonial-2-section-item">
            <div class="video-testimonial-2-section-card">
              <div class="video-testimonial-2-section-image" style="background-image: url(<?php echo esc_url($testimonial['image']); ?>);"></div>
              <blockquote class="video-testimonial-2-section-quote"><?php echo wp_kses_post($testimonial['quote']); ?></blockquote>
              <div class="video-testimonial-2-section-author">
                <span class="video-testimonial-2-section-author-name"><?php echo esc_html($testimonial['author_name']); ?></span>
                <span class="video-testimonial-2-section-author-title"><?php echo esc_html($testimonial['author_title']); ?></span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
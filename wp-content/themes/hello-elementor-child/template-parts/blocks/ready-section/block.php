<?php
/**
 * Ready Section Block Template
 */
// <!-- ACF-ANNOTATED: true -->

$wrapper = theme_get_block_wrapper_attributes($block, 'ready-section-section');

$title       = !empty(get_field('title')) ? get_field('title') : '';
$description = !empty(get_field('description')) ? get_field('description') : '';
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> ready-section-section section">
  <div class="container mx-auto">
    <div class="ready-section-content flex flex-col items-center mx-auto">
      <div class="ready-section-text-wrapper flex flex-col items-center">
        <?php if (!empty($title)): ?>
          <h2 class="ready-section-title text-center m-0"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($description)): ?>
          <p class="ready-section-description text-center m-0 text-white"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>

      <?php if (have_rows('stats')): ?>
        <div class="ready-section-stats flex flex-row justify-center items-center gap-12">
          <?php while (have_rows('stats')): the_row();
            $stat_number = get_sub_field('stat_number');
            $stat_label  = get_sub_field('stat_label');
          ?>
            <div class="ready-section-stat-item flex flex-col items-center gap-10">
              <?php if (!empty($stat_number)): ?>
                <span class="ready-section-stat-number text-center text-white"><?php echo esc_html($stat_number); ?></span>
              <?php endif; ?>
              <?php if (!empty($stat_label)): ?>
                <span class="ready-section-stat-label text-center text-white"><?php echo esc_html($stat_label); ?></span>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

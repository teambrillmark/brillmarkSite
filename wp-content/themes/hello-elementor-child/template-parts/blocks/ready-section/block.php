<?php
/**
 * Ready Section Block Template
 * 
 * @package theme
 */

// ACF-ANNOTATED: true
// 

$wrapper = theme_get_block_wrapper_attributes($block, 'ready-section-section');
?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="ready-section-content">
      <div class="ready-section-header">
        <?php if (!empty(get_field('title'))): ?>
          <h2 class="ready-section-title"><?php echo esc_html(get_field('title')); ?></h2>
        <?php endif; ?>
        
        <?php if (!empty(get_field('description'))): ?>
          <p class="ready-section-description"><?php echo wp_kses_post(get_field('description')); ?></p>
        <?php endif; ?>
      </div>
      
      <?php if (have_rows('stats')): ?>
        <div class="ready-section-stats">
          <?php while (have_rows('stats')): the_row(); ?>
            <div class="ready-section-stat-item">
              <?php if (!empty(get_sub_field('stat_number'))): ?>
                <span class="ready-section-stat-number" data-target="<?php echo esc_attr(get_sub_field('stat_number')); ?>">0</span>
              <?php endif; ?>
              
              <?php if (!empty(get_sub_field('stat_label'))): ?>
                <span class="ready-section-stat-label"><?php echo esc_html(get_sub_field('stat_label')); ?></span>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

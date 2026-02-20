<?php
/**
 * Brillmark Difference Section Block Template
 *
 * @package BM-Campaigns
 */
$wrapper = theme_get_block_wrapper_attributes($block, 'brillmark-difference-section-section');

?>
<!-- ACF-ANNOTATED: true -->
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="brillmark-difference-section-inner">
      <div class="brillmark-difference-section-heading-wrapper">
        <?php if (!empty(get_field('title'))): ?>
          <h2 class="brillmark-difference-section-title"><?php echo esc_html(get_field('title')); ?></h2>
        <?php endif; ?>
        <?php if (!empty(get_field('description'))): ?>
          <p class="brillmark-difference-section-description"><?php echo wp_kses_post(get_field('description')); ?></p>
        <?php endif; ?>
      </div>
      <div class="brillmark-difference-section-table">
        <!-- Header Row -->
        <div class="brillmark-difference-section-row brillmark-difference-section-row--header">
          <div class="brillmark-difference-section-cell brillmark-difference-section-cell--metric">
            <div class="brillmark-difference-section-cell-bg"></div>
            <?php if (!empty(get_field('column_1_header'))): ?>
              <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_field('column_1_header')); ?></span>
            <?php endif; ?>
          </div>
          <div class="brillmark-difference-section-cell brillmark-difference-section-cell--others">
            <div class="brillmark-difference-section-cell-bg"></div>
            <?php if (!empty(get_field('column_2_header'))): ?>
              <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_field('column_2_header')); ?></span>
            <?php endif; ?>
          </div>
          <div class="brillmark-difference-section-cell brillmark-difference-section-cell--brillmark">
            <div class="brillmark-difference-section-cell-bg"></div>
            <?php if (!empty(get_field('column_3_header'))): ?>
              <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_field('column_3_header')); ?></span>
            <?php endif; ?>
          </div>
        </div>
        <!-- Data Rows (Repeater) -->
        <?php if (have_rows('comparison_rows')): ?>
          <?php
            $comparison_rows = get_field('comparison_rows');
            $total_rows = is_array($comparison_rows) ? count($comparison_rows) : 0;
            $current_row_index = 0;
          ?>
          <?php while (have_rows('comparison_rows')): the_row(); $current_row_index++; ?>
            <div class="brillmark-difference-section-row<?php echo ($current_row_index === $total_rows) ? ' brillmark-difference-section-row--last' : ''; ?>">
              <div class="brillmark-difference-section-cell brillmark-difference-section-cell--metric">
                <div class="brillmark-difference-section-cell-bg"></div>
                <?php if (!empty(get_sub_field('metric_name'))): ?>
                  <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_sub_field('metric_name')); ?></span>
                <?php endif; ?>
              </div>
              <div class="brillmark-difference-section-cell brillmark-difference-section-cell--others">
                <div class="brillmark-difference-section-cell-bg"></div>
                <?php if (!empty(get_sub_field('others_value'))): ?>
                  <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_sub_field('others_value')); ?></span>
                <?php endif; ?>
              </div>
              <div class="brillmark-difference-section-cell brillmark-difference-section-cell--brillmark">
                <div class="brillmark-difference-section-cell-bg"></div>
                <?php if (!empty(get_sub_field('brillmark_value'))): ?>
                  <span class="brillmark-difference-section-cell-text"><?php echo esc_html(get_sub_field('brillmark_value')); ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

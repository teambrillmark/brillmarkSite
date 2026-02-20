<?php
/**
 * Metric Table Content Section Block Template
 * 
 * @var array $block The block settings and attributes.
 */

$section_title = get_field('section_title');
$metrics = get_field('metrics');
$before_after = get_field('before_after');
$wrapper = theme_get_block_wrapper_attributes($block, 'metric-table-content-section-section');

?>
<section  id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>"><div class="container">
  <?php if (!empty($section_title)): ?>
    <h1 class="metric-table-content-section-title"><?php echo esc_html($section_title); ?></h1>
  <?php endif; ?>
  <div class="metric-table-content-section-frame">
    <div class="metric-table-content-section-inner-frame">
      <?php if (!empty($metrics) && is_array($metrics)): ?>
        <?php foreach ($metrics as $metric): ?>
          <div class="metric-table-content-section-item">
            <span class="metric-table-content-section-metric"><?php echo esc_html($metric['metric_name']); ?></span>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php if (!empty($before_after) && is_array($before_after)): ?>
    <div class="metric-table-content-section-frame">
      <div class="metric-table-content-section-inner-frame">
        <?php foreach ($before_after as $item): ?>
          <div class="metric-table-content-section-item">
            <span class="metric-table-content-section-before"><?php echo esc_html($item['before_label']); ?></span>
            <span class="metric-table-content-section-value"><?php echo esc_html($item['before_value']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div></section>
<?php
/**
 * What We Achieve Block Template
 * Renders the metrics table section with ACF field values
 */

$block_id    = $block['id'] ?? '';
$className   = isset($block['className']) && $block['className'] ? 'what-we-achieve-section ' . esc_attr($block['className']) : 'what-we-achieve-section';
$heading     = get_field('heading') ?? '';
$before_label = get_field('before_label') ?? 'Before (Oct 24 – Nov 24)';
$after_label  = get_field('after_label') ?? 'After (Dec 24 – Jan 25)';
$rows        = get_field('rows');

$heading_id = 'what-we-achieve-heading-' . $block_id;

// Default rows from original HTML when repeater is empty
$default_rows = array(
    array('metric' => 'Total Sessions', 'before_value' => '16,521', 'after_value' => '16,786', 'increase' => '—'),
    array('metric' => 'Orders Fulfilled', 'before_value' => '205', 'after_value' => '333', 'increase' => '+62.4%'),
    array('metric' => 'Total Sales', 'before_value' => '5 figures', 'after_value' => '—', 'increase' => '+34.5%'),
    array('metric' => 'Conversion Rate', 'before_value' => '0.99%', 'after_value' => '2.06%', 'increase' => '+108%'),
    array('metric' => 'Added to Cart Rate', 'before_value' => '2.45%', 'after_value' => '6.42%', 'increase' => '+161.6%'),
    array('metric' => 'Reached Checkout Rate', 'before_value' => '0.58%', 'after_value' => '0.81%', 'increase' => '+39.7%'),
    array('metric' => 'Completed Checkout', 'before_value' => '0.99%', 'after_value' => '1.99%', 'increase' => '+100%'),
);

if (empty($rows) || ! is_array($rows)) {
    $rows = $default_rows;
}
$wrapper = theme_get_block_wrapper_attributes($block, 'what-we-achieve-section');

?>

<section class="<?php echo $wrapper['class']; ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
  <div class="container">
    <?php if ($heading) : ?>
      <h2 class="title" id="<?php echo esc_attr($heading_id); ?>"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>
    <div class="table-wrap">
      <table class="metrics-table" role="table">
        <thead>
          <tr>
            <th scope="col"><?php echo esc_html__('Metric', 'textdomain'); ?></th>
            <th scope="col"><?php echo esc_html($before_label); ?></th>
            <th scope="col"><?php echo esc_html($after_label); ?></th>
            <th scope="col"><?php echo esc_html__('Increase (%)', 'textdomain'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $row) :
            $metric       = isset($row['metric']) ? $row['metric'] : '';
            $before_value = isset($row['before_value']) ? $row['before_value'] : '';
            $after_value  = isset($row['after_value']) ? $row['after_value'] : '';
            $increase     = isset($row['increase']) ? $row['increase'] : '';
          ?>
            <tr>
              <td data-label="<?php echo esc_attr__('Metric', 'textdomain'); ?>"><?php echo esc_html($metric); ?></td>
              <td data-label="<?php echo esc_attr($before_label); ?>"><?php echo esc_html($before_value); ?></td>
              <td data-label="<?php echo esc_attr($after_label); ?>"><?php echo esc_html($after_value); ?></td>
              <td data-label="<?php echo esc_attr__('Increase (%)', 'textdomain'); ?>"><?php echo esc_html($increase); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

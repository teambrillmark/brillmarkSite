<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Table Section Block Template
 *
 * Column-based structure: each column has header + its own list of cells (one per row).
 * Makes it easy to popout or style a whole column. Options: header/column colors,
 * odd/even row colors, popout column.
 *
 * @var array $block The block settings and attributes.
 */

$wrapper   = theme_get_block_wrapper_attributes($block, 'table-section-section');
$title     = get_field('title');
$desc      = get_field('description');
$columns   = get_field('columns');
// Default: header at top, then row per index (feature 1 | benefit 1, feature 2 | benefit 2…). Transpose = one row per column.
$transpose_raw = get_field('transpose_table');
$transpose = ($transpose_raw === null || $transpose_raw === '') ? false : (bool) $transpose_raw;
$popout    = (bool) get_field('popout_column');
$popout_i  = (int) get_field('popout_column_index');
$odd_bg    = (bool) get_field('odd_row_bg');
$odd_color = get_field('odd_row_bg_color') ?: '#f4f7fa';
$even_bg   = (bool) get_field('even_row_bg');
$even_color = get_field('even_row_bg_color') ?: '#ffffff';

$col_count = is_array($columns) ? count($columns) : 0;
$row_count = 0;
if ($col_count > 0) {
  foreach ($columns as $col) {
    $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
    $row_count = max($row_count, count($cells));
  }
}
?>

<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?> section">
  <div class="table-section-container container m-0 mx-auto">

    <div class="table-section-header flex flex-col items-center gap-3">
      <?php if (!empty($title)): ?>
        <h2 class="table-section-title component-title text-center text-primary m-0"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($desc)): ?>
        <p class="table-section-description component-description text-center text-secondary m-0"><?php echo wp_kses_post($desc); ?></p>
      <?php endif; ?>
    </div>

    <?php if ($col_count > 0): ?>
    <?php
    $table_class = 'table-section-table mx-auto';
    if ($transpose) {
      $table_class .= ' table-section-table--transposed';
    }
    ?>
    <div class="<?php echo esc_attr($table_class); ?>" data-columns="<?php echo (int) $col_count; ?>">
      <?php if (!$transpose): ?>
      <!-- Header row: one cell per column -->
      <div class="table-section-row table-section-row--header" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, 1fr));">
        <?php foreach ($columns as $col_index => $col): ?>
          <?php
          $header_bg = '';
          if (!empty($col['column_background_color'])) {
            $header_bg = $col['column_background_color'];
          } elseif (!empty($col['header_background_color'])) {
            $header_bg = $col['header_background_color'];
          }
          $col_num = $col_index + 1;
          $is_popout = $popout && ($popout_i === $col_num);
          $header_class = 'table-section-cell table-section-cell--header flex items-center justify-center text-center text-white';
          if ($is_popout) {
            $header_class .= ' table-section-cell--popout';
          }
          ?>
          <div class="<?php echo esc_attr($header_class); ?>"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>>
            <?php echo esc_html($col['header_label'] ?? ''); ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Body rows: for each row index, one cell per column -->
      <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
        <?php
        $is_odd = ($row_index % 2) === 0;
        $row_style = '';
        if ($is_odd && $odd_bg) {
          $row_style = ' background-color: ' . esc_attr($odd_color) . ';';
        } elseif (!$is_odd && $even_bg) {
          $row_style = ' background-color: ' . esc_attr($even_color) . ';';
        }
        $row_class = 'table-section-row';
        if ($is_odd && $odd_bg) {
          $row_class .= ' table-section-row--odd';
        } elseif (!$is_odd && $even_bg) {
          $row_class .= ' table-section-row--even';
        }
        ?>
        <div class="<?php echo esc_attr($row_class); ?>" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, 1fr));<?php echo $row_style; ?>">
          <?php foreach ($columns as $col_index => $col): ?>
            <?php
            $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
            $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
            $col_full_bg = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? $col['column_background_color'] : '';
            $col_num = $col_index + 1;
            $is_popout = $popout && ($popout_i === $col_num);
            $cell_class = 'table-section-cell text-secondary';
            if ($is_popout) {
              $cell_class .= ' table-section-cell--popout';
            }
            $cell_style = $col_full_bg !== '' ? ' background-color: ' . esc_attr($col_full_bg) . ';' : '';
            ?>
            <div class="<?php echo esc_attr($cell_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>>
              <?php echo wp_kses_post($cell_content); ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endfor; ?>

      <?php else: ?>
      <!-- Transposed: one row per column = [header, cell[0], cell[1], ...] -->
      <?php foreach ($columns as $col_index => $col): ?>
        <?php
        $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
        $is_odd = ($col_index % 2) === 0;
        $row_style = '';
        if ($is_odd && $odd_bg) {
          $row_style = ' background-color: ' . esc_attr($odd_color) . ';';
        } elseif (!$is_odd && $even_bg) {
          $row_style = ' background-color: ' . esc_attr($even_color) . ';';
        }
        $row_class = 'table-section-row';
        if ($is_odd && $odd_bg) {
          $row_class .= ' table-section-row--odd';
        } elseif (!$is_odd && $even_bg) {
          $row_class .= ' table-section-row--even';
        }
        $header_bg = '';
        if (!empty($col['column_background_color'])) {
          $header_bg = $col['column_background_color'];
        } elseif (!empty($col['header_background_color'])) {
          $header_bg = $col['header_background_color'];
        }
        $col_num = $col_index + 1;
        $is_popout = $popout && ($popout_i === $col_num);
        $header_class = 'table-section-cell table-section-cell--header table-section-cell--transposed-header';
        if ($is_popout) {
          $header_class .= ' table-section-cell--popout';
        }
        $col_full_bg = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? $col['column_background_color'] : '';
        ?>
        <div class="<?php echo esc_attr($row_class); ?>" style="grid-template-columns: repeat(<?php echo (int) $row_count + 1; ?>, minmax(0, 1fr));<?php echo $row_style; ?>">
          <div class="<?php echo esc_attr($header_class); ?>"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>>
            <?php echo esc_html($col['header_label'] ?? ''); ?>
          </div>
          <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
            <?php
            $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
            $cell_class = 'table-section-cell text-secondary';
            if ($is_popout) {
              $cell_class .= ' table-section-cell--popout';
            }
            $cell_style = $col_full_bg !== '' ? ' background-color: ' . esc_attr($col_full_bg) . ';' : '';
            ?>
            <div class="<?php echo esc_attr($cell_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>>
              <?php echo wp_kses_post($cell_content); ?>
            </div>
          <?php endfor; ?>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <?php endif; ?>

  </div>
</section>

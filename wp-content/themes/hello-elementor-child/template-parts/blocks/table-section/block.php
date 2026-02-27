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
$variant_id = get_field('variant');
if (empty($variant_id)) {
  $variant_id = 'default';
}
$variant_id = sanitize_html_class($variant_id);
$layout_3column_pop = get_field('layout_3column_pop');
if (empty($layout_3column_pop)) {
  $layout_3column_pop = 'default';
}
$use_sticky_row_headers = ($variant_id === '3columnPop' && $layout_3column_pop === 'sticky_row_headers');
$title     = get_field('title');
$desc      = get_field('description');
$columns   = get_field('columns');
// Default: header at top, then row per index (feature 1 | benefit 1, feature 2 | benefit 2…). Transpose = one row per column.
$transpose_raw = get_field('transpose_table');
$transpose = ($transpose_raw === null || $transpose_raw === '') ? false : (bool) $transpose_raw;
$popout_desktop = (bool) get_field('popout_desktop');
$popout_mobile  = (bool) get_field('popout_mobile');
$popout         = $popout_desktop || $popout_mobile;
$popout_i       = (int) get_field('popout_column_index');
$odd_bg    = (bool) get_field('odd_row_bg');
$odd_color = get_field('odd_row_bg_color') ?: '#f4f7fa';
$even_bg   = (bool) get_field('even_row_bg');
$even_color = get_field('even_row_bg_color') ?: '#ffffff';
$grid_style = get_field('column_width') ?: '1fr';

$col_count = is_array($columns) ? count($columns) : 0;
$row_count = 0;

if ($col_count > 0) {
  foreach ($columns as $col) {
    $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
    $row_count = max($row_count, count($cells));
  }
}
$section_popout_mode = '';
if (!$transpose && $popout_desktop && !$popout_mobile) {
  $section_popout_mode = ' table-section-section--desktop-column-mobile-row';
} elseif (!$transpose && !$popout_desktop && $popout_mobile) {
  $section_popout_mode = ' table-section-section--mobile-column-desktop-row';
}
if ($use_sticky_row_headers) {
  $section_popout_mode .= ' table-section-section--3column-pop-sticky-rows';
}
?>

<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?> section table-section-section--<?php echo esc_attr($variant_id); ?><?php echo esc_attr($section_popout_mode); ?>" data-variant="<?php echo esc_attr($variant_id); ?>">
  <div class="table-section-container container m-0 mx-auto">

    <div class="table-section-header flex flex-col items-center gap-3 bm-margin-bottom-space-10">
      <?php if (!empty($title)): ?>
        <h2 class="table-section-title component-title text-center text-primary m-0"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($desc)): ?>
        <p class="table-section-description text-center text-secondary m-0"><?php echo wp_kses_post($desc); ?></p>
      <?php endif; ?>
    </div>

    <?php if ($col_count > 0): ?>
    <?php
    $table_class = 'table-section-table mx-auto flex flex-col items-center justify-center';
    if ($transpose) {
      $table_class .= ' table-section-table--transposed';
    }
    $use_column_based = $popout_desktop && $popout_mobile && !$transpose;
    $desktop_col_mobile_row = $popout_desktop && !$popout_mobile && !$transpose;
    $mobile_col_desktop_row = !$popout_desktop && $popout_mobile && !$transpose;
    $output_both = $desktop_col_mobile_row || $mobile_col_desktop_row;
    if ($use_column_based || $output_both) {
      $table_class .= ' table-section-table--column-based';
    }
    ?>
    <?php if ($use_sticky_row_headers && $col_count >= 2): ?>
    <!-- 3columnPop: sticky header + row label above each row -->
    <div class="table-section-table table-section-table--sticky-rows mx-auto" data-columns="<?php echo (int) $col_count; ?>">
      <div class="table-section-sticky-rows-header" style="grid-template-columns: auto repeat(<?php echo (int)($col_count - 1); ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
        <div class="table-section-sticky-rows-header-cell table-section-sticky-rows-header-cell--spacer"></div>
        <?php for ($c = 1; $c < $col_count; $c++): ?>
          <?php
          $col = $columns[$c];
          $header_bg = !empty($col['column_background_color']) ? $col['column_background_color'] : (!empty($col['header_background_color']) ? $col['header_background_color'] : '');
          $is_first_data_col = ($c === 1);
          $header_cell_class = 'table-section-sticky-rows-header-cell table-section-cell--header';
          if ($is_first_data_col) $header_cell_class .= ' table-section-sticky-rows-header-cell--accent';
          ?>
          <div class="<?php echo esc_attr($header_cell_class); ?>"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>><?php echo esc_html($col['header_label'] ?? ''); ?></div>
        <?php endfor; ?>
      </div>
      <div class="table-section-sticky-rows-body">
        <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
          <?php
          $row_label = isset($columns[0]['cells'][$row_index]['content']) ? $columns[0]['cells'][$row_index]['content'] : '';
          $is_odd = ($row_index % 2) === 0;
          $row_style = '';
          if ($is_odd && $odd_bg) $row_style = ' background-color: ' . esc_attr($odd_color) . ';';
          elseif (!$is_odd && $even_bg) $row_style = ' background-color: ' . esc_attr($even_color) . ';';
          ?>
          <div class="table-section-sticky-rows-row"<?php if ($row_style !== ''): ?> style="<?php echo $row_style; ?>"<?php endif; ?>>
            <?php if ($row_label !== ''): ?>
            <div class="table-section-sticky-rows-row-label"><?php echo wp_kses_post($row_label); ?></div>
            <?php endif; ?>
            <div class="table-section-sticky-rows-row-content" style="display: grid; grid-template-columns: repeat(<?php echo (int)($col_count - 1); ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
              <?php for ($c = 1; $c < $col_count; $c++): ?>
                <?php
                $cells = isset($columns[$c]['cells']) && is_array($columns[$c]['cells']) ? $columns[$c]['cells'] : [];
                $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
                $col_bg = isset($columns[$c]['column_background_color']) && $columns[$c]['column_background_color'] !== '' ? $columns[$c]['column_background_color'] : '';
                ?>
                <div class="table-section-cell table-section-sticky-rows-cell"<?php if ($col_bg !== ''): ?> style="background-color: <?php echo esc_attr($col_bg); ?>;"<?php endif; ?>><?php echo wp_kses_post($cell_content); ?></div>
              <?php endfor; ?>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <?php else: ?>
    <?php if ($output_both): ?>
    <div class="table-section-columns-wrap table-section-dual-layout">
      <div class="<?php echo esc_attr($table_class); ?>" data-columns="<?php echo (int) $col_count; ?>">
        <div class="table-section-columns" style="display: grid; grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
        <?php foreach ($columns as $col_index => $col): ?>
          <?php
          $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
          $header_bg = '';
          if (!empty($col['column_background_color'])) { $header_bg = $col['column_background_color']; } elseif (!empty($col['header_background_color'])) { $header_bg = $col['header_background_color']; }
          $col_num = $col_index + 1;
          $is_popout_col = $popout_i === $col_num;
          $col_class = 'table-section-column';
          if ($is_popout_col && $popout_desktop) $col_class .= ' table-section-column--popout-desktop';
          if ($is_popout_col && $popout_mobile) $col_class .= ' table-section-column--popout-mobile';
          $col_style = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? ' background-color: ' . esc_attr($col['column_background_color']) . ';' : '';
          ?>
          <div class="<?php echo esc_attr($col_class); ?>"<?php if ($col_style !== ''): ?> style="<?php echo $col_style; ?>"<?php endif; ?>>
            <div class="table-section-cell table-section-cell--header"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>><?php echo esc_html($col['header_label'] ?? ''); ?></div>
            <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
              <?php
              $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
              $is_odd = ($row_index % 2) === 0;
              $cell_style = '';
              if ($is_odd && $odd_bg) $cell_style = ' background-color: ' . esc_attr($odd_color) . ';';
              elseif (!$is_odd && $even_bg) $cell_style = ' background-color: ' . esc_attr($even_color) . ';';
              if (isset($col['column_background_color']) && $col['column_background_color'] !== '') $cell_style = ' background-color: ' . esc_attr($col['column_background_color']) . ';';
              $body_class = 'table-section-cell table-section-cell--body';
              if ($is_popout_col && $popout_desktop) $body_class .= ' table-section-cell--popout-desktop';
              if ($is_popout_col && $popout_mobile) $body_class .= ' table-section-cell--popout-mobile';
              ?>
              <div class="<?php echo esc_attr($body_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>><?php echo wp_kses_post($cell_content); ?></div>
            <?php endfor; ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="table-section-rows-wrap table-section-dual-layout">
      <div class="<?php echo esc_attr(preg_replace('/\s*table-section-table--column-based/', '', $table_class)); ?>" data-columns="<?php echo (int) $col_count; ?>">
      <div class="table-section-row table-section-row--header bm-display-grid bm-align-items-stretch" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
        <?php foreach ($columns as $col_index => $col): ?>
          <?php
          $header_bg = '';
          if (!empty($col['column_background_color'])) { $header_bg = $col['column_background_color']; } elseif (!empty($col['header_background_color'])) { $header_bg = $col['header_background_color']; }
          $col_num = $col_index + 1;
          $is_popout = ($popout_i === $col_num);
          $header_class = 'table-section-cell table-section-cell--header flex text-primary';
          if ($is_popout && $popout_desktop) $header_class .= ' table-section-cell--popout-desktop';
          if ($is_popout && $popout_mobile) $header_class .= ' table-section-cell--popout-mobile';
          ?>
          <div class="<?php echo esc_attr($header_class); ?>"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>><?php echo esc_html($col['header_label'] ?? ''); ?></div>
        <?php endforeach; ?>
      </div>
      <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
        <?php
        $is_odd = ($row_index % 2) === 0;
        $row_style = ''; if ($is_odd && $odd_bg) $row_style = ' background-color: ' . esc_attr($odd_color) . ';'; elseif (!$is_odd && $even_bg) $row_style = ' background-color: ' . esc_attr($even_color) . ';';
        $row_class = 'table-section-row'; if ($is_odd && $odd_bg) $row_class .= ' table-section-row--odd'; elseif (!$is_odd && $even_bg) $row_class .= ' table-section-row--even';
        ?>
        <div class="<?php echo esc_attr($row_class); ?>" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));<?php echo $row_style; ?>">
          <?php foreach ($columns as $col_index => $col): ?>
            <?php
            $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
            $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
            $col_full_bg = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? $col['column_background_color'] : '';
            $col_num = $col_index + 1;
            $is_popout = ($popout_i === $col_num);
            $cell_class = 'table-section-cell text-primary flex items-center';
            if ($is_popout && $popout_desktop) $cell_class .= ' table-section-cell--popout-desktop';
            if ($is_popout && $popout_mobile) $cell_class .= ' table-section-cell--popout-mobile';
            $cell_style = $col_full_bg !== '' ? ' background-color: ' . esc_attr($col_full_bg) . ';' : '';
            ?>
            <div class="<?php echo esc_attr($cell_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>><?php echo wp_kses_post($cell_content); ?></div>
          <?php endforeach; ?>
        </div>
      <?php endfor; ?>
      </div>
    </div>
    <?php else: ?>
    <div class="<?php echo esc_attr($table_class); ?>" data-columns="<?php echo (int) $col_count; ?>">
      <?php if (!$transpose): ?>
      <?php if ($use_column_based): ?>
      <!-- Column-based: one wrapper per column (header + cells), popout column is a single column wrapper -->
      <div class="table-section-columns" style="display: grid; grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
        <?php foreach ($columns as $col_index => $col): ?>
          <?php
          $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
          $header_bg = '';
          if (!empty($col['column_background_color'])) {
            $header_bg = $col['column_background_color'];
          } elseif (!empty($col['header_background_color'])) {
            $header_bg = $col['header_background_color'];
          }
          $col_num = $col_index + 1;
          $is_popout_col = $popout_i === $col_num;
          $col_class = 'table-section-column';
          if ($is_popout_col && $popout_desktop) {
            $col_class .= ' table-section-column--popout-desktop';
          }
          if ($is_popout_col && $popout_mobile) {
            $col_class .= ' table-section-column--popout-mobile';
          }
          $col_style = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? ' background-color: ' . esc_attr($col['column_background_color']) . ';' : '';
          ?>
          <div class="<?php echo esc_attr($col_class); ?>"<?php if ($col_style !== ''): ?> style="<?php echo $col_style; ?>"<?php endif; ?>>
            <div class="table-section-cell table-section-cell--header"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>>
              <?php echo wp_kses_post($col['header_label'] ?? ''); ?>
            </div>
            <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
              <?php
              $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
              $is_odd = ($row_index % 2) === 0;
              $cell_style = '';
              if ($is_odd && $odd_bg) {
                $cell_style = ' background-color: ' . esc_attr($odd_color) . ';';
              } elseif (!$is_odd && $even_bg) {
                $cell_style = ' background-color: ' . esc_attr($even_color) . ';';
              }
              if (isset($col['column_background_color']) && $col['column_background_color'] !== '') {
                $cell_style = ' background-color: ' . esc_attr($col['column_background_color']) . ';';
              }
              $body_class = 'table-section-cell table-section-cell--body';
              if ($is_popout_col && $popout_desktop) $body_class .= ' table-section-cell--popout-desktop';
              if ($is_popout_col && $popout_mobile) $body_class .= ' table-section-cell--popout-mobile';
              ?>
              <div class="<?php echo esc_attr($body_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>>
                <?php echo wp_kses_post($cell_content); ?>
              </div>
            <?php endfor; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
      <!-- Row-based: header row + body rows -->
      <div class="table-section-row table-section-row--header bm-display-grid bm-align-items-stretch" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));">
        <?php foreach ($columns as $col_index => $col): ?>
          <?php
          $header_bg = '';
          if (!empty($col['column_background_color'])) {
            $header_bg = $col['column_background_color'];
          } elseif (!empty($col['header_background_color'])) {
            $header_bg = $col['header_background_color'];
          }
          $col_num = $col_index + 1;
          $is_popout = ($popout_desktop || $popout_mobile) && ($popout_i === $col_num);
          $header_class = 'table-section-cell table-section-cell--header flex text-primary';
          if ($is_popout && $popout_desktop) {
            $header_class .= ' table-section-cell--popout-desktop';
          }
          if ($is_popout && $popout_mobile) {
            $header_class .= ' table-section-cell--popout-mobile';
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
        <div class="<?php echo esc_attr($row_class); ?>" style="grid-template-columns: repeat(<?php echo (int) $col_count; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));<?php echo $row_style; ?>">
          <?php foreach ($columns as $col_index => $col): ?>
            <?php
            $cells = isset($col['cells']) && is_array($col['cells']) ? $col['cells'] : [];
            $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
            $col_full_bg = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? $col['column_background_color'] : '';
            $col_num = $col_index + 1;
            $is_popout = ($popout_desktop || $popout_mobile) && ($popout_i === $col_num);
            $cell_class = 'table-section-cell text-primary flex items-center';
            if ($is_popout && $popout_desktop) {
              $cell_class .= ' table-section-cell--popout-desktop';
            }
            if ($is_popout && $popout_mobile) {
              $cell_class .= ' table-section-cell--popout-mobile';
            }
            $cell_style = $col_full_bg !== '' ? ' background-color: ' . esc_attr($col_full_bg) . ';' : '';
            ?>
            <div class="<?php echo esc_attr($cell_class); ?>"<?php if ($cell_style !== ''): ?> style="<?php echo $cell_style; ?>"<?php endif; ?>>
              <?php echo wp_kses_post($cell_content); ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endfor; ?>
      <?php endif; ?>
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
        $is_popout = ($popout_desktop || $popout_mobile) && ($popout_i === $col_num);
        $header_class = 'table-section-cell table-section-cell--header table-section-cell--transposed-header';
        if ($is_popout && $popout_desktop) {
          $header_class .= ' table-section-cell--popout-desktop';
        }
        if ($is_popout && $popout_mobile) {
          $header_class .= ' table-section-cell--popout-mobile';
        }
        $col_full_bg = isset($col['column_background_color']) && $col['column_background_color'] !== '' ? $col['column_background_color'] : '';
        ?>
        <div class="<?php echo esc_attr($row_class); ?>" style="grid-template-columns: repeat(<?php echo (int) $row_count + 1; ?>, minmax(0, <?php echo esc_attr($grid_style); ?>));<?php echo $row_style; ?>">
          <div class="<?php echo esc_attr($header_class); ?>"<?php if ($header_bg !== ''): ?> style="background-color: <?php echo esc_attr($header_bg); ?>;"<?php endif; ?>>
            <?php echo esc_html($col['header_label'] ?? ''); ?>
          </div>
          <?php for ($row_index = 0; $row_index < $row_count; $row_index++): ?>
            <?php
            $cell_content = isset($cells[$row_index]['content']) ? $cells[$row_index]['content'] : '';
            $cell_class = 'table-section-cell text-secondary';
            if ($is_popout && $popout_desktop) {
              $cell_class .= ' table-section-cell--popout-desktop';
            }
            if ($is_popout && $popout_mobile) {
              $cell_class .= ' table-section-cell--popout-mobile';
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
    <?php endif; ?>
    <?php endif; ?>

  </div>
</section>

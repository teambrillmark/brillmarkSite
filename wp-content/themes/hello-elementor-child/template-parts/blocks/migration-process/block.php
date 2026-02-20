<?php
/**
 * Migration Process Block Template
 * Renders the 5 week migration process section with ACF field values
 */

$block_id     = $block['id'] ?? '';
$className    = isset($block['className']) && $block['className'] ? 'migration-process-section ' . esc_attr($block['className']) : 'migration-process-section';
$heading      = get_field('heading') ?? '';
$description  = get_field('description') ?? '';
$cards        = get_field('cards');
$cta_title    = get_field('cta_title') ?? '';
$cta_text     = get_field('cta_text') ?? '';
$cta_btn_text = get_field('cta_button_text') ?? '';
$cta_btn_url  = get_field('cta_button_url') ?: '#';

// Default cards from original HTML when repeater is empty
$default_cards = array(
    array(
        'week_label'  => 'Week 1',
        'card_title'  => 'Discovery & Planning',
        'card_desc'   => 'Complete migration strategy document.',
        'checklist'   => array(
            array('item' => 'Timeline and requirements'),
            array('item' => 'Transparent cost estimation'),
        ),
    ),
    array(
        'week_label'  => 'Week 2',
        'card_title'  => 'Development & Setup',
        'card_desc'   => 'Fully functional Shopify staging environment for review',
        'checklist'   => array(
            array('item' => 'Conversion-optimized design'),
            array('item' => 'All functionality preserved or improved'),
        ),
    ),
    array(
        'week_label'  => 'Week 3',
        'card_title'  => 'Data Migration',
        'card_desc'   => 'Verified data migration with quality assurance report.',
        'checklist'   => array(
            array('item' => 'Zero data loss'),
            array('item' => 'Customer history preserved'),
            array('item' => 'SEO rankings protected'),
        ),
    ),
    array(
        'week_label'  => 'Week 4',
        'card_title'  => 'Quality Assurance',
        'card_desc'   => 'Detailed QA report with all test cases passed',
        'checklist'   => array(
            array('item' => 'Functionality testing across devices'),
            array('item' => 'Payment and checkout flow verification'),
        ),
    ),
    array(
        'week_label'  => 'Week 5',
        'card_title'  => 'Launch & Support',
        'card_desc'   => 'Smooth transition with zero downtime',
        'checklist'   => array(
            array('item' => 'Immediate issue resolution'),
            array('item' => 'Continuous performance optimization'),
        ),
    ),
);

if (empty($cards) || ! is_array($cards)) {
    $cards = $default_cards;
}
$wrapper = theme_get_block_wrapper_attributes($block, 'migration-process-section');

?>

<section class="<?php echo $wrapper['class']; ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="migration-process-title-<?php echo esc_attr($block_id); ?>">
  <div class="container">
    <header class="header">
      <?php if ($heading) : ?>
        <h2 class="title" id="migration-process-title-<?php echo esc_attr($block_id); ?>"><?php echo esc_html($heading); ?></h2>
      <?php endif; ?>
      <?php if ($description) : ?>
        <p class="description"><?php echo esc_html($description); ?></p>
      <?php endif; ?>
    </header>

    <div class="grid" role="list">
      <?php foreach ($cards as $card) :
        $week_label  = isset($card['week_label']) ? $card['week_label'] : '';
        $card_title  = isset($card['card_title']) ? $card['card_title'] : '';
        $card_desc   = isset($card['card_desc']) ? $card['card_desc'] : '';
        $checklist   = isset($card['checklist']) && is_array($card['checklist']) ? $card['checklist'] : array();
      ?>
        <article class="card" role="listitem">
          <?php if ($week_label) : ?>
            <span class="week-label"><?php echo esc_html($week_label); ?></span>
          <?php endif; ?>
          <?php if ($card_title) : ?>
            <h3 class="title"><?php echo esc_html($card_title); ?></h3>
          <?php endif; ?>
          <?php if ($card_desc) : ?>
            <p class="card-desc"><?php echo esc_html($card_desc); ?></p>
          <?php endif; ?>
          <?php if (!empty($checklist)) : ?>
            <ul class="checklist">
              <?php foreach ($checklist as $row) :
                $item_text = isset($row['item']) ? $row['item'] : '';
                if ($item_text === '') continue;
              ?>
                <li><?php echo esc_html($item_text); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>

      <div class="cta">
        <?php if ($cta_title) : ?>
          <h3 class="cta-title"><?php echo esc_html($cta_title); ?></h3>
        <?php endif; ?>
        <?php if ($cta_text) : ?>
          <p class="cta-text"><?php echo esc_html($cta_text); ?></p>
        <?php endif; ?>
        <?php if ($cta_btn_text) : ?>
          <a href="<?php echo esc_url($cta_btn_url); ?>" class="btn">
            <?php echo esc_html($cta_btn_text); ?>
            <span class="btn-arrow" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none" aria-hidden="true">
                <path d="M19.7071 8.07112C20.0976 7.6806 20.0976 7.04743 19.7071 6.65691L13.3431 0.292946C12.9526 -0.0975785 12.3195 -0.0975785 11.9289 0.292946C11.5384 0.68347 11.5384 1.31664 11.9289 1.70716L17.5858 7.36401L11.9289 13.0209C11.5384 13.4114 11.5384 14.0446 11.9289 14.4351C12.3195 14.8256 12.9526 14.8256 13.3431 14.4351L19.7071 8.07112ZM0 7.36401V8.36401H19V7.36401V6.36401H0V7.36401Z" fill="white" />
              </svg>
            </span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

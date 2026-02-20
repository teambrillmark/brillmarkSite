<?php
/**
 * Shopify Why Choose Block Template
 * Renders the block with ACF field values
 */

$block_id    = $block['id'] ?? '';
$className   = isset($block['className']) && $block['className'] ? 'shopify-why-choose-section ' . esc_attr($block['className']) : 'shopify-why-choose-section';
$title       = get_field('title') ?? '';
$description = get_field('description') ?? '';
$items       = get_field('items') ?: [];

// Default items from HTML when repeater is empty
if (empty($items)) {
    $items = [
        array('item_title' => '12+ Years', 'item_desc' => 'E-commerce Expertise'),
        array('item_title' => 'Optimized', 'item_desc' => '1000+ Websites'),
        array('item_title' => '200+', 'item_desc' => 'Successful Shopify Migrations'),
        array('item_title' => '200+', 'item_desc' => 'Technical Experts Team'),
        array('item_title' => 'AI-Powered', 'item_desc' => 'Automation Expertise'),
        array('item_title' => 'Specialized in', 'item_desc' => 'Conversion Rate Optimization & A/B Testing'),
    ];
}

$title_id = 'shopify-why-choose-title-' . esc_attr($block_id);
?>

<section class="<?php echo esc_attr($className); ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="<?php echo $title_id; ?>">
  <div class="container">
    <?php if ($title) : ?>
      <h2 class="title" id="<?php echo $title_id; ?>"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($description) : ?>
      <p class="description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>

    <?php if (!empty($items)) : ?>
      <ul class="grid" role="list">
        <?php foreach ($items as $index => $item) :
            $item_title = $item['item_title'] ?? '';
            $item_desc  = $item['item_desc'] ?? '';
            $icon       = $item['icon'] ?? [];
            if ($item_title === '' && $item_desc === '') continue;
        ?>
          <li class="item">
            <span class="icon" aria-hidden="true">
              <?php if (!empty($icon['url'])) : ?>
                <img src="<?php echo esc_url($icon['url']); ?>" alt="" width="40" height="40" loading="lazy">
              <?php else : ?>
                <span style="display:block;width:40px;height:40px;background:rgba(255,255,255,0.2);border-radius:4px;" aria-hidden="true"></span>
              <?php endif; ?>
            </span>
            <div class="item-content">
              <?php if ($item_title) : ?>
                <span class="item-title"><?php echo esc_html($item_title); ?></span>
              <?php endif; ?>
              <?php if ($item_desc) : ?>
                <span class="item-desc"><?php echo esc_html($item_desc); ?></span>
              <?php endif; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>

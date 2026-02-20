<?php
/**
 * Proven Results Block Template
 * Renders the block with video testimonial and client testimonials using ACF field values
 */

$block_id    = $block['id'] ?? '';
$className   = isset($block['className']) && $block['className'] ? 'proven-results-section ' . esc_attr($block['className']) : 'proven-results-section';
$heading     = get_field('heading') ?? '';
$left_column = get_field('left_column') ?: array();
$right_items = get_field('right_testimonials');

// Left column defaults from original HTML
$video_url     = isset($left_column['video_url']) ? $left_column['video_url'] : 'https://fast.wistia.net/embed/iframe/fcqg5l1o2j?web_component=true&seo=false';
$video_title   = isset($left_column['video_title']) ? $left_column['video_title'] : 'IMG_1152-1 Video';
$left_quote    = isset($left_column['quote_text']) ? $left_column['quote_text'] : '';
$left_name     = isset($left_column['author_name']) ? $left_column['author_name'] : '';
$left_title    = isset($left_column['author_title']) ? $left_column['author_title'] : '';

// Default right testimonials when repeater is empty
$default_right = array(
    array(
        'quote_icon'    => null,
        'quote_text'    => "BrillMark has been essential to Ritual Zero Proof's DTC success. From site optimization to A/B testing and advanced Shopify customization, their skilled, efficient team handles it all. If you want true professionals, I highly recommend working with BrillMark.",
        'logo'          => null,
        'author_name'   => 'Kevin Buth',
        'author_title'  => 'Executive Creative Director at Ritual Beverage Company',
    ),
    array(
        'quote_icon'    => null,
        'quote_text'    => "The BrillMark team is outstanding. They managed to help us with challenging AB tests that came through and improved our overall website! They are a complete team with an advanced set of skills that always delivers, meeting the deadlines and the requirements we have asked for. Recommended, top-of-the-line people with experience all over!",
        'logo'          => null,
        'author_name'   => 'Felipe Diaz',
        'author_title'  => 'E-commerce Performance Specialist at The Wild Brands',
    ),
);

if (empty($right_items) || ! is_array($right_items)) {
    $right_items = $default_right;
}
$wrapper = theme_get_block_wrapper_attributes($block, 'proven-results-section');

?>

<section class="<?php echo $wrapper['class']; ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="proven-results-title-<?php echo esc_attr($block_id); ?>">
  <div class="container">
    <?php if ($heading) : ?>
      <h2 class="title" id="proven-results-title-<?php echo esc_attr($block_id); ?>"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>

    <div class="grid">
      <!-- Left column: video + one testimonial -->
      <div class="col col-left">
        <div class="card card--video">
          <?php if ($video_url) : ?>
            <div class="video">
              <iframe
                src="<?php echo esc_url($video_url); ?>"
                title="<?php echo esc_attr($video_title ?: 'Video'); ?>"
                allow="autoplay; fullscreen"
                allowtransparency="true"
                frameborder="0"
                scrolling="no"
                class="wistia_embed"
                name="wistia_embed"
                width="100%"
                height="100%"
              ></iframe>
            </div>
          <?php endif; ?>
          <?php if ($left_quote || $left_name || $left_title) : ?>
            <div class="card-body">
              <?php if ($left_quote) : ?>
                <p class="quote-text quote-text--large"><?php echo esc_html($left_quote); ?></p>
              <?php endif; ?>
              <div class="attribution attribution--no-logo">
                <?php if ($left_name) : ?>
                  <span class="author-name"><?php echo esc_html($left_name); ?></span>
                <?php endif; ?>
                <?php if ($left_title) : ?>
                  <span class="author-title"><?php echo esc_html($left_title); ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Right column: stacked testimonials -->
      <div class="col col-right">
        <?php foreach ($right_items as $item) :
          $quote_icon   = isset($item['quote_icon']) && is_array($item['quote_icon']) ? $item['quote_icon'] : null;
          $quote_text   = isset($item['quote_text']) ? $item['quote_text'] : '';
          $logo         = isset($item['logo']) && is_array($item['logo']) ? $item['logo'] : null;
          $author_name  = isset($item['author_name']) ? $item['author_name'] : '';
          $author_title = isset($item['author_title']) ? $item['author_title'] : '';
        ?>
          <div class="card">
            <div>
              <?php if (! empty($quote_icon['url'])) : ?>
                <span class="quote-icon" aria-hidden="true">
                  <img src="<?php echo esc_url($quote_icon['url']); ?>" alt="">
                </span>
              <?php endif; ?>
              <?php if ($quote_text) : ?>
                <p class="quote-text"><?php echo esc_html($quote_text); ?></p>
              <?php endif; ?>
            </div>
            <div class="attribution">
              <?php if (! empty($logo['url'])) : ?>
                <img class="logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: $author_name); ?>">
              <?php endif; ?>
              <div class="attribution-text">
                <?php if ($author_name) : ?>
                  <span class="author-name"><?php echo esc_html($author_name); ?></span>
                <?php endif; ?>
                <?php if ($author_title) : ?>
                  <span class="author-title"><?php echo esc_html($author_title); ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

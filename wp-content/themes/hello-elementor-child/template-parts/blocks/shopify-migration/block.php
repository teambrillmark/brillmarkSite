<?php
/**
 * Shopify Migration Block Template
 * Renders the block with ACF field values
 */

$block_id            = $block['id'] ?? '';
$className           = isset($block['className']) && $block['className'] ? 'shopify-migration-section ' . esc_attr($block['className']) : 'shopify-migration-section';
$eyebrow             = get_field('eyebrow') ?? '';
$title               = get_field('title') ?? '';
$description         = get_field('description') ?? '';
$email_placeholder   = get_field('email_placeholder') ?? 'Email Address';
$website_placeholder = get_field('website_placeholder') ?? 'Your Website';
$button_text         = get_field('button_text') ?? 'Ready to Migrate!';
$form_action         = get_field('form_action') ? esc_url(get_field('form_action')) : '#';
$image               = get_field('image') ?? [];

$form_id = 'shopify-migration-form-' . esc_attr($block_id);
$email_id = 'shopify-migration-email-' . esc_attr($block_id);
$website_id = 'shopify-migration-website-' . esc_attr($block_id);
?>

<section class="<?php echo esc_attr($className); ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="shopify-migration-title-<?php echo esc_attr($block_id); ?>">
  <div class="container">
    <div class="wrapper">
      <!-- Left Content -->
      <div class="content">
        <?php if ($eyebrow) : ?>
          <span class="eyebrow"><?php echo esc_html($eyebrow); ?></span>
        <?php endif; ?>

        <?php if ($title) : ?>
          <h2 class="title" id="shopify-migration-title-<?php echo esc_attr($block_id); ?>">
            <?php echo esc_html($title); ?>
          </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
          <p class="description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <form class="form" id="<?php echo $form_id; ?>" action="<?php echo $form_action; ?>" method="post" aria-label="<?php esc_attr_e('Migration signup form', 'textdomain'); ?>">
          <label for="<?php echo $email_id; ?>" class="visually-hidden"><?php esc_html_e('Email Address', 'textdomain'); ?></label>
          <input type="email" id="<?php echo $email_id; ?>" name="shopify_migration_email" class="input" placeholder="<?php echo esc_attr($email_placeholder); ?>" required>
          <label for="<?php echo $website_id; ?>" class="visually-hidden"><?php esc_html_e('Your Website', 'textdomain'); ?></label>
          <input type="url" id="<?php echo $website_id; ?>" name="shopify_migration_website" class="input" placeholder="<?php echo esc_attr($website_placeholder); ?>">
          <button type="submit" class="btn">
            <?php echo esc_html($button_text); ?>
            <span class="btn-arrow" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </button>
        </form>
      </div>

      <!-- Right Media -->
      <div class="media">
        <?php if (!empty($image['url'])) : ?>
          <img
            src="<?php echo esc_url($image['url']); ?>"
            alt="<?php echo esc_attr($image['alt'] ?: ($image['title'] ?? '')); ?>"
            width="<?php echo isset($image['width']) ? (int) $image['width'] : ''; ?>"
            height="<?php echo isset($image['height']) ? (int) $image['height'] : ''; ?>"
            loading="lazy"
          />
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

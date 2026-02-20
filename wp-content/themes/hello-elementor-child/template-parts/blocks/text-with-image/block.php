<?php
/**
 * Text with Image Block Template
 * Renders the block with ACF field values
 */

// Define variables at the top
$block_id = $block['id'] ?? '';
$className = 'text-with-image-' . $block_id;
$title = get_field('title') ?? '';
$description = get_field('description') ?? '';
$image = get_field('image') ?? [];
?>

<section class="text-with-image <?php echo esc_attr($className); ?>" id="block-<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="wrapper">
            <!-- Left Content -->
            <div class="content">
                <?php if ($title): ?>
                    <h2 class="title">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="description">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Media -->
            <div class="media">
                <?php if (!empty($image['url'])): ?>
                    <div class="text-with-image__image-wrap">
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?: ($image['title'] ?: 'BrillMark team in conversation')); ?>"
                            class="text-with-image__image"
                            loading="lazy"
                        />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

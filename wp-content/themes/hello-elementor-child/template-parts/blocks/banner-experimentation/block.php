<?php
/**
 * Banner Experimentation Block Template
 * Renders the block with ACF field values
 */

$block_id    = $block['id'] ?? '';
$className   = 'banner-experimentation-' . $block_id;
$eyebrow     = get_field('eyebrow') ?? '';
$title       = get_field('title') ?? '';
$description = get_field('description') ?? '';
$points      = get_field('points') ?: [];
$btn_text    = get_field('btn_text') ?? '';
$btn_link    = get_field('btn_link') ?: '#';
$video_url   = get_field('video_url') ?? '';
$video_title = get_field('video_title') ?: __('Video', 'textdomain');
$quote       = get_field('quote') ?? '';
$author      = get_field('author') ?? '';
$tools_logos = get_field('tools_logos') ?: [];

$wrapper = theme_get_block_wrapper_attributes($block, 'banner-experimentation-section');
?>

<section class=" <?php echo esc_attr($className); ?> <?php echo $wrapper['class']; ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="banner-title-<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="wrapper">
            <!-- Left Content -->
            <div class="content">
                <?php if ($eyebrow) : ?>
                    <span class="eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="title" id="banner-title-<?php echo esc_attr($block_id); ?>">
                        <?php echo nl2br(esc_html($title)); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="description"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>

                <?php if (!empty($points)) : ?>
                    <ul class="points">
                        <?php foreach ($points as $point) :
                            $point_text = isset($point['point_text']) ? $point['point_text'] : '';
                            if ($point_text === '') continue;
                        ?>
                            <li><?php echo esc_html($point_text); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($btn_text) : ?>
                    <a href="<?php echo esc_url($btn_link); ?>" class="btn">
                        <?php echo esc_html($btn_text); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Right Media -->
            <div class="media">
                <?php if ($video_url) : ?>

                <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                <div class="video">
                    <iframe
                    src="<?php echo esc_attr($video_url); ?>"
                    title="<?php echo esc_attr($video_title); ?>"
                    allow="autoplay; fullscreen"
                    allowtransparency="true"
                    frameborder="0"
                    scrolling="no"
                    class="wistia_embed"
                    name="wistia_embed"
                    width="100%"
                    height="100%">
                    </iframe>
                </div>

                <?php endif; ?>

                <?php if ($quote) : ?>
                    <p class="quote"><?php echo esc_html($quote); ?></p>
                <?php endif; ?>
                <?php if ($author) : ?>
                    <span class="author"><?php echo esc_html($author); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($tools_logos)) : ?>
        <div class="tools__list" role="list" aria-label="<?php esc_attr_e('Partner and tool logos', 'textdomain'); ?>">
            <?php
            foreach ($tools_logos as $item) {
                if (isset($item['logo_image']) && !empty($item['logo_image']['url'])) {
                    $img_url = $item['logo_image']['url'];
                    $img_alt = !empty($item['logo_alt']) ? $item['logo_alt'] : ($item['logo_image']['alt'] ?? $item['logo_image']['title'] ?? '');
                } elseif (isset($item['url'])) {
                    $img_url = $item['url'];
                    $img_alt = $item['alt'] ?? '';
                } else {
                    continue;
                }
                ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="logo" loading="lazy" />
            <?php } ?>
        </div>
        <?php endif; ?>
    </div>
</section>

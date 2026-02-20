<?php
/**
 * Footer Section Block Template
 *
 * @package Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$shape_1       = get_field('shape_1');
$shape_2       = get_field('shape_2');
$logo          = get_field('logo');
$description   = get_field('description');
$book_link     = get_field('book_meeting_link');
$book_text     = get_field('book_meeting_button_text');
$social_links  = get_field('social_links');
$footer_cols   = get_field('footer_columns');
$copyright_1   = get_field('copyright_line_1');
$copyright_2   = get_field('copyright_line_2');

$book_url    = '#';
$book_target = '_self';
if (!empty($book_link) && is_array($book_link)) {
    $book_url    = $book_link['url'] ?? '#';
    $book_target = $book_link['target'] ?? '_self';
}
$wrapper = theme_get_block_wrapper_attributes($block, 'footer-section-block');

?>
<!-- ACF-ANNOTATED: true -->
<footer id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
    <div class="footer-wrapper">
        <?php if (!empty($shape_1) && is_array($shape_1)): ?>
            <img src="<?php echo esc_url($shape_1['url']); ?>" alt="<?php echo esc_attr($shape_1['alt'] ?? 'footer shape'); ?>" class="footer-container-shape-1">
        <?php endif; ?>
        <?php if (!empty($shape_2) && is_array($shape_2)): ?>
            <img src="<?php echo esc_url($shape_2['url']); ?>" alt="<?php echo esc_attr($shape_2['alt'] ?? 'footer shape'); ?>" class="footer-container-shape-2">
        <?php endif; ?>
        <div class="footer-container">
            <div class="footer-main">
                <div class="footer-cols">
                    <div class="footer-col1">
                        <div class="footer-logo">
                            <?php if (!empty($logo) && is_array($logo)): ?>
                                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?? 'brillmark logo'); ?>" class="footer-logo-img">
                            <?php endif; ?>
                        </div>
                        <div class="footer-txt">
                            <?php if (!empty($description)): ?>
                                <p class="footer-heading-txt"><?php echo wp_kses_post($description); ?></p>
                            <?php endif; ?>
                            <div id="footer-call-desk">
                                <div class="footer-btn-section">
                                    <a class="bookmeeting" href="<?php echo esc_url($book_url); ?>" target="<?php echo esc_attr($book_target); ?>">
                                        <button type="button" class="footer-btn"><?php echo esc_html($book_text ?: 'Book a meeting'); ?></button>
                                    </a>
                                </div>
                                <?php if (!empty($social_links) && is_array($social_links)): ?>
                                    <div class="footer-social-section">
                                        <?php foreach ($social_links as $social):
                                            $s_url = isset($social['url']) ? $social['url'] : [];
                                            $s_icon = isset($social['icon']) ? $social['icon'] : null;
                                            $s_href = is_array($s_url) ? ($s_url['url'] ?? '#') : $s_url;
                                            $s_target = is_array($s_url) && !empty($s_url['target']) ? $s_url['target'] : '_self';
                                            ?>
                                            <a href="<?php echo esc_url($s_href); ?>" target="<?php echo esc_attr($s_target); ?>"<?php if (!empty($s_url['title'])): ?> aria-label="<?php echo esc_attr($s_url['title']); ?>"<?php endif; ?>>
                                                <?php if (!empty($s_icon) && is_array($s_icon)): ?>
                                                    <img src="<?php echo esc_url($s_icon['url']); ?>" alt="<?php echo esc_attr($s_icon['alt'] ?? ''); ?>" class="footer-social-icon">
                                                <?php endif; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($footer_cols) && is_array($footer_cols)): ?>
                        <div class="footer-col2">
                            <div class="footer-col2-cols">
                                <?php foreach ($footer_cols as $col):
                                    $heading = isset($col['heading']) ? $col['heading'] : '';
                                    $links   = isset($col['links']) ? $col['links'] : [];
                                    $col_class = 'footer-col2-col' . (array_search($col, $footer_cols, true) + 1);
                                    ?>
                                    <div class="<?php echo esc_attr($col_class); ?>">
                                        <?php if ($heading !== ''): ?>
                                            <div class="footer-navigation-heading">
                                                <p class="footer-navigation-heading-txt"><?php echo esc_html($heading); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($links)): ?>
                                            <div class="footer-navigation-links footer-navigation-links-<?php echo esc_attr(sanitize_title($heading)); ?>">
                                                <?php foreach ($links as $link_item):
                                                    $link = isset($link_item['link']) ? $link_item['link'] : [];
                                                    if (empty($link) || !is_array($link)) continue;
                                                    $l_url = $link['url'] ?? '#';
                                                    $l_title = $link['title'] ?? '';
                                                    $l_target = !empty($link['target']) ? $link['target'] : '_self';
                                                    ?>
                                                    <a href="<?php echo esc_url($l_url); ?>" target="<?php echo esc_attr($l_target); ?>" class="footer-link"><?php echo esc_html($l_title ?: $l_url); ?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Mobile: same CTA + socials -->
                    <div id="footer-call">
                        <div class="footer-btn-section">
                            <a class="bookmeeting" href="<?php echo esc_url($book_url); ?>" target="<?php echo esc_attr($book_target); ?>">
                                <button type="button" class="footer-btn"><?php echo esc_html($book_text ?: 'Book a meeting'); ?></button>
                            </a>
                        </div>
                        <?php if (!empty($social_links) && is_array($social_links)): ?>
                            <div class="footer-social-section">
                                <?php foreach ($social_links as $social):
                                    $s_url = isset($social['url']) ? $social['url'] : [];
                                    $s_icon = isset($social['icon']) ? $social['icon'] : null;
                                    $s_href = is_array($s_url) ? ($s_url['url'] ?? '#') : $s_url;
                                    $s_target = is_array($s_url) && !empty($s_url['target']) ? $s_url['target'] : '_self';
                                    ?>
                                    <a href="<?php echo esc_url($s_href); ?>" target="<?php echo esc_attr($s_target); ?>">
                                        <?php if (!empty($s_icon) && is_array($s_icon)): ?>
                                            <img src="<?php echo esc_url($s_icon['url']); ?>" alt="<?php echo esc_attr($s_icon['alt'] ?? ''); ?>" class="footer-social-icon">
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="copyrigth-txt-section">
                    <?php if (!empty($copyright_1)): ?>
                        <p class="copyright-txt"><?php echo esc_html($copyright_1); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($copyright_2)): ?>
                        <p class="copyright-txt"><?php echo esc_html($copyright_2); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

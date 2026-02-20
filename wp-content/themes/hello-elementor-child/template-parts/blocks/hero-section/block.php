<!-- ACF-ANNOTATED: true -->
<?php
$wrapper     = theme_get_block_wrapper_attributes($block, 'hero-section-section');
$layout      = get_field('layout') ?: '1';
$title       = get_field('title');
$description = get_field('description');
$tag_text    = get_field('tag_text');
$button_text = get_field('button_text');
$button_url  = get_field('button_url');
$button_icon = get_field('button_icon');
$hero_image  = get_field('hero_image');
$quote_text  = get_field('quote_text');
$quote_author = get_field('quote_author');
$background_image = get_field('background_image');
$form_use_custom_code = get_field('form_use_custom_code');
$form_custom_code    = get_field('form_custom_code');
$wistia_video_id    = get_field('wistia_video_id');
?>
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>" data-variant="<?php echo esc_attr($layout); ?>">

<?php if ($layout === '1'): ?>
    <!-- ========== VARIANT 1: Two-column with circular process graphic ========== -->
    <div class="hero-bg-gradient"></div>
    <?php if (!empty($background_image)): ?>
        <div class="hero-bg-pattern" style="background-image: url(<?php echo esc_url($background_image['url']); ?>);"></div>
    <?php endif; ?>
    <div class="hero-content-wrapper bm-display-flex bm-justify-content-center bm-align-items-center bm-margin-0-auto bm-flex-direction-column-2 bm-gap-40-2 bm-padding-40px-16px">
        <div class="hero-text-column bm-display-flex bm-flex-direction-column bm-gap-40 bm-gap-30">
            <div class="hero-text-group bm-display-flex bm-flex-direction-column">
                <div class="hero-heading-group bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10 bm-gap-15">
                    <?php if (!empty($title)): ?>
                        <h1 class="hero-title bm-heading-h1 bm-font-size-44 bm-font-weight-400 bm-color-112446 bm-line-height-1-2 bm-margin-0 bm-font-size-32 bm-text-align-center"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>
                    <?php if (!empty($description)): ?>
                        <p class="hero-description bm-heading-h5 bm-font-weight-400 bm-color-112446 bm-margin-0 bm-font-size-20 bm-line-height-1-5 bm-font-size-16-2 bm-text-align-center bm-color-313f58"><?php echo wp_kses_post($description); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (have_rows('checklist_items')): ?>
                    <div class="hero-checklist bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10">
                        <?php while (have_rows('checklist_items')): the_row(); ?>
                            <?php $item_text = get_sub_field('item_text'); ?>
                            <?php if (!empty($item_text)): ?>
                                <div class="hero-checklist-item bm-display-flex bm-align-items-center bm-gap-5 bm-gap-10">
                                    <svg class="hero-check-icon" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 3.75L5.625 10.625L2.5 7.5" stroke="#112446" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span class="hero-checklist-text bm-font-weight-400 bm-font-size-16 bm-color-313f58 bm-color-112446"><?php echo esc_html($item_text); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($button_text)): ?>
                <div class="hero-cta">
                    <a class="hero-cta-btn bm-font-family-poppins-sans-ser bm-justify-content-center bm-align-items-center bm-font-weight-400 bm-font-size-16 bm-display-inline-flex bm-padding-10px-20px bm-color-ffffff bm-gap-10 bm-padding-14px-33px bm-font-size-14" href="<?php echo esc_url($button_url ?: '#'); ?>">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="hero-graphic">
            <div class="hero-orbit">
                <div class="hero-orbit-ring"></div>
                <?php if (have_rows('process_steps')): ?>
                    <?php $step_index = 0; ?>
                    <?php while (have_rows('process_steps')): the_row(); ?>
                        <?php
                        $step_icon  = get_sub_field('step_icon');
                        $step_label = get_sub_field('step_label');
                        ?>
                        <div class="hero-process-step hero-process-step--<?php echo esc_attr($step_index); ?> bm-display-flex bm-align-items-center bm-flex-direction-column">
                            <div class="hero-step-circle bm-display-flex bm-justify-content-center bm-align-items-center">
                                <?php if (!empty($step_icon)): ?>
                                    <img src="<?php echo esc_url($step_icon['url']); ?>" alt="<?php echo esc_attr($step_icon['alt'] ?: $step_label); ?>" class="hero-step-icon bm-util-9321">
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($step_label)): ?>
                                <span class="hero-step-label bm-color-112446 bm-font-weight-600 bm-text-align-center"><?php echo esc_html($step_label); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php $step_index++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="hero-center-circle bm-display-flex bm-justify-content-center bm-align-items-center bm-flex-direction-column">
                    <?php if (have_rows('center_logos')): ?>
                        <div class="hero-logos-area bm-display-flex bm-justify-content-center bm-gap-8 bm-flex-wrap-wrap">
                            <?php while (have_rows('center_logos')): the_row(); ?>
                                <?php $logo = get_sub_field('logo'); ?>
                                <?php if (!empty($logo)): ?>
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="hero-logo-item">
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('testimonials')): ?>
                        <div class="hero-testimonial-slider swiper">
                            <div class="swiper-wrapper bm-display-flex">
                                <?php while (have_rows('testimonials')): the_row(); ?>
                                    <?php
                                    $t_avatar   = get_sub_field('avatar');
                                    $t_name     = get_sub_field('name');
                                    $t_position = get_sub_field('position');
                                    $t_quote    = get_sub_field('quote');
                                    $t_rating   = get_sub_field('rating_image');
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="hero-testimonial-top bm-display-flex bm-align-items-center bm-gap-8">
                                            <?php if (!empty($t_avatar)): ?>
                                                <img src="<?php echo esc_url($t_avatar['url']); ?>" alt="<?php echo esc_attr($t_avatar['alt'] ?: $t_name); ?>" class="hero-testimonial-avatar">
                                            <?php endif; ?>
                                            <div class="hero-testimonial-info bm-display-flex bm-flex-direction-column">
                                                <?php if (!empty($t_name)): ?>
                                                    <span class="hero-testimonial-name bm-font-weight-600 bm-color-000000 bm-line-height-1-3"><?php echo esc_html($t_name); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($t_position)): ?>
                                                    <span class="hero-testimonial-position bm-font-weight-400 bm-color-000000 bm-line-height-1-3"><?php echo esc_html($t_position); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="hero-testimonial-bottom">
                                            <?php if (!empty($t_quote)): ?>
                                                <p class="hero-testimonial-quote bm-font-weight-400"><?php echo wp_kses_post($t_quote); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($t_rating)): ?>
                                                <img src="<?php echo esc_url($t_rating['url']); ?>" alt="Rating" class="hero-testimonial-rating">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="hero-slider-prev">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 1L1 7L7 13" stroke="#B7B7B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <div class="hero-slider-next bm-display-flex bm-justify-content-center bm-align-items-center">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L7 7L1 13" stroke="#B7B7B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php elseif ($layout === '2'): ?>
    <!-- ========== VARIANT 2: Centered layout ========== -->
    <div class="hero-content-center bm-display-flex bm-align-items-center bm-flex-direction-column bm-gap-40">
        <div class="hero-header-group bm-display-flex bm-align-items-center bm-flex-direction-column bm-gap-10">
            <?php if (!empty($tag_text)): ?>
                <span class="hero-tag bm-font-weight-400 bm-font-size-16 bm-text-align-center bm-color-313f58 bm-color-112446 bm-font-size-18"><?php echo esc_html($tag_text); ?></span>
            <?php endif; ?>
            <div class="hero-title-group bm-display-flex bm-align-items-center bm-flex-direction-column bm-gap-20">
                <?php if (!empty($title)): ?>
                    <h1 class="hero-title bm-heading-h1 bm-font-size-44 bm-font-weight-400 bm-color-112446 bm-line-height-1-2 bm-margin-0 bm-font-size-32"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <p class="hero-description bm-heading-h5 bm-font-weight-400 bm-margin-0 bm-font-size-20 bm-line-height-1-5 bm-color-313f58 bm-font-size-16-2 bm-color-112446"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($button_text)): ?>
            <a class="hero-cta-btn bm-font-family-poppins-sans-ser bm-justify-content-center bm-align-items-center bm-font-weight-400 bm-font-size-16 bm-display-inline-flex bm-color-ffffff bm-padding-14px-33px" href="<?php echo esc_url($button_url ?: '#'); ?>">
                <?php if (!empty($button_icon)): ?>
                    <img src="<?php echo esc_url($button_icon['url']); ?>" alt="" class="hero-btn-icon bm-util-9321">
                <?php endif; ?>
                <span><?php echo esc_html($button_text); ?></span>
            </a>
        <?php endif; ?>
    </div>

<?php elseif ($layout === '3'): ?>
    <!-- ========== VARIANT 3: Two-column with form ========== -->
    <div class="hero-content-wrapper bm-display-flex bm-align-items-center bm-flex-direction-column-2 bm-gap-40-2 bm-margin-0-auto">
        <div class="hero-text-column bm-display-flex bm-flex-direction-column bm-gap-40">
            <div class="hero-heading-group bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10">
                <?php if (!empty($tag_text)): ?>
                    <span class="hero-tag bm-font-weight-400 bm-color-313f58 bm-font-size-18"><?php echo esc_html($tag_text); ?></span>
                <?php endif; ?>
                <?php if (!empty($title)): ?>
                    <h1 class="hero-title bm-heading-h1 bm-font-size-44 bm-font-weight-400 bm-color-112446 bm-line-height-1-2 bm-margin-0 bm-font-size-32"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <p class="hero-description"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
            </div>
            <div class="hero-form-wrapper">
                <?php if (!empty($form_use_custom_code)): ?>
                    <div class="hero-form-custom-code">
                        <?php echo !empty($form_custom_code) ?  do_shortcode($form_custom_code) : ''; ?>
                    </div>
                <?php else: ?>
                    <?php
                    $form_action       = get_field('form_action_url');
                    $email_placeholder = get_field('form_email_placeholder') ?: 'Email Address';
                    $web_placeholder   = get_field('form_website_placeholder') ?: 'Your Website';
                    $form_btn_text     = get_field('form_button_text') ?: 'Ready to Migrate!';
                    ?>
                    <form class="hero-form bm-display-flex bm-flex-direction-column bm-gap-20" action="<?php echo esc_url($form_action ?: '#'); ?>" method="post">
                        <div class="hero-form-fields bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10">
                            <input type="email" class="hero-form-input bm-font-family-poppins-sans-ser bm-font-size-16 bm-padding-10px-20px" placeholder="<?php echo esc_attr($email_placeholder); ?>" required>
                            <input type="url" class="hero-form-input" placeholder="<?php echo esc_attr($web_placeholder); ?>">
                        </div>
                        <button type="submit" class="hero-form-submit bm-font-family-poppins-sans-ser bm-display-flex bm-justify-content-center bm-align-items-center bm-font-weight-400 bm-font-size-16 bm-color-ffffff">
                            <span><?php echo esc_html($form_btn_text); ?></span>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($hero_image)): ?>
            <div class="hero-image-column">
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="hero-image bm-display-block">
            </div>
        <?php endif; ?>
    </div>

<?php elseif ($layout === '4'): ?>
    <!-- ========== VARIANT 4: Two-column with quote and partner logos ========== -->
    <div class="hero-content-wrapper">
        <div class="hero-text-column">
            <div class="hero-text-group bm-display-flex bm-flex-direction-column">
                <?php if (!empty($tag_text)): ?>
                    <span class="hero-tag"><?php echo esc_html($tag_text); ?></span>
                <?php endif; ?>
                <div class="hero-heading-group">
                    <div class="hero-title-desc bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10">
                        <?php if (!empty($title)): ?>
                            <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <p class="hero-description"><?php echo wp_kses_post($description); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('checklist_items')): ?>
                        <div class="hero-checklist bm-flex-col bm-display-flex bm-flex-direction-column bm-gap-10">
                            <?php while (have_rows('checklist_items')): the_row(); ?>
                                <?php $item_text = get_sub_field('item_text'); ?>
                                <?php if (!empty($item_text)): ?>
                                    <div class="hero-checklist-item">
                                        <svg class="hero-check-icon" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4.25L6.75 12.5L3 8.75" stroke="#313F58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span class="hero-checklist-text"><?php echo esc_html($item_text); ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($button_text)): ?>
                <div class="hero-cta">
                    <a class="hero-cta-btn" href="<?php echo esc_url($button_url ?: '#'); ?>">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="hero-right-column bm-display-flex bm-align-items-center bm-flex-direction-column bm-gap-15">
            <?php if (!empty($wistia_video_id)): ?>
                <?php $wistia_id_esc = esc_attr(sanitize_text_field($wistia_video_id)); ?>
                <div class="hero-wistia-wrapper bm-video-responsive">
                    <div class="bm-video-responsive__inner">
                        <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . $wistia_id_esc . '?videoFoam=true'); ?>" title="<?php echo esc_attr__('Video', 'textdomain'); ?>" allow="autoplay; fullscreen" allowfullscreen class="bm-video-responsive__iframe"></iframe>
                    </div>
                </div>
            <?php elseif (!empty($hero_image)): ?>
                <div class="hero-image-wrapper">
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="hero-image bm-display-block">
                </div>
            <?php endif; ?>
            <div class="hero-quote-block bm-display-flex bm-align-items-center bm-flex-direction-column bm-gap-5">
                <?php if (!empty($quote_text)): ?>
                    <p class="hero-quote-text bm-font-weight-400 bm-color-112446 bm-margin-0 bm-font-size-20 bm-font-size-16-2"><?php echo wp_kses_post($quote_text); ?></p>
                <?php endif; ?>
                <?php if (!empty($quote_author)): ?>
                    <span class="hero-quote-author bm-font-weight-400 bm-color-313f58 bm-font-size-18 bm-font-size-14"><?php echo esc_html($quote_author); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (have_rows('partner_logos')): ?>
        <div class="hero-logos-bar bm-display-flex bm-justify-content-center bm-align-items-center bm-margin-0-auto bm-flex-wrap-wrap bm-gap-30">
            <?php while (have_rows('partner_logos')): the_row(); ?>
                <?php $logo = get_sub_field('logo'); ?>
                <?php if (!empty($logo)): ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="hero-partner-logo">
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

</section>

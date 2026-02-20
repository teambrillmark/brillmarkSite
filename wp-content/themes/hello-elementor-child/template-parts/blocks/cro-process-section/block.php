<?php
/**
 * CRO Process Section Block Template
 * 
 * @package theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ACF-ANNOTATED: true -->
<section class="cro-dev-wrapper" id="cro-dev-section">
    <div class="cro-dev-container">
        <div class="cro-dev-main">
            <div id="cro-process" class="cro-banner-title">
                <?php if (!empty(get_field('section_title'))): ?>
                    <h1 class="cro-title"><?php echo esc_html(get_field('section_title')); ?></h1>
                <?php endif; ?>
                <?php if (!empty(get_field('section_description'))): ?>
                    <p class="cro-para"><?php echo wp_kses_post(get_field('section_description')); ?></p>
                <?php endif; ?>
            </div>

            <div class="cro-tab-mobile">
                <div class="mobile-tab-accordion">
                    <?php 
                    $down_arrow = get_field('down_arrow_icon');
                    $up_arrow = get_field('up_arrow_icon');
                    $down_arrow_url = !empty($down_arrow) ? (is_array($down_arrow) ? $down_arrow['url'] : $down_arrow) : '';
                    $up_arrow_url = !empty($up_arrow) ? (is_array($up_arrow) ? $up_arrow['url'] : $up_arrow) : '';
                    if (have_rows('process_steps')): 
                        $step_index = 0;
                        while (have_rows('process_steps')): the_row();
                            $step_index++;
                            $step_title = get_sub_field('step_title');
                            $step_active_icon = get_sub_field('step_active_icon');
                            $step_inactive_icon = get_sub_field('step_inactive_icon');
                            $step_content_title = get_sub_field('step_content_title');
                            $step_checklist = get_sub_field('step_checklist');
                            $step_cta_text = get_sub_field('step_cta_text');
                            $step_cta_link = get_sub_field('step_cta_link');
                    ?>
                        <div class="mobile-tab-accordion-button">
                            <div class="accordion-title-image">
                                <?php if (!empty($step_active_icon)): 
                                    $active_icon_url = is_array($step_active_icon) ? $step_active_icon['url'] : $step_active_icon;
                                ?>
                                    <img class="accordion-icon image-active" src="<?php echo esc_url($active_icon_url); ?>" alt="<?php echo esc_attr($step_title . ' active'); ?>" />
                                <?php endif; ?>
                                <?php if (!empty($step_inactive_icon)): 
                                    $inactive_icon_url = is_array($step_inactive_icon) ? $step_inactive_icon['url'] : $step_inactive_icon;
                                ?>
                                    <img class="accordion-icon image-inactive" src="<?php echo esc_url($inactive_icon_url); ?>" alt="<?php echo esc_attr($step_title . ' inactive'); ?>" />
                                <?php endif; ?>
                                <?php if (!empty($step_title)): ?>
                                    <p class="mobile-acro-title"><?php echo esc_html($step_title); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($down_arrow_url)): ?>
                                <span class="icon down-arrow">
                                    <img src="<?php echo esc_url($down_arrow_url); ?>" alt="down arrow icon" />
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($up_arrow_url)): ?>
                                <span class="icon up-arrow">
                                    <img src="<?php echo esc_url($up_arrow_url); ?>" alt="up arrow icon" />
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="mobile-tab-accordion-content">
                            <div class="mobile-tab-accordion-content-text">
                                <?php if (!empty($step_content_title)): ?>
                                    <h3 class="mobile-content-title"><?php echo wp_kses_post($step_content_title); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($step_checklist)): ?>
                                    <ul class="mobile-list-tab">
                                        <?php foreach ($step_checklist as $item): ?>
                                            <li><?php echo wp_kses_post($item['list_item']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if (!empty($step_cta_text) || !empty($step_cta_link)): ?>
                                    <a class="discussion-link" href="<?php echo esc_url($step_cta_link ?: '#'); ?>">
                                        <button><?php echo esc_html($step_cta_text ?: 'Let\'s Discuss'); ?></button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php 
                        endwhile;
                    endif; ?>
                </div>
            </div>

            <div class="cro-pro-tab">
                <div class="cro-stepper-container">
                    <div class="stepper-wrapper">
                        <?php if (have_rows('process_steps')): 
                            $step_num = 0;
                            while (have_rows('process_steps')): the_row();
                                $step_num++;
                                $step_classes = '';
                                if ($step_num == 1) $step_classes = 'cro-first-item-horizontal cro-item-vertical';
                                elseif ($step_num == 2) $step_classes = 'cro-second-item-horizontal cro-item-vertical';
                                elseif ($step_num == 3) $step_classes = 'cro-third-item-horizontal cro-item-vertical';
                                elseif ($step_num == 4) $step_classes = 'cro-fourth-item-horizontal cro-item-vertical';
                                else $step_classes = 'cro-item-vertical';
                        ?>
                            <div class="stepper-item <?php echo esc_attr($step_classes); ?>">
                                <div class="step-counter"><span><?php echo esc_html($step_num); ?></span></div>
                            </div>
                        <?php 
                            endwhile;
                        endif; ?>
                    </div>
                </div>

                <div class="display-Wrap">
                    <div class="stepper-box-container">
                        <?php if (have_rows('process_steps')): 
                            while (have_rows('process_steps')): the_row();
                                $step_title = get_sub_field('step_title');
                                $step_active_icon = get_sub_field('step_active_icon');
                                $step_inactive_icon = get_sub_field('step_inactive_icon');
                        ?>
                            <div class="cro-stepper-box cro-box">
                                <div class="box-content">
                                    <?php if (!empty($step_active_icon)): 
                                        $active_icon_url = is_array($step_active_icon) ? $step_active_icon['url'] : $step_active_icon;
                                    ?>
                                        <img class="active-image" src="<?php echo esc_url($active_icon_url); ?>" alt="<?php echo esc_attr($step_title . ' active'); ?>" />
                                    <?php endif; ?>
                                    <?php if (!empty($step_inactive_icon)): 
                                        $inactive_icon_url = is_array($step_inactive_icon) ? $step_inactive_icon['url'] : $step_inactive_icon;
                                    ?>
                                        <img class="inactive-image" src="<?php echo esc_url($inactive_icon_url); ?>" alt="<?php echo esc_attr($step_title . ' inactive'); ?>" />
                                    <?php endif; ?>
                                    <?php if (!empty($step_title)): ?>
                                        <h4 class="desktop-tab-title-cro"><?php echo esc_html($step_title); ?></h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php 
                            endwhile;
                        endif; ?>
                    </div>
                    <div id="box-section" class="stepper-display">
                        <div class="display-content-wrapper">
                            <div class="display-image">
                                <?php 
                                $hero_images = array();
                                if (have_rows('hero_images')):
                                    while (have_rows('hero_images')): the_row();
                                        $hero_image = get_sub_field('hero_image');
                                        if (!empty($hero_image)) {
                                            $hero_images[] = is_array($hero_image) ? $hero_image['url'] : $hero_image;
                                        }
                                    endwhile;
                                endif;
                                $first_hero = !empty($hero_images) ? $hero_images[0] : '';
                                $hero_images_json = !empty($hero_images) ? json_encode($hero_images) : '[]';
                                ?>
                                <?php if (!empty($first_hero)): ?>
                                    <img class="display-cro-hero-image" src="<?php echo esc_url($first_hero); ?>" alt="process hero icon" data-images="<?php echo esc_attr($hero_images_json); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="display-text">
                                <?php if (have_rows('process_steps')): 
                                    $content_index = 1;
                                    while (have_rows('process_steps')): the_row();
                                        $step_content_title = get_sub_field('step_content_title');
                                        $step_checklist = get_sub_field('step_checklist');
                                ?>
                                    <div id="ul-<?php echo esc_attr($content_index); ?>" class="pro-tab-content">
                                        <?php if (!empty($step_content_title)): ?>
                                            <h1 class="pro-tab-title"><?php echo wp_kses_post($step_content_title); ?></h1>
                                        <?php endif; ?>
                                        <?php if (!empty($step_checklist)): ?>
                                            <ul>
                                                <?php foreach ($step_checklist as $item): ?>
                                                    <li><?php echo wp_kses_post($item['list_item']); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php 
                                        $content_index++;
                                    endwhile;
                                endif; ?>
                                <?php 
                                $main_cta_text = get_field('main_cta_text');
                                $main_cta_link = get_field('main_cta_link');
                                ?>
                                <?php if (!empty($main_cta_text) || !empty($main_cta_link)): ?>
                                    <a href="<?php echo esc_url($main_cta_link ?: '#'); ?>" class="lets-discuss-btn"><?php echo esc_html($main_cta_text ?: 'Let\'s Start the Conversation'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

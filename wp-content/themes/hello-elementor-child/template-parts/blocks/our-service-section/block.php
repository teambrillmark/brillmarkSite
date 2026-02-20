<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Our Services Section Block Template
 *
 * @package Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$section_title = get_field('section_title');
?>

<section class="our-service-section">
    <div class="container">
        <div class="our-service-section__wrapper">
            <div class="our-service-section__header">
                <div class="our-service-section__title-wrapper">
                    <?php if (!empty($section_title)): ?>
                        <h2 class="our-service-section__title"><?php echo esc_html($section_title); ?></h2>
                    <?php endif; ?>
                </div>
                
                <?php if (have_rows('service_tabs')): ?>
                <div class="our-service-section__tabs-container">
                    <div class="our-service-section__tabs-row">
                        <?php 
                        $tab_index = 0;
                        while (have_rows('service_tabs')): the_row();
                            $tab_title = get_sub_field('tab_title');
                            $is_active = get_sub_field('is_active');
                            $active_class = $is_active ? ' our-service-section__tab--active' : '';
                            
                            // First 5 tabs in first row
                            if ($tab_index < 5):
                        ?>
                            <button class="our-service-section__tab<?php echo esc_attr($active_class); ?>" role="button" data-tab-index="<?php echo esc_attr($tab_index); ?>">
                                <?php if (!empty($tab_title)): ?>
                                    <span class="our-service-section__tab-text"><?php echo esc_html($tab_title); ?></span>
                                <?php endif; ?>
                            </button>
                        <?php 
                            endif;
                            $tab_index++;
                        endwhile;
                        ?>
                    </div>
                    <div class="our-service-section__tabs-row">
                        <?php 
                        $tab_index = 0;
                        while (have_rows('service_tabs')): the_row();
                            $tab_title = get_sub_field('tab_title');
                            $is_active = get_sub_field('is_active');
                            $active_class = $is_active ? ' our-service-section__tab--active' : '';
                            
                            // Remaining tabs in second row
                            if ($tab_index >= 5):
                        ?>
                            <button class="our-service-section__tab<?php echo esc_attr($active_class); ?>" role="button" data-tab-index="<?php echo esc_attr($tab_index); ?>">
                                <?php if (!empty($tab_title)): ?>
                                    <span class="our-service-section__tab-text"><?php echo esc_html($tab_title); ?></span>
                                <?php endif; ?>
                            </button>
                        <?php 
                            endif;
                            $tab_index++;
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php if (have_rows('service_slides')): ?>
            <div class="our-service-section__slider swiper">
                <!-- Fade effects (outside swiper-wrapper) -->
                <div class="our-service-section__slider-fade our-service-section__slider-fade--left">
                    <div class="our-service-section__slider-fade-bg"></div>
                    <div class="our-service-section__slider-fade-overlay"></div>
                </div>
                <div class="our-service-section__slider-fade our-service-section__slider-fade--right">
                    <div class="our-service-section__slider-fade-bg"></div>
                    <div class="our-service-section__slider-fade-overlay"></div>
                </div>
                
                <!-- Swiper wrapper -->
                <div class="swiper-wrapper">
                    <?php
                    $slide_index = 0;
                    while (have_rows('service_slides')): the_row();
                        $service_title = get_sub_field('service_title');
                        $cta_text = get_sub_field('cta_text');
                        $cta_link = get_sub_field('cta_link');
                        $cta_url = '#';
                        $cta_target = '_self';
                        if (!empty($cta_link)) {
                            $cta_url = is_array($cta_link) ? ($cta_link['url'] ?? '#') : $cta_link;
                            $cta_target = (is_array($cta_link) && !empty($cta_link['target'])) ? $cta_link['target'] : '_self';
                        }
                    ?>
                    <div class="swiper-slide"
                         data-slide-index="<?php echo esc_attr($slide_index); ?>"
                         data-cta-text="<?php echo esc_attr((string) ($cta_text ?? '')); ?>"
                         data-cta-url="<?php echo esc_url($cta_url); ?>"
                         data-cta-target="<?php echo esc_attr($cta_target); ?>">
                        <div class="our-service-section__content-card">
                            <div class="our-service-section__content-inner">
                                <div class="our-service-section__service-header">
                                    <?php if (!empty($service_title)): ?>
                                        <h3 class="our-service-section__service-title"><?php echo esc_html($service_title); ?></h3>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="our-service-section__content-columns">
                                    <?php if (have_rows('platform_logos')): ?>
                                    <div class="our-service-section__logos-column">
                                        <?php 
                                        $logos = array();
                                        while (have_rows('platform_logos')): the_row();
                                            $logo = get_sub_field('logo');
                                            if (!empty($logo)) {
                                                $logos[] = $logo;
                                            }
                                        endwhile;
                                        
                                        // Split logos into rows
                                        $row1 = array_slice($logos, 0, 3);
                                        $row2 = array_slice($logos, 3, 3);
                                        $row3 = array_slice($logos, 6, 2);
                                        ?>
                                        
                                        <?php if (!empty($row1)): ?>
                                        <div class="our-service-section__logos-row">
                                            <?php foreach ($row1 as $logo): 
                                                $logo_url = is_array($logo) ? $logo['url'] : $logo;
                                            ?>
                                                <div class="our-service-section__logo-item" style="background-image: url(<?php echo esc_url($logo_url); ?>);"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($row2)): ?>
                                        <div class="our-service-section__logos-row">
                                            <?php foreach ($row2 as $logo): 
                                                $logo_url = is_array($logo) ? $logo['url'] : $logo;
                                            ?>
                                                <div class="our-service-section__logo-item" style="background-image: url(<?php echo esc_url($logo_url); ?>);"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($row3)): ?>
                                        <div class="our-service-section__logos-row">
                                            <?php foreach ($row3 as $logo): 
                                                $logo_url = is_array($logo) ? $logo['url'] : $logo;
                                            ?>
                                                <div class="our-service-section__logo-item" style="background-image: url(<?php echo esc_url($logo_url); ?>);"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if (have_rows('features')): ?>
                                    <div class="our-service-section__features-column">
                                        <div class="our-service-section__features-list">
                                            <?php while (have_rows('features')): the_row();
                                                $feature_icon = get_sub_field('feature_icon');
                                                $feature_text = get_sub_field('feature_text');
                                                $icon_url = !empty($feature_icon) ? (is_array($feature_icon) ? $feature_icon['url'] : $feature_icon) : '';
                                            ?>
                                            <div class="our-service-section__feature-item">
                                                <?php if (!empty($icon_url)): ?>
                                                    <div class="our-service-section__feature-icon" style="background-image: url(<?php echo esc_url($icon_url); ?>);"></div>
                                                <?php endif; ?>
                                                <?php if (!empty($feature_text)): 
                                                    // Split text at colon to make title bold
                                                    $parts = explode(':', $feature_text, 2);
                                                    $title = trim($parts[0]);
                                                    $description = isset($parts[1]) ? trim($parts[1]) : '';
                                                ?>
                                                    <span class="our-service-section__feature-text" title="<?php echo esc_attr($feature_text); ?>">
                                                        <?php if (!empty($description)): ?>
                                                            <strong class="our-service-section__feature-title"><?php echo esc_html($title); ?></strong> <span class="our-service-section__feature-desc"><?php echo esc_html($description); ?></span>
                                                        <?php else: ?>
                                                            <?php echo esc_html($feature_text); ?>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $slide_index++;
                    endwhile; 
                    ?>
                </div>
                
                <!-- Navigation buttons (outside swiper-wrapper) -->
                <button class="our-service-section__nav-btn our-service-section__nav-btn--prev swiper-button-prev" aria-label="Previous slide">
                    <span class="our-service-section__nav-btn-bg"></span>
                    <svg class="our-service-section__nav-btn-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 6L9 12L15 18" stroke="#e4e4e4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="our-service-section__nav-btn our-service-section__nav-btn--next swiper-button-next" aria-label="Next slide">
                    <span class="our-service-section__nav-btn-bg"></span>
                    <svg class="our-service-section__nav-btn-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6L15 12L9 18" stroke="#e4e4e4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                
                <!-- CTA wrapper (outside swiper-wrapper, updates based on active slide) -->
                <div class="our-service-section__cta-wrapper">
                    <a href="#" class="our-service-section__cta-btn" target="_self">
                        <span class="our-service-section__cta-text"></span>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

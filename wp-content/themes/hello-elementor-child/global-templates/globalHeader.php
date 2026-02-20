	<!-- ACF-ANNOTATED: true -->
    <?php
/**
 * Navbar Section Block Template
 *
 * @package Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Require ACF when used outside block context (e.g. in header) to avoid fatal errors
if (!function_exists('get_field') || !function_exists('have_rows')) {
    return;
}

// Get ACF fields with safe defaults
$logo = get_field('logo', 'option');
$cta_text = get_field('cta_text', 'option');
$cta_link = get_field('cta_link', 'option');
$sidebar_title = get_field('sidebar_title', 'option');
$featured_label = get_field('featured_label', 'option');
$featured_title = get_field('featured_title', 'option');
$featured_description = get_field('featured_description', 'option');
$featured_description_color_text = get_field('featured_description_color_text', 'option');
$featured_link = get_field('featured_link_url', 'option');
$featured_icon = get_field('featured_badge', 'option');

// Normalize link fields (ACF can return array with 'url' key)
if (is_array($cta_link) && isset($cta_link['url'])) {
    $cta_link = $cta_link['url'];
}
if (is_array($featured_link) && isset($featured_link['url'])) {
    $featured_link = $featured_link['url'];
}

// Build services data once for desktop mega menu and mobile dropdown
$services = array();
if (have_rows('services', 'option')) {
    while (have_rows('services', 'option')) {
        the_row();
        $services[] = array(
            'icon' => get_sub_field('icon'),
            'title' => get_sub_field('title'),
            'description' => get_sub_field('description'),
            'link' => get_sub_field('url'),
        );
    }
}
$service_rows = !empty($services) ? array_chunk($services, 3) : array();

// Output services grid HTML once (dynamic from ACF or full default fallback) for both desktop and mobile
ob_start();
if (!empty($service_rows)) {
    foreach ($service_rows as $row) {
        echo '<div class="navbar-section-services-row">';
        foreach ($row as $service) {
            $icon_url = !empty($service['icon']) && is_array($service['icon']) ? $service['icon']['url'] : get_template_directory_uri() . '/service-icon.svg';
            $icon_alt = !empty($service['icon']) && is_array($service['icon']) ? ($service['icon']['alt'] ?? $service['title'] ?? '') : 'Service';
            $title = !empty($service['title']) ? $service['title'] : 'Service Title';
            $desc = !empty($service['description']) ? $service['description'] : 'Lorem Ipsum is simply dummy text of the printing and';
            $link = !empty($service['link']) ? $service['link'] : '';
            $link_url = is_array($link) ? ($link['url'] ?? '') : $link;
            $link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
            ?>

            <div class="navbar-section-service-item">
                <div class="navbar-section-service-header">
                    <div class="navbar-section-service-icon-wrapper">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" width="44" height="25">
                    </div>
                    <span class="navbar-section-service-title"><?php echo esc_html($title); ?></span>
                </div>
                <?php if (!empty($link_url)): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="navbar-section-service-link">
                        <span class="navbar-section-service-desc"><?php echo esc_html($desc); ?></span>
                    </a>
                <?php else: ?>
                    <span class="navbar-section-service-desc"><?php echo esc_html($desc); ?></span>
                <?php endif; ?>
            </div>
            <?php
        }
        echo '</div>';
    }
} 
$services_grid_html = ob_get_clean();
?>
<section class="navbar-section-section" role="navigation">
  <div class="container">
    <header class="navbar-section-header">
      <div class="navbar-section-header-wrapper navbar-section-desktop-only">
        <div class="navbar-section-logo-wrapper">
          <?php if (!empty($logo) && is_array($logo) && !empty($logo['url'])): ?>
            <img class="navbar-section-logo" width="200" height="46" alt="<?php echo esc_attr($logo['alt'] ?? 'Logo'); ?>" src="<?php echo esc_url($logo['url']); ?>" role="img">
          <?php else: ?>
            <img class="navbar-section-logo" width="200" height="46" alt="Brillmark Logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/main-logo.png" role="img">
          <?php endif; ?>
        </div>
        <nav class="navbar-section-nav">
          <?php if (function_exists('have_rows') && have_rows('nav_items', 'option')): ?>
            <?php while (have_rows('nav_items', 'option')): the_row();
              $item_label = get_sub_field('label');
              $item_link = get_sub_field('link');
              $has_dropdown = get_sub_field('has_dropdown');
              ?>
              <?php if (!empty($has_dropdown)): ?>
                <div class="navbar-section-nav-dropdown" data-dropdown-trigger aria-haspopup="true" aria-expanded="false">
                  <span class="navbar-section-nav-item navbar-section-nav-item--active"><?php echo esc_html($item_label); ?></span>
                  <div class="navbar-section-chevron-icon">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2 4L6 8L10 4" stroke="#0960a8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>
                </div>
              <?php else: ?>
                <a href="<?php echo esc_url($item_link ?? '#'); ?>" class="navbar-section-nav-item"><?php echo esc_html($item_label); ?></a>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php else: ?>
            <a href="#" class="navbar-section-nav-item">Home</a>
            <div class="navbar-section-nav-dropdown" data-dropdown-trigger aria-haspopup="true" aria-expanded="false">
              <span class="navbar-section-nav-item navbar-section-nav-item--active">Services</span>
              <div class="navbar-section-chevron-icon">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 4L6 8L10 4" stroke="#0960a8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>
            <a href="#" class="navbar-section-nav-item">About Us</a>
            <a href="#" class="navbar-section-nav-item">Our Blogs</a>
            <a href="#" class="navbar-section-nav-item">Referral</a>
          <?php endif; ?>
          <div class="navbar-section-cta-wrapper">
          <a href="<?php echo esc_url(!empty($cta_link) ? $cta_link : '#'); ?>" class="navbar-section-cta-btn"><?php echo esc_html(!empty($cta_text) ? $cta_text : "Let's Talk!"); ?></a>
        </div>
        </nav>
      </div>
      <div class="navbar-section-mobile-header">
        <div class="navbar-section-logo-wrapper">
          <?php if (!empty($logo) && is_array($logo) && !empty($logo['url'])): ?>
            <img class="navbar-section-logo" width="200" height="46" alt="<?php echo esc_attr($logo['alt'] ?? 'Logo'); ?>" src="<?php echo esc_url($logo['url']); ?>" role="img">
          <?php else: ?>
            <img class="navbar-section-logo" width="200" height="46" alt="Brillmark Logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/main-logo.png" role="img">
          <?php endif; ?>
        </div>
		  <div class="navbar-section-container">
			<a href="<?php echo esc_url(!empty($cta_link) ? $cta_link : '#'); ?>" class="navbar-section-cta-btn navbar-section-mobile-cta"><?php echo esc_html(!empty($cta_text) ? $cta_text : "Let's Talk!"); ?></a>
			<button type="button" class="navbar-section-hamburger-btn" aria-label="Toggle menu" aria-expanded="false">
			  <span class="navbar-section-hamburger-icon navbar-section-hamburger-open">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
			  </span>
			  <span class="navbar-section-hamburger-icon navbar-section-hamburger-close">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
			  </span>
			</button>
		  </div>
      </div>
    </header>
    <div class="navbar-section-mobile-menu" id="navbar-section-mobile-menu" aria-hidden="true">
      <nav class="navbar-section-mobile-nav">
        <?php if (function_exists('have_rows') && have_rows('nav_items')): ?>
          <?php while (have_rows('nav_items')): the_row();
            $item_label = get_sub_field('label');
            $item_link = get_sub_field('link');
            $has_dropdown = get_sub_field('has_dropdown');
            ?>
            <?php if (!empty($has_dropdown)): ?>
              <div class="navbar-section-nav-dropdown navbar-section-mobile-dropdown-trigger" data-mobile-dropdown-trigger aria-haspopup="true" aria-expanded="false">
                <span class="navbar-section-nav-item navbar-section-nav-item--active"><?php echo esc_html($item_label); ?></span>
                <div class="navbar-section-chevron-icon">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 4L6 8L10 4" stroke="#0960a8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
              </div>
              <div class="navbar-section-mobile-dropdown-content" aria-hidden="true">
                <div class="navbar-section-services-grid navbar-section-mobile-services-grid">
                  <?php echo $services_grid_html; ?>
                </div>
              </div>
            <?php else: ?>
              <a href="<?php echo esc_url($item_link ?? '#'); ?>" class="navbar-section-nav-item"><?php echo esc_html($item_label); ?></a>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <a href="#" class="navbar-section-nav-item">Home</a>
          <div class="navbar-section-nav-dropdown navbar-section-mobile-dropdown-trigger" data-mobile-dropdown-trigger aria-haspopup="true" aria-expanded="false">
            <span class="navbar-section-nav-item navbar-section-nav-item--active">Services</span>
            <div class="navbar-section-chevron-icon">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 4L6 8L10 4" stroke="#0960a8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="navbar-section-mobile-dropdown-content" aria-hidden="true">
            <div class="navbar-section-services-grid navbar-section-mobile-services-grid">
              <?php echo $services_grid_html; ?>
            </div>
          </div>
          <a href="#" class="navbar-section-nav-item">About Us</a>
          <a href="#" class="navbar-section-nav-item">Our Blogs</a>
          <a href="#" class="navbar-section-nav-item">Referral</a>
        <?php endif; ?>
      </nav>
      <div class="navbar-section-mobile-sidebar">
        <span class="navbar-section-sidebar-title"><?php echo esc_html(!empty($sidebar_title) ? $sidebar_title : 'more from brillmark'); ?></span>
        <div class="navbar-section-featured-card">
          <div class="navbar-section-featured-content">
            <div class="navbar-section-featured-header">
              <div class="navbar-section-featured-badge">
                <div class="navbar-section-featured-icon">
                  <?php if (!empty($featured_icon) && is_array($featured_icon)): ?>
                    <img src="<?php echo esc_url($featured_icon['url']); ?>" alt="<?php echo esc_attr($featured_icon['alt'] ?? 'Featured'); ?>" width="18" height="25">
                  <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/shopify-icon.png" alt="Shopify" width="18" height="25">
                  <?php endif; ?>
                </div>
              </div>
              <span class="navbar-section-featured-label"><?php echo esc_html(!empty($featured_label) ? $featured_label : 'Featured Case Study'); ?></span>
            </div>
            <div class="navbar-section-featured-info">
              <span class="navbar-section-featured-title"><?php echo esc_html(!empty($featured_title) ? $featured_title : 'Shopify Toplids Migration'); ?></span>
              <span class="navbar-section-featured-desc"><?php echo esc_html(!empty($featured_description) ? $featured_description : 'Discover how we achieved a'); ?></span>
				<span class="colored-text"><?php echo esc_html(!empty($featured_description_color_text) ? $featured_description_color_text : '128% conversion uplift.'); ?></span>
            </div>
          </div>
          <a href="<?php echo esc_url(!empty($featured_link) ? $featured_link : '#'); ?>" class="navbar-section-featured-link">
            <span class="navbar-section-featured-link-text">Read full story</span>
            <div class="navbar-section-arrow-icon">
              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.625 3.125L10 7.5L5.625 11.875" stroke="#007aff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </a>
        </div>
      </div>
    </div>
    
    <div class="navbar-section-dropdown-overlay"></div>
    <div class="navbar-section-dropdown-bg"></div>
    
    <div class="navbar-section-mega-menu">
		<div class="navbar-section-mega-menu-wrapper">
      <div class="navbar-section-sidebar">
        <span class="navbar-section-sidebar-title"><?php echo esc_html(!empty($sidebar_title) ? $sidebar_title : 'more from brillmark'); ?></span>
        <div class="navbar-section-featured-card">
          <div class="navbar-section-featured-content">
            <div class="navbar-section-featured-header">
              <div class="navbar-section-featured-badge">
                <div class="navbar-section-featured-icon">
                  <?php if (!empty($featured_icon) && is_array($featured_icon) && !empty($featured_icon['url'])): ?>
                    <img src="<?php echo esc_url($featured_icon['url']); ?>" alt="<?php echo esc_attr($featured_icon['alt'] ?? 'Featured'); ?>" width="18" height="25">
                  <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/shopify-icon.png" alt="Shopify" width="18" height="25">
                  <?php endif; ?>
                </div>
              </div>
              <span class="navbar-section-featured-label"><?php echo esc_html(!empty($featured_label) ? $featured_label : 'Featured Case Study'); ?></span>
            </div>
            <div class="navbar-section-featured-info">
              <span class="navbar-section-featured-title"><?php echo esc_html(!empty($featured_title) ? $featured_title : 'Shopify Toplids Migration'); ?></span>
              <span class="navbar-section-featured-desc"><?php echo esc_html(!empty($featured_description) ? $featured_description : 'Discover how we achieved a 128% conversion uplift.'); ?></span>
				<span class="colored-text"><?php echo esc_html(!empty($featured_description_color_text) ? $featured_description_color_text : '128% conversion uplift.'); ?></span>
            </div>
          </div>
          <a href="<?php echo esc_url(is_string($featured_link) && $featured_link !== '' ? $featured_link : '#'); ?>" class="navbar-section-featured-link">
            <span class="navbar-section-featured-link-text">Read full story</span>
            <div class="navbar-section-arrow-icon">
              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.625 3.125L10 7.5L5.625 11.875" stroke="#007aff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </a>
        </div>
      </div>
      
      <hr class="navbar-section-divider">
      
      <div class="navbar-section-services-grid">
        <?php echo $services_grid_html; ?>
      </div>
    </div>
	  </div>
  </div>
</section>
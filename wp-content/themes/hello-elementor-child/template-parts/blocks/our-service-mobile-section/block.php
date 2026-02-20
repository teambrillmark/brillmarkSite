<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Our Service Section Block Template
 */

// Get field values
$section_title = get_field('section_title');
$service_tabs = get_field('service_tabs');
$check_icon = get_field('check_icon');
?>
<section class="our-service-section-section">
  <div class="container">
    <div class="our-service-section-wrapper">
      <?php if (!empty($section_title)) : ?>
      <h2 class="our-service-section-title"><?php echo esc_html($section_title); ?></h2>
      <?php endif; ?>
      
      <?php if (!empty($service_tabs) && is_array($service_tabs)) : ?>
      <div class="our-service-section-cards">
        <?php foreach ($service_tabs as $tab) : 
          $cta_text_for_card = !empty($tab['cta_text']) ? $tab['cta_text'] : '';
          $cta_link_for_card = !empty($tab['cta_link']) ? $tab['cta_link'] : '#';
        ?>
        <?php $trimText = explode(' ', $tab['service_title'], 2) ?>
        <div class="our-service-section-card <?php echo esc_html($trimText[0]); ?>">
          <div class="our-service-section-card-inner">
            <?php if (!empty($tab['service_title'])) : ?>
            <h3 class="our-service-section-service-title"><?php echo esc_html($tab['service_title']); ?></h3>
            <?php endif; ?>
            
            <?php if (!empty($tab['features']) && is_array($tab['features'])) : ?>
            <div class="our-service-section-features-list">
              <?php foreach ($tab['features'] as $feature) : 
                if (!empty($feature['feature_text'])) :
                  // Split text at colon to make title bold
                  $parts = explode(':', $feature['feature_text'], 2);
                  $title = trim($parts[0]);
                  $description = isset($parts[1]) ? trim($parts[1]) : '';
              ?>
              <div class="our-service-section-feature-item">
                <?php 
                $icon_url = !empty($check_icon) ? (is_array($check_icon) ? $check_icon['url'] : $check_icon) : '';
                if (!empty($icon_url)) : 
                ?>
                <img class="our-service-section-check-icon" width="15" height="15" alt="Check" src="<?php echo esc_url($icon_url); ?>">
                <?php endif; ?>
                <span class="our-service-section-feature-text">
                  <?php if (!empty($description)): ?>
                    <strong class="our-service-section-feature-title"><?php echo esc_html($title); ?>:</strong> <span class="our-service-section-feature-desc"><?php echo esc_html($description); ?></span>
                  <?php else: ?>
                    <?php echo esc_html($feature['feature_text']); ?>
                  <?php endif; ?>
                </span>
              </div>
              <?php endif; endforeach; ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($tab['platform_logos']) && is_array($tab['platform_logos'])) : ?>
            <div class="our-service-section-logos-grid">
              <?php 
              $logos = $tab['platform_logos'];
              $logos_chunks = array_chunk($logos, 2); // 2 columns as per image
              foreach ($logos_chunks as $chunk) : 
              ?>
              <div class="our-service-section-logos-row">
                <?php foreach ($chunk as $logo) : 
                  if (!empty($logo['logo_image'])) :
                    $logo_url = is_array($logo['logo_image']) ? $logo['logo_image']['url'] : $logo['logo_image'];
                    $logo_alt = is_array($logo['logo_image']) ? ($logo['logo_image']['alt'] ?? 'Platform logo') : 'Platform logo';
                ?>
                <img class="our-service-section-logo" alt="<?php echo esc_attr($logo_alt); ?>" src="<?php echo esc_url($logo_url); ?>">
                <?php endif; endforeach; ?>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($cta_text_for_card)) : ?>
            <div class="our-service-section-cta-wrapper">
              <a class="our-service-section-cta-link" href="<?php echo esc_url($cta_link_for_card); ?>">
                <span class="our-service-section-cta-text"><?php echo esc_html($cta_text_for_card); ?></span>
              </a>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

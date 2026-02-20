<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Shopify Dev Services Section Block Template
 */

$heading = get_field('heading');
$description = get_field('description');
$services = get_field('services');
$wrapper = theme_get_block_wrapper_attributes($block, 'blocks-common-section shopify-dev-services-section-section');

?>
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>">
  <div class="blocks-common-container container">
    <div class="shopify-dev-services-section-header">
      <?php if (!empty($heading)): ?>
        <h2 class="shopify-dev-services-section-title"><?php echo esc_html($heading); ?></h2>
      <?php endif; ?>
      <?php if (!empty($description)): ?>
        <p class="shopify-dev-services-section-subtitle"><?php echo wp_kses_post($description); ?></p>
      <?php endif; ?>
    </div>
    <?php if (!empty($services) && is_array($services)): ?>
    <div class="shopify-dev-services-section-content">
      <!-- Tab navigation (desktop) -->
      <div class="shopify-dev-services-section-tabs" role="tablist" aria-label="<?php echo esc_attr(!empty($heading) ? $heading : 'Shopify Development Services'); ?>">
        <?php foreach ($services as $index => $service): ?>
          <?php
            $tab_title = !empty($service['service_title']) ? $service['service_title'] : '';
            $is_first = ($index === 0);
          ?>
          <?php if (!empty($tab_title)): ?>
          <button class="shopify-dev-services-section-tab<?php echo $is_first ? ' active' : ''; ?>" role="tab" aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo esc_attr($index); ?>" data-tab-index="<?php echo esc_attr($index); ?>">
            <span class="shopify-dev-services-section-tab-text"><?php echo esc_html($tab_title); ?></span>
            <span class="shopify-dev-services-section-tab-arrow">
              <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5.5L1 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </button>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <!-- Content panels -->
      <div class="shopify-dev-services-section-panels">
        <?php foreach ($services as $index => $service): ?>
          <?php
            $service_title = !empty($service['service_title']) ? $service['service_title'] : '';
            $service_desc = !empty($service['service_description']) ? $service['service_description'] : '';
            $bullet_points = !empty($service['bullet_points']) ? $service['bullet_points'] : array();
            $button_text = !empty($service['button_text']) ? $service['button_text'] : 'Schedule FREE strategy session';
            $button_link = !empty($service['button_link']) ? $service['button_link'] : '#';
            $is_first = ($index === 0);
          ?>
          <div class="shopify-dev-services-section-panel<?php echo $is_first ? ' active' : ''; ?>" id="panel-<?php echo esc_attr($index); ?>" role="tabpanel" data-panel-index="<?php echo esc_attr($index); ?>">
            <div class="shopify-dev-services-section-panel-inner">
              <div class="shopify-dev-services-section-panel-header">
                <?php if (!empty($service_title)): ?>
                  <h3 class="shopify-dev-services-section-panel-title"><?php echo esc_html($service_title); ?></h3>
                <?php endif; ?>
                <?php if (!empty($service_desc)): ?>
                  <p class="shopify-dev-services-section-panel-desc"><?php echo wp_kses_post($service_desc); ?></p>
                <?php endif; ?>
              </div>
              <?php if (!empty($bullet_points) && is_array($bullet_points)): ?>
              <ul class="shopify-dev-services-section-bullet-list">
                <?php foreach ($bullet_points as $bullet): ?>
                  <?php if (!empty($bullet['bullet_text'])): ?>
                  <li class="shopify-dev-services-section-bullet-item">
                    <span class="shopify-dev-services-section-bullet-dot" aria-hidden="true"></span>
					  <?php
						  $parts = explode(':', $bullet['bullet_text'], 2);
						  $title = trim($parts[0]);
						  $description = isset($parts[1]) ? trim($parts[1]) : '';
					  ?>
					  <span class="shopify-dev-services-section-bullet-text"> <strong><?php echo esc_html($title); ?>:</strong> <?php echo esc_html($description); ?></span>
                  </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
              <?php if (!empty($button_text)): ?>
              <a class="shopify-dev-services-section-cta" href="<?php echo esc_url($button_link); ?>"><?php echo esc_html($button_text); ?></a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

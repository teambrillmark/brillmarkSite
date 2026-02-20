<?php
/**
 * our-process-new-section Block Template
 * ACF-ANNOTATED: true
 * 
 * @var array $block The block settings and attributes.
 */

$section_title = get_field('section_title');
$section_description = get_field('section_description');
$process_tabs = get_field('process_tabs');
$wrapper = theme_get_block_wrapper_attributes($block, 'our-process-new-section-section');

?>

<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="our-process-new-section-header">
      <?php if (!empty($section_title)): ?>
        <h1 class="our-process-new-section-title"><?php echo esc_html($section_title); ?></h1>
      <?php endif; ?>
      
      <?php if (!empty($section_description)): ?>
        <p class="our-process-new-section-description"><?php echo wp_kses_post($section_description); ?></p>
      <?php endif; ?>
    </div>
    
    <?php if (!empty($process_tabs) && is_array($process_tabs)): ?>
    <div class="our-process-new-section-tabs">
      <div class="our-process-new-section-tab-buttons" role="tablist">
        <?php foreach ($process_tabs as $index => $tab): 
          $tab_icon = !empty($tab['tab_icon']) && is_array($tab['tab_icon']) ? $tab['tab_icon'] : null;
          $tab_title = !empty($tab['tab_title']) ? $tab['tab_title'] : '';
          $content_image = !empty($tab['content_image']) && is_array($tab['content_image']) ? $tab['content_image'] : null;
          // Get description - ACF repeater field access
          $description = !empty($tab['description']) ? $tab['description'] : '';
          $checklist_items = !empty($tab['checklist_items']) && is_array($tab['checklist_items']) ? $tab['checklist_items'] : array();
          $cta = !empty($tab['cta']) && is_array($tab['cta']) ? $tab['cta'] : null;
          $cta_text = !empty($cta['text']) ? $cta['text'] : '';
          $cta_url = !empty($cta['url']) ? $cta['url'] : '';
          $is_active = $index === 0;
        ?>
          <div class="our-process-new-section-accordion-item">
            <button 
              class="our-process-new-section-tab-button <?php echo $is_active ? 'active' : ''; ?>" 
              role="tab" 
              aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>" 
              aria-controls="tab-content-<?php echo esc_attr($index); ?>" 
              data-tab-index="<?php echo esc_attr($index); ?>"
              id="tab-<?php echo esc_attr($index); ?>"
            >
              <?php if (!empty($tab_icon) && !empty($tab_icon['url'])): ?>
                <div class="our-process-new-section-tab-icon">
                  <img src="<?php echo esc_url($tab_icon['url']); ?>" alt="<?php echo esc_attr(!empty($tab_icon['alt']) ? $tab_icon['alt'] : 'Tab Icon'); ?>">
                </div>
              <?php endif; ?>
              
              <?php if (!empty($tab_title)): 
                // Remove number prefix for mobile (e.g., "1. Assess the Idea" → "Assess the Idea")
                $title_with_number = esc_html($tab_title);
                $title_without_number = preg_replace('/^\d+\.\s*/', '', $tab_title);
              ?>
                <span class="our-process-new-section-tab-title" data-title-full="<?php echo esc_attr($title_with_number); ?>" data-title-short="<?php echo esc_attr($title_without_number); ?>">
                  <?php echo $title_with_number; ?>
                </span>
              <?php endif; ?>
            </button>
            
            <div 
              class="our-process-new-section-tab-content <?php echo $is_active ? 'active' : ''; ?>" 
              id="tab-content-<?php echo esc_attr($index); ?>" 
              role="tabpanel" 
              aria-labelledby="tab-<?php echo esc_attr($index); ?>"
              data-tab-index="<?php echo esc_attr($index); ?>"
            >
              <?php if (!empty($content_image) && !empty($content_image['url'])): ?>
                <div class="our-process-new-section-content-image">
                  <img src="<?php echo esc_url($content_image['url']); ?>" alt="<?php echo esc_attr(!empty($content_image['alt']) ? $content_image['alt'] : 'Process Image'); ?>">
                </div>
              <?php endif; ?>
              
              <div class="our-process-new-section-content-details">
                <?php 
                // Ensure description is retrieved correctly
                if (empty($description) && isset($tab['description'])) {
                  $description = $tab['description'];
                }
                ?>
                <?php if (!empty($description) && trim($description) !== ''): ?>
                  <p class="our-process-new-section-content-text"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($checklist_items)): ?>
                  <div class="our-process-new-section-checklist">
                    <?php 
                    // Define check icon path - use WordPress theme directory
                    $check_icon_path = '/wp-content/uploads/2026/01/blue-check.svg';
                    $check_icon_url = '/wp-content/uploads/2026/01/blue-check.svg';
                    
                    // Fallback to output directory if theme file doesn't exist
                    if (!file_exists($check_icon_path)) {
                      $check_icon_url = '/wp-content/uploads/2026/01/blue-check.svg';
                    }
                    
                    foreach ($checklist_items as $item): 
                      $item_text = !empty($item['item_text']) ? $item['item_text'] : '';
                    ?>
                      <?php if (!empty($item_text)): ?>
                        <div class="our-process-new-section-checklist-item">
                          <img src="<?php echo esc_url($check_icon_url); ?>" alt="Check Icon" class="our-process-new-section-check-icon" width="15" height="15">
                          <span class="our-process-new-section-checklist-title"><?php echo esc_html($item_text); ?></span>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
                
                <?php if (!empty($cta_text) && !empty($cta_url)): ?>
                  <a href="<?php echo esc_url($cta_url); ?>" class="our-process-new-section-call-to-action">
                    <span class="our-process-new-section-call-to-action-text"><?php echo esc_html($cta_text); ?></span>
                  </a>
                <?php elseif (!empty($cta_text)): ?>
                  <div class="our-process-new-section-call-to-action">
                    <span class="our-process-new-section-call-to-action-text"><?php echo esc_html($cta_text); ?></span>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      
      <!-- Desktop: Separate content area (hidden on mobile) -->
      <div class="our-process-new-section-tab-contents">
        <?php foreach ($process_tabs as $index => $tab): 
          $content_image = !empty($tab['content_image']) && is_array($tab['content_image']) ? $tab['content_image'] : null;
          $description = !empty($tab['description']) ? $tab['description'] : '';
          $checklist_items = !empty($tab['checklist_items']) && is_array($tab['checklist_items']) ? $tab['checklist_items'] : array();
          $cta = !empty($tab['cta']) && is_array($tab['cta']) ? $tab['cta'] : null;
          $cta_text = !empty($cta['text']) ? $cta['text'] : '';
          $cta_url = !empty($cta['url']) ? $cta['url'] : '';
          $is_active = $index === 0;
        ?>
          <div 
            class="our-process-new-section-tab-content-desktop <?php echo $is_active ? 'active' : ''; ?>" 
            id="tab-content-desktop-<?php echo esc_attr($index); ?>" 
            role="tabpanel" 
            aria-labelledby="tab-<?php echo esc_attr($index); ?>"
            data-tab-index="<?php echo esc_attr($index); ?>"
          >
            <?php if (!empty($content_image) && !empty($content_image['url'])): ?>
              <div class="our-process-new-section-content-image">
                <img src="<?php echo esc_url($content_image['url']); ?>" alt="<?php echo esc_attr(!empty($content_image['alt']) ? $content_image['alt'] : 'Process Image'); ?>">
              </div>
            <?php endif; ?>
            
              <div class="our-process-new-section-content-details">
                <?php 
                // Ensure description is retrieved correctly for desktop
                if (empty($description) && isset($tab['description'])) {
                  $description = $tab['description'];
                }
                ?>
                <?php if (!empty($description) && trim($description) !== ''): ?>
                  <p class="our-process-new-section-content-text"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
              
              <?php if (!empty($checklist_items)): ?>
                <div class="our-process-new-section-checklist">
                  <?php 
                  // Define check icon path - use WordPress theme directory
                  $check_icon_path = '/wp-content/uploads/2026/01/blue-check.svg';
                  $check_icon_url = '/wp-content/uploads/2026/01/blue-check.svg';
                  
                  // Fallback to output directory if theme file doesn't exist
                  if (!file_exists($check_icon_path)) {
                    $check_icon_url = '/wp-content/uploads/2026/01/blue-check.svg';
                  }
                  
                  foreach ($checklist_items as $item): 
                    $item_text = !empty($item['item_text']) ? $item['item_text'] : '';
                  ?>
                    <?php if (!empty($item_text)): ?>
                      <div class="our-process-new-section-checklist-item">
                        <img src="<?php echo esc_url($check_icon_url); ?>" alt="Check Icon" class="our-process-new-section-check-icon" width="15" height="15">
                        <span class="our-process-new-section-checklist-title"><?php echo esc_html($item_text); ?></span>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              
              <?php if (!empty($cta_text) && !empty($cta_url)): ?>
                <a href="<?php echo esc_url($cta_url); ?>" class="our-process-new-section-call-to-action">
                  <span class="our-process-new-section-call-to-action-text"><?php echo esc_html($cta_text); ?></span>
                </a>
              <?php elseif (!empty($cta_text)): ?>
                <div class="our-process-new-section-call-to-action">
                  <span class="our-process-new-section-call-to-action-text"><?php echo esc_html($cta_text); ?></span>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

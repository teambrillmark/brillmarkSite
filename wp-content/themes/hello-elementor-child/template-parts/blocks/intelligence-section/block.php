<?php
/**
 * intelligence-section Block Template
 * 
 * @var array $block The block settings and attributes.
 */

// Get ACF fields
$header_title = get_field('header_title');
$header_description = get_field('header_description');
$left_image = get_field('left_image');
$floating_icons = get_field('floating_icons');
$cro_box = get_field('cro_box');
$feature_cards = get_field('feature_cards');
$wrapper = theme_get_block_wrapper_attributes($block, 'intelligence-section-section');

?>

<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <!-- Header Section -->
    <?php if (!empty($header_title) || !empty($header_description)): ?>
      <div class="intelligence-section-header">
        <?php if (!empty($header_title)): ?>
          <h1 class="intelligence-section-title"><?php echo esc_html($header_title); ?></h1>
        <?php endif; ?>
        <?php if (!empty($header_description)): ?>
          <p class="intelligence-section-description"><?php echo wp_kses_post($header_description); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <!-- Two Column Layout -->
    <div class="intelligence-section-content-wrapper">
      <!-- Left Column: Image with floating elements -->
      <div class="intelligence-section-left">
        <?php if (!empty($left_image) && is_array($left_image)): ?>
          <div class="intelligence-section-image-wrapper">
            <img 
              src="<?php echo esc_url($left_image['url']); ?>" 
              alt="<?php echo esc_attr($left_image['alt'] ?: 'Intelligence section image'); ?>" 
              class="intelligence-section-main-image"
            />
            
            <!-- Floating Icons -->
            <?php if (!empty($floating_icons)): ?>
              <div class="intelligence-section-floating-icons">
                <?php if (!empty($floating_icons['icon_3d']) && is_array($floating_icons['icon_3d'])): ?>
                  <div class="floating-icon floating-icon-3d">
                    <img 
                      src="<?php echo esc_url($floating_icons['icon_3d']['url']); ?>" 
                      alt="<?php echo esc_attr($floating_icons['icon_3d']['alt'] ?: '3D Cube'); ?>"
                    />
                  </div>
                <?php endif; ?>
                <?php if (!empty($floating_icons['icon_html']) && is_array($floating_icons['icon_html'])): ?>
                  <div class="floating-icon floating-icon-html">
                    <img 
                      src="<?php echo esc_url($floating_icons['icon_html']['url']); ?>" 
                      alt="<?php echo esc_attr($floating_icons['icon_html']['alt'] ?: 'HTML Code'); ?>"
                    />
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <!-- CRO Powered by AI Box -->
            <?php if (!empty($cro_box)): ?>
              <div class="intelligence-section-cro-box">
                <?php if (!empty($cro_box['cro_title'])): ?>
                  <h3 class="cro-box-title"><?php echo esc_html($cro_box['cro_title']); ?></h3>
				  <h3 class="cro-box-title-bold"><?php echo esc_html($cro_box['cro_title_bold']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($cro_box['cro_items']) && is_array($cro_box['cro_items'])): ?>
                  <ul class="cro-box-items">
                    <?php foreach ($cro_box['cro_items'] as $item): ?>
                      <?php if (!empty($item['item_text'])): ?>
                        <li class="cro-box-item">
                          <span class="cro-checkmark">
							  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9" fill="none">
								  <g clip-path="url(#clip0_456_109)">
									  <path d="M4.19633 9L0 4.73388L1.04908 3.66735L4.19633 6.86695L10.9509 0L12 1.06653L4.19633 9Z" fill="#313F58"/>
								  </g>
								  <defs>
									  <clipPath id="clip0_456_109">
										  <rect width="12" height="9" fill="white"/>
									  </clipPath>
								  </defs>
							  </svg>
							</span>
                          <span class="cro-item-text"><?php echo esc_html($item['item_text']); ?></span>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Right Column: Feature Cards -->
      <div class="intelligence-section-right">
        <?php if (!empty($feature_cards) && is_array($feature_cards)): ?>
          <div class="intelligence-section-feature-cards">
            <?php foreach ($feature_cards as $card): ?>
              <div class="intelligence-section-feature-card">
                <?php if (!empty($card['feature_icon']) && is_array($card['feature_icon'])): ?>
                  <div class="feature-card-icon">
                    <img 
                      src="<?php echo esc_url($card['feature_icon']['url']); ?>" 
                      alt="<?php echo esc_attr($card['feature_icon']['alt'] ?: 'Feature icon'); ?>"
                    />
                  </div>
                <?php endif; ?>
				  <div class="feature-card-details">
					<?php if (!empty($card['feature_title'])): ?>
					  <h3 class="feature-card-title"><?php echo esc_html($card['feature_title']); ?></h3>
					<?php endif; ?>
					<?php if (!empty($card['feature_description'])): ?>
					  <p class="feature-card-description"><?php echo wp_kses_post($card['feature_description']); ?></p>
					<?php endif; ?>
				  </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
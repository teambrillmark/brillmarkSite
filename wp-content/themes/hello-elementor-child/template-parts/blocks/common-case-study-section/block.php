<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Case Study Section Block Template
 *
 * @package theme
 */

// Field values
$section_title       = get_field('section_title');
$section_description = get_field('section_description');
$card_title          = get_field('card_title');
$button_text         = get_field('button_text');
$button_url          = get_field('button_url');
$card_image          = get_field('card_image');
$stats               = get_field('stats');
$wrapper = theme_get_block_wrapper_attributes($block, 'case-study-section-section');

?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="case-study-section-inner">

      <div class="case-study-section-header">
        <?php if (!empty($section_title)): ?>
          <h2 class="case-study-section-title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($section_description)): ?>
          <p class="case-study-section-description"><?php echo wp_kses_post($section_description); ?></p>
        <?php endif; ?>
      </div>

      <div class="case-study-section-card-wrapper">
        <div class="case-study-section-card">
          <div class="case-study-section-card-content">

            <div class="case-study-section-card-info">
              <?php if (!empty($card_title)): ?>
                <h3 class="case-study-section-card-title"><?php echo esc_html($card_title); ?></h3>
              <?php endif; ?>

              <?php if (!empty($stats) && is_array($stats)):
                $stat_rows = array_chunk($stats, 2);
              ?>
                <div class="case-study-section-stats-container">
                  <?php foreach ($stat_rows as $row): ?>
                    <div class="case-study-section-stats-row">
                      <?php foreach ($row as $stat): ?>
                        <div class="case-study-section-stat-item">
                          <?php if (!empty($stat['stat_label'])): ?>
                            <span class="case-study-section-stat-label"><?php echo esc_html($stat['stat_label']); ?></span>
                          <?php endif; ?>
                          <?php if (!empty($stat['stat_value'])): ?>
                            <span class="case-study-section-stat-value"><?php echo esc_html($stat['stat_value']); ?></span>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($button_text)): ?>
                <a href="<?php echo !empty($button_url) ? esc_url($button_url) : '#'; ?>" class="case-study-section-cta case-study-section-cta-desktop-cta" aria-label="<?php echo esc_attr($button_text); ?>">
                  <span class="case-study-section-cta-text"><?php echo esc_html($button_text); ?></span>
                </a>
              <?php endif; ?>
            </div>

            <?php if (!empty($card_image)): ?>
              <div class="case-study-section-card-image" role="img" aria-label="<?php echo esc_attr(is_array($card_image) ? ($card_image['alt'] ?? 'Case Study Image') : 'Case Study Image'); ?>" style="background-image: url('<?php echo esc_url(is_array($card_image) ? $card_image['url'] : $card_image); ?>');"></div>
            <?php else: ?>
              <div class="case-study-section-card-image" role="img" aria-label="Case Study Image"></div>
            <?php endif; ?>
			  
			  <?php if (!empty($button_text)): ?>
                <a href="<?php echo !empty($button_url) ? esc_url($button_url) : '#'; ?>" class="case-study-section-cta case-study-section-cta-mobile-cta" aria-label="<?php echo esc_attr($button_text); ?>">
                  <span class="case-study-section-cta-text"><?php echo esc_html($button_text); ?></span>
                </a>
              <?php endif; ?>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

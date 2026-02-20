<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Conversion Optimization Section Block Template
 *
 * @package theme
 */

// Get field values with defaults
$title = !empty(get_field('title')) ? get_field('title') : 'Conversion Optimization That Actually Works';
$description = !empty(get_field('description')) ? get_field('description') : 'See how our conversion optimization strategy helped an online store like TopLids achieve measurable growth—fast.';

$wrapper = theme_get_block_wrapper_attributes($block, 'conversion-optimization-section-section');

?>

<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="conversion-optimization-section-content-wrapper">
      <div class="conversion-optimization-section-header-wrapper">
        <div class="conversion-optimization-section-header-content">
          <?php if (!empty($title)) : ?>
            <h2 class="conversion-optimization-section-title"><?php echo esc_html($title); ?></h2>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="conversion-optimization-section-description"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="conversion-optimization-section-tabs-wrapper">
        <?php if (have_rows('tabs')) : ?>
          <div class="conversion-optimization-section-tabs-row">
            <?php 
            $tab_index = 0;
            while (have_rows('tabs')) : the_row(); 
              $tab_text = !empty(get_sub_field('tab_text')) ? get_sub_field('tab_text') : '';
              $is_active = ($tab_index === 0) ? ' conversion-optimization-section-tab-active' : '';
            ?>
              <div class="conversion-optimization-section-tab<?php echo esc_attr($is_active); ?>" data-tab-index="<?php echo esc_attr($tab_index); ?>">
                <?php if (!empty($tab_text)) : ?>
                  <span class="conversion-optimization-section-tab-text"><?php echo esc_html($tab_text); ?></span>
                <?php endif; ?>
              </div>
            <?php 
              $tab_index++;
            endwhile; 
            ?>
          </div>
          
          <?php 
          // Reset to get comparison content
          reset_rows();
          $comparison_index = 0;
          ?>
          <?php while (have_rows('tabs')) : the_row(); 
            $old_label = !empty(get_sub_field('old_label')) ? get_sub_field('old_label') : 'Old';
            $old_description = !empty(get_sub_field('old_description')) ? get_sub_field('old_description') : '';
            $old_image = get_sub_field('old_image');
            $new_label = !empty(get_sub_field('new_label')) ? get_sub_field('new_label') : 'New';
            $new_description = !empty(get_sub_field('new_description')) ? get_sub_field('new_description') : '';
            $new_image = get_sub_field('new_image');
            $is_visible = ($comparison_index === 0) ? '' : ' style="display: none;"';
          ?>
            <div class="conversion-optimization-section-comparison-wrapper" data-comparison-index="<?php echo esc_attr($comparison_index); ?>"<?php echo $is_visible; ?>>
              <div class="conversion-optimization-section-comparison-panel conversion-optimization-section-panel-old">
                <div class="conversion-optimization-section-panel-content-wrapper">
                  <div class="conversion-optimization-section-panel-inner">
                    <div class="conversion-optimization-section-panel-text-wrapper">
                      <?php if (!empty($old_label)) : ?>
                        <span class="conversion-optimization-section-panel-label"><?php echo esc_html($old_label); ?></span>
                      <?php endif; ?>
                      <?php if (!empty($old_description)) : ?>
                        <span class="conversion-optimization-section-panel-description"><?php echo wp_kses_post($old_description); ?></span>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($old_image)) : ?>
                      <div class="conversion-optimization-section-panel-image">
                        <img 
                          src="<?php echo esc_url($old_image); ?>" 
                          alt="Old Version Image"
                          loading="lazy"
                        >
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="conversion-optimization-section-comparison-panel conversion-optimization-section-panel-new">
                <div class="conversion-optimization-section-panel-inner">
                  <div class="conversion-optimization-section-panel-text-wrapper">
                    <?php if (!empty($new_label)) : ?>
                      <span class="conversion-optimization-section-panel-label"><?php echo esc_html($new_label); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($new_description)) : ?>
                      <span class="conversion-optimization-section-panel-description"><?php echo wp_kses_post($new_description); ?></span>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($new_image)) : ?>
                    <div class="conversion-optimization-section-panel-image">
                        <img 
                          src="<?php echo esc_url($new_image); ?>" 
                          alt="New Version Image"
                          loading="lazy"
                        >
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php 
            $comparison_index++;
          endwhile; 
          ?>
        <?php else : ?>
          <!-- Default fallback if no tabs configured -->
          <div class="conversion-optimization-section-tabs-row">
            <div class="conversion-optimization-section-tab conversion-optimization-section-tab-active">
              <span class="conversion-optimization-section-tab-text">Header & Navigation Redesign</span>
            </div>
            <div class="conversion-optimization-section-tab">
              <span class="conversion-optimization-section-tab-text">Content & User Experience</span>
            </div>
            <div class="conversion-optimization-section-tab">
              <span class="conversion-optimization-section-tab-text">Visual Design & Aesthetics</span>
            </div>
            <div class="conversion-optimization-section-tab">
              <span class="conversion-optimization-section-tab-text">Functional Engagement</span>
            </div>
            <div class="conversion-optimization-section-tab">
              <span class="conversion-optimization-section-tab-text">Collection Page Design</span>
            </div>
          </div>
          <div class="conversion-optimization-section-comparison-wrapper">
            <div class="conversion-optimization-section-comparison-panel conversion-optimization-section-panel-old">
              <div class="conversion-optimization-section-panel-content-wrapper">
                <div class="conversion-optimization-section-panel-inner">
                  <div class="conversion-optimization-section-panel-text-wrapper">
                    <span class="conversion-optimization-section-panel-label">Old</span>
                    <span class="conversion-optimization-section-panel-description">Cluttered layout with minimal interaction cues, making it hard for users to navigate and engage effectively.</span>
                  </div>
                  <div class="conversion-optimization-section-panel-image">
                    <img 
                          src="https://brillmarkstg.wpengine.com/wp-content/uploads/2026/02/header-nav-old.png" 
                          alt="Old Version Image"
                          loading="lazy"
                        >
                  </div>
                </div>
              </div>
            </div>
            <div class="conversion-optimization-section-comparison-panel conversion-optimization-section-panel-new">
              <div class="conversion-optimization-section-panel-inner">
                <div class="conversion-optimization-section-panel-text-wrapper">
                  <span class="conversion-optimization-section-panel-label">New</span>
                  <span class="conversion-optimization-section-panel-description">Clean, structured design with intuitive navigation and guided steps, enhancing user flow and overall experience.</span>
                </div>
                <div class="conversion-optimization-section-panel-image">
                  <img 
                          src="https://brillmarkstg.wpengine.com/wp-content/uploads/2026/02/headernav-new.png" 
                          alt="New Version Image"
                          loading="lazy"
                        >
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="conversion-optimization-section-nav-dots">
      <div class="conversion-optimization-section-nav-dot" data-direction="prev" aria-label="Previous">
        <div class="conversion-optimization-section-dot-circle"></div>
        <svg class="conversion-optimization-section-dot-icon" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" fill="currentColor"/>
        </svg>
      </div>
      <div class="conversion-optimization-section-nav-dot conversion-optimization-section-nav-dot-active" data-direction="next" aria-label="Next">
        <div class="conversion-optimization-section-dot-circle"></div>
        <svg class="conversion-optimization-section-dot-icon" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z" fill="currentColor"/>
        </svg>
      </div>
    </div>
  </div>
</section>

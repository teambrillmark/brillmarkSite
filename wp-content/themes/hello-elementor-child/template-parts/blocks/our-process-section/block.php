<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Our Process Section Block Template
 *
 * @package theme
 */

// Get field values with safety checks
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$cta_button = get_field('cta_button');
$process_steps = get_field('process_steps');
?>
<section class="our-process-section">
  <div class="container">
    <div class="our-process-section__wrapper">
      <div class="our-process-section__header">
        <?php if (!empty($section_title)) : ?>
          <h2 class="our-process-section__title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($section_description)) : ?>
          <p class="our-process-section__description"><?php echo wp_kses_post($section_description); ?></p>
        <?php endif; ?>
      </div>
      <div class="our-process-section__content">
        <div class="our-process-section__sidebar">
          <div class="our-process-section__steps-nav">
            <?php if (!empty($process_steps) && is_array($process_steps)) : ?>
              <div class="our-process-section__step-numbers">
                <?php 
                $step_count = count($process_steps);
                $step_index = 0;
                foreach ($process_steps as $step) : 
                  $step_index++;
                  $is_first = ($step_index === 1);
                  $is_last = ($step_index === $step_count);
                ?>
                  <div class="our-process-section__step-row<?php echo $is_last ? ' our-process-section__step-row--last' : ''; ?>">
                    <div class="our-process-section__step-number<?php echo $is_first ? ' our-process-section__step-number--active' : ''; ?>" data-step="<?php echo esc_attr($step_index); ?>">
                      <span><?php echo esc_html($step_index); ?></span>
                    </div>
                    <?php if (!$is_last) : ?>
                      <div class="our-process-section__step-line"></div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="our-process-section__step-titles">
                <?php 
                $step_index = 0;
                foreach ($process_steps as $step) : 
                  $step_index++;
                  $is_first = ($step_index === 1);
                  $step_title = isset($step['step_title']) ? $step['step_title'] : '';
                ?>
                  <div class="our-process-section__step-title<?php echo $is_first ? ' our-process-section__step-title--active' : ''; ?>" data-step="<?php echo esc_attr($step_index); ?>">
                    <?php if (!empty($step_title)) : ?>
                      <span><?php echo esc_html($step_title); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="our-process-section__details">
          <?php if (!empty($process_steps) && is_array($process_steps)) : ?>
            <?php 
            $step_index = 0;
            foreach ($process_steps as $step) : 
              $step_index++;
              $is_first = ($step_index === 1);
              $step_description = isset($step['step_description']) ? $step['step_description'] : '';
              $step_features = isset($step['step_features']) ? $step['step_features'] : array();
            ?>
              <div class="our-process-section__step-content<?php echo $is_first ? ' our-process-section__step-content--active' : ''; ?>" data-step="<?php echo esc_attr($step_index); ?>">
                <div class="our-process-section__content-inner">
                  <?php if (!empty($step_description)) : ?>
                    <p class="our-process-section__step-description"><?php echo wp_kses_post($step_description); ?></p>
                  <?php endif; ?>
                  <?php if (!empty($step_features) && is_array($step_features)) : ?>
                    <ul class="our-process-section__features-list">
                      <?php foreach ($step_features as $feature) : 
                        $feature_text = isset($feature['feature_text']) ? $feature['feature_text'] : '';
                      ?>
                        <?php if (!empty($feature_text)) : ?>
                          <li class="our-process-section__feature-item">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.72197 0C15.0879 0 19.444 4.35604 19.444 9.72194C19.444 15.0879 15.0876 19.4439 9.72197 19.4439C4.35637 19.4439 0 15.0875 0 9.72194C0 4.35634 4.35607 0 9.72197 0ZM4.70787 10.2717L7.69927 13.2437C7.99167 13.5345 8.46347 13.5337 8.75517 13.2422L14.738 7.25944C15.0297 6.96774 15.0297 6.49364 14.738 6.20194C14.4463 5.91024 13.9722 5.91024 13.6805 6.20194L8.22487 11.6574L5.76217 9.21044C5.46907 8.91954 4.99577 8.92184 4.70477 9.21414C4.41387 9.50734 4.41547 9.98074 4.70787 10.2717Z" fill="#0960A8"/>
                          </svg>
                            <span><?php echo esc_html($feature_text); ?></span>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
                <div class="our-process-section__cta-wrapper">
                  <?php if (!empty($cta_button) && is_array($cta_button)) : 
                    $cta_url = isset($cta_button['url']) ? $cta_button['url'] : '#';
                    $cta_title = isset($cta_button['title']) ? $cta_button['title'] : '';
                    $cta_target = isset($cta_button['target']) ? $cta_button['target'] : '';
                  ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="our-process-section__cta-button"<?php echo !empty($cta_target) ? ' target="' . esc_attr($cta_target) . '" rel="noopener noreferrer"' : ''; ?>>
                      <span><?php echo esc_html($cta_title); ?></span>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

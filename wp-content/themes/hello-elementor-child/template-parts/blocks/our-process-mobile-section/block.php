<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Our Process Section Block Template
 */

// Get field values
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$check_icon = get_field('check_icon');
$check_icon_url = !empty($check_icon) ? (is_array($check_icon) ? $check_icon['url'] : $check_icon) : '';
$wrapper = theme_get_block_wrapper_attributes($block, 'our-process-section-section');

?>
<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="our-process-section-wrapper">
      <?php if (!empty($section_title)) : ?>
      <h2 class="our-process-section-title"><?php echo esc_html($section_title); ?></h2>
      <?php endif; ?>
      
      <?php if (!empty($section_description)) : ?>
      <p class="our-process-section-description"><?php echo wp_kses_post($section_description); ?></p>
      <?php endif; ?>
      
      <?php if (have_rows('process_steps')) : ?>
      <div class="our-process-section-accordion">
        <?php 
        $step_index = 0;
        while (have_rows('process_steps')) : the_row();
          $step_index++;
          $step_number = get_sub_field('step_number') ?: $step_index;
          $step_title = get_sub_field('step_title');
          $step_description = get_sub_field('step_description');
          $step_checklist = get_sub_field('step_checklist');
          $step_cta = get_sub_field('step_cta');
          $is_first = $step_index === 1;
        ?>
        <div class="our-process-section-accordion-item <?php echo $is_first ? 'active' : ''; ?>">
          <button class="our-process-section-accordion-header" type="button" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>">
            <div class="our-process-section-step-number <?php echo $is_first ? 'active' : ''; ?>">
              <span><?php echo esc_html($step_number); ?></span>
            </div>
            <?php if (!empty($step_title)) : ?>
            <span class="our-process-section-step-title"><?php echo esc_html($step_title); ?></span>
            <?php endif; ?>
            <svg class="our-process-section-chevron" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          
          <div class="our-process-section-accordion-content">
            <div class="our-process-section-accordion-inner">
              <?php if (!empty($step_description)) : ?>
              <p class="our-process-section-step-description"><?php echo wp_kses_post($step_description); ?></p>
              <?php endif; ?>
              
              <?php if (!empty($step_checklist) && is_array($step_checklist)) : ?>
              <div class="our-process-section-checklist">
                <?php foreach ($step_checklist as $item) : 
                  $checklist_text = !empty($item['checklist_text']) ? $item['checklist_text'] : '';
                  if (!empty($checklist_text)) :
                ?>
                <div class="our-process-section-checklist-item">
                  <?php if (!empty($check_icon_url)) : ?>
                  <img class="our-process-section-check-icon" width="19" height="19" alt="Check" src="<?php echo esc_url($check_icon_url); ?>">
                  <?php endif; ?>
                  <span class="our-process-section-checklist-text"><?php echo esc_html($checklist_text); ?></span>
                </div>
                <?php endif; endforeach; ?>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($step_cta) && is_array($step_cta)) : 
                $cta_url = !empty($step_cta['url']) ? $step_cta['url'] : '#';
                $cta_title = !empty($step_cta['title']) ? $step_cta['title'] : "Let's Start the Conversation";
                $cta_target = !empty($step_cta['target']) ? $step_cta['target'] : '_self';
              ?>
              <div class="our-process-section-cta">
                <a href="<?php echo esc_url($cta_url); ?>" class="our-process-section-cta-button" target="<?php echo esc_attr($cta_target); ?>">
                  <span class="our-process-section-cta-text"><?php echo esc_html($cta_title); ?></span>
                </a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

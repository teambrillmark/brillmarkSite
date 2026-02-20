<?php
/**
 * FAQ Section Block Template
 * 
 * @package theme
 */
$wrapper = theme_get_block_wrapper_attributes($block, 'faq-section-section');

?>
<!-- ACF-ANNOTATED: true -->
<section  id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="faq-section-wrapper">
      <div class="faq-section-header">
        <?php if (!empty(get_field('title'))): ?>
          <h2 class="faq-section-title"><?php echo esc_html(get_field('title')); ?></h2>
        <?php endif; ?>
        <?php if (!empty(get_field('description'))): ?>
          <p class="faq-section-description"><?php echo wp_kses_post(get_field('description')); ?></p>
        <?php endif; ?>
      </div>
      <div class="faq-section-content">
        <?php if (have_rows('left_column_faqs')): ?>
          <div class="faq-section-column faq-section-column-left">
            <?php while (have_rows('left_column_faqs')): the_row(); ?>
              <div class="faq-section-item">
                <div class="faq-section-item-header">
                  <?php 
                  $icon = get_sub_field('icon');
                  if (!empty($icon)): 
                  ?>
                    <img class="faq-section-icon" width="20" height="20" alt="<?php echo esc_attr(!empty(get_sub_field('question')) ? 'Toggle: ' . get_sub_field('question') : 'Toggle FAQ'); ?>" src="<?php echo esc_url($icon); ?>">
                  <?php endif; ?>
                  <?php if (!empty(get_sub_field('question'))): ?>
                    <span class="faq-section-question"><?php echo esc_html(get_sub_field('question')); ?></span>
                  <?php endif; ?>
                </div>
                <?php if (!empty(get_sub_field('answer'))): ?>
                  <div class="faq-section-answer">
                    <div class="faq-section-answer-content">
                      <?php echo wp_kses_post(get_sub_field('answer')); ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
        
        <hr class="faq-section-divider">
        
        <?php if (have_rows('right_column_faqs')): ?>
          <div class="faq-section-column faq-section-column-right">
            <?php while (have_rows('right_column_faqs')): the_row(); ?>
              <div class="faq-section-item">
                <div class="faq-section-item-header">
                  <?php 
                  $icon = get_sub_field('icon');
                  if (!empty($icon)): 
                  ?>
                    <img class="faq-section-icon" width="20" height="20" alt="<?php echo esc_attr(!empty(get_sub_field('question')) ? 'Toggle: ' . get_sub_field('question') : 'Toggle FAQ'); ?>" src="<?php echo esc_url($icon); ?>">
                  <?php endif; ?>
                  <?php if (!empty(get_sub_field('question'))): ?>
                    <span class="faq-section-question"><?php echo esc_html(get_sub_field('question')); ?></span>
                  <?php endif; ?>
                </div>
                <?php if (!empty(get_sub_field('answer'))): ?>
                  <div class="faq-section-answer">
                    <div class="faq-section-answer-content">
                      <?php echo wp_kses_post(get_sub_field('answer')); ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

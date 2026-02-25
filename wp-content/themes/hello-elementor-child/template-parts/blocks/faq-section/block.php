<!-- ACF-ANNOTATED: true -->
<?php
$wrapper = theme_get_block_wrapper_attributes($block, 'faq-section-section');

$title       = get_field('title');
$description = get_field('description');
$faq_icon    = get_field('faq_icon');
$faq_items   = get_field('faq_items');

$left_items  = [];
$right_items = [];

if (!empty($faq_items) && is_array($faq_items)) {
    $total       = count($faq_items);
    $split       = (int) ceil($total / 2);
    $left_items  = array_slice($faq_items, 0, $split);
    $right_items = array_slice($faq_items, $split);
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> section bg-white">
  <div class="container faq-section-inner flex flex-col items-center gap-10">
    <div class="faq-section-header flex flex-col justify-center items-center gap-4">
      <?php if (!empty($title)): ?>
        <h2 class="faq-section-title text-center text-primary font-weight-light m-0"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($description)): ?>
        <p class="faq-section-description text-center text-secondary m-0 text-h6"><?php echo wp_kses_post($description); ?></p>
      <?php endif; ?>
    </div>
    <div class="faq-section-columns flex flex-row justify-center gap-10">
      <div class="faq-section-column flex flex-col">
        <?php if (!empty($left_items)): ?>
          <?php foreach ($left_items as $idx => $item): ?>
            <div class="faq-section-item-group">
              <div class="faq-section-item flex gap-4 items-center flex-row" role="button" tabindex="0" aria-expanded="false" aria-controls="<?php echo esc_attr($wrapper['id']); ?>-faq-left-<?php echo (int) $idx; ?>">
                <?php if (!empty($faq_icon)): ?>
                  <img class="faq-section-icon" width="20" height="20" alt="" aria-hidden="true" src="<?php echo esc_url($faq_icon); ?>">
                <?php endif; ?>
                <?php if (!empty($item['question'])): ?>
                  <span class="faq-section-question text-primary text-body text-left"><?php echo esc_html($item['question']); ?></span>
                <?php endif; ?>
              </div>
              <?php if (!empty($item['answer'])): ?>
                <div class="faq-section-answer" id="<?php echo esc_attr($wrapper['id']); ?>-faq-left-<?php echo (int) $idx; ?>" role="region">
                  <?php echo wp_kses_post($item['answer']); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <hr class="faq-section-divider m-0">
      <div class="faq-section-column flex flex-col">
        <?php if (!empty($right_items)): ?>
          <?php foreach ($right_items as $idx => $item): ?>
            <div class="faq-section-item-group">
              <div class="faq-section-item flex gap-4 items-center flex-row" role="button" tabindex="0" aria-expanded="false" aria-controls="<?php echo esc_attr($wrapper['id']); ?>-faq-right-<?php echo (int) $idx; ?>">
                <?php if (!empty($faq_icon)): ?>
                  <img class="faq-section-icon" width="20" height="20" alt="" aria-hidden="true" src="<?php echo esc_url($faq_icon); ?>">
                <?php endif; ?>
                <?php if (!empty($item['question'])): ?>
                  <span class="faq-section-question text-primary text-body text-left"><?php echo esc_html($item['question']); ?></span>
                <?php endif; ?>
              </div>
              <?php if (!empty($item['answer'])): ?>
                <div class="faq-section-answer" id="<?php echo esc_attr($wrapper['id']); ?>-faq-right-<?php echo (int) $idx; ?>" role="region">
                  <?php echo wp_kses_post($item['answer']); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
/**
 * process-cards-section Block Template
 * 
 * @var array $block The block settings and attributes.
 */

$section_title = get_field('process_cards_section_title');
$section_description = get_field('process_cards_section_description');
$weeks = get_field('process_cards_section_weeks');
?>
<section class="process-cards-section-section">
  <div class="process-cards-section-container">
    <?php if (!empty($section_title)): ?>
      <h1 class="process-cards-section-title"><?php echo esc_html($section_title); ?></h1>
    <?php endif; ?>
    <?php if (!empty($section_description)): ?>
      <p class="process-cards-section-description"><?php echo esc_html($section_description); ?></p>
    <?php endif; ?>
    <div class="process-cards-section-weeks">
      <?php if (!empty($weeks) && is_array($weeks)): ?>
        <?php foreach ($weeks as $week): ?>
          <div class="process-cards-section-week">
            <h2 class="process-cards-section-week-title"><?php echo esc_html($week['title']); ?></h2>
            <p class="process-cards-section-week-description"><?php echo esc_html($week['description']); ?></p>
            <div class="process-cards-section-week-checklist">
              <?php if (!empty($week['checklist']) && is_array($week['checklist'])): ?>
                <?php foreach ($week['checklist'] as $check): ?>
                  <div class="process-cards-section-week-checklist-item">
                    <img class="process-cards-section-week-check-icon" alt="check icon" src="<?php echo esc_url($check['icon']); ?>">
                    <span class="process-cards-section-week-check-title"><?php echo esc_html($check['title']); ?></span>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="process-cards-section-final">
      <h2 class="process-cards-section-final-title">Migration Completed</h2>
      <p class="process-cards-section-final-description">with 30 days of premium support included!</p>
      <div class="process-cards-section-final-action">
        <span class="process-cards-section-final-action-title">Ready to Migrate!</span>
        <svg class="process-cards-section-final-action-icon"></svg>
      </div>
    </div>
  </div>
</section>
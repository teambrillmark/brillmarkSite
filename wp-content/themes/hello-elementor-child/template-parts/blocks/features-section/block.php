<?php
// <!-- ACF-ANNOTATED: true -->

$section_title = get_field('features_section_title');
$section_description = get_field('features_section_description');
$features = get_field('features_section_items');
$wrapper = theme_get_block_wrapper_attributes($block, 'brands-section-section');

?>

<section id="<?php echo $wrapper['id']; ?>" 
    class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <?php if (!empty($section_title)): ?>
      <h1 class="features-section-title"><?php echo esc_html($section_title); ?></h1>
    <?php endif; ?>
    <?php if (!empty($section_description)): ?>
      <p class="features-section-description"><?php echo esc_html($section_description); ?></p>
    <?php endif; ?>
    <div class="features-section-content">
      <?php if (!empty($features) && is_array($features)): ?>
        <?php foreach ($features as $feature): ?>
          <div class="features-section-card">
            <h2 class="features-section-card-title"><?php echo esc_html($feature['title']); ?></h2>
            <p class="features-section-card-description"><?php echo esc_html($feature['description']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Why Choose Shopify Section Block
 *
 * @package Theme
 */

// Field values
$title                 = get_field('title');
$subtitle              = get_field('subtitle');
$feature_column_header = get_field('feature_column_header');
$benefit_column_header = get_field('benefit_column_header');
$wrapper = theme_get_block_wrapper_attributes($block, 'why-choose-shopify-section-section');

?>
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>">
  <div class="container">
	  
	    <div class="why-choose-shopify-section-header-area">
        <?php if (!empty($title)) : ?>
          <h2 class="why-choose-shopify-section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($subtitle)) : ?>
          <p class="why-choose-shopify-section-subtitle"><?php echo wp_kses_post($subtitle); ?></p>
        <?php endif; ?>
      </div>

	  
   <div class="why-choose-shopify-section-two-col">

  <!-- LEFT COLUMN (Features) -->
  <div class="why-choose-shopify-section-col why-choose-shopify-section-col--feature">

    <?php if (!empty($feature_column_header)) : ?>
      <h3 class="why-choose-shopify-section-col-title">
        <?php echo esc_html($feature_column_header); ?>
      </h3>
    <?php endif; ?>

    <?php if (have_rows('rows')) : ?>
      <ul class="why-choose-shopify-section-list why-choose-shopify-section-list--feature">
        <?php while (have_rows('rows')) : the_row();
          $feature_title = get_sub_field('feature_title');
        ?>
          <?php if (!empty($feature_title)) : ?>
            <li class="why-choose-shopify-section-item">
              <?php echo esc_html($feature_title); ?>
            </li>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>

  </div>

  <!-- RIGHT COLUMN (Benefits) -->
  <div class="why-choose-shopify-section-col why-choose-shopify-section-col--benefit">

    <?php if (!empty($benefit_column_header)) : ?>
      <h3 class="why-choose-shopify-section-col-title">
        <?php echo esc_html($benefit_column_header); ?>
      </h3>
    <?php endif; ?>

    <?php if (have_rows('rows')) : ?>
      <ul class="why-choose-shopify-section-list why-choose-shopify-section-list--benefit">
        <?php while (have_rows('rows')) : the_row();
          $benefit_description = get_sub_field('benefit_description');
        ?>
          <?php if (!empty($benefit_description)) : ?>
            <li class="why-choose-shopify-section-item">
              <?php echo wp_kses_post($benefit_description); ?>
            </li>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>

  </div>

</div>
	  
	  
	  <div class="why-choose-shopify-section-table-wrapper">
      <div class="why-choose-shopify-section-table">
        <!-- Header Row -->
        <div class="why-choose-shopify-section-table-row why-choose-shopify-section-table-head">
          <div class="why-choose-shopify-section-feature-cell why-choose-shopify-section-feature-header">
            <?php if (!empty($feature_column_header)): ?>
              <span class="why-choose-shopify-section-feature-header-text"><?php echo esc_html($feature_column_header); ?></span>
            <?php endif; ?>
          </div>
          <div class="why-choose-shopify-section-benefit-cell why-choose-shopify-section-benefit-header">
            <?php if (!empty($benefit_column_header)): ?>
              <span class="why-choose-shopify-section-benefit-header-text"><?php echo esc_html($benefit_column_header); ?></span>
            <?php endif; ?>
          </div>
        </div>
        <?php if (have_rows('rows')): ?>
          <?php while (have_rows('rows')): the_row();
            $feature_name        = get_sub_field('feature_name');
            $benefit_description = get_sub_field('benefit_description');
          ?>
            <div class="why-choose-shopify-section-table-row">
              <div class="why-choose-shopify-section-feature-cell">
                <?php if (!empty($feature_title)): ?>
                  <span class="why-choose-shopify-section-feature-text"><?php echo esc_html($feature_title); ?></span>
                <?php endif; ?>
              </div>
              <div class="why-choose-shopify-section-benefit-cell">
                <?php if (!empty($benefit_description)): ?>
                  <span class="why-choose-shopify-section-benefit-text"><?php echo wp_kses_post($benefit_description); ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
	  

  </div>
</section>
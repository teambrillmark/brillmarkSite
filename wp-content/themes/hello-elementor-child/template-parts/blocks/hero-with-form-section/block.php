<?php
/**
 * Hero with Form Section Block Template
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content against.
 */

$wrapper = theme_get_block_wrapper_attributes($block, 'hero-with-form-section-section');

?>
<!-- ACF-ANNOTATED: true -->
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="hero-with-form-section-inner">
      <div class="hero-with-form-section-content">
        <div class="hero-with-form-section-text-group">

          <?php $subtitle = get_field('subtitle'); ?>
          <?php if (!empty($subtitle)) : ?>
            <p class="hero-with-form-section-subtitle"><?php echo esc_html($subtitle); ?></p>
          <?php endif; ?>

          <?php $title = get_field('title'); ?>
          <?php if (!empty($title)) : ?>
            <h1 class="hero-with-form-section-title"><?php echo esc_html($title); ?></h1>
          <?php endif; ?>

          <?php $description = get_field('description'); ?>
          <?php if (!empty($description)) : ?>
            <p class="hero-with-form-section-description"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>

        </div>

        <div class="hero-with-form-section-form-wrapper">
          <?php
            $form_custom_code = get_field('form_custom_code');
            if (!empty($form_custom_code)) :
              echo do_shortcode(wp_kses_post($form_custom_code));
            else :
              $form_action      = get_field('form_action');
              $button_text      = get_field('button_text');
              $hero_form_action = !empty($form_action) ? esc_url($form_action) : '#';
              $hero_form_button_text = !empty($button_text) ? $button_text : 'Submit';
              include __DIR__ . '/hero-with-form-section-form.php';
            endif;
          ?>
        </div>

      </div>

      <?php
        $image         = get_field('image');
        $image_alt     = get_field('image_alt');
        $image_url     = !empty($image) ? $image : '';
        $image_alt_text = !empty($image_alt) ? $image_alt : '';
      ?>
      <?php if (!empty($image_url)) : ?>
        <div class="hero-with-form-section-image-wrapper">
          <img
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($image_alt_text); ?>"
            class="hero-with-form-section-image"
          >
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<!-- ACF-ANNOTATED: true -->
<?php
$wrapper         = theme_get_block_wrapper_attributes($block, 'hero-section-section');
$title           = get_field('title');
$description     = get_field('description');
$button_text     = get_field('button_text');
$button_url      = get_field('button_url');
$tag_text        = get_field('tag_text');
$hero_image      = get_field('hero_image');
$button_icon     = get_field('button_icon');
$background_color = get_field('background_color');
$show_feature     = get_field('show_feature');
$feature          = get_field('feature');
$show_visual      = get_field('show_visual');
$show_slider      = get_field('show_slider');
$show_custom_code = get_field('show_custom_code');
$custom_code     = get_field('custom_code');
$show_wistia_video = get_field('show_wistia_video');
$wistia_video_id = get_field('wistia_video_id');
$video_caption   = get_field('video_caption');
$show_logos_beneath_slider = get_field('show_logos_beneath_slider');

$section_style = '';
if (!empty($background_color)) {
	$section_style = ' style="background-color:' . esc_attr($background_color) . ';"';
}
?>
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>"<?php echo $section_style; ?>>

<?php if (!empty($show_custom_code) && !empty($custom_code)) : ?>
  <div class="hero-custom-code">
    <?php echo $custom_code; ?>
  </div>
<?php endif; ?>

  <div class="hero-bg-gradient"></div>
  <div class="hero-bg-pattern"></div>
  <div class="hero-row flex flex-row items-center justify-center container pt-20 pb-20 gap-10">
    <div class="hero-content flex flex-col justify-center gap-10">
      <div class="hero-heading-group flex flex-col justify-center gap-4">
        <div class="hero-text-wrap flex flex-col gap-4">
          <?php if (!empty($title)) : ?>
            <h1 class="hero-title text-primary m-0 text-center"><?php echo esc_html($title); ?></h1>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="hero-description text-secondary component-description m-0 text-center"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
          <?php if (!empty($show_feature) && !empty($feature)) : ?>
            <div class="hero-feature text-secondary"><?php echo wp_kses_post($feature); ?></div>
          <?php endif; ?>
        </div>
        <?php if (have_rows('checklist_items')) : ?>
          <ul class="hero-checklist flex flex-col m-0 gap-4">
            <?php while (have_rows('checklist_items')) : the_row(); ?>
              <?php $item_text = get_sub_field('item_text'); ?>
              <?php if (!empty($item_text)) : ?>
                <li class="hero-checklist-item flex flex-row items-center gap-2">
                  <svg class="hero-check-icon" width="15" height="15" viewBox="0 0 15 15" fill="none" aria-hidden="true">
                    <path d="M13.5 1.5L5.25 12L1.5 8.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <span class="hero-checklist-text text-secondary"><?php echo esc_html($item_text); ?></span>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <?php if (!empty($button_text)) : ?>
        <div class="hero-cta-wrap flex flex-col gap-6">
          <a href="<?php echo esc_url($button_url ?: '#'); ?>" class="hero-cta btn btn-primary"><?php echo esc_html($button_text); ?></a>
        </div>
      <?php endif; ?>
    </div>

    <?php if (!empty($show_visual)) : ?>
    <div class="hero-visual flex flex-col items-center justify-center gap-4">
      <div class="hero-orbit">
        <div class="hero-orbit-ring"></div>
        <?php if (have_rows('process_steps')) : $step_i = 0; ?>
          <?php while (have_rows('process_steps')) : the_row(); $step_i++; ?>
            <?php
            $step_icon  = get_sub_field('step_icon');
            $step_label = get_sub_field('step_label');
            ?>
            <div class="hero-orbit-step flex flex-col items-center" data-step="<?php echo esc_attr($step_i); ?>">
              <div class="hero-step-badge flex items-center justify-center">
                <?php if (!empty($step_icon)) : ?>
                  <img src="<?php echo esc_url($step_icon['url']); ?>" alt="<?php echo esc_attr($step_icon['alt'] ?: $step_label); ?>" class="hero-step-icon">
                <?php endif; ?>
              </div>
              <?php if (!empty($step_label)) : ?>
                <span class="hero-step-label text-primary text-small text-center"><?php echo esc_html($step_label); ?></span>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <div class="hero-orbit-center"></div>

        <div class="hero-orbit-content flex flex-col items-center">
          <?php if (have_rows('center_logos')) : ?>
            <div class="hero-orbit-logos flex items-center justify-center gap-2 flex-wrap">
              <?php while (have_rows('center_logos')) : the_row(); ?>
                <?php $cl = get_sub_field('logo'); ?>
                <?php if (!empty($cl)) : ?>
                  <img src="<?php echo esc_url($cl['url']); ?>" alt="<?php echo esc_attr($cl['alt']); ?>" class="hero-orbit-logo">
                <?php endif; ?>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($show_slider) && have_rows('testimonials')) : ?>
    <?php
    $hero_swiper_options = [
        'slidesPerView' => 1,
        'spaceBetween'  => 0,
        'loop'          => true,
        'wrapperClass'  => 'hero-testimonial-track',
        'slideClass'    => 'hero-testimonial-slide',
        'navigationNextSelector' => '.hero-testimonial-next',
        'navigationPrevSelector' => '.hero-testimonial-prev',
    ];
    ?>
    <div class="hero-testimonial-wrap flex flex-col gap-4">
      <div class="hero-testimonial-slider" data-swiper="<?php echo esc_attr(wp_json_encode($hero_swiper_options)); ?>">
        <div class="hero-testimonial-track flex">
          <?php while (have_rows('testimonials')) : the_row(); ?>
            <?php
            $t_photo = get_sub_field('author_photo');
            $t_name  = get_sub_field('author_name');
            $t_role  = get_sub_field('author_role');
            $t_text  = get_sub_field('testimonial_text');
            $t_stars = get_sub_field('rating_image');
            ?>
            <div class="hero-testimonial-slide">
              <div class="hero-testimonial-header flex items-center gap-4">
                <?php if (!empty($t_photo)) : ?>
                  <img src="<?php echo esc_url($t_photo['url']); ?>" alt="<?php echo esc_attr($t_photo['alt'] ?: $t_name); ?>" class="hero-testimonial-photo">
                <?php endif; ?>
                <div class="hero-testimonial-author flex flex-col">
                  <?php if (!empty($t_name)) : ?>
                    <span class="hero-testimonial-name text-black"><?php echo esc_html($t_name); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($t_role)) : ?>
                    <span class="hero-testimonial-role text-black"><?php echo esc_html($t_role); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="hero-testimonial-body flex flex-col gap-2">
                <?php if (!empty($t_text)) : ?>
                  <p class="hero-testimonial-text text-small component-description m-0"><?php echo wp_kses_post($t_text); ?></p>
                <?php endif; ?>
                <?php if (!empty($t_stars)) : ?>
                  <img src="<?php echo esc_url($t_stars['url']); ?>" alt="Rating" class="hero-testimonial-rating">
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <button class="hero-testimonial-prev" aria-label="<?php esc_attr_e('Previous testimonial', 'theme'); ?>">
          <svg width="8" height="14" viewBox="0 0 8 14" fill="none" aria-hidden="true"><path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2"/></svg>
        </button>
        <button class="hero-testimonial-next flex items-center justify-center" aria-label="<?php esc_attr_e('Next testimonial', 'theme'); ?>">
          <svg width="8" height="14" viewBox="0 0 8 14" fill="none" aria-hidden="true"><path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2"/></svg>
        </button>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <div class="hero-bg-bottom"></div>

<?php if (!empty($show_wistia_video) && !empty($wistia_video_id)) : ?>
  <div class="hero-wistia-wrap">
    <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
      <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
        <div class="wistia_embed wistia_async_<?php echo esc_attr($wistia_video_id); ?> videoFoam=true"></div>
      </div>
    </div>
    <?php if (!empty($video_caption)) : ?>
      <p class="hero-wistia-caption"><?php echo wp_kses_post($video_caption); ?></p>
    <?php endif; ?>
  </div>
  <script src="https://fast.wistia.com/embed/medias/<?php echo esc_attr($wistia_video_id); ?>.jsonp" async></script>
  <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
<?php endif; ?>

<?php if (!empty($show_logos_beneath_slider) && have_rows('logos_beneath_slider')) : ?>
  <div class="hero-platforms hero-logos-beneath-slider flex items-center justify-center gap-6 flex-wrap">
    <?php while (have_rows('logos_beneath_slider')) : the_row(); ?>
      <?php $pl = get_sub_field('logo'); ?>
      <?php if (!empty($pl)) : ?>
        <img src="<?php echo esc_url($pl['url']); ?>" alt="<?php echo esc_attr($pl['alt']); ?>" class="hero-platform-logo">
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

</section>

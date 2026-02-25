<!-- ACF-ANNOTATED: true -->
<?php
$wrapper     = theme_get_block_wrapper_attributes($block, 'hero-section-section');
$variant_id  = get_field('variant');
if (empty($variant_id)) {
    $variant_id = 'default';
}
$variant_id  = sanitize_html_class($variant_id);
$layout      = get_field('layout') ?: '1';
$title       = get_field('title');
$description = get_field('description');
$tag_text    = get_field('tag_text');
$button_text = get_field('button_text');
$button_url  = get_field('button_url');
$background_color = get_field('background_color');
$flip_layout = get_field('flip_layout');
$hero_image  = get_field('hero_image');
$button_icon = get_field('button_icon');
$quote_text  = get_field('quote_text');
$quote_author = get_field('quote_author');
$wistia_video_id = get_field('wistia_video_id');
$form_email_placeholder   = get_field('form_email_placeholder');
$form_website_placeholder = get_field('form_website_placeholder');
$form_action_url = get_field('form_action_url');
$checklist_icon = get_field('checklist_icon');
$testimonial_prev_icon = get_field('testimonial_prev_icon');
$testimonial_next_icon = get_field('testimonial_next_icon');

$section_style = '';
if (!empty($background_color)) {
    $section_style = ' style="background:' . esc_attr($background_color) . ';"';
}
$flip_class = (!empty($flip_layout) && in_array($layout, ['1', '3', '4'])) ? ' hero-row--flipped' : '';
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> hero-section-section--<?php echo esc_attr($variant_id); ?>" data-variant="<?php echo esc_attr($layout); ?>" data-style-variant="<?php echo esc_attr($variant_id); ?>"<?php echo $section_style; ?>>

<?php if ($layout === '1') : ?>

  <div class="hero-bg-gradient"></div>
  <div class="hero-bg-pattern"></div>

  <div class="hero-row container flex flex-row items-center justify-center<?php echo $flip_class; ?> bm-spacing-5a9f bm-flex-direction-column-2 bm-gap-space-10-2 bm-margin-0-auto">
    <div class="hero-content flex flex-col bm-gap-30 bm-gap-space-10">
      <div class="hero-heading-group flex flex-col bm-gap-space-6 bm-gap-space-3">
        <div class="hero-text-wrap flex flex-col bm-gap-space-3 bm-gap-space-5 bm-gap-space-4">
          <?php if (!empty($title)) : ?>
            <h1 class="hero-title m-0 bm-color-color-primary bm-font-size-32"><?php echo esc_html($title); ?></h1>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="hero-description m-0 bm-color-color-primary bm-font-size-fs-h5 bm-line-height-lh-h5 bm-color-color-secondary"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
        </div>
        <?php if (have_rows('checklist_items')) : ?>
          <ul class="hero-checklist flex flex-col m-0 p-0 bm-gap-space-3">
            <?php while (have_rows('checklist_items')) : the_row(); ?>
              <?php $item_text = get_sub_field('item_text'); ?>
              <?php if (!empty($item_text)) : ?>
                <li class="hero-checklist-item flex flex-row items-center bm-gap-space-3 bm-gap-space-1">
                  <?php if (!empty($checklist_icon['url'])) : ?>
                    <img src="<?php echo esc_url($checklist_icon['url']); ?>" alt="" class="hero-check-icon bm-color-color-primary" width="15" height="15" aria-hidden="true">
                  <?php else : ?>
                    <svg class="hero-check-icon bm-color-color-primary" width="15" height="15" viewBox="0 0 15 15" fill="none" aria-hidden="true">
                      <path d="M13.5 1.5L5.25 12L1.5 8.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  <?php endif; ?>
                  <span class="hero-checklist-text bm-font-weight-font-weight-regular bm-color-color-secondary bm-color-color-primary bm-font-size-fs-body bm-font-weight-500"><?php echo esc_html($item_text); ?></span>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <?php if (!empty($button_text)) : ?>
        <div class="hero-cta-wrap">
          <a href="<?php echo esc_url($button_url ?: '#'); ?>" class="hero-cta btn btn-primary bm-gap-space-3"><?php echo esc_html($button_text); ?></a>
        </div>
      <?php endif; ?>
    </div>

    <div class="hero-visual">
      <div class="hero-orbit">
        <div class="hero-orbit-ring"></div>
        <?php if (have_rows('process_steps')) : $step_i = 0; ?>
          <?php while (have_rows('process_steps')) : the_row(); $step_i++; ?>
            <?php
            $step_icon  = get_sub_field('step_icon');
            $step_label = get_sub_field('step_label');
            ?>
            <div class="hero-orbit-step flex flex-col items-center bm-gap-space-1" data-step="<?php echo esc_attr($step_i); ?>">
              <div class="hero-step-badge flex items-center justify-center">
                <?php if (!empty($step_icon)) : ?>
                  <img src="<?php echo esc_url($step_icon['url']); ?>" alt="<?php echo esc_attr($step_icon['alt'] ?: $step_label); ?>" class="hero-step-icon bm-util-9321">
                <?php endif; ?>
              </div>
              <?php if (!empty($step_label)) : ?>
                <span class="hero-step-label bm-color-color-primary bm-font-size-fs-small bm-font-weight-600"><?php echo esc_html($step_label); ?></span>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <div class="hero-orbit-center"></div>

        <div class="hero-orbit-content flex flex-col items-center bm-gap-space-3">
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

          <?php if (have_rows('testimonials')) : ?>
            <?php
            $swiper_opts = [
                'slidesPerView' => 1,
                'spaceBetween'  => 0,
                'loop'          => true,
                'wrapperClass'  => 'hero-testimonial-track',
                'slideClass'    => 'hero-testimonial-slide',
                'navigationNextSelector' => '.hero-testimonial-next',
                'navigationPrevSelector' => '.hero-testimonial-prev',
            ];
            ?>
            <div class="hero-testimonial-slider" data-swiper="<?php echo esc_attr(wp_json_encode($swiper_opts)); ?>">
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
                    <div class="hero-testimonial-header flex items-center gap-3">
                      <?php if (!empty($t_photo)) : ?>
                        <img src="<?php echo esc_url($t_photo['url']); ?>" alt="<?php echo esc_attr($t_photo['alt'] ?: $t_name); ?>" class="hero-testimonial-photo">
                      <?php endif; ?>
                      <div class="hero-testimonial-author flex flex-col">
                        <?php if (!empty($t_name)) : ?>
                          <span class="hero-testimonial-name bm-line-height-1-3 bm-font-size-fs-body bm-font-weight-600 bm-color-color-black"><?php echo esc_html($t_name); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($t_role)) : ?>
                          <span class="hero-testimonial-role bm-color-color-black bm-line-height-1-4"><?php echo esc_html($t_role); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="hero-testimonial-body flex flex-col gap-2">
                      <?php if (!empty($t_text)) : ?>
                        <p class="hero-testimonial-text m-0 bm-font-size-fs-small bm-line-height-1-5"><?php echo wp_kses_post($t_text); ?></p>
                      <?php endif; ?>
                      <?php if (!empty($t_stars)) : ?>
                        <img src="<?php echo esc_url($t_stars['url']); ?>" alt="Rating" class="hero-testimonial-rating">
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
              <button class="hero-testimonial-prev" aria-label="<?php esc_attr_e('Previous testimonial', 'theme'); ?>">
                <?php if (!empty($testimonial_prev_icon['url'])) : ?>
                  <img src="<?php echo esc_url($testimonial_prev_icon['url']); ?>" alt="" class="hero-testimonial-arrow-icon" width="8" height="14" aria-hidden="true">
                <?php else : ?>
                  <svg width="8" height="14" viewBox="0 0 8 14" fill="none" aria-hidden="true"><path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2"/></svg>
                <?php endif; ?>
              </button>
              <button class="hero-testimonial-next bm-color-color-primary bm-padding-space-2" aria-label="<?php esc_attr_e('Next testimonial', 'theme'); ?>">
                <?php if (!empty($testimonial_next_icon['url'])) : ?>
                  <img src="<?php echo esc_url($testimonial_next_icon['url']); ?>" alt="" class="hero-testimonial-arrow-icon" width="8" height="14" aria-hidden="true">
                <?php else : ?>
                  <svg width="8" height="14" viewBox="0 0 8 14" fill="none" aria-hidden="true"><path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2"/></svg>
                <?php endif; ?>
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-bg-bottom"></div>

<?php elseif ($layout === '2') : ?>

  <div class="hero-row container flex flex-col items-center justify-center bm-spacing-5a9f bm-flex-direction-column-2 bm-gap-space-10-2">
    <div class="hero-content flex flex-col items-center bm-gap-space-10">
      <div class="hero-heading-group flex flex-col items-center bm-gap-space-3">
        <?php if (!empty($tag_text)) : ?>
          <span class="hero-tag bm-font-size-fs-h6 bm-color-color-primary bm-text-align-center bm-color-color-secondary bm-font-weight-font-weight-regular bm-font-size-fs-body"><?php echo esc_html($tag_text); ?></span>
        <?php endif; ?>
        <div class="hero-text-wrap flex flex-col items-center">
          <?php if (!empty($title)) : ?>
            <h1 class="hero-title m-0 text-center bm-color-color-primary"><?php echo esc_html($title); ?></h1>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="hero-description m-0 text-center bm-color-color-primary bm-color-color-secondary"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php if (!empty($button_text)) : ?>
        <a href="<?php echo esc_url($button_url ?: '#'); ?>" class="hero-cta btn btn-primary">
          <?php if (!empty($button_icon)) : ?>
            <img src="<?php echo esc_url($button_icon['url']); ?>" alt="" class="hero-cta-icon" aria-hidden="true">
          <?php endif; ?>
          <?php echo esc_html($button_text); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>

<?php elseif ($layout === '3') : ?>

  <div class="hero-row container flex flex-row items-center<?php echo $flip_class; ?>">
    <div class="hero-content flex flex-col bm-gap-space-10">
      <div class="hero-heading-group flex flex-col">
        <?php if (!empty($tag_text)) : ?>
          <span class="hero-tag bm-font-size-fs-body bm-color-color-secondary bm-text-align-center"><?php echo esc_html($tag_text); ?></span>
        <?php endif; ?>
        <?php if (!empty($title)) : ?>
          <h1 class="hero-title m-0 bm-color-color-primary"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
        <?php if (!empty($description)) : ?>
          <p class="hero-description m-0"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>
      </div>
      <form class="hero-form flex flex-col bm-gap-space-5" <?php if (!empty($form_action_url)) : ?>action="<?php echo esc_url($form_action_url); ?>" method="POST"<?php endif; ?>>
        <div class="hero-form-fields flex flex-col bm-gap-space-3">
          <input type="email" name="email" class="hero-form-input bm-font-family-font-primary bm-color-color-primary bm-font-size-fs-body bm-padding-10px-20px" placeholder="<?php echo esc_attr(!empty($form_email_placeholder) ? $form_email_placeholder : 'Email Address'); ?>" required>
          <input type="url" name="website" class="hero-form-input" placeholder="<?php echo esc_attr(!empty($form_website_placeholder) ? $form_website_placeholder : 'Your Website'); ?>">
        </div>
        <button type="submit" class="hero-form-submit btn bm-font-family-font-primary bm-font-size-fs-body bm-color-color-white"><?php echo esc_html(!empty($button_text) ? $button_text : 'Ready to Migrate!'); ?></button>
      </form>
    </div>
    <?php if (!empty($hero_image)) : ?>
      <div class="hero-media bm-util-efee bm-gap-15 bm-util-3146">
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="hero-image bm-display-block">
      </div>
    <?php endif; ?>
  </div>

<?php elseif ($layout === '4') : ?>

  <div class="hero-row container flex flex-row items-center<?php echo $flip_class; ?>">
    <div class="hero-content flex flex-col">
      <div class="hero-heading-group flex flex-col">
        <?php if (!empty($tag_text)) : ?>
          <span class="hero-tag"><?php echo esc_html($tag_text); ?></span>
        <?php endif; ?>
        <div class="hero-text-wrap flex flex-col">
          <?php if (!empty($title)) : ?>
            <h1 class="hero-title m-0 bm-color-color-primary"><?php echo esc_html($title); ?></h1>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="hero-description m-0"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
        </div>
        <?php if (have_rows('checklist_items')) : ?>
          <ul class="hero-checklist flex flex-col m-0 p-0 bm-gap-space-3">
            <?php while (have_rows('checklist_items')) : the_row(); ?>
              <?php $item_text = get_sub_field('item_text'); ?>
              <?php if (!empty($item_text)) : ?>
                <li class="hero-checklist-item flex flex-row items-center">
                  <?php if (!empty($checklist_icon['url'])) : ?>
                    <img src="<?php echo esc_url($checklist_icon['url']); ?>" alt="" class="hero-check-icon" width="18" height="17" aria-hidden="true">
                  <?php else : ?>
                    <svg class="hero-check-icon" width="18" height="17" viewBox="0 0 18 17" fill="none" aria-hidden="true">
                      <path d="M16.5 1.5L6.5 13.5L1.5 8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  <?php endif; ?>
                  <span class="hero-checklist-text"><?php echo esc_html($item_text); ?></span>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <?php if (!empty($button_text)) : ?>
        <div class="hero-cta-wrap">
          <a href="<?php echo esc_url($button_url ?: '#'); ?>" class="hero-cta btn btn-primary btn-lg"><?php echo esc_html($button_text); ?></a>
        </div>
      <?php endif; ?>
    </div>

    <div class="hero-media flex flex-col items-center bm-util-efee bm-util-3146">
      <?php if (!empty($wistia_video_id)) : ?>
        <?php $wistia_id = preg_replace('/[^a-zA-Z0-9]/', '', $wistia_video_id); ?>
        <?php if (!empty($wistia_id)) : ?>
          <div class="hero-wistia-wrap">
            <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . $wistia_id . '?videoFoam=true'); ?>" title="<?php echo esc_attr(!empty($title) ? $title : 'Video'); ?>" allow="autoplay; fullscreen" allowfullscreen class="hero-wistia-iframe"></iframe>
          </div>
        <?php endif; ?>
      <?php elseif (!empty($hero_image)) : ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="hero-image">
      <?php endif; ?>
      <?php if (!empty($quote_text) || !empty($quote_author)) : ?>
        <div class="hero-quote flex flex-col bm-gap-space-1">
          <?php if (!empty($quote_text)) : ?>
            <blockquote class="hero-quote-text m-0 bm-color-color-primary bm-font-size-fs-h5 bm-line-height-lh-h5"><?php echo wp_kses_post($quote_text); ?></blockquote>
          <?php endif; ?>
          <?php if (!empty($quote_author)) : ?>
            <cite class="hero-quote-author bm-font-size-fs-h6 bm-line-height-lh-h6 bm-color-color-secondary"><?php echo esc_html($quote_author); ?></cite>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php if (have_rows('platform_logos')) : ?>
    <div class="hero-platforms container flex items-center justify-center gap-6 flex-wrap">
      <?php while (have_rows('platform_logos')) : the_row(); ?>
        <?php $pl = get_sub_field('logo'); ?>
        <?php if (!empty($pl)) : ?>
          <img src="<?php echo esc_url($pl['url']); ?>" alt="<?php echo esc_attr($pl['alt']); ?>" class="hero-platform-logo">
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

<?php endif; ?>

</section>

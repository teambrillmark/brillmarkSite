<!-- ACF-ANNOTATED: true -->
<?php
$wrapper     = theme_get_block_wrapper_attributes($block, 'video-testimonial-section');
$layout      = get_field('layout') ?: '1';
$title       = get_field('title');
$description = get_field('description');
$flip        = get_field('flip_layout');
$common_images = get_field('common_images');
$slides_per_view = (int) get_field('slides_per_view');
if ($slides_per_view < 1 || $slides_per_view > 5) {
  $slides_per_view = 1;
}
$section_background = get_field('section_background');
$quote_icon = get_field('quote_icon');
$section_style = '';
if (!empty($section_background)) {
  $section_style = ' background: ' . esc_attr(wp_strip_all_tags($section_background)) . ';';
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> video-testimonial-section-section section bg-white" data-variant="<?php echo esc_attr($layout); ?>" data-slides-per-view="<?php echo esc_attr((string) $slides_per_view); ?>"<?php if ($section_style): ?> style="<?php echo $section_style; ?>"<?php endif; ?>>
  <div class="container">

    <div class="section-header flex flex-col mx-auto items-center text-center gap-6">
      <?php if (!empty($title)): ?>
        <h2 class="section-title text-primary m-0"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if (!empty($description) && in_array($layout, ['1', '3'], true)): ?>
        <p class="section-description text-secondary m-0"><?php echo wp_kses_post($description); ?></p>
      <?php endif; ?>
    </div>

    <?php if (!empty($common_images) && is_array($common_images)): ?>
      <div class="vts-common-images flex flex-wrap justify-center gap-4">
        <?php foreach ($common_images as $img): ?>
          <?php if (!empty($img['url'])): ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr(!empty($img['alt']) ? $img['alt'] : ''); ?>" width="120" height="80" class="vts-common-image" loading="lazy">
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($layout === '1'): ?>
      <?php /* ── VARIANT 1: Two video cards side by side ── */ ?>
      <?php if (have_rows('video_testimonials')): ?>
        <div class="video-cards flex flex-row gap-6">
          <?php while (have_rows('video_testimonials')): the_row();
            $thumb    = get_sub_field('video_thumbnail');
            $vid      = get_sub_field('video_id');
            $quote    = get_sub_field('quote_text');
            $logo     = get_sub_field('company_logo');
            $name     = get_sub_field('person_name');
            $role     = get_sub_field('person_title');
          ?>
            <div class="video-card flex flex-col">
              <div class="video-card-media">
                <?php if (!empty($vid)): ?>
                  <?php $wistia_id = preg_replace('/[^a-zA-Z0-9]/', '', $vid); ?>
                  <div class="vts-wistia-responsive" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . $wistia_id . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                  </div>
                <?php elseif (!empty($thumb)): ?>
                  <img class="video-card-thumbnail" src="<?php echo esc_url($thumb['url']); ?>" alt="<?php echo esc_attr($thumb['alt']); ?>" width="550" height="308">
                <?php endif; ?>
              </div>

              <?php if (!empty($quote)): ?>
                <p class="vts-quote text-secondary m-0"><?php echo wp_kses_post($quote); ?></p>
              <?php endif; ?>

              <div class="video-card-author flex flex-row items-center gap-5">
                <?php if (!empty($logo)): ?>
                  <img class="video-card-logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="100" height="56">
                <?php endif; ?>
                <div class="text-card-author-info flex flex-col">
                  <?php if (!empty($name)): ?>
                    <span class="vts-author-name text-primary"><?php echo esc_html($name); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($role)): ?>
                    <span class="text-card-role text-secondary"><?php echo esc_html($role); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    <?php elseif ($layout === '2'): ?>
      <?php /* ── VARIANT 2: Video card + stacked text testimonials ── */ ?>
      <div class="testimonial-columns<?php echo !empty($flip) ? ' testimonial-columns--flipped' : ''; ?>">

        <?php if (have_rows('video_testimonials')): ?>
          <div class="video-column">
            <?php while (have_rows('video_testimonials')): the_row();
              $thumb = get_sub_field('video_thumbnail');
              $vid   = get_sub_field('video_id');
              $quote = get_sub_field('quote_text');
              $logo  = get_sub_field('company_logo');
              $name  = get_sub_field('person_name');
              $role  = get_sub_field('person_title');
            ?>
              <div class="video-card">
                <div class="video-card-media">
                  <?php if (!empty($vid)): ?>
                    <?php $wistia_id = preg_replace('/[^a-zA-Z0-9]/', '', $vid); ?>
                    <div class="vts-wistia-responsive" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                      <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . $wistia_id . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>
                  <?php elseif (!empty($thumb)): ?>
                    <img class="video-card-thumbnail" src="<?php echo esc_url($thumb['url']); ?>" alt="<?php echo esc_attr($thumb['alt']); ?>" width="550" height="308">
                  <?php endif; ?>
                </div>

                <?php if (!empty($quote)): ?>
                  <p class="vts-quote"><?php echo wp_kses_post($quote); ?></p>
                <?php endif; ?>

                <div class="video-card-author">
                  <?php if (!empty($logo)): ?>
                    <img class="video-card-logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="100" height="56">
                  <?php endif; ?>
                  <div class="text-card-author-info">
                    <?php if (!empty($name)): ?>
                      <span class="vts-author-name"><?php echo esc_html($name); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($role)): ?>
                      <span class="text-card-role"><?php echo esc_html($role); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

        <?php if (have_rows('text_testimonials')): ?>
          <div class="text-column flex flex-col gap-6">
            <?php while (have_rows('text_testimonials')): the_row();
              $tq    = get_sub_field('quote_text');
              $tlogo = get_sub_field('company_logo');
              $tname = get_sub_field('person_name');
              $trole = get_sub_field('person_title');
            ?>
              <div class="text-card flex flex-col gap-5">
                <div class="text-card-body flex flex-col">
                  <?php if (!empty($quote_icon['url'])): ?>
                    <span class="text-card-quote-mark text-cta" aria-hidden="true">
                      <img src="<?php echo esc_url($quote_icon['url']); ?>" alt="" class="text-card-quote-icon-img" width="40" height="40" aria-hidden="true">
                    </span>
                  <?php else: ?>
                    <span class="text-card-quote-mark text-cta" aria-hidden="true">&ldquo;</span>
                  <?php endif; ?>
                  <?php if (!empty($tq)): ?>
                    <p class="text-card-quote text-secondary m-0"><?php echo wp_kses_post($tq); ?></p>
                  <?php endif; ?>
                </div>
                <div class="text-card-author">
                  <?php if (!empty($tlogo)): ?>
                    <img class="text-card-logo" src="<?php echo esc_url($tlogo['url']); ?>" alt="<?php echo esc_attr($tlogo['alt']); ?>" width="100" height="56">
                  <?php endif; ?>
                  <div class="text-card-author-info">
                    <?php if (!empty($tname)): ?>
                      <span class="vts-author-name"><?php echo esc_html($tname); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($trole)): ?>
                      <span class="text-card-role"><?php echo esc_html($trole); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

      </div>

    <?php elseif ($layout === '3'): ?>
      <?php /* ── VARIANT 3: Two video cards + text testimonial slider ── */ ?>
      <?php if (have_rows('video_testimonials')): ?>
        <div class="video-cards">
          <?php while (have_rows('video_testimonials')): the_row();
            $thumb = get_sub_field('video_thumbnail');
            $vid   = get_sub_field('video_id');
            $quote = get_sub_field('quote_text');
            $logo  = get_sub_field('company_logo');
            $name  = get_sub_field('person_name');
            $role  = get_sub_field('person_title');
          ?>
            <div class="video-card">
              <div class="video-card-media">
                <?php if (!empty($vid)): ?>
                  <?php $wistia_id = preg_replace('/[^a-zA-Z0-9]/', '', $vid); ?>
                  <div class="vts-wistia-responsive" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . $wistia_id . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                  </div>
                <?php elseif (!empty($thumb)): ?>
                  <img class="video-card-thumbnail" src="<?php echo esc_url($thumb['url']); ?>" alt="<?php echo esc_attr($thumb['alt']); ?>" width="550" height="308">
                <?php endif; ?>
              </div>

              <?php if (!empty($quote)): ?>
                <p class="vts-quote"><?php echo wp_kses_post($quote); ?></p>
              <?php endif; ?>

              <div class="video-card-author">
                <?php if (!empty($logo)): ?>
                  <img class="video-card-logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="100" height="56">
                <?php endif; ?>
                <div class="text-card-author-info">
                  <?php if (!empty($name)): ?>
                    <span class="vts-author-name"><?php echo esc_html($name); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($role)): ?>
                    <span class="text-card-role"><?php echo esc_html($role); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('text_testimonials')): ?>
        <?php
        $slider_options = [
          'slidesPerView' => 1,
          'spaceBetween'  => 30,
          'loop'          => true,
          'navigationNextSelector' => '.text-testimonial-slider-next',
          'navigationPrevSelector' => '.text-testimonial-slider-prev',
          'pagination'    => [ 'el' => '.vts-slider-pagination', 'clickable' => true ],
          'breakpoints'   => [
            768  => [ 'slidesPerView' => min(2, $slides_per_view) ],
            1024 => [ 'slidesPerView' => $slides_per_view ],
          ],
        ];
        ?>
        <div class="text-slider-wrapper flex flex-col mx-auto items-center">
          <div class="text-testimonial-slider-track">
            <div class="swiper vts-swiper text-testimonial-slider" data-swiper="<?php echo esc_attr(wp_json_encode($slider_options)); ?>">
              <div class="swiper-wrapper">
                <?php while (have_rows('text_testimonials')): the_row();
                  $sq    = get_sub_field('quote_text');
                  $slogo = get_sub_field('company_logo');
                  $sname = get_sub_field('person_name');
                  $srole = get_sub_field('person_title');
                ?>
                  <div class="swiper-slide">
                    <div class="text-card text-card--slider flex flex-col gap-6">
                      <div class="text-card-content flex flex-col gap-2">
                        <span class="text-card-quote-icon flex text-cta" aria-hidden="true">
                          <?php if (!empty($quote_icon['url'])): ?>
                            <img src="<?php echo esc_url($quote_icon['url']); ?>" alt="" class="text-card-quote-icon-img" width="40" height="40" aria-hidden="true">
                          <?php else: ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M17.5 20H10C10 15.86 13.36 12.5 17.5 12.5V8.33C11.05 8.33 5.83 13.55 5.83 20V31.67H17.5V20ZM34.17 20H26.67C26.67 15.86 30.03 12.5 34.17 12.5V8.33C27.72 8.33 22.5 13.55 22.5 20V31.67H34.17V20Z" fill="currentColor"/>
                            </svg>
                          <?php endif; ?>
                        </span>
                        <?php if (!empty($sq)): ?>
                          <p class="vts-slide-quote text-secondary m-0"><?php echo wp_kses_post($sq); ?></p>
                        <?php endif; ?>
                      </div>
                      <div class="text-card-author flex flex-row items-center gap-5">
                        <?php if (!empty($slogo)): ?>
                          <img class="text-card-logo" src="<?php echo esc_url($slogo['url']); ?>" alt="<?php echo esc_attr($slogo['alt']); ?>" width="100" height="62">
                        <?php endif; ?>
                        <div class="text-card-author-info">
                          <?php if (!empty($sname)): ?>
                            <span class="vts-author-name"><?php echo esc_html($sname); ?></span>
                          <?php endif; ?>
                          <?php if (!empty($srole)): ?>
                            <span class="text-card-role vts-author-role--light text-primary font-weight-light"><?php echo esc_html($srole); ?></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
              <div class="vts-slider-nav flex items-center justify-between">
                <button type="button" class="text-testimonial-slider-prev" aria-label="<?php esc_attr_e('Previous slide', 'theme'); ?>">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" fill="currentColor"/></svg>
                </button>
                <button type="button" class="text-testimonial-slider-next flex items-center justify-center" aria-label="<?php esc_attr_e('Next slide', 'theme'); ?>">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z" fill="currentColor"/></svg>
                </button>
              </div>
              <div class="vts-slider-pagination flex items-center justify-center gap-2"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>

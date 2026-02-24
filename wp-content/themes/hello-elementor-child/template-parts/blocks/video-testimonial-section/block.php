<!-- ACF-ANNOTATED: true -->
<?php
$wrapper     = theme_get_block_wrapper_attributes($block, 'video-testimonial-section-section');
$layout      = get_field('layout') ?: '1';
$title       = get_field('title');
$description = get_field('description');
$flip_layout = get_field('flip_layout');
?>
<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?> section bg-white" data-variant="<?php echo esc_attr($layout); ?>">
  <div class="container flex flex-col gap-10 items-center gap-6">
    <div class="section-header flex flex-col m-0 mx-auto items-center">
      <?php if (!empty($title)): ?>
        <h2 class="section-title font-weight-light m-0 text-center text-primary"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($description)): ?>
        <p class="section-description m-0 text-h6 text-center text-secondary"><?php echo wp_kses_post($description); ?></p>
      <?php endif; ?>
    </div>

    <?php if ($layout === '1'): ?>

      <?php if (have_rows('video_testimonials')): ?>
        <div class="video-cards bm-flex-9dd9 bm-flex-direction-column-2 flex gap-6">
          <?php while (have_rows('video_testimonials')): the_row();
            $wistia_id   = get_sub_field('wistia_id');
            $quote        = get_sub_field('quote');
            $person_name  = get_sub_field('person_name');
            $person_title = get_sub_field('person_title');
            $company_logo = get_sub_field('company_logo');
          ?>
            <div class="video-card gap-5 flex flex-col">
              <?php if (!empty($wistia_id)): ?>
                <div class="video-card-media video-card-media--wistia">
                  <div class="wistia-responsive-wrapper" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . preg_replace('/[^a-zA-Z0-9]/', '', $wistia_id) . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (!empty($quote)): ?>
                <p class="video-card-quote m-0 text-secondary text-body"><?php echo wp_kses_post($quote); ?></p>
              <?php endif; ?>
              <div class="video-card-author flex items-center">
                <?php if (!empty($company_logo)): ?>
                  <img class="video-card-logo bm-util-dac9" src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt']); ?>">
                <?php endif; ?>
                <div class="video-card-author-info flex flex-col">
                  <?php if (!empty($person_name)): ?>
                    <span class="video-card-name text-h6 text-primary"><?php echo esc_html($person_name); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($person_title)): ?>
                    <span class="video-card-role text-secondary text-body"><?php echo esc_html($person_title); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    <?php elseif ($layout === '2'): ?>

      <div class="testimonial-columns<?php echo !empty($flip_layout) ? ' testimonial-columns--flipped' : ''; ?>">
        <?php if (have_rows('video_testimonials')): ?>
          <div class="video-column flex flex-col">
            <?php while (have_rows('video_testimonials')): the_row();
              $wistia_id   = get_sub_field('wistia_id');
              $quote        = get_sub_field('quote');
              $person_name  = get_sub_field('person_name');
              $person_title = get_sub_field('person_title');
              $company_logo = get_sub_field('company_logo');
            ?>
              <div class="video-card">
                <?php if (!empty($wistia_id)): ?>
                  <div class="video-card-media video-card-media--wistia">
                    <div class="wistia-responsive-wrapper" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                      <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . preg_replace('/[^a-zA-Z0-9]/', '', $wistia_id) . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if (!empty($quote)): ?>
                  <p class="video-card-quote m-0 text-secondary text-body"><?php echo wp_kses_post($quote); ?></p>
                <?php endif; ?>
                <div class="video-card-author flex items-center">
                  <?php if (!empty($company_logo)): ?>
                    <img class="video-card-logo" src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt']); ?>">
                  <?php endif; ?>
                  <div class="video-card-author-info flex flex-col">
                    <?php if (!empty($person_name)): ?>
                      <span class="video-card-name text-h6 text-primary"><?php echo esc_html($person_name); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($person_title)): ?>
                      <span class="video-card-role text-secondary text-body font-weight-light"><?php echo esc_html($person_title); ?></span>
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
              $quote        = get_sub_field('quote');
              $person_name  = get_sub_field('person_name');
              $person_title = get_sub_field('person_title');
              $company_logo = get_sub_field('company_logo');
            ?>
              <div class="text-card flex flex-col justify-center gap-5">
                <div class="text-card-content flex flex-col">
                  <span class="text-card-quote-mark leading-1" aria-hidden="true">&ldquo;</span>
                  <?php if (!empty($quote)): ?>
                    <p class="text-card-quote m-0 text-secondary text-body"><?php echo wp_kses_post($quote); ?></p>
                  <?php endif; ?>
                </div>
                <div class="text-card-author flex items-center gap-2">
                  <?php if (!empty($company_logo)): ?>
                    <img class="text-card-logo bm-util-dac9" src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt']); ?>">
                  <?php endif; ?>
                  <div class="text-card-author-info flex flex-col">
                    <?php if (!empty($person_name)): ?>
                      <span class="text-card-name text-h6 text-primary"><?php echo esc_html($person_name); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($person_title)): ?>
                      <span class="text-card-role font-weight-light text-secondary"><?php echo esc_html($person_title); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>

    <?php elseif ($layout === '3'): ?>

      <?php if (have_rows('video_testimonials')): ?>
        <div class="video-cards bm-flex-9dd9 flex gap-6">
          <?php while (have_rows('video_testimonials')): the_row();
            $wistia_id   = get_sub_field('wistia_id');
            $quote        = get_sub_field('quote');
            $person_name  = get_sub_field('person_name');
            $person_title = get_sub_field('person_title');
            $company_logo = get_sub_field('company_logo');
          ?>
            <div class="video-card">
              <?php if (!empty($wistia_id)): ?>
                <div class="video-card-media video-card-media--wistia">
                  <div class="wistia-responsive-wrapper" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <iframe src="<?php echo esc_url('https://fast.wistia.net/embed/iframe/' . preg_replace('/[^a-zA-Z0-9]/', '', $wistia_id) . '?videoFoam=true'); ?>" title="<?php esc_attr_e('Video', 'theme'); ?>" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (!empty($quote)): ?>
                <p class="video-card-quote m-0 text-secondary text-body"><?php echo wp_kses_post($quote); ?></p>
              <?php endif; ?>
              <div class="video-card-author flex items-center">
                <?php if (!empty($company_logo)): ?>
                  <img class="video-card-logo" src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt']); ?>">
                <?php endif; ?>
                <div class="video-card-author-info flex flex-col">
                  <?php if (!empty($person_name)): ?>
                    <span class="video-card-name text-h6 text-primary"><?php echo esc_html($person_name); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($person_title)): ?>
                    <span class="video-card-role text-secondary text-body"><?php echo esc_html($person_title); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('text_testimonials')): ?>
        <?php
        $text_testimonial_swiper_options = [
            'slidesPerView'           => 1,
            'spaceBetween'           => 30,
            'loop'                    => true,
            'wrapperClass'            => 'text-testimonial-slider-track',
            'slideClass'              => 'text-testimonial-slider-slide',
            'navigationNextSelector'  => '.text-testimonial-slider-next',
            'navigationPrevSelector' => '.text-testimonial-slider-prev',
        ];
        ?>
        <div class="text-slider-wrapper m-0 mx-auto text-testimonial-slider flex items-center gap-4" data-swiper="<?php echo esc_attr(wp_json_encode($text_testimonial_swiper_options)); ?>">
          <button type="button" class="text-testimonial-slider-prev flex justify-center items-center p-0" aria-label="<?php esc_attr_e('Previous testimonial', 'theme'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 18L9 12L15 6" stroke="rgba(51,51,51,0.5)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="text-testimonial-slider-track flex gap-6 flex-1 overflow-hidden">
            <?php while (have_rows('text_testimonials')): the_row();
              $quote        = get_sub_field('quote');
              $person_name  = get_sub_field('person_name');
              $person_title = get_sub_field('person_title');
              $company_logo = get_sub_field('company_logo');
            ?>
              <div class="text-testimonial-slider-slide">
                <div class="text-card text-card--slider flex flex-col gap-10">
                  <div class="text-card-content flex flex-col">
                    <div class="text-card-quote-icon" aria-hidden="true">
                      <svg width="40" height="40" viewBox="0 0 24 24" fill="var(--color-cta-hover)" xmlns="http://www.w3.org/2000/svg"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>
                    </div>
                    <?php if (!empty($quote)): ?>
                      <p class="text-card-quote m-0 text-secondary text-body"><?php echo wp_kses_post($quote); ?></p>
                    <?php endif; ?>
                  </div>
                  <div class="text-card-author flex items-center">
                    <?php if (!empty($company_logo)): ?>
                      <img class="text-card-logo" src="<?php echo esc_url($company_logo['url']); ?>" alt="<?php echo esc_attr($company_logo['alt']); ?>">
                    <?php endif; ?>
                    <div class="text-card-author-info flex flex-col">
                      <?php if (!empty($person_name)): ?>
                        <span class="text-card-name text-h6 text-primary"><?php echo esc_html($person_name); ?></span>
                      <?php endif; ?>
                      <?php if (!empty($person_title)): ?>
                        <span class="text-card-role text-secondary"><?php echo esc_html($person_title); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
          <button type="button" class="text-testimonial-slider-next flex justify-center items-center p-0" aria-label="<?php esc_attr_e('Next testimonial', 'theme'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 18L15 12L9 6" stroke="rgba(51,51,51,0.5)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </div>
      <?php endif; ?>

    <?php endif; ?>
  </div>
</section>

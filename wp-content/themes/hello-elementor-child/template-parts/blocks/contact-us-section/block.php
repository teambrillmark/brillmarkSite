<!-- ACF-ANNOTATED: true -->
<?php
$wrapper            = theme_get_block_wrapper_attributes($block, 'contact-us-section-section');
$layout             = get_field('layout') ?: '1';
$flip               = get_field('flip_layout');
$show_cta           = get_field('show_cta');
$section_background = get_field('section_background');
$section_textcolor = get_field('section_textcolor');
$title              = get_field('title');
$description        = get_field('description');
$custom_code        = get_field('custom_code');
$form_title         = get_field('form_title');
$button_text        = get_field('button_text') ?: 'Get in Touch';
$email_address      = get_field('email_address') ?: 'info@brillmark.com';
$footer_text        = get_field('footer_text');
$footer_subtext     = get_field('footer_subtext');
$sidebar_heading    = get_field('sidebar_heading');
$features_richtext  = get_field('features_richtext');
$consent_text       = get_field('consent_text') ?: 'I consent to have BrillMark collect my details via this form and agree to the Privacy Policy';

$flip_class   = $flip ? ' contact-us-section-section--flipped' : '';
$section_style = '';
$styles = [];
if ( ! empty( $section_background ) ) {
	$styles[] = 'background: ' . esc_attr( $section_background );
}
if ( ! empty( $section_textcolor ) ) {
  $styles[] = 'color: ' . esc_attr( $section_textcolor );
}
if ( ! empty( $styles ) ) {
  $section_style = ' style="' . implode( '; ', $styles ) . ';"';
}
?>
<section id="<?php echo esc_attr( $wrapper['id'] ); ?>" class="<?php echo esc_attr( $wrapper['class'] ); ?><?php echo $flip_class; ?> section" data-variant="<?php echo esc_attr( $layout ); ?>"<?php echo $section_style; ?>>
  <div class="container contact-us-container flex flex-col items-center">

    <?php if ( $layout === '1' ) : ?>
    <!-- ======================== VARIANT 1 ======================== -->

    <?php if ( ! empty( $title ) || ! empty( $description ) ) : ?>
    <div class="contact-us-header text-left m-0">
      <?php if ( ! empty( $title ) ) : ?>
        <h2 class="contact-us-title text-primary m-0 font-weight-light"><?php echo esc_html( $title ); ?></h2>
      <?php endif; ?>
      <?php if ( ! empty( $description ) ) : ?>
        <p class="contact-us-description text-secondary m-0 font-weight-light mt-3"><?php echo esc_html( $description ); ?></p>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="contact-us-columns flex flex-col gap-10">
      <!-- Form / custom code column -->
      <div class="contact-us-form-col">
        <div class="contact-us-form-card flex flex-col gap-5">
          <?php if ( ! empty( $form_title ) ) : ?>
            <p class="contact-us-form-title text-primary m-0"><?php echo esc_html( $form_title ); ?></p>
          <?php endif; ?>

          <?php if ( ! empty( $custom_code ) ) : ?>
            <div class="contact-us-custom-code">
              <?php echo do_shortcode( wp_kses_post( $custom_code ) ); ?>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $show_cta ) && ! empty( $button_text ) ) : ?>
            <div class="contact-us-cta-wrap">
              <button type="button" class="btn btn-primary contact-us-submit"><?php echo esc_html( $button_text ); ?></button>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $footer_text ) || ! empty( $footer_subtext ) ) : ?>
          <div class="contact-us-form-footer">
            <?php if ( ! empty( $footer_text ) ) : ?>
              <p class="form-footer-text text-primary m-0 text-body"><?php echo esc_html( $footer_text ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $footer_subtext ) ) : ?>
              <p class="form-footer-subtext m-0 text-body"><?php echo esc_html( $footer_subtext ); ?></p>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Info column -->
      <div class="contact-us-info-col flex flex-col gap-5">
        <?php if ( ! empty( $sidebar_heading ) ) : ?>
          <h3 class="contact-us-sidebar-heading text-primary m-0 font-weight-light"><?php echo esc_html( $sidebar_heading ); ?></h3>
        <?php endif; ?>

        <?php if ( ! empty( $features_richtext ) ) : ?>
        <div class="contact-us-features text-primary text-h6">
          <?php echo wp_kses_post( $features_richtext ); ?>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $email_address ) ) : ?>
          <a href="mailto:<?php echo esc_attr( $email_address ); ?>" class="contact-us-email-link text-primary text-h6">Email: <?php echo esc_html( $email_address ); ?></a>
        <?php endif; ?>

        <?php if ( have_rows( 'social_links' ) ) : ?>
        <div class="contact-us-social flex items-center gap-4">
          <?php
          while ( have_rows( 'social_links' ) ) :
            the_row();
            $platform = get_sub_field( 'platform' );
            $url     = get_sub_field( 'url' );
            if ( empty( $url ) ) {
              continue;
            }
          ?>
          <a href="<?php echo esc_url( $url ); ?>" class="social-icon social-icon--<?php echo esc_attr( $platform ); ?> flex items-center justify-center text-white" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $platform ) ); ?>">
            <?php if ( $platform === 'linkedin' ) : ?>
              <svg viewBox="0 0 448 512" fill="currentColor" width="22" height="22"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
            <?php elseif ( $platform === 'twitter' ) : ?>
              <svg viewBox="0 0 512 512" fill="currentColor" width="22" height="22"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
            <?php elseif ( $platform === 'facebook' ) : ?>
              <svg viewBox="0 0 320 512" fill="currentColor" width="22" height="22"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
            <?php endif; ?>
          </a>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php elseif ( $layout === '2' ) : ?>
    <!-- ======================== VARIANT 2 ======================== -->

    <div class="contact-us-columns flex flex-col gap-10 bm-flex-direction-row-reverse-2 bm-flex-direction-row-2">
      <!-- Info column -->
      <div class="contact-us-info-col flex flex-col gap-5">
        <?php if ( ! empty( $title ) || ! empty( $description ) ) : ?>
        <div class="contact-us-header">
          <?php if ( ! empty( $title ) ) : ?>
            <h2 class="contact-us-title text-primary m-0"><?php echo esc_html( $title ); ?></h2>
          <?php endif; ?>
          <?php if ( ! empty( $description ) ) : ?>
            <p class="contact-us-description text-secondary mt-3"><?php echo esc_html( $description ); ?></p>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $features_richtext ) ) : ?>
        <div class="contact-us-features text-primary">
          <?php echo wp_kses_post( $features_richtext ); ?>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $email_address ) ) : ?>
        <a href="mailto:<?php echo esc_attr( $email_address ); ?>" class="btn btn-primary contact-us-email-btn flex items-center gap-2 text-white bm-gap-5">
          <svg class="email-icon flex-shrink-0" width="25" height="25" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
          <?php echo esc_html( $email_address ); ?>
        </a>
        <?php endif; ?>
      </div>

      <!-- Form / custom code column -->
      <div class="contact-us-form-col">
        <div class="contact-us-form-card flex flex-col gap-5">
          <?php if ( ! empty( $form_title ) ) : ?>
            <p class="contact-us-form-title text-primary m-0"><?php echo esc_html( $form_title ); ?></p>
          <?php endif; ?>

          <?php if ( ! empty( $custom_code ) ) : ?>
            <div class="contact-us-custom-code">
              <?php echo do_shortcode( wp_kses_post( $custom_code ) ); ?>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $show_cta ) && ! empty( $button_text ) ) : ?>
            <div class="contact-us-cta-wrap">
              <button type="button" class="btn btn-primary contact-us-submit"><?php echo esc_html( $button_text ); ?></button>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $footer_text ) || ! empty( $footer_subtext ) ) : ?>
          <div class="contact-us-form-footer">
            <?php if ( ! empty( $footer_text ) ) : ?>
              <p class="form-footer-text text-primary m-0"><?php echo esc_html( $footer_text ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $footer_subtext ) ) : ?>
              <p class="form-footer-subtext m-0"><?php echo esc_html( $footer_subtext ); ?></p>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php elseif ( $layout === '3' ) : ?>
    <!-- ======================== VARIANT 3 ======================== -->

    <?php if ( ! empty( $title ) || ! empty( $description ) ) : ?>
    <div class="contact-us-header text-center">
      <?php if ( ! empty( $title ) ) : ?>
        <h2 class="contact-us-title text-primary m-0"><?php echo esc_html( $title ); ?></h2>
      <?php endif; ?>
      <?php if ( ! empty( $description ) ) : ?>
        <p class="contact-us-description text-secondary m-0"><?php echo esc_html( $description ); ?></p>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="contact-us-columns flex flex-col gap-10">
      <!-- Info column -->
      <div class="contact-us-info-col flex flex-col gap-5">
        <?php if ( ! empty( $sidebar_heading ) ) : ?>
          <h3 class="contact-us-sidebar-heading text-primary m-0"><?php echo esc_html( $sidebar_heading ); ?></h3>
        <?php endif; ?>

        <?php if ( ! empty( $features_richtext ) ) : ?>
        <div class="contact-us-features text-primary">
          <?php echo wp_kses_post( $features_richtext ); ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Form / custom code column -->
      <div class="contact-us-form-col">
        <div class="contact-us-form-card flex flex-col gap-5">
          <?php if ( ! empty( $custom_code ) ) : ?>
            <div class="contact-us-custom-code">
              <?php echo do_shortcode( wp_kses_post( $custom_code ) ); ?>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $show_cta ) && ! empty( $button_text ) ) : ?>
            <div class="contact-us-cta-wrap">
              <button type="button" class="btn btn-primary btn-full contact-us-submit contact-us-submit--v3"><?php echo esc_html( $button_text ); ?></button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php endif; ?>

  </div>
</section>

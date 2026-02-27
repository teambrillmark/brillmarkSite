<!-- ACF-ANNOTATED: true -->
<?php
$wrapper   = theme_get_block_wrapper_attributes($block, 'contact-us-section-section');
$variant   = get_field('variant');
$section_color = get_field('section_color');
$background = get_field('background');
if (empty($variant)) {
    $variant = 'default';
}
$variant = sanitize_html_class($variant);
$heading   = get_field('heading');
$show_intro = get_field('show_intro');
$show_sub_intro = get_field('show_sub_intro');
$intro     = get_field('intro');
$sub_intro     = get_field('sub_intro');
$show_feature_list = get_field('show_feature_list');
$feature_list_subtitle = get_field('feature_list_subtitle');
$feature_list_icon = get_field('feature_list_icon');
$feature_list = get_field('feature_list');
$show_email_button = get_field('show_email_button');
$email_button_text = get_field('email_button_text');
$email_button_url = get_field('email_button_url');
$email_button_icon = get_field('email_button_icon');
$form_intro = get_field('form_intro');
$form_shortcode = get_field('form_shortcode');
$form_fields = get_field('form_fields');
$show_whats_next = get_field('show_whats_next');
$what_next_title = get_field('what_next_title');
$what_next_steps = get_field('what_next_steps');
$what_next_feedback = get_field('what_next_feedback');
$what_next_email_label = get_field('what_next_email_label');
$what_next_email_address = get_field('what_next_email_address');
$what_next_social = get_field('what_next_social');
$show_consent = get_field('show_consent');
$consent_label = get_field('consent_label');
$privacy_policy_url = get_field('privacy_policy_url');
$submit_button_text = get_field('submit_button_text');
$form_action_url = get_field('form_action_url');
$show_followup = get_field('show_followup');
$followup_text = get_field('followup_text');
$section_style = '';
$styles = [];
if ( !empty( $background ) ) {
    $styles[] = 'background: ' . esc_attr( $background );
}
if ( ! empty( $styles ) ) {
    $section_style = ' style="' . implode( '; ', $styles ) . ';"';
}
$content_color_style = '';
if ( ! empty( $section_color ) ) {
    $content_color_style = ' style="color: ' . esc_attr( $section_color ) . ';"';
}
$layout_swap = !empty(get_field('layout_swap'));
$inner_class = 'contact-us-section-inner contact-us-section-inner--two-col';
if ($layout_swap) {
    $inner_class .= ' contact-us-section-inner--form-left';
}
$consent_html = '';
if (!empty($consent_label)) {
    $consent_html = esc_html($consent_label);
    if (!empty($privacy_policy_url)) {
        $consent_html = str_replace('Privacy Policy', '<a href="' . esc_url($privacy_policy_url) . '">Privacy Policy</a>', $consent_html);
    }
}
if (!function_exists('contact_us_autolink_urls')) {
    function contact_us_autolink_urls($text) {
        $lines = explode("\n", (string) $text);
        $out = [];
        foreach ($lines as $line) {
            $line_trim = trim($line);
            if ($line_trim === '') {
                $out[] = '';
                continue;
            }
            if (preg_match('#^https?://#', $line_trim)) {
                $out[] = '<a href="' . esc_url($line_trim) . '" rel="noopener">' . esc_html($line_trim) . '</a>';
            } else {
                $out[] = esc_html($line_trim);
            }
        }
        return implode('<br>', $out);
    }
}
?>
<section id="<?php echo esc_attr($wrapper['id']); ?>" class="<?php echo esc_attr($wrapper['class']); ?> contact-us-section-section contact-us-section-section--<?php echo $variant; ?>" data-variant="<?php echo esc_attr($variant); ?>"<?php echo $section_style; ?>>
  <div class="contact-us-section-container">
    <div class="contact-us-section-header"<?php echo $content_color_style; ?>>
    <?php if (!empty($heading)): ?>
          <h2 class="contact-us-section-heading text-white"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>
        <?php if (!empty($show_intro) && $intro !== ''): ?>
          <div class="contact-us-section-subheading text-white"><?php echo wp_kses_post($intro); ?></div>
        <?php endif; ?>
    </div>
    <div class="<?php echo esc_attr($inner_class); ?>">
      <div class="contact-us-section-left flex flex-col gap-6"<?php echo $content_color_style; ?>>
        
        <?php if (!empty($show_feature_list) && (!empty($feature_list) || $feature_list_subtitle !== '')): ?>
          <div class="contact-us-section-feature-block flex flex-col gap-3">
            <?php if ($feature_list_subtitle !== ''): ?>
              <h3 class="contact-us-section-feature-subtitle m-0 text-white"><?php echo esc_html($feature_list_subtitle); ?></h3>
            <?php endif; ?>
            <?php if (!empty($show_sub_intro) && $sub_intro !== ''): ?>
              <div class="contact-us-section-intro text-white"><?php echo esc_html($sub_intro); ?></div>
            <?php endif; ?>
            <?php if (!empty($feature_list) && is_array($feature_list)): ?>
              <ul class="contact-us-section-feature-list flex flex-col gap-2 m-0 p-0 list-none">
                <?php foreach ($feature_list as $item): ?>
                  <?php if (!empty($item['item_text'])): ?>
                    <li class="contact-us-section-feature-item flex items-start gap-2 text-white">
                      <?php if (!empty($feature_list_icon) && is_array($feature_list_icon) && !empty($feature_list_icon['url'])): ?>
                        <img src="<?php echo esc_url($feature_list_icon['url']); ?>" alt="" class="contact-us-section-feature-icon flex-shrink-0" width="20" height="20" aria-hidden="true">
                      <?php else: ?>
                        <span class="contact-us-section-feature-icon contact-us-section-feature-icon--check" aria-hidden="true">✓</span>
                      <?php endif; ?>
                      <span class="contact-us-section-feature-text"><?php echo esc_html($item['item_text']); ?></span>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($show_email_button) && ($email_button_text !== '' || $email_button_url !== '')): ?>
          <div class="contact-us-section-email-wrap">
            <a href="<?php echo esc_url($email_button_url ?: '#'); ?>" class="contact-us-section-email-btn btn btn-primary inline-flex items-center gap-2">
              <?php if (!empty($email_button_icon) && is_array($email_button_icon) && !empty($email_button_icon['url'])): ?>
                <img src="<?php echo esc_url($email_button_icon['url']); ?>" alt="" class="contact-us-section-email-icon" width="20" height="20" aria-hidden="true">
              <?php endif; ?>
              <span><?php echo esc_html($email_button_text ?: 'Contact'); ?></span>
            </a>
          </div>
        <?php endif; ?>
      </div>
      <div class="contact-us-section-right flex flex-col gap-6">
        <div class="contact-us-section-form-card bm-form">
          <?php if ($form_intro !== ''): ?>
            <div class="contact-us-section-form-intro form-main-heading text-secondary mb-4"><?php echo nl2br(esc_html($form_intro)); ?></div>
          <?php endif; ?>
          <?php if ($form_shortcode !== ''): ?>
            <div class="contact-us-section-form-shortcode">
              <?php
              $shortcode = trim($form_shortcode);
              if (strpos($shortcode, '[') !== 0) {
                  $shortcode = '[' . $shortcode . ']';
              }
              echo do_shortcode($shortcode);
              ?>
            </div>
          <?php else: ?>
          <form class="contact-us-section-form flex flex-col gap-4" action="<?php echo esc_url($form_action_url ?: '#'); ?>" method="post">
            <?php
            if (!empty($form_fields) && is_array($form_fields)) {
                foreach ($form_fields as $row) {
                    if (empty($row['show']) || empty($row['name'])) continue;
                    $type = $row['type'] ?? 'text';
                    $name = sanitize_key($row['name']);
                    $label = isset($row['label']) ? $row['label'] : '';
                    $placeholder = isset($row['placeholder']) ? $row['placeholder'] : '';
                    $required = !empty($row['required']);
                    $req_mark = $required ? ' <span class="contact-us-section-required">*</span>' : '';
                    ?>
                    <div class="contact-us-section-field">
                      <?php if ($label !== ''): ?>
                        <label for="contact-us-<?php echo esc_attr($name); ?>" class="contact-us-section-label"><?php echo esc_html($label); ?><?php echo $req_mark; ?></label>
                      <?php endif; ?>
                      <?php
                      if ($type === 'textarea') {
                          echo '<textarea id="contact-us-' . esc_attr($name) . '" name="' . esc_attr($name) . '" class="contact-us-section-input contact-us-section-textarea" placeholder="' . esc_attr($placeholder) . '" rows="4"' . ($required ? ' required' : '') . '></textarea>';
                      } elseif ($type === 'select') {
                          $opts = isset($row['options']) ? preg_split('/\r\n|\r|\n/', trim((string) $row['options']), -1, PREG_SPLIT_NO_EMPTY) : [];
                          echo '<select id="contact-us-' . esc_attr($name) . '" name="' . esc_attr($name) . '" class="contact-us-section-input contact-us-section-select"' . ($required ? ' required' : '') . '>';
                          echo '<option value="">' . esc_html($placeholder ?: 'Select...') . '</option>';
                          foreach ($opts as $opt) {
                              echo '<option value="' . esc_attr(trim($opt)) . '">' . esc_html(trim($opt)) . '</option>';
                          }
                          echo '</select>';
                      } else {
                          $input_type = in_array($type, ['email', 'url', 'tel'], true) ? $type : 'text';
                          echo '<input id="contact-us-' . esc_attr($name) . '" type="' . esc_attr($input_type) . '" name="' . esc_attr($name) . '" class="contact-us-section-input" placeholder="' . esc_attr($placeholder) . '"' . ($required ? ' required' : '') . '>';
                      }
                      ?>
                    </div>
                    <?php
                }
            }
            ?>
            <?php if (!empty($show_consent) && $consent_html !== ''): ?>
              <div class="contact-us-section-consent flex items-start gap-2">
                <input type="checkbox" name="consent" id="contact-us-consent" class="contact-us-section-checkbox" required>
                <label for="contact-us-consent" class="contact-us-section-consent-label"><?php echo wp_kses_post($consent_html); ?></label>
              </div>
            <?php endif; ?>
            <div class="contact-us-section-submit-wrap">
              <button type="submit" class="contact-us-section-submit btn btn-primary btn-full">
                <?php echo esc_html($submit_button_text ?: 'Submit'); ?>
              </button>
            </div>
          </form>
          <?php endif; ?>
          <?php if (!empty($show_followup) && $followup_text !== ''): ?>
            <div class="contact-us-section-followup text-secondary mt-4">
              <?php echo wp_kses_post($followup_text); ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if (!empty($show_whats_next)): ?>
          <div class="contact-us-section-whats-next"<?php echo $content_color_style; ?>>
            <?php if ($what_next_title !== ''): ?>
              <h3 class="contact-us-section-whats-next-title  text-primary"><?php echo esc_html($what_next_title); ?></h3>
            <?php endif; ?>
            <?php if (!empty($what_next_steps) && is_array($what_next_steps)): ?>
              <div class="contact-us-section-whats-next-steps">
                <?php foreach ($what_next_steps as $step): ?>
                  <?php
                  $step_title = isset($step['step_title']) ? $step['step_title'] : '';
                  $step_desc = isset($step['step_description']) ? $step['step_description'] : '';
                  $step_link_text = isset($step['step_link_text']) ? trim($step['step_link_text']) : '';
                  $step_link_url = isset($step['step_link_url']) ? $step['step_link_url'] : '';
                  if ($step_desc !== '' && $step_link_text !== '' && $step_link_url !== '') {
                      $step_desc_escaped = esc_html($step_desc);
                      $step_link_escaped = esc_html($step_link_text);
                      $step_desc = str_replace($step_link_escaped, '<a href="' . esc_url($step_link_url) . '" class="contact-us-section-whats-next-link">' . $step_link_escaped . '</a>', $step_desc_escaped);
                  } else {
                      $step_desc = esc_html($step_desc);
                  }
                  ?>
                  <div class="contact-us-section-whats-next-step">
                    <?php if ($step_title !== ''): ?>
                      <h4 class="contact-us-section-whats-next-step-title m-0 text-primary"><?php echo esc_html($step_title); ?></h4>
                    <?php endif; ?>
<?php if (!empty($step_desc)): ?>
  <div class="contact-us-section-whats-next-step-desc m-0 text-secondary">
    <?php echo html_entity_decode($step_desc); ?>
  </div>
<?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <?php if ($what_next_feedback !== ''): ?>
              <p class="contact-us-section-whats-next-feedback m-0 text-secondary"><?php echo nl2br(esc_html($what_next_feedback)); ?></p>
            <?php endif; ?>
            <?php if ($what_next_email_label !== '' || $what_next_email_address !== ''): ?>
              <p class="contact-us-section-whats-next-email">
                <?php if ($what_next_email_label !== ''): ?>
                  <span class="contact-us-section-whats-next-email-label text-primary"><?php echo esc_html($what_next_email_label); ?></span>
                <?php endif; ?>
                <?php if ($what_next_email_address !== ''): ?>
                  <a href="<?php echo esc_url('mailto:' . $what_next_email_address); ?>" class="contact-us-section-whats-next-email-link"><?php echo esc_html($what_next_email_address); ?></a>
                <?php endif; ?>
              </p>
            <?php endif; ?>
            <?php if (!empty($what_next_social) && is_array($what_next_social)): ?>
              <div class="contact-us-section-whats-next-social flex flex-wrap gap-3">
                <?php foreach ($what_next_social as $item): ?>
                  <?php
                  $icon = isset($item['icon']) && is_array($item['icon']) ? $item['icon'] : null;
                  $url = isset($item['url']) ? $item['url'] : '#';
                  $label = isset($item['label']) ? $item['label'] : '';
                  if (empty($icon['url'])) continue;
                  ?>
                  <a href="<?php echo esc_url($url); ?>" class="contact-us-section-whats-next-social-link" <?php echo $label !== '' ? ' aria-label="' . esc_attr($label) . '"' : ''; ?> target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($label); ?>" width="40" height="40">
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
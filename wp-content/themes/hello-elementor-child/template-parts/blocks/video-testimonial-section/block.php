<!-- ACF-ANNOTATED: true -->
<?php
/**
 * Video Testimonial Section Block
 * 
 * @package theme
 */

// Get ACF fields
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$testimonials = get_field('testimonials');
$wrapper = theme_get_block_wrapper_attributes($block, 'video-testimonial-section');

/**
 * Generate Wistia video embed HTML
 * @param string $video_id Wistia video ID
 * @param string $title Video title for accessibility
 * @return string HTML for Wistia embed
 */
if (!function_exists('render_wistia_video')) {
    function render_wistia_video($video_id, $title = 'Video') {
        if (empty($video_id)) {
            return '';
        }
        
        $video_id = esc_attr($video_id);
        $title = esc_attr($title);
        
        return sprintf(
            '<div class="wistia_responsive_padding" style="padding:56.25%% 0 0 0;position:relative;">
                <div class="wistia_responsive_wrapper" style="height:100%%;left:0;position:absolute;top:0;width:100%%;">
                    <iframe src="https://fast.wistia.net/embed/iframe/%s?web_component=true&seo=false" 
                            title="%s" 
                            allow="autoplay; fullscreen" 
                            allowtransparency="true" 
                            frameborder="0" 
                            scrolling="no" 
                            class="wistia_embed" 
                            name="wistia_embed" 
                            width="100%%" 
                            height="100%%">
                    </iframe>
                </div>
            </div>',
            $video_id,
            $title
        );
    }
}
?>

<section id="<?php echo $wrapper['id']; ?>" class="<?php echo $wrapper['class']; ?>">
  <div class="container">
    <div class="video-testimonial-content">
      <div class="video-testimonial-header">
        <?php if (!empty($section_title)) : ?>
          <h2 class="video-testimonial-title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        
        <?php if (!empty($section_description)) : ?>
          <p class="video-testimonial-description"><?php echo wp_kses_post($section_description); ?></p>
        <?php endif; ?>
      </div>
      
      <?php if (!empty($testimonials) && is_array($testimonials)) : ?>
        <div class="video-testimonial-cards">
          <?php foreach ($testimonials as $testimonial) : 
            $video_id = !empty($testimonial['wistia_video_id']) ? $testimonial['wistia_video_id'] : '';
            $author_name = !empty($testimonial['author_name']) ? $testimonial['author_name'] : 'Testimonial';
            $video_title = sprintf('%s BrillMark-Testimonial Video', $author_name);
          ?>
            <div class="testimonial-card">
              <div class="testimonial-card-bg"></div>
              
              <?php if (!empty($video_id)) : ?>
                <div class="testimonial-video-wrapper">
                  <?php echo render_wistia_video($video_id, $video_title); ?>
                </div>
              <?php endif; ?>
              
              <?php if (!empty($testimonial['quote'])) : ?>
                <p class="testimonial-quote"><?php echo wp_kses_post($testimonial['quote']); ?></p>
              <?php endif; ?>
              
              <div class="testimonial-author">
                <?php if (!empty($testimonial['company_logo'])) : ?>
                  <div class="author-logo" style="background-image: url(<?php echo esc_url($testimonial['company_logo']); ?>);"></div>
                <?php endif; ?>
                
                <div class="author-info">
                  <?php if (!empty($testimonial['author_name'])) : ?>
                    <span class="author-name"><?php echo esc_html($testimonial['author_name']); ?></span>
                  <?php endif; ?>
                  
                  <?php if (!empty($testimonial['author_title'])) : ?>
                    <span class="author-title"><?php echo esc_html($testimonial['author_title']); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Load Wistia Player Script -->
<script src="https://fast.wistia.net/player.js" async></script>

<?php
/**
 * Blog Section Block Template
 *
 * @package theme
 */

// ACF-ANNOTATED: true

// Get ACF field values
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$posts_per_page = get_field('posts_per_page') ?: 3;
$post_categories = get_field('post_categories');
$orderby = get_field('orderby') ?: 'date';
$order = get_field('order') ?: 'DESC';
$read_more_text = get_field('read_more_text') ?: 'Read Full Story...';
$cta_button = get_field('cta_button');

// Build WP_Query arguments - fetch extra posts to account for filtering
$posts_to_fetch = intval($posts_per_page) * 2; // Fetch double to ensure we get enough after filtering
$args = array(
  'post_type' => 'post',
  'posts_per_page' => $posts_to_fetch,
  'post_status' => 'publish',
  'orderby' => $orderby,
  'order' => $order,
  'ignore_sticky_posts' => true,
);

// Add category filter if specified
if (!empty($post_categories) && is_array($post_categories)) {
  $args['category__in'] = $post_categories;
}

// Execute query
$blog_query = new WP_Query($args);
?>
<section class="blog-section-section">
  <div class="container">
    <div class="blog-section-wrapper">
      <div class="blog-section-header">
        <?php if (!empty($section_title)): ?>
          <h2 class="blog-section-title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($section_description)): ?>
          <p class="blog-section-description"><?php echo esc_html($section_description); ?></p>
        <?php endif; ?>
      </div>
      <div class="blog-section-content">
        <?php 
        // Filter posts to only include those with content
        $posts_with_content = array();
        if ($blog_query->have_posts()) {
          while ($blog_query->have_posts()) {
            $blog_query->the_post();
            $post_content = get_the_content();
            $post_excerpt = get_the_excerpt();
            
            // Check if post has meaningful content (not just whitespace or empty)
            $content_text = trim(strip_tags($post_content));
            $excerpt_text = trim(strip_tags($post_excerpt));
            $has_content = !empty($content_text) || !empty($excerpt_text);
            
            if ($has_content && count($posts_with_content) < intval($posts_per_page)) {
              $posts_with_content[] = get_the_ID();
            }
            
            // Stop if we have enough posts
            if (count($posts_with_content) >= intval($posts_per_page)) {
              break;
            }
          }
          wp_reset_postdata();
        }
        
        // Query only the filtered posts
        if (!empty($posts_with_content)) {
          $filtered_args = array(
            'post_type' => 'post',
            'post__in' => $posts_with_content,
            'posts_per_page' => count($posts_with_content),
            'post_status' => 'publish',
            'orderby' => 'post__in', // Maintain order
            'ignore_sticky_posts' => true,
          );
          $blog_query = new WP_Query($filtered_args);
        }
        ?>
        
        <?php if ($blog_query->have_posts()): ?>
          <div class="blog-cards-wrapper">
            <?php while ($blog_query->have_posts()): $blog_query->the_post(); 
              // Get post data
              $post_id = get_the_ID();
              $post_title = get_the_title();
              $post_permalink = get_permalink();
              $post_image = get_the_post_thumbnail_url($post_id, 'large');
              $post_categories_list = get_the_category($post_id);
              $first_category = !empty($post_categories_list) ? $post_categories_list[0] : null;
              $category_name = $first_category ? $first_category->name : '';
              $category_link = $first_category ? get_category_link($first_category->term_id) : '#';
            ?>
              <article class="blog-card">
                <div class="blog-card-image-wrapper">
                  <?php if (!empty($post_image)): ?>
                    <a href="<?php echo esc_url($post_permalink); ?>">
                      <img class="blog-card-image" src="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="blog-card-content">
                  <div class="blog-card-meta">
                    <?php if (!empty($category_name)): ?>
                      <div class="blog-card-category-wrapper">
                        <a href="<?php echo esc_url($category_link); ?>" class="blog-card-category-link">
                          <span class="blog-card-category"><?php echo esc_html($category_name); ?></span>
                        </a>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($post_title)): ?>
                      <div class="blog-card-title-wrapper">
                        <h3 class="blog-card-title">
                          <a href="<?php echo esc_url($post_permalink); ?>"><?php echo esc_html($post_title); ?></a>
                        </h3>
                      </div>
                    <?php endif; ?>
                  </div>
                  <a href="<?php echo esc_url($post_permalink); ?>" class="blog-card-read-more"><?php echo esc_html($read_more_text); ?></a>
                </div>
              </article>
            <?php endwhile; ?>
          </div>
          <?php wp_reset_postdata(); ?>
        <?php else: ?>
          <div class="blog-section-no-posts">
            <p><?php _e('No blog posts found.', 'textdomain'); ?></p>
          </div>
        <?php endif; ?>
        
        <?php if (!empty($cta_button) && !empty($cta_button['title'])): ?>
          <div class="blog-section-cta">
            <a href="<?php echo esc_url(!empty($cta_button['url']) ? $cta_button['url'] : '#'); ?>" class="blog-section-cta-button"<?php echo (!empty($cta_button['target']) ? ' target="' . esc_attr($cta_button['target']) . '"' : ''); ?>><?php echo esc_html($cta_button['title']); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

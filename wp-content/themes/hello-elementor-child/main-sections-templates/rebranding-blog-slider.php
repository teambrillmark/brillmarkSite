<section class="talks-wrapper" id="test-talks-section">
     <div class="zigzag">
         <img src="/assets/zigzag.svg" alt="zigzag icon" />
     </div>
     <div class="talks-upper">
         <h1 class="talks-upper-title">
             <!-- Test Talks by <span class="upper-color">BrillMark</span> 	-->
             Insights & Resources
         </h1>
         <p class="talks-upper-para">
             <!-- Our customers' landmarks are our goalposts. Wondering how we do it? -->
             Stay informed with our latest articles, guides, and industry insights.
         </p>
     </div>

     <div class="talks-container">
         <div class="swiper brill-swiper">

             <div class="swiper-wrapper brill-swiper-wrapper">
<?php
$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array('uncategorized'),
            'operator' => 'NOT IN'
        )
    )
);

$query = new WP_Query($args);

				 
if ($query->have_posts()):
while ($query->have_posts()): $query->the_post();

    $post_link  = get_permalink();
    $post_title = get_the_title();
    $excerpt    = wp_trim_words(get_the_excerpt(), 22, '...');
    $image_url  = get_the_post_thumbnail_url(get_the_ID(), 'large');

    if (!$image_url) {
        $image_url = '/assets/BrillSlider/slider-1.svg'; // fallback image
    }
?>
    <div class="swiper-slide brill-slide">
        <div class="swiper-header">
            <img class="talks-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($post_title); ?>" />
        </div>

        <div class="talks-content">
            <div class="chip-wrapper">
                <?php
                $cats = get_the_category();
                if (!empty($cats)) {
                    echo '<a href="'. esc_url(get_category_link($cats[0]->term_id)) .'" class="ad-tech-btn">'. esc_html($cats[0]->name) .'</a>';
                }
                ?>
            </div>

            <h2><?php echo esc_html($post_title); ?></h2>

            <p class="talks-para-content">
                <?php echo esc_html($excerpt); ?>
            </p>

            <a href="<?php echo esc_url($post_link); ?>" class="talks-read-more">
                Read Full Story →
            </a>
        </div>
    </div>

<?php
endwhile;
wp_reset_postdata();
endif;
?>
</div>


             <div class="swiper-pagination"></div>

         </div>
         <div class="swiper-button-prev"></div>
         <div class="swiper-button-next"></div>

         <div class="talksbtn">
             <a href="https://www.brillmark.com/blog/" class="read-more">READ MORE ARTICLES</a>
         </div>
     </div>
 </section>

<style>
    p.talks-upper-para{
        margin-top: 10px;
        margin-bottom: 20px;
    }
.talks-wrapper .ad-tech-btn {
    background-color: #007aff;
    max-width: max-content;
}
div.zigzag{
    bottom: -35px;
}
.talks-wrapper .talks-content {
    height: auto;
}

.talks-wrapper .swiper-slide.brill-slide {
    height: auto;
}

#test-talks-section .swiper {
    height: auto;
}

#test-talks-section .swiper .talks-read-more {
    margin-top: 15px;
}

#test-talks-section .swiper .talks-image {
    height: 200px;
}
@media screen and (max-width: 949px){
	#test-talks-section .swiper {
		height: 100%;
		padding-bottom: 80px !important;
	}		
}
</style>
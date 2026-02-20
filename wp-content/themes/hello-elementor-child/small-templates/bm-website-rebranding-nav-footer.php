<?php
/*
 * Template Name: Rebrading nav and footer Template
 * Template Post Type: post, page
 */
?>

<!DOCTYPE html>
<html lang="en">


<?php get_rebranding_header(); ?>

<body>
    <?php get_rebranding_nav(); ?>
    <?php the_content(); ?>
    <?php get_rebranding_footer(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/script.js' ); ?>"></script>
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>
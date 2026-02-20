<?php
/*
 * Template Name: Bm website Rebranding HomePage Template
 * Template Post Type: post, page
 */
?>

<!DOCTYPE html>
<html lang="en">


<?php get_rebranding_header(); ?>
	


<body>
    <?php get_rebranding_nav(); ?>
    <main id="main-contents-brillmark">
        <?php get_rebranding_hero(); ?>
        <?php get_rebranding_client_slider(); ?>
        <?php get_rebranding_pill_group(); ?>
        <?php  get_rebranding_galaxy_ab_test(); ?>
        <?php get_rebranding_galaxy_new_shopify_development(); ?>
        <?php get_rebranding_galaxy_new_wordpress_development(); ?>
        <?php get_rebranding_galaxy_mockup_design(); ?>
        <?php get_rebranding_galaxy_new_mockup_design(); ?>
        <?php get_rebranding_galaxy_new_quality_assurance(); ?>
        <?php get_rebranding_galaxy_quality_assurance(); ?>
        <?php get_rebranding_galaxy_advanced_web(); ?>
        <?php get_rebranding_galaxy_technical_support(); ?>
        <?php get_rebranding_galaxy_data_driven_cro(); ?>
        <?php get_rebranding_galaxy_dedicated_dev(); ?>



        <?php get_rebranding_scroller(); ?>
        <?php get_rebranding_cro_dev_process_tab(); ?>
        <?php get_rebranding_ready_to_work(); ?>
        <?php get_rebranding_testimonial(); ?>
        <?php get_rebranding_pricing(); ?>
        <?php get_rebranding_blog_slider(); ?>
        <?php get_rebranding_counter(); ?>


        <?php get_rebranding_testing_process(); ?>
        <?php get_rebranding_contact_form(); ?>
        <?php get_rebranding_faq(); ?>

    </main>
    <?php get_rebranding_footer(); ?>
	

	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/script.js' ); ?>"></script>
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    (function () {
    document.addEventListener("DOMContentLoaded", function () {

        dropDown();
    });

    // Mega dropdown Menu
    function dropDown() {
        const dropDownLink = document.getElementById("dropDown-link");
        const dropDownMenu = document.getElementById("dropContent");
        const caretDown = dropDownLink.querySelector(".fa-chevron-down");
        const caretUp = dropDownLink.querySelector(".fa-chevron-up");

        dropDownMenu.classList.add("dropdown-hidden");
        caretUp.classList.add("caret-down-hidden");

        function showDropDownMenu() {
            dropDownMenu.classList.remove("dropdown-hidden");
            dropDownMenu.classList.add("dropdown-visible");
            caretDown.classList.add("caret-down-hidden");
            caretUp.classList.add("caret-up-visible");
        }

        function hideDropDownMenu() {
            dropDownMenu.classList.remove("dropdown-visible");
            dropDownMenu.classList.add("dropdown-hidden");
            caretDown.classList.remove("caret-down-hidden");
            caretUp.classList.remove("caret-up-visible");
        }

        dropDownLink.addEventListener("mouseover", showDropDownMenu);

        dropDownLink.addEventListener("mouseleave", function (event) {
            if (
                !dropDownLink.contains(event.relatedTarget) &&
                !dropDownMenu.contains(event.relatedTarget)
            ) {
                hideDropDownMenu();
            }
        });

        dropDownMenu.addEventListener("mouseover", showDropDownMenu);

        dropDownMenu.addEventListener("mouseleave", function (event) {
            if (
                !dropDownLink.contains(event.relatedTarget) &&
                !dropDownMenu.contains(event.relatedTarget)
            ) {
                hideDropDownMenu();
            }
        });

        const dropItems = document.querySelectorAll(".drop-item");
        const detailContents = document.querySelectorAll(".drop-detail-content");

        // Showing the first content by default
        const defaultContent = document.getElementById("development-content");
        defaultContent.classList.add("active");

        // Setting the default active menu item background
        const defaultItem = document.querySelector(
            '.drop-item[data-target="development-content"]'
        );

        defaultItem.classList.add("active");

        dropItems.forEach((item) => {
            item.addEventListener("mouseenter", function () {
                const targetId = this.getAttribute("data-target");
                detailContents.forEach((content) => {
                    content.classList.remove("active");
                });
                document.querySelectorAll(".drop-item").forEach((item) => {
                    item.classList.remove("active");
                });
                document.getElementById(targetId).classList.add("active");
                this.classList.add("active");
            });
        });
    }
})();
</script>
</body>

</html>
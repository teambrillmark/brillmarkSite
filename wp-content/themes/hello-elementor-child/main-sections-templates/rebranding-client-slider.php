<!-- TAB Section Start -->
<section class="brillmark-tabs-section">
    <div class="brillmark-abtest-dev">
        <div class="brillmark-tab-innercontent">
            <a data-id="#services-container-section">A/B Test Development</a>
            <a data-id="#bm-shopify-development">Shopify Development</a>
            <a data-id="#bm-wordpress-devlopment">Wordpress Development</a>
            <a data-id="#bm-custom-devlopment">Custom Web Development</a>
        </div>
    </div>
</section>
<style>
    .brillmark-tabs-section .brillmark-abtest-dev {
        max-width: 1440px;
        margin: 0 auto;
        position: relative;
        padding: 15px;
    }

    .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent {
        display: flex;
        padding: 0;
        gap: 15px;
        justify-content: center;
        align-items: stretch;
    }

    .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent a:hover {
		font-weight: 700;
		background: #0960a8;
        color: #ffffff;
    }

    .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent a {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-decoration: none;
        width: 25%;
        background: #ffffff;
        color: var(--Heading, #112446);
        font-family: Poppins, sans-serif;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        line-height: 1.5;
        cursor: pointer;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(17, 36, 70, 0.2);
        text-align: center;
        max-width: 288px;
    }

    @media screen and (max-width: 767px) {
        body .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent a {
            font-size: 12px;
            padding: 10px 6px;
        }

        html body .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent {
            gap: 5px;
        }

        html body .brillmark-tabs-section .brillmark-abtest-dev {
            padding: 10px;
        }
    }

    @media screen and (max-width: 431px) {
        html body .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent a {
            font-size: 10px;
        }

        html body .brillmark-tabs-section .brillmark-abtest-dev .brillmark-tab-innercontent {
            padding: 0 0px;
        }

    }

    html body .brillmark-tabs-section {
        position: relative;
		z-index: 99;
    }

    html body .brillmark-tabs-section .brillmark-abtest-dev {
    	position: absolute;
    	transform: translate(-50%, -50%);
    	width: 100%;
    	left: 50%;
	}

    body #client-swiper-section .client-info {
           padding-top: 80px;
    }
    @media screen and (max-width: 1023px){
        html body .hero-background .hero-wrapper {
            padding-bottom: 70px;
        }
        html body #client-swiper-section .client-info {
           padding-top: 40px;
    }
    }
    @media screen and (min-width: 1024px) and (max-width:1439px){
        html body .hero-background .hero-wrapper .hero-col-2 {
            padding-bottom: 100px;
        }    
    }
    @media screen and (min-width: 1440px) {
        html body .hero-background .hero-wrapper .hero-col-2 {
            padding-bottom: 170px;
        }    
    }

/* Hide Older one */
.brillmark-orbital-main.brillmark-abtest-dev .brillmark-abtest-dev {
    display: none;
}
</style>

<script>

    // Get all the tab links
    const tabLinks = document.querySelectorAll('.brillmark-tabs-section .brillmark-tab-innercontent a');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior

            // Get the target section ID from data-id attribute
            const targetSection = document.querySelector(this.getAttribute('data-id'));

            // Scroll smoothly to the target section
            targetSection.scrollIntoView({ behavior: 'smooth' });

            // Remove 'active' class from all links
            tabLinks.forEach(item => item.classList.remove('active'));

            // Add 'active' class to the clicked link
            this.classList.add('active');
        });
    });

</script>

<!-- TAB Section Start End-->

<section class="swiper clientSwiper" id="client-swiper-section">
    <div class="client-info">
        <h2 class="client-title">
            <!-- Trusted by <b>over 221 Startups & Enterprises</b> -->
            Trusted by <b>200+ Leading Agencies and Global Brands</b>
        </h2>
        <div class="client-para">
            <p class="client-para-text">
            Our expertise has accelerated growth for companies worldwide. Join the businesses that trust BrillMark for high-velocity A/B testing and comprehensive digital solutions.
            </p>
        </div>
    </div>
    <!-- <div class="logos">
        <div class="logos-slide">
            <img src="/assets/client-list/client-1.svg" alt="client 1" class="swiper-client-list" />
            <img src="/assets/client-list/client-2.svg" alt="client 2" class="swiper-client-list" />
            <img src="/assets/client-list/convertion.svg" alt="conversion client" class="swiper-client-list conversion-client" />
            <img src="/assets/client-list/client-4.svg" alt="client 4" class="swiper-client-list" />
            <img src="/assets/client-list/client-5.svg" alt="client 5" class="swiper-client-list" />
            <img src="/assets/client-list/client-6.svg" alt="client 6" class="swiper-client-list" />
            <img src="/assets/client-list/client-7.svg" alt="client 7" class="swiper-client-list" />
            <img src="/assets/client-list/client-8.svg" alt="client 8" class="swiper-client-list" />
        </div>
    </div> -->

    <div class="client-logo">
        <div class="logo-background">
            <div class="logo-wrapper">
            <div class="logos-img">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/FE-Logo-1.png" alt="FE Logo" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/logo-regular-1.png" alt="Logo Regular" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/10/conversion-fanatics.png" alt="CG Logo" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/testtriggers.png" alt="Test Triggers" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/Growth-Rock-1.png" alt="Growth Rock" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/Soft-Blue.png" alt="Soft Blue" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/Avind-Demand.png" alt="Avind Demand" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/logo-gold.png" alt="Logo Gold" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/image-9-1.png" alt="Image 9" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/10/image-17-1.png" alt="Image 10" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/image-11-1.png" alt="Image 11" class="client">
                    <img src="https://www.brillmark.com/wp-content/uploads/2024/09/image-12-1.png" alt="Image 12" class="client">
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    div.client-info h2 {
    color: #112446;
    font-family: "Poppins", sans-serif !important;
    font-size: 42px;
    font-style: normal;
    font-weight: 500;
    line-height: 48px ;
    padding: 20px 0;
}
    .client-para .client-para-text{
        max-width: 1000px;
        margin: 0 auto;
    }
    #client-swiper-section{
        margin: 0;
    }
    #client-swiper-section  .client-logo,
    #client-swiper-section .logos{
        background: #fff;
    }
    #client-swiper-section .client-info{
        padding-top: 40px;
    }
    .client-logo .logo-background{
        padding-bottom: 40px;
    }
  @media(min-width:767px){
    .logos-slide{
        display:none !important;
    }
    .client-logo{
        display:block;
    }
  }


  .client-logo{
    background:#F4F7FA;
  }

  .logo-background{
        max-width: 1140px;
    margin: 0 auto;
    padding-bottom: 20px;
 
    }


.logos-img{
    display: flex;
    flex-wrap: wrap;
    gap: 40px; 
    align-items: center;
    justify-content: center;
    row-gap:20px;
}

.logos-img img{
    max-width:150px;
    width: 100%;
    object-fit: scale-down;
}

@media(max-width:767px){
    /* .client-logo{
        display:none;
    } */
    .logos-slide{
        display:inline-block !important;
    }
}


.client-info{
    text-align:center;
}


.client-info h2{
    color: #112446;
font-family: Poppins;
font-size: 42px;
font-style: normal;
font-weight: 500;
line-height: 32px; /* 76.19% */
padding:20px 0;
}


.client-para-text{
    color: #313f58;
text-align: center;
font-family: Poppins;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 26px; /* 144.444% */
}

.client-info{
    margin-bottom:30px;
}


@media(max-width:1023px){
    body .client-info h2{
        font-size:30px;
		line-height: 1.3;
        padding-bottom:8px;
    }
    .client-para-text{
        font-size:15px;
    }
}
	@media(max-width:767px){
	    html body .client-info h2{
        font-size:27px !important;
		line-height: 1.3;
        padding-bottom:8px;
    }

@media(max-width:360px){
    .client-info h2{
        font-size:27px;
    }
}


#main-contents-brillmark * {
    font-family: "Poppins", sans-serif !important;
}

  
</style>




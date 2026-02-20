<head>
  <?php wp_head();?>
  <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      />
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>
  </head>
  <header class="main-header-area" id="navigation-bar">
      <nav class="navigation-bar navbar-fixed ">
          <a href="https://www.brillmark.com/" class="logo">
              <img src="/assets/BM_Logo.svg" alt="Logo of Brillmark" class="brillmark-logo">
          </a>
          <div class="nav-links">
              <ul class="nav-list">
                  <li class="nav-list-item "><a class="link-active" href="https://www.brillmark.com/">Home</a></li>
                  <li id="dropDown-link" class="nav-list-item mega-dropdown-dropbtn">
                      <a href="https://www.brillmark.com/services/"> Services</a>
                      <!-- <i class="fa-solid fa-caret-down"></i> -->
                      <i class="fa-solid fa-chevron-down"></i>
                      <i class="fa-solid fa-chevron-up caret-down-hidden"></i>
                      <!-- <i class="fa-solid fa-caret-up"></i> -->
                  </li>
  
                  <!-- DropDown Content -->
  
                  <div class="mega-dropdown-content dropdown-hidden" id="dropContent">
                      <div class="drop-down-container">
                          <!-- Drop left Content -->
                          <div class="drop-list">
                              <ul>
                                  <li class="drop-item active" data-target="development-content">
                                      <div class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/devlopment-1.png"
                                                  alt="development-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">Development</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Dedicated team of developers with 10 years of
                                                  experience in building for 100+ websites
                                              </p>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="drop-item" data-target="design-content">
                                      <a href="https://www.brillmark.com/services/" class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/web-designing.png"
                                                  alt="web-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">Design &amp; Mockups</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Collaborative design work with CRO consultants for
                                                  visually engaging and optimized landing pages.
                                              </p>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="drop-item" data-target="cro-content">
                                      <a href="https://www.brillmark.com/services/" class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/cro-support.png"
                                                  alt="cro-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">CRO Support</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Supporting CRO agencies to implement their ideas,
                                                  Formulating effective CRO strategies with hypothesis
                                                  generation, A/B test management, and analysis.
                                              </p>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="drop-item" data-target="technical-content">
                                      <div class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/technical-support.png"
                                                  alt="technical-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">Technical Support</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Tool integration, platform setups, and technical
                                                  partnerships for seamless A/B testing and analytics.
                                              </p>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="drop-item" data-target="quality-content">
                                      <a href="https://www.brillmark.com/services/" class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/quality-assurance.png"
                                                  alt="quality-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">Quality Assurance</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Detailed QA process with test cases, scenario
                                                  coverage, and post-launch checks for pixel-perfect
                                                  delivery.
                                              </p>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="drop-item" data-target="dedicated-content">
                                      <div class="drop-menuList">
                                          <div class="drop-icon">
                                              <img class="drop-icon-img" src="/assets/mega-dropdown/more.png"
                                                  alt="more-icon" />
                                          </div>
                                          <div class="drop-text">
                                              <h3 class="drop-item-heading">
                                                  <span class="drop-right-heading-txt">Dedicated Development</span>
                                                  <span><i class="fa-solid fa-chevron-right"></i></span>
                                              </h3>
                                              <p class="drop-item-para">
                                                  Executing experiments across any devices, platforms,
                                                  applications.
                                              </p>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
  
                          <!-- Right Side Content -->
                          <div class="drop-details">
                              <div id="development-content" class="drop-detail-content active">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/ab-testing-icon.png" alt="ab-test-icon" />
                                      </div>
                                      <a href="/ab-test-development/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              A/B Test Development
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Specializing in 15k+ tests, tools integration, and
                                              complex A/B tests on
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/shopify-.png" alt="shopify-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/shopify-development/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Shopify Development
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Expertise in store setup, custom themes, Shopify 2.0
                                              migration, page speed optimization, app configurations
                                              &amp; more.
                                          </p>
                                      </a>
                                  </div>
  
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/wordpress-website-icon.png"
                                              alt="wordpress-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/wordpress-development/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              WordPress Development
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Comprehensive services from landing page creation to
                                              functionality enhancement and dynamic web support.
                                          </p>
                                      </a>
                                  </div>
  
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/full-stack-developer.png"
                                              alt="fullstack-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/services/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Full Stack Development
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Front-end and back-end solutions across platforms for
                                              high-performance integrated systems.
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/landing-page-icon.png"
                                              alt="landing-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/services/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Landing Page Creation
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Quick, high-quality design across platforms like
                                              WordPress, Unbounce, and Klaviyo for strategic
                                              marketing.
                                          </p>
                                      </a>
                                  </div>
                              </div>
  
                              <div id="design-content" class="drop-detail-content">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/web-designing.png" alt="web-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                          </a><div class="drop-details-txt"><a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                              <h6 class="drop-detail-txt-heading">
                                                  We assist marketers in transforming their ideas into
                                                  designs, helping them with:
                                              </h6>
                                              <ul class="drop-text-para-list">
                                                  <li class="drop-text-para-list-item">
                                                      Creating landing pages
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Converting hypotheses into designs
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Transforming rough mockups into high-fidelity
                                                      designs
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Designing entire websites, Email template
                                                  </li>
                                              </ul>
  
                                              </a><a class="linkable" href="https://www.brillmark.com/contact-us/">Let’s
                                                  Talk</a>
                                          </div>
                                      
                                  </div>
                              </div>
                              <div id="cro-content" class="drop-detail-content">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/cro-support.png" alt="cro-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                          </a><div class="drop-details-txt"><a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                              <h6 class="drop-detail-txt-heading">
                                                  We support marketers in their conversion rate
                                                  optimization efforts by providing:
                                              </h6>
                                              <ul class="drop-text-para-list">
                                                  <li class="drop-text-para-list-item">
                                                      Ideation for strategic initiatives
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Detailed evaluation reports
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      In-depth competitive analysis
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Comprehensive research
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Effective optimization strategies
                                                  </li>
                                              </ul>
                                              </a><a class="linkable" href="https://www.brillmark.com/contact-us/">Let’s
                                                  Talk</a>
                                          </div>
                                      
                                  </div>
                              </div>
                              <div id="technical-content" class="drop-detail-content">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/gtm-1.png" alt="gtm-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/ga4-service/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">GTM Management</h6>
                                          <p class="drop-detail-txt-para">
                                              Complete Google Tag Manager services from goal setup to
                                              user tracking and tag management.
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/audit-icon.png" alt="audit-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/services/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">Performance Audit</h6>
                                          <p class="drop-detail-txt-para">
                                              Tech stack audits for Shopify and WordPress, optimizing
                                              performance and resolving errors.
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/GA4-Icon-Vecto.png" alt="ga4-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/ga4-service/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">GA4 Support</h6>
                                          <p class="drop-detail-txt-para">
                                              Tailored Google Analytics 4 reports, setups, and
                                              integrations to resolve complex data issues.
                                          </p>
                                      </a>
                                  </div>
                              </div>
                              <div id="quality-content" class="drop-detail-content">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/quality-assurance.png" alt="cro-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                          </a><div class="drop-details-txt"><a href="https://www.brillmark.com/contact-us/" class="drop-feature">
                                              <h6 class="drop-detail-txt-heading">
                                                  We offer a full range of Quality Assurance services
                                                  tailored to your needs. Our offerings include:
                                              </h6>
  
                                              <ul class="drop-text-para-list">
                                                  <li class="drop-text-para-list-item">
                                                      Detailed QA processes complete with checklists
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Post-launch testing to ensure smooth operation
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Customizable QA to suit specific requirements
                                                  </li>
                                                  <li class="drop-text-para-list-item">
                                                      Comprehensive test cases covering all possible
                                                      scenarios
                                                  </li>
                                              </ul>
  
                                              </a><a class="linkable" href="https://www.brillmark.com/contact-us/">Let’s
                                                  Talk</a>
                                          </div>
                                      
                                  </div>
                              </div>
                              <div id="dedicated-content" class="drop-detail-content">
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/Convert-Experiments.png"
                                              alt="convert-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/hire-convert-certified-agency/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Hire Convert Test Developer
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Partner with Convert for last 3 years
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/optimizely-.png" alt="optimize-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/hire-optimizely-developer/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Hire Optimizely Test Developer
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              2022 bronze solution partner
                                          </p>
                                      </a>
                                  </div>
                                  <div class="drop-details-container">
                                      <div class="drop-details-img">
                                          <img src="/assets/mega-dropdown/shopify-.png" alt="shopify-page-icon" />
                                      </div>
                                      <a href="https://www.brillmark.com/hire-shopify-developer/" class="drop-details-txt">
                                          <h6 class="drop-detail-txt-heading">
                                              Hire Shopify Test Developer
                                          </h6>
                                          <p class="drop-detail-txt-para">
                                              Expertise in store setup, custom themes, Shopify 2.0
                                              migration, page speed optimization, app configurations &amp;
                                              more.
                                          </p>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  
                  <li class="nav-list-item"> <a href="https://www.brillmark.com/about-us/">About Us</a></li>
                  <li class="nav-list-item"><a href="https://www.brillmark.com/blog/">Our Blogs</a></li>
                  <li class="nav-list-item"><a href="https://www.brillmark.com/referral/">Referral</a></li>
              </ul>
              <a href="https://www.brillmark.com/contact-us/" class="btn let-us-talk-btn">Let’s Talk!</a>
          </div>
          <div class="hamburger-menu">
              <a href="https://www.brillmark.com/contact-us/" class=" btn let-us-talk-btn mobile-lets-talk">
                  Let’s Talk!
              </a>
              <button class="hamburger-btn" fdprocessedid="tncpr8">
                  <i class="fa fa-bars"></i>
                  <i class="fa-solid fa-x"></i>
              </button>
          </div>
          <div class="hamburger-menu-list" id="hamburger-element">
              <ul class="hamburger-list">
                  <li class="hamburger-list-item mobile-drop-menu-item">
                      <a href="https://brillmark.com/" class="mobile-drop-link">Home</a>
                  </li>
                  <li class="mobile-drop-menu-item hamburger-list-item">
                      <a href="https://www.brillmark.com/services/" data-toggle="accordion">Services <i class="fa-solid fa-caret-down"></i></a>
                  </li>
                  <!-- Mobile drop ACCORDION -->
                  <div class="mobile-drop-accordion">
                      <!-- Item 1 -->
                      <div class="mobile-drop-accordion-item">
                          <!-- Content -->
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/ab-testing-icon.png" alt="ab-test-icon" />
                                  </div>
                                  <a href="/ab-test-development/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          A/B Test Development
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Specializing in 15k+ tests, tools integration, and complex
                                          A/B tests on
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/shopify-.png" alt="shopify-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/shopify-development/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">Shopify Development</h6>
                                      <p class="drop-detail-txt-para">
                                          Expertise in store setup, custom themes, Shopify 2.0
                                          migration, page speed optimization, app configurations
                                          &amp; more.
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/wordpress-website-icon.png" alt="wordpress-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/wordpress-development/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          WordPress Development
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Comprehensive services from landing page creation to
                                          functionality enhancement and dynamic web support.
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/full-stack-developer.png" alt="fullstack-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/services/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          Full Stack Development
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Front-end and back-end solutions across platforms for
                                          high-performance integrated systems.
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/landing-page-icon.png" alt="landing-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/services/9   " class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          Landing Page Creation
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Quick, high-quality design across platforms like
                                          WordPress, Unbounce, and Klaviyo for strategic marketing.
                                      </p>
                                  </a>
                              </div>
                          </div>
                      </div>
  
                      <!-- Item 2 -->
  
                      <div class="mobile-drop-accordion-item">
                          <div class="mobile-drop-accordion-header">
                              <div class="mobile-item-container">
                                  <div class="mobile-img">
                                      <img class="mobile-icon-img" src="/assets/mega-dropdown/web-designing.png"
                                          alt="development-icon" />
                                  </div>
                                  <div class="mobile-txt">
                                      <div class="mobile-txt-header">
                                          <h6>Design &amp; Mockups</h6>
                                          <span class="mobile-drop-icon">+</span>
                                      </div>
                                      <p class="mobile-txt-para">
                                          Collaborative design work with CRO consultants for
                                          visually engaging and optimized landing pages.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/web-designing.png" alt="web-page-icon" />
                                  </div>
                                  <div class="drop-details-txt">
                                      <a class="drop-details-txt" href="https://www.brillmark.com/contact-us/"><h6 class="drop-detail-txt-heading">Web Design Services</h6></a>
                                      <ul class="drop-text-para-list">
                                          <li>Creating landing pages</li>
                                          <li>Converting hypotheses into designs</li>
                                          <li>
                                              Transforming rough mockups into high-fidelity designs
                                          </li>
                                          <li>Designing entire websites, Email template</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Item 3 -->
                      <div class="mobile-drop-accordion-item">
                          <div class="mobile-drop-accordion-header">
                              <div class="mobile-item-container">
                                  <div class="mobile-img">
                                      <img class="mobile-icon-img" src="/assets/mega-dropdown/cro-support.png"
                                          alt="cro-support-icon" />
                                  </div>
                                  <div class="mobile-txt">
                                      <div class="mobile-txt-header">
                                          <h6>CRO Support</h6>
                                          <span class="mobile-drop-icon">+</span>
                                      </div>
                                      <p class="mobile-txt-para">
                                          Supporting CRO agencies to implement their ideas,
                                          Formulating effective CRO strategies with hypothesis
                                          generation, A/B test management, and analysis
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/cro-support.png" alt="cro-page-icon" />
                                  </div>
                                  <div class="drop-details-txt">
                                      <a class="drop-details-txt" href="https://www.brillmark.com/contact-us/">
                                          <h6 class="drop-detail-txt-heading">
                                          CRO Support</h6>
                                      </a>
                                      <ul class="drop-text-para-list">
                                          <li>Ideation for strategic initiatives</li>
                                          <li>Detailed evaluation reports</li>
                                          <li>In-depth competitive analysis</li>
                                          <li>Comprehensive research</li>
                                          <li>Effective optimization strategies</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
  
                      <!-- Item 4 -->
                      <div class="mobile-drop-accordion-item">
                          <div class="mobile-drop-accordion-header">
                              <div class="mobile-item-container">
                                  <div class="mobile-img">
                                      <img class="mobile-icon-img" src="/assets/mega-dropdown/technical-support.png"
                                          alt="cro-support-icon" />
                                  </div>
                                  <div class="mobile-txt">
                                      <div class="mobile-txt-header">
                                          <h6>Technical Support</h6>
                                          <span class="mobile-drop-icon">+</span>
                                      </div>
                                      <p class="mobile-txt-para">
                                          Tool integration, platform setups, and technical
                                          partnerships for seamless A/B testing and analytics.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/gtm-1.png" alt="gtm-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/ga4-service/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">GTM Management</h6>
                                      <p class="drop-detail-txt-para">
                                          Complete Google Tag Manager services from goal setup to
                                          user tracking and tag management.
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/audit-icon.png" alt="audit-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/services/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">Performance Audit</h6>
                                      <p class="drop-detail-txt-para">
                                          Tech stack audits for Shopify and WordPress, optimizing
                                          performance and resolving errors.
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/GA4-Icon-Vecto.png" alt="ga4-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/ga4-service/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">GA4 Support</h6>
                                      <p class="drop-detail-txt-para">
                                          Tailored Google Analytics 4 reports, setups, and
                                          integrations to resolve complex data issues.
                                      </p>
                                  </a>
                              </div>
                          </div>
                      </div>
  
                      <!-- Item 5 -->
                      <div class="mobile-drop-accordion-item">
                          <div class="mobile-drop-accordion-header">
                              <div class="mobile-item-container">
                                  <div class="mobile-img">
                                      <img class="mobile-icon-img" src="/assets/mega-dropdown/quality-assurance.png"
                                          alt="cro-support-icon" />
                                  </div>
                                  <div class="mobile-txt">
                                      <div class="mobile-txt-header">
                                          <h6>Quality Assurance</h6>
                                          <span class="mobile-drop-icon">+</span>
                                      </div>
                                      <p class="mobile-txt-para">
                                          Detailed QA process with test cases, scenario coverage,
                                          and post-launch checks for pixel-perfect delivery.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/quality-assurance.png" alt="cro-page-icon" />
                                  </div>
                                  <div class="drop-details-txt">
                                      <a class="drop-details-txt" href="/contact-us/"></a><h6 class="drop-detail-txt-heading">                                    Quality Assurance
                                      </h6></a>
                                      <ul class="drop-text-para-list">
                                          <li>Detailed QA processes complete with checklists</li>
                                          <li>Post-launch testing to ensure smooth operation</li>
                                          <li>Customizable QA to suit specific requirements</li>
                                          <li>
                                              Comprehensive test cases covering all possible scenarios
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
  
                      <!-- Item 6 -->
  
                      <div class="mobile-drop-accordion-item">
                          <div class="mobile-drop-accordion-header">
                              <div class="mobile-item-container">
                                  <div class="mobile-img">
                                      <img class="mobile-icon-img" src="/assets/mega-dropdown/quality-assurance.png"
                                          alt="cro-support-icon" />
                                  </div>
                                  <div class="mobile-txt">
                                      <div class="mobile-txt-header">
                                          <h6>Dedicated Development</h6>
                                          <span class="mobile-drop-icon">+</span>
                                      </div>
                                      <p class="mobile-txt-para">
                                          Executing experiments across any devices, platforms,
                                          applications.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-drop-accordion-content">
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/Convert-Experiments.png" alt="convert-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/hire-convert-certified-agency/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          Hire Convert Test Developer
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Partner with Convert for last 3 years
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/optimizely-.png" alt="optimize-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/hire-optimizely-developer/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          Hire Optimizely Test Developer
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          2022 bronze solution partner
                                      </p>
                                  </a>
                              </div>
                              <div class="drop-details-container">
                                  <div class="drop-details-img">
                                      <img src="/assets/mega-dropdown/shopify-.png" alt="shopify-page-icon" />
                                  </div>
                                  <a href="https://www.brillmark.com/hire-shopify-developer/" class="drop-details-txt">
                                      <h6 class="drop-detail-txt-heading">
                                          Hire Shopify Test Developer
                                      </h6>
                                      <p class="drop-detail-txt-para">
                                          Expertise in store setup, custom themes, Shopify 2.0
                                          migration, page speed optimization, app configurations &amp;
                                          more.
                                      </p>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
  
                  <li class="hamburger-list-item mobile-drop-menu-item">
                      <a href="https://www.brillmark.com/about-us/" class="mobile-drop-link">About Us</a>
                  </li>
                  <li class="hamburger-list-item mobile-drop-menu-item">
                      <a href="https://www.brillmark.com/blog/" class="mobile-drop-link">Our Blogs</a>
                  </li>
                  <li class="hamburger-list-item mobile-drop-menu-item">
                      <a href="https://www.brillmark.com/referral/" class="mobile-drop-link">Referral</a>
                  </li>
                  <li class="hamburger-list-item">
                      <a href="https://www.brillmark.com/contact-us/" class="btn let-us-talk-btn mobile-drop-link">
                          Let’s Talk!
                      </a>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <style>
  
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  html {
    scroll-behavior: smooth;
    scroll-padding-bottom: 40px;
  }
  
  body {
    font-family: "Nunito", sans-serif;
  }
  
    h3 , h4, h5, h6, p{
      margin:0;
      padding:0;
    }
  
      /* new header update */
      .drop-down-container .drop-item-heading{
          font-size: 14px;
      font-weight:bold;
      }
      .drop-down-container .drop-detail-txt-heading{
          font-size: 14px;
      }
      .drop-down-container .drop-detail-txt-para{
          font-size: 14px;
      }
      .drop-down-container .drop-details-container{
          margin-bottom: 20px;
      }
      .nav-links .mega-dropdown-content{
          width: 900px;
          left: -220px;
      }
      .drop-down-container .drop-list,
      .drop-down-container .drop-details{
          width: 450px;
      }
      .drop-down-container .drop-list{
       padding-bottom: 0px;   
      }
      .drop-text-para-list li{
          font-size: 16px;
      }
      .drop-down-container .drop-list li{
          padding: 15px;
      }
  
      @media (min-width: 1025px){
          .navigation-bar .mega-dropdown-content.dropdown-visible {
              top: 41px;
          }
          html body .navigation-bar .nav-links .nav-list{
          position: relative;
      }
      }
      @media (min-width: 1024px) and (max-width: 1281px) {
        .navigation-bar {
          padding-left: 32px !important;
          padding-right: 25px !important;
       }
     }
  
    @media screen and (min-width: 1024px) and (max-width: 1360px){
      .navigation-bar {
          padding-right: 32px !important;
      }    
      }
  
      @media screen and (max-width: 668px) {
          html body .navigation-bar #hamburger-element.open {
              margin-top: 17px;
          }
      }
  .mobile-drop-accordion-item .mobile-drop-accordion-header,
  .mobile-drop-accordion-item .drop-details-container img,
  .mobile-drop-accordion-item .drop-details-container .drop-text-para-list,
  .mobile-drop-accordion-item .drop-details-container .drop-detail-txt-para {
      display: none;
  }
  
  .mobile-drop-accordion-item .drop-details-container .drop-detail-txt-heading {
      font-size: 15px;
      font-weight: 400;
  }
  
  .mobile-drop-accordion-item .drop-details-container .drop-details-txt {
      text-align: center;
  }
  
  .mobile-drop-accordion-item .drop-details-container {
      justify-content: start;
      align-items: center;
      width: 100%;
      margin-bottom: 0px;
      padding: 16px 0px;
      background: #f3f3f3;
      border-bottom: 1px solid #e1e1e1;
      padding-left: 30px;
  }
  
  .mobile-drop-accordion-item .mobile-drop-accordion-content {
      padding: 0px;
      display: block !important;
  }
  html body .navigation-bar .hamburger-menu-list .hamburger-list .hamburger-list-item{
      padding: 16px 20px;
  }
  html body .navigation-bar .mobile-drop-menu-item a{
      text-align: left;
      font-size: 18px;
  }
    @media screen and (max-width: 1024px){
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(5) .drop-details-container:nth-child(1),
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(4) .drop-details-container:nth-child(2),
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(3) .drop-details-container:nth-child(1),
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(2) .drop-details-container:nth-child(1),
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(1) .drop-details-container:nth-child(5),
  .mobile-drop-accordion .mobile-drop-accordion-item:nth-child(1) .drop-details-container:nth-child(4){
      display:none;
  }
  }
  </style>

<div class="banner-two-area">
   <!-- <div class="container-fluid"> -->
      <div class="row align-items-center">
         <div class="col-lg-12">
            <!-- Swiper Slider -->
            <div class="swiper-container">
               <div class="swiper-wrapper">
                   
                  <!-- Slide 1 -->
                  <div class="swiper-slide">
                     <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                           <img src="assets/images/banner/new-banner/1.jpg" alt="Slide 1" class="img-fluid">
                        </div>
                      </div>
                  </div>
                  
                  <!-- Slide 2 -->
                  <div class="swiper-slide">
                     <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                           <img src="assets/images/banner/new-banner/2.jpg" alt="Slide 2" class="img-fluid">
                        </div>
                      </div>
                  </div>
                  
                    <!-- Slide 3 -->
                  <div class="swiper-slide">
                     <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                           <img src="assets/images/banner/new-banner/3.jpg" alt="Slide 2" class="img-fluid">
                        </div>
                      </div>
                  </div>
                  
                  
                    <!-- Slide 4 -->
                  <div class="swiper-slide">
                     <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                           <img src="assets/images/banner/new-banner/4.jpg" alt="Slide 2" class="img-fluid">
                        </div>
                      </div>
                  </div>
                  
                  
                    <!-- Slide 5 -->
                  <div class="swiper-slide">
                     <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                           <img src="assets/images/banner/new-banner/5.jpg" alt="Slide 2" class="img-fluid">
                        </div>
                      </div>
                  </div>
                  
                  
                  <!-- Add more slides -->
                  <!--<div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/crope.png" alt="Slide 3" class="img-fluid">-->
                  <!--      </div>-->
                      
                  <!--   </div>-->
                  <!--</div>-->
                  
                  <!-- Slide 1 -->
                  <!--<div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/fireone.jpeg" alt="Slide 1" class="img-fluid">-->
                  <!--      </div>-->
                     
                  <!--   </div>-->
                  <!--</div>-->
                  <!-- Slide 1 -->
                  <!--<div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/health.png" alt="Slide 1" class="img-fluid">-->
                  <!--      </div>-->
                     
                  <!--   </div>-->
                  <!--</div>-->
                  <!-- Slide 1 -->
                  <!--<div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/bikeneww.png" alt="Slide 1" class="img-fluid">-->
                  <!--      </div>-->
                     
                  <!--   </div>-->
                  <!--</div>-->
                  
                  <!--  <div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/auto.png" alt="Slide 1" class="img-fluid">-->
                  <!--      </div>-->
                    
                  <!--   </div>-->
                  <!--</div>-->
                  
                  <!--<div class="swiper-slide">-->
                  <!--   <div class="row align-items-center">-->
                  <!--      <div class="col-lg-12 col-md-12 col-12 text-center">-->
                  <!--         <img src="assets/images/banner/auto.png" alt="Slide 1" class="img-fluid">-->
                  <!--      </div>-->
                        <!--<div class="col-lg-7 col-md-6 col-12 text-center">-->
                        <!--   <h1 style="color:#b7031a;">Smart Insurance For Your Better Life</h1>-->
                        <!--   <p>In today's fast-paced world, securing your future is crucial.</p>-->
                        <!--</div>-->
                  <!--   </div>-->
                  <!--</div>-->
                  
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
   <!-- </div> -->
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script>
   // Initialize Swiper
   var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1, // Default: 1 slide per view
      spaceBetween: 30,
      loop: true,
      autoplay: {
         delay: 3000,
         disableOnInteraction: false,
      },
      pagination: {
         el: '.swiper-pagination',
         clickable: true,
      },
      breakpoints: {
         768: { // Tablets and up
            slidesPerView: 1,
         },
         992: { // Desktops and up
            slidesPerView: 1,
         },
      },
   });
</script>

<style>
   .banner-two-area .swiper-slide img {
      max-width: 100%;
      height: auto;
   }
   .banner-two-area .swiper-slide h1 {
    font-weight: 700;
      font-size: 58px;
        line-height: 75px;
        margin-bottom: 5px;
   }
   .banner-two-area .swiper-slide p {
      font-size: 19px;
      line-height: 1.6;
   }
   @media (max-width: 576px) {
      .banner-two-area .swiper-slide h1 {
         font-size: 20px;
      }
      .banner-two-area .swiper-slide p {
         font-size: 14px;
      }
   }
</style>



<style>

/* Default styles */
.single-services-card {
   background-color: #f8f9fa; /* Example background color */
   transition: all 0.3s ease-in-out;
   padding: 15px;
   border-radius: 8px;
   text-align: center;
}

.single-services-card h6 {
   color: #333;
   margin: 0;
   transition: all 0.3s ease-in-out;
}

.service-link {
   text-decoration: none;
   color: #333;
   transition: all 0.3s ease-in-out;
}

.services-icon img {
   width: 50px; /* Adjust as needed */
   transition: all 0.3s ease-in-out;
}

/* Hover effects */
.hover-effect:hover .single-services-card {
   background-color: white; /* Change background to white */
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional hover shadow */
}

.hover-effect:hover h6 {
   color: white; /* Change text color to white */
}

.hover-effect:hover .service-link {
   color: white; /* Change link color to white */
}

.hover-effect:hover .services-icon img {
   filter: brightness(0) invert(1); /* Make image white (for icons) */
}
</style>


<div class="services-area pt-100 pb-70">
   <div class="container">
      <div class="services-top-item d-flex align-items-end justify-content-between">
         <div class="section-title left-title">
            <span class="top-title">Our Product</span>
         </div>
         <a href="product.php" class="default-btn btn-style-2">All Services</a>
      </div>
      <div class="row" data-cues="slideInUp">
      
      <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/car-insurance.png" alt="car">
               </div>
               <h6><a href="product.php" class="service-link">Motor Insurance</a></h6>
            </div>
         </div>

         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/house.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Home Insurance</a></h6>
            </div>
         </div>
         
         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                 <img src="assets/images/plane.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link"> Travel Insurance</a></h6>
            </div>
         </div>

         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/house.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Property Insurance</a></h6>
            </div>
         </div>
         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/shipping.png" alt="car">
               </div>
               <h6><a href="product.php" class="service-link">Marine Insurance</a></h6>
            </div>
         </div>

         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/dish.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Food Insurance</a></h6>
            </div>
         </div>

         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon">
                  <img src="assets/images/healthcare.png" alt="couple">
               </div>
               <h6><a href="product.php" class="service-link">Comprshive Insurance</a></h6>
            </div>
         </div>

        <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon">
                  <img src="assets/images/nature.png" alt="home">
               </div>
               <h6><a href="product.php" class="service-link">Agriculture Insurance</a></h6>
            </div>
         </div>
         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color">
                  <img src="assets/images/life-insurance.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Whole Life Insurance</a></h6>
            </div>
         </div>
        <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color1">
                  <img src="assets/images/insuranc.png" alt="heart">
               </div>
               <h6><a href="product.php" class="service-link">Endowment Policy</a></h6>
            </div>
         </div>
       <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/retiremen.png" alt="car">
               </div>
               <h6><a href="product.php" class="service-link">Pension Plan</a></h6>
            </div>
         </div>
        <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color2">
                  <img src="assets/images/insuran.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Unit Linked insurance</a></h6>
            </div>
         </div>
           <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color">
                  <img src="assets/images/dog.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Pet Insurance</a></h6>
            </div>
         </div>
         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color1">
                  <img src="assets/images/health-insurance.png" alt="heart">
               </div>
               <h6><a href="product.php" class="service-link">Medi Claim</a></h6>
            </div>
         </div>
         <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon">
                  <img src="assets/images/group-user.png" alt="couple">
               </div>
               <h6><a href="product.php" class="service-link">Group Insurance</a></h6>
            </div>
         </div>
        <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon">
                  <img src="assets/images/refund.png" alt="home">
               </div>
               <h6><a href="product.php" class="service-link">Family Floater</a></h6>
            </div>
         </div>
           <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon">
                  <img src="assets/images/group-user.png" alt="couple">
               </div>
               <h6><a href="product.php" class="service-link">Child Insurance</a></h6>
            </div>
         </div>
        <div class="col-lg-2 col-sm-6 col-md-6 col-6 hover-effect">
            <div class="single-services-card d-flex align-items-center">
               <div class="services-icon bg-icon-color">
                  <img src="assets/images/dog.png" alt="lightbulb">
               </div>
               <h6><a href="product.php" class="service-link">Animal Insurance</a></h6>
            </div>
         </div>
         
        
         
      </div>
   </div>
</div>
<!--<div class="features-area pt-100 pb-70">-->
<!--   <div class="container">-->
<!--      <div class="swiper-container">-->
<!--         <div class="swiper-wrapper">-->
<!--            <div class="swiper-slide">-->
<!--               <div class="single-features-card">-->
<!--                  <div class="features-icon">-->
<!--                     <img src="assets/images/features/features-icon-1.svg" alt="features-1">-->
<!--                  </div>-->
<!--                  <h3>Trustworthy Company</h3>-->
<!--                  <p>Placeat facere assumenda est, omnis dolor repellendus poribus autem.</p>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="swiper-slide">-->
<!--               <div class="single-features-card bg-color-1">-->
<!--                  <div class="features-icon">-->
<!--                     <img src="assets/images/features/features-icon-2.svg" alt="features-1">-->
<!--                  </div>-->
<!--                  <h3>Money Back Guarantee</h3>-->
<!--                  <p>Placeat facere assumenda est, omnis dolor repellendus poribus autem.</p>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="swiper-slide">-->
<!--               <div class="single-features-card bg-color-2">-->
<!--                  <div class="features-icon">-->
<!--                     <img src="assets/images/features/features-icon-3.svg" alt="features-1">-->
<!--                  </div>-->
<!--                  <h3>Awesome Support</h3>-->
<!--                  <p>Placeat facere assumenda est, omnis dolor repellendus poribus autem.</p>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="swiper-slide">-->
<!--               <div class="single-features-card bg-color-3">-->
<!--                  <div class="features-icon">-->
<!--                     <img src="assets/images/features/features-icon-4.svg" alt="features-1">-->
<!--                  </div>-->
<!--                  <h3>Anytime Cancellation</h3>-->
<!--                  <p>Placeat facere assumenda est, omnis dolor repellendus poribus autem.</p>-->
<!--               </div>-->
<!--            </div>-->
<!--         </div>-->
         <!-- Navigation Buttons -->
<!--         <div class="swiper-button-next"></div>-->
<!--         <div class="swiper-button-prev"></div>-->
         <!-- Pagination -->
<!--         <div class="swiper-pagination"></div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->
<div class="about-style-2-area pb-70">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="single-about-2-content">
               <div class="section-title left-title">
                  <span class="top-title">About Us</span>
                  <h2>Protecting What Matters with Innovative Solutions</h2>
                  <p>At Swamitra Insurance, we are committed to providing innovative and reliable insurance solutions that protect what matters most to you. With years of experience in the industry, we offer a wide range of insurance products, including life, health, vehicle, and property insurance, tailored to meet your unique needs.
                  </p>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-sm-4 col-md-4">
                     <div class="best-support-card">
                        <img src="assets/images/about/customer-service.svg" alt="customer">
                        <h3 style="color: black;">Best Support</h3>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4">
                     <div class="best-support-card card2">
                        <img src="assets/images/about/agent.svg" alt="agent">
                        <h3 style="color: black;">Expert Agent</h3>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4">
                     <div class="best-support-card">
                        <img src="assets/images/about/world.svg" alt="world">
                        <h3 style="color: black;">Best In World</h3>
                     </div>
                  </div>
               </div>
               <a href="#" class="default-btn btn-style-2">Read More</a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="about2-img">
               <div class="about2-main">
                  <div class="row">
                     <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="img-style1">
                           <img src="assets/images/about/about-2-img-1.webp" alt="about">
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="img-style2">
                           <img src="assets/images/about/about-2-img-2.webp" alt="about">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="about2-img1">
                  <img src="assets/images/about/about-2-img-3.webp" alt="about">
               </div>
               <div class="about2-main-img11">
                  <img src="assets/images/about/about-2-main-img.webp" alt="about">
               </div>
               <div class="about2-odometer-card">
                  <div class="about2-odometer">
                     <h2>
                        <span class="odometer" data-count="30">00</span>
                     </h2>
                     <p>Years Experience </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="about-two-shape">
      <img src="assets/images/about/about-2-shape.webp" alt="image">
   </div>
</div>
<!-- <div class="panther-area">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-4 col-md-12">
            <div class="client-odometer">
               <h2>
                  <span class="odometer" data-count="35,046">00</span>
                  <span class="target">+</span>
               </h2>
               <p>Trusted By Over Happy Customers Including</p>
            </div>
         </div>
         <div class="col-lg-8 col-md-12">
            <div class="panther-slider owl-carousel owl-theme">
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-2.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-3.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-4.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-2.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-3.webp" alt="panther-logo">
               </div>
               <div class="panther-logo">
                  <img src="assets/images/pantner/pantner-logo-4.webp" alt="panther-logo">
               </div>
            </div>
         </div>
      </div>
   </div>
   </div> -->
<div class="panther-area">
   <div class="container">
      <div class="row align-items-center">
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="panther-slider owl-carousel owl-theme">
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-2.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-3.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-4.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-2.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-3.webp" alt="panther-logo">
            </div>
            <div class="panther-logo">
               <img src="assets/images/pantner/pantner-logo-4.webp" alt="panther-logo">
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- <div class="about-area pt-100 pb-100">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <div class="single-about-image">
               <img src="assets/images/about/about-1.webp" alt="about-1">
               <div class="about-shape">
                  <img src="assets/images/about/about-shape-1.webp" alt="about-shape">
               </div>
               <div class="about-shape-1">
                  <img src="assets/images/about/about-shape-2.webp" alt="about-shape">
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-about-content">
               <div class="section-title left-title">
                  <span class="top-title">About Our Company</span>
                  <h2>Insurance Always Ready To Protect Your Life & Business</h2>
                  <p>Dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire, that they cannot foresee the pain and trouble that are bound.</p>
               </div>
               <ul>
                  <li class="list-inline"><img src="assets/images/about/about-icon.svg" alt="about-icon"> Refresing to get such a personal touch.</li>
                  <li class="list-inline"><img src="assets/images/about/about-icon.svg" alt="about-icon">Duis aute irure dolor in reprehenderit in voluptate.</li>
                  <li class="list-inline"><img src="assets/images/about/about-icon.svg" alt="about-icon">Velit esse cillum dolore eu fugiat nulla pariatur.</li>
               </ul>
               <div class="about-btn d-flex align-items-center">
                  <a href="about.html" class="default-btn">Read More</a>
                  <div class="call-experts">
                     <div class="phone-call">
                        <img src="assets/images/phone-call.svg" alt="phone-call">
                     </div>
                     <span>Call To Our Experts</span>
                     <a href="tel:(+0188)76898708">(+0188) 768 98708</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="about-shape3">
      <img src="assets/images/about/about-shape-3.webp" alt="image">
   </div>
   </div> -->
<div class="testimonials-area pt-100 pb-100">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <div class="single-testimonials-img">
               <div class="testimonials-main">
                  <img src="assets/images/testimonials/testimonials-img-1.webp" alt="testimonials1">
               </div>
               <div class="testimonials-bg-shape12">
                  <img src="assets/images/testimonials/testimonials-img-bg-shape1.webp" alt="testimonials">
               </div>
               <div class="testimonials-img2">
                  <img src="assets/images/testimonials/testimonials-img-2.webp" alt="testimonials2">
               </div>
               <div class="testimonials-img3">
                  <img src="assets/images/testimonials/testimonials-img-3.webp" alt="testimonials2">
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="single-testimonials-content">
               <div class="section-title left-title">
                  <!-- <span class="top-title">Testimonials</span> -->
                  <h2>What Our Customers Says</h2>
                  <p>It is easy and straightforward to distinguish. For free time, when we have the option to solve it, nothing prevents us from doing what we want to do the most.</p>
               </div>
               <div class="testimonials-slider owl-carousel owl-theme">
                  <div class="testimonials-item">
                     <div class="testimonials-client d-flex align-items-center">
                        <img src="assets/images/testimonials/testimonials-img-4.webp" alt="testimonials">
                        <div class="testimonials-text">
                           <h3 style="color:#202020;">Frank Senbeans</h3>
                           
                        </div>
                     </div>
                     <div class="testimonials-card">
                        <div class="quote-icon">
                           <img src="assets/images/testimonials/quote.svg" alt="quote">
                        </div>
                        <p>Which is the same as saying through shrinking from toil and pain is
                           cases are perfectly simple and easy to distinguish in a free hour whenour power of choice is untrammelled and when nothing.
                        </p>
                     </div>
                  </div>
                  <div class="testimonials-item">
                     <div class="testimonials-client d-flex align-items-center">
                        <img src="assets/images/testimonials/testimonials-img-2.webp" alt="testimonials">
                        <div class="testimonials-text">
                           <h3 style="color:#202020;">Ash Wednesday</h3>
                          
                        </div>
                     </div>
                     <div class="testimonials-card">
                        <div class="quote-icon">
                           <img src="assets/images/testimonials/quote.svg" alt="quote">
                        </div>
                        <p>Which is the same as saying through shrinking from toil and pain is
                           cases are perfectly simple and easy to distinguish in a free hour whenour power of choice is untrammelled and when nothing.
                        </p>
                     </div>
                  </div>
                  <div class="testimonials-item">
                     <div class="testimonials-client d-flex align-items-center">
                        <img src="assets/images/testimonials/testimonials-img-3.webp" alt="testimonials">
                        <div class="testimonials-text">
                           <h3 style="color:#202020;">Graham Cracker</h3>
                          
                        </div>
                     </div>
                     <div class="testimonials-card">
                        <div class="quote-icon">
                           <img src="assets/images/testimonials/quote.svg" alt="quote">
                        </div>
                        <p>Which is the same as saying through shrinking from toil and pain is
                           cases are perfectly simple and easy to distinguish in a free hour whenour power of choice is untrammelled and when nothing.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="services-area pt-100 pb-70">
   <div class="container">
      <div class="services-top-item d-flex align-items-end justify-content-between">
         <div class="section-title left-title">
            <span class="top-title">Corporate Agent of</span>
         </div>
        
      </div>
      <div class="row" data-cues="slideInUp">
        
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="https://www.canarahsbclife.com/content/dam/choice/header/images/logo.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="https://files.cholamandalam.com/assets/images/chola_logo.svg" alt="panther-logo">
               </div>
            </div>
         </div>
        
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/ageasefaderal.jpg" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/avivalifeinsurance.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/bajaalinze.jpg" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/bandhanlife.jfif" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/bhartiaxa.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/canaralife.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/careinsurance.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/lifeinsurance.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/edelewis.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/hdfcergo.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/icilamboard.webp" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/iffico.webp" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/indiafirst.png" alt="panther-logo">
               </div>
            </div>
         </div>
          <div class="col-lg-2 col-sm-6 col-md-6 col-6">
            <div class="single-services-card1">
               <div class="panther-logo1">
                  <img src="assets/images/kotak.avif" alt="panther-logo">
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-2 col-sm-6 col-md-6 col-6">-->
         <!--   <div class="single-services-card  align-items-center">-->
         <!--      <div class="panther-logo">-->
         <!--         <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!-- <div class="col-lg-2 col-sm-6 col-md-6 col-6">-->
         <!--   <div class="single-services-card  align-items-center">-->
         <!--      <div class="panther-logo">-->
         <!--         <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <!-- <div class="col-lg-2 col-sm-6 col-md-6 col-6">-->
         <!--   <div class="single-services-card  align-items-center">-->
         <!--      <div class="panther-logo">-->
         <!--         <img src="assets/images/pantner/pantner-logo-1.webp" alt="panther-logo">-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
      </div>
   </div>
</div>



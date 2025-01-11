<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/scrollCue.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/portfolio-details.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>SWAMI MITRA INSURANCE </title>
    <link rel="icon" type="image/png" href="assets/images/headerlogo-removebg-preview.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Bootstrap CSS (Make sure to include this in the <head> section of your HTML) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (Include this before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <style>
    .navbar {
        margin-left: auto;
        margin-right: auto;
        display: grid;
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        /* Optional: Adds space between items */
    }

    .mega-menu-content .row {
        justify-content: center;
        /* Ensures dropdown content is centered */
    }

    @media (max-width: 992px) {

        /* Targets devices smaller than 992px (tablet and mobile) */
        .header-logo-center {
            display: none;
        }
    }
    </style>
</head>

<body>
    <!--<div class="preloader">-->
    <!--   <div class="lds-ripple">-->
    <!--      <div></div>-->
    <!--      <div></div>-->
    <!--      <div></div>-->
    <!--      <div></div>-->
    <!--   </div>-->
    <!--</div>-->
    <div class="header-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="header-right-content text-satrt">
                        <ul class="list-inline">
                            <li class="d-inline">
                                <img src="assets/images/phone.svg" alt="Phone">
                                <a href="tel:(+0188)7689870859">+91 768 987 0859</a>
                            </li>
                            <li class="d-inline">
                                <img src="assets/images/email.svg" alt="Email">
                                <a href="/cdn-cgi/l/email-protection#ee87808881ae878081809a868b838b9dc08d8183"><span
                                        class="__cf_email__"
                                        data-cfemail="327b5c545d725b5c5d5c465a575f57411c515d5f">info@sawamitrainsurance.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3">
                    <div class="header-left-bar-text">
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/" target="_blank">
                                    <i class="bx bxl-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="col-lg-3 col-sm-9 col-md-9">
                    <div class="header-right-content text-end">
                        <div class="others-options d-flex align-items-center justify-content-end">
                            <?php if (isset($_SESSION['user_id'])): ?>
                            <!-- Display User's Name when the user is logged in -->
                            <div class="option-item ps-2 pe-3">
                                <a href="dashboard.php" class="default-btn" style="font-size: 17px;    text-transform: capitalize;">
                                    <i class="bx bx-user me-3 pt-1"></i>
                                    <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                                </a>

                                
                            </div>

                            <div class="option-item ps-2 pe-3">
                                <a href="logout.php" class="default-btn" style="font-size: 15px;">
                                <i class="bx bx-log-out me-3 pt-1"></i> Logout
                                </a>
                            </div>
                            <?php else: ?>
                            <!-- Display Login and Signup buttons if the user is not logged in -->
                            <div class="option-item ps-2 pe-3">
                                <a href="./login.php" class="default-btn" style="font-size: 15px;">Login</a>
                            </div>
                            <div class="option-item">
                                <a href="./signup.php" class="default-btn" style="font-size: 15px;">Signup</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="#">
                            <img src="assets/images/headerlogo-removebg-preview.png" class="black-logo" alt="image">
                            <img src="assets/images/headerlogo-removebg-preview.png" class="white-logo" alt="imagge">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light justify-content-center">
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Index</a>
                            </li>
                            <!-- <li class="nav-item">
                        <a href="about.php" class="nav-link" style="white-space: nowrap;">About us</a>
                    </li> -->

                            <!-- Dropdown for CategoryId IN (10, 11, 12) -->
                            <li class="nav-item mega-menu d-none d-lg-block">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">Insurance</a>
                                <div class="dropdown-menu mega-menu-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mega-menu-content">
                                                    <div class="row">
                                                        <?php foreach ($categories_10_11_12 as $categoryName => $subcategories): ?>
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <h6 class="card-title"><?php echo $categoryName; ?></h6>
                                                                <ul class="list-group list-group-flush">
                                                                    <?php if (!empty($subcategories)): ?>
                                                                    <?php foreach ($subcategories as $subcategory): ?>
                                                                    <?php if ($subcategory['SubCategoryId']): ?>
                                                                    <li class="list-group-item"
                                                                        style="list-style: none;">
                                                                        <a
                                                                            href="product.php?subcategory=<?php echo $subcategory['SubCategoryId']; ?>">
                                                                            <i class="fas fa-angle-right"></i>
                                                                            <?php echo $subcategory['Subcategory']; ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                    <li class="list-group-item"
                                                                        style="list-style: none;">
                                                                        <em>No subcategories available</em>
                                                                    </li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item dropdown d-block d-lg-none">
                                <a href="product.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Insurance

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="product.php" class="nav-link">Health Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product.php" class="nav-link">Life Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product.php" class="nav-link">General Insurance</a>
                                    </li>
                                    <!-- ... -->
                                </ul>
                            </li>

                            <li class="nav-item dropdown header-logo-center">
                                <a class="" href="index.php">
                                    <img src="assets/images/headerlogo-removebg-preview.png" class="white-logo"
                                        alt="image" style="max-width: 150px;">
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="product.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">Premium</a>
                                <ul class="dropdown-menu" style="left: 0%;">
                                    <?php foreach ($categories_14 as $categoryName => $subcategories): ?>
                                    <!-- <li class="nav-item">
                <h6 class="dropdown-header"><?php echo $categoryName; ?></h6>
            </li> -->
                                    <?php foreach ($subcategories as $subcategory): ?>
                                    <?php if ($subcategory['SubCategoryId']): ?>
                                    <li class="nav-item">
                                        <a href="product.php?subcategory=<?php echo $subcategory['SubCategoryId']; ?>"
                                            class="nav-link">
                                            <?php echo $subcategory['Subcategory']; ?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="contact.php" class="nav-link" style="white-space: nowrap;">Connect us</a>
                            </li>
                        </ul>


                    </div>
                </nav>
            </div>
        </div>

        <!--<div class="others-option-for-responsive">-->
        <!--   <div class="container">-->
        <!--      <div class="dot-menu">-->
        <!--         <div class="inner">-->
        <!--            <div class="circle circle-one"></div>-->
        <!--            <div class="circle circle-two"></div>-->
        <!--            <div class="circle circle-three"></div>-->
        <!--         </div>-->
        <!--      </div>-->
        <!--<div class="container">-->
        <!--   <div class="option-inner">-->
        <!--      <div class="others-options d-flex align-items-center">-->
        <!--         <div class="option-item">-->
        <!--            <button class="searchbtn" type="button">-->
        <!--            <i class="bx bx-search"></i>-->
        <!--            </button>-->
        <!--         </div>-->
        <!--         <div class="option-item">-->
        <!--            <a href="contact.html" class="default-btn">Get A Quote</a>-->
        <!--         </div>-->
        <!--      </div>-->
        <!--   </div>-->
        <!--</div>-->
        <!--   </div>-->
        <!--</div>-->
    </div>
    <div class="search-area">
        <div class="container">
            <button type="button" class="close-searchbox">
                <i class="bx bx-x"></i>
            </button>
            <form action="#" class="search-form">
                <div class="form-group">
                    <input type="search" placeholder="Search Here">
                </div>
            </form>
        </div>
    </div>
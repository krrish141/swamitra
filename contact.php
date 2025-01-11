<?php
// Database connection
include('config.php');

// Fetch categories and their subcategories for specific CategoryId values (10, 11, 12)
$query1 = "
    SELECT 
        c.id AS CategoryId, 
        c.CategoryName, 
        s.SubCategoryId, 
        s.Subcategory 
    FROM 
        tblcategory c
    LEFT JOIN 
        tblsubcategory s 
    ON 
        c.id = s.CategoryId
    WHERE 
        c.Is_Active = 1 AND c.id IN (10, 11, 12) AND (s.Is_Active = 1 OR s.Is_Active IS NULL)
    ORDER BY 
        c.CategoryName, s.Subcategory";
$result1 = mysqli_query($conn, $query1);

// Group categories and subcategories for CategoryIds 10, 11, 12
$categories_10_11_12 = [];
while ($row1 = mysqli_fetch_assoc($result1)) {
    $categories_10_11_12[$row1['CategoryName']][] = [
        'SubCategoryId' => $row1['SubCategoryId'],
        'Subcategory' => $row1['Subcategory']
    ];
}

// Fetch subcategories for CategoryId = 14
$query2 = "
    SELECT 
        c.id AS CategoryId, 
        c.CategoryName, 
        s.SubCategoryId, 
        s.Subcategory 
    FROM 
        tblcategory c
    LEFT JOIN 
        tblsubcategory s 
    ON 
        c.id = s.CategoryId
    WHERE 
        c.Is_Active = 1 AND c.id = 13 AND (s.Is_Active = 1 OR s.Is_Active IS NULL)
    ORDER BY 
        c.CategoryName, s.Subcategory";
$result2 = mysqli_query($conn, $query2);

// Group categories and subcategories for CategoryId = 14
$categories_14 = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $categories_14[$row2['CategoryName']][] = [
        'SubCategoryId' => $row2['SubCategoryId'],
        'Subcategory' => $row2['Subcategory']
    ];
}
?>




<?php
session_start();

// Check if the user is logged in
$user = null;
if (isset($_SESSION['user_id'])) {
    // Fetch the user data from the database if logged in
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} 
?>


<?php
   include "header.php";
   ?>
<div class="page-banner-area blog-page-are">
   <div class="container">
      <div class="single-page-banner-content">
         <h3>Contact Us</h3>
         <ul>
            <li>
               <a href="index.php">Home</a>
            </li>
            <li>Contact Us</li>
         </ul>
      </div>
   </div>
</div>
<div class="contact-us-area pt-100">
   <div class="container">
      <div class="section-title">
         <span class="top-title">Get In Touch</span>
         <h2>Fill In The Contact Now</h2>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <div class="single-contact-img">
               <div class="contact-main-img">
                  <img src="assets/images/contact-us-img-5.webp" alt="contact-us">
               </div>
               <div class="contact-us-img1" data-cue="zoomIn">
                  <img src="assets/images/contact-us-img-1.webp" alt="contact-us">
               </div>
               <div class="contact-us-img2" data-cue="rotateIn">
                  <img src="assets/images/contact-us-img-2.webp" alt="contact-us">
               </div>
               <div class="contact-us-img3" data-cue="zoomIn" data-duration="2000">
                  <img src="assets/images/contact-us-img-3.webp" alt="contact-us">
               </div>
               <div class="contact-us-img4" data-cue="slideInLeft">
                  <img src="assets/images/contact-us-img-4.webp" alt="contact-us">
               </div>
               <div class="contact-main-image1s">
                  <img src="assets/images/contact-main-bg-img.webp" alt="main">
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="contact-form">
               <form id="contactForm">
                  <div class="row">
                     <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                           <input type="text" id="name" class="form-control" placeholder="Name" required="" data-error="Please enter your name">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                           <input type="text" id="email" class="form-control" placeholder="Your Email" required="" data-error="Please enter your email">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                           <input type="text" id="phone_number" placeholder="Phone" required="" data-error="Please enter your number" class="form-control">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                           <input type="text" id="Subject" placeholder="Subject" required="" data-error="Please enter your subject" class="form-control">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <textarea name="message" type="text" class="form-control" id="message" cols="30" rows="5" placeholder="Message" required="" data-error="Write your message"></textarea>
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <div class="form-check">
                              <input name="gridCheck" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required="">
                              <label class="form-check-label" for="gridCheck">
                              Accept <a href="terms-of-service.html">Terms Of Services</a> And<a href="privacy-policy.html">privacy policy</a>
                              </label>
                              <div class="help-block with-errors gridCheck-error"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">
                        Submit Now
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="contact-area pt-70">
   <div class="container">
      <div class="contact-card-item">
         <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 col-md-6">
               <div class="contact-card">
                  <div class="contact-icon">
                     <img src="assets/images/contact-phone-2.svg" alt="Phone">
                  </div>
                  <h2>Phone Number</h2>
                  <p><a href="tel:(305) 547-9909" style="color:white;">+91 9874563211</a></p>
                  <a href="tel:(305) 547-9908" style="color:white;">+91 9874563211</a>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
               <div class="contact-card">
                  <div class="contact-icon">
                     <img src="assets/images/contact-email.svg" alt="Email">
                  </div>
                  <h2>Sent Us Email</h2>
                  <p><a href="/cdn-cgi/l/email-protection#fe969b929291be97909190d09d9193"><span class="__cf_email__" data-cfemail="4d25282121220d24232223632e2220" style="color:white;">info@sawamitrainsurance.com
                     </span></a>
                  </p>
                  <a href="/cdn-cgi/l/email-protection#60090e060f20090e0f0e4e030f0d"><span class="__cf_email__" data-cfemail="7910171f163910171617571a1614" style="color:white;">info@sawamitrainsurance.com
                  </span></a>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
               <div class="contact-card">
                  <div class="contact-icon">
                     <img src="assets/images/location-icon.svg" alt="images">
                  </div>
                  <h2>Our Location</h2>
                  <p style="color:white;">Office 260,Satra Plaza, Palm Beach Road,Sector 19D, Vashi, Navi Mumbai, Maharashtra 400703</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="map-area">
   <div class="container-fluid">
      <div class="place-map">
         <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830902776!2d-74.11976379633643!3d40.69766374862956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1667807354267!5m2!1sen!2sbd"></iframe>
      </div>
   </div>
</div>
<?php
   include "footer.php";
   ?>
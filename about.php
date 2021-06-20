<?php
session_start();
if(isset($_SESSION['loggedin'])){
  if($_SESSION['loggedin']==true)
  {
    $loggedin = true;
  }
}
else{
  $loggedin = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LoanDB - About</title>

  <!-- Favicons -->
  <link href="assets/images/iconlogo.png" rel="icon" type="image/ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex navbar-brand">
        <img src="assets/images/iconlogo.png" alt="">
        <h1 class="mt-3 px-2"><a href="index.php">LoanDB</a></h1>

        <!-- <a href="index.php"><img src="assets/images/profile.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
          if($loggedin){
            echo '
            <li><a href="user.php">Profile</a></li>
            <li><a class="login" href="logout.php">Logout</a></li>
            ';
          }
          else{
            echo '
            <li><a class="login" href="login.php">Login</a></li>
            ';
          }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>About</h2>
            <p>An intuitive website which automates the Loan Management System in banks </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>About</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

      <div class="row py-5">

<div class="col-lg-6 text-center m-auto">
  <img src="assets/images/Loan.jpg" class="img-fluid" style="max-height: 400px;" alt="">
</div>

<div class="col-lg-6 pt-5 pt-lg-0 content">
  <h3 style="padding-bottom:10px" class="text-center">WHAT WE DO</h3>
  <p>
  Getting a loan is a very tiring and complicated process in India. It may take weeks,
  even months for loans to get approved and people have to visit the loan once again
  and again for documents and verification.
  </p>
  <ul>
    <li><i class="bx bxs-bank"></i> Bank.</li>
    <li><i class="bx bx-money"></i> Easy Loans.</li>
    <li><i class="bx bx-lock"></i> Safe and Secure.</li>
  </ul>
  <p>
  The Loan Management System in banks is an application for maintaining a person's loan
  details in a bank. Our proposed project automates the loan process for both, banker's
  as well as customer's side.
  </p>
</div>

</div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Work Process Section ======= -->
    <section id="work-process" class="work-process">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Loan Approval Process</h2>
          
        </div>

        <div class="row content justify-content-center">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets/img/work-process-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-5 pt-4 text-center" data-aos="fade-left" style="padding-top: 300px;">
            <h3>Create an Account</h3>
            <p class="fst-italic">
              Fill all the required details.
            </p>
            <ul>
              <li><i class="bi bi-check"></i>Signup for an Account.</li>
              <li><i class="bi bi-check"></i> Login to your Account.</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/work-process-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Apply for Loan.</h3>
            <p class="fst-italic">
              Get details of loan and apply for your loan Hassle free,fast,from your home.
            </p>
            <p>
              Choose any loan which you want , get details from our website and apply for it.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets/img/work-process-3.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5" data-aos="fade-left">
            <h3>Wait for Verification.</h3>
            <p>Have a close look on your loan status page to know about your loan application status.</p>
            <ul>
              <li><i class="bi bi-check"></i> Our Bank executive will fully verify the loan application.</li>
              <li><i class="bi bi-check"></i>Will verify the required documents.</li>
              <li><i class="bi bi-check"></i> Will approve or reject the application based of verification.</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/work-process-4.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Check the Status</h3>
            <p class="fst-italic">
              Loan approved or rejected based on your documents.
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Work Process Section -->
  </main><!-- End #main -->

 
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>LoanDB</h3>
            <p>Apply for a loan while sitting at home. Hassle Free Fast.
            The Loan Management System in banks is an application for maintaining a person's loan details in a bank. Our proposed project automates the loan process for both, banker's as well as customer's side.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              JSSSTU Mysore <br>
              Mysore - 570006<br>
              India <br>
              <strong>Phone:</strong> +91 9838272829<br>
              <strong>Email:</strong> loandb@sbi.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Get latest updates of various bank schemes at your mail.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>LoanDB</span></strong>. All Rights Reserved
      </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
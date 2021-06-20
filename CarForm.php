<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
if($_SESSION['isAdmin']==1){
  header("location: admin.php");
  exit;
}
$show = '';
$success = '';
include '_dbconnect.php';
$username = $_SESSION['username'];
if (isset($_POST['upload'])) {
  $city = $_POST['city'];
  $branch = $_POST['branch'];
  $file = $_FILES['file'];
  $filename = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileType =  $_FILES['file']['type'];
  $fileExt = explode('.', $filename);
  $fileActualExt = strtolower(end($fileExt));
  if ($fileActualExt == 'pdf') {
    if ($fileSize < 10000000) {
      $filenameNew = uniqid('', true) . "." . $fileActualExt;
      $fileDestination = 'uploads/' . $filenameNew;
      move_uploaded_file($fileTmpName, $fileDestination);
      $dt = date('Y-m-d h:i:s');
      $sql = "INSERT INTO `loanforms`(`type`, `doc`, `username`, `city`, `branch`, `date`) VALUES ('Car', '$filenameNew', '$username', '$city', '$branch' ,'$dt')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $success = 'Your application has been successfully submitted.';
      } else {
        $show = 'DBMS crash.';
      }
    } else {
      $show = 'File is too large.';
    }
  } else {
    $show = 'Please select a pdf file.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LoanDB</title>

  <!-- Favicons -->
  <link href="assets/images/iconlogo.png" rel="icon" type="image/ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/loanForm.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex navbar-brand">
        <img src="assets/images/iconlogo.png" alt="">
        <h1 class="mt-3 px-2"><a href="index.php">LoanDB</a></h1>

        <!-- <a href="index.html"><img src="assets/images/profile.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="user.php">Home</a></li>

          <li><a class="login" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <?php
  if ($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" style="margin: 0px"; role="alert"> <strong>Success!</strong> Your application has been successfully submitted. <a href="checkStatus.php" type="button" class="btn btn-sm btn-success">Click here </a> to check the status of your loan application.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
  <main id="main" style="margin-top: 0px;">
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
      <div class="row justify-content-center mt-0">
        <div class="col-8 col-lg-6 text-center p-0 mt-3 mb-2">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <div class="row justify-content-center">
              <div class="col-md-8 mx-0" id="upload_form">
                <form id="msform" action="#" method="post" enctype="multipart/form-data">
                  <!-- progressbar -->
                  <ul id="progressbar" style="padding-left: 0px;">
                    <li class="active" id="account"><strong>Step 1</strong></li>
                    <li id="personal"><strong>Step 2</strong></li>
                    <li id="payment"><strong>Step 3</strong></li>
                  </ul> <!-- fieldsets -->
                  <fieldset>
                    <div class="form-card" style="height: 220px;">
                      <div class="mb-3">
                        <label for="exampleInputCity" class="form-label"><strong>City</strong></label>
                        <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="true">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputBranch" class="form-label"><strong>Branch</strong></label>
                        <input type="text" class="form-control" name="branch" id="exampleInputPassword1" required ="true">
                      </div>
                    </div>
                    <input class="btn btn-dark next bx-pull-right" type="submit" value="Next">
                  </fieldset>
                  <fieldset>
                    <div class="form-card" style="height: 200px;">
                      <center style="margin-top: 27px;"><strong class="textCol">Click on the button below to download the loan application form.</strong></center>
                      <div class="container text-center mt-4">
                        <a href="download.php?file=car.pdf" class="btn btn-primary ml-auto" type="button">Download</a>
                      </div>
                    </div>
                    <a href="#" class="btn btn-secondary previous bx-pull-left" type="button">Previous</a>
                    <a href="#" class="btn btn-dark next bx-pull-right" type="button">Next</a>
                  </fieldset>
                  <fieldset>
                    <div class="form-card" style="height: 220px;">
                      <center class="mt-3 mb-4"><strong class="textCol">Fill the downloaded form, attach all the required documents with the form, scan them and then upload the file (in pdf) here. </strong></center>
                      <div class="mb-2">
                        <input class="form-control" type="file" id="formFile" name="file" required>
                      </div>
                    </div>
                    <a href="#" class="btn btn-secondary previous bx-pull-left" type="button">Previous</a>
                    <input class="btn btn-primary bx-pull-right" type="submit" value="Submit" name="upload">
                    <!-- <a href="#" class="btn btn-dark next bx-pull-right" type="button">Next</a> -->
                  </fieldset>
                  <!-- <fieldset>
                    <div class="form-card" style="height: 200px;">
                      <center style="margin-top: 27px;"><strong class="textCol">Click on the button below to submit your application form.</strong></center>
                      <div class="container text-center mt-4">
                        <a href="#" class="btn btn-primary ml-auto" type="button">Submit</a>
                      </div>
                    </div>
                    <a href="#" class="btn btn-secondary ml-auto previous bx-pull-left" type="button">Previous</a>
              </fieldset> -->
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main><!-- End #main -->



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
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/loanForm.js"></script>
  <script>
    $(document).ready(function() {

      var current_fs, next_fs, previous_fs; //fieldsets
      var opacity;

      $(".next").click(function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
          opacity: 0
        }, {
          step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
              'display': 'none',
              'position': 'relative'
            });
            next_fs.css({
              'opacity': opacity
            });
          },
          duration: 600
        });
      });

      $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
          opacity: 0
        }, {
          step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
              'display': 'none',
              'position': 'relative'
            });
            previous_fs.css({
              'opacity': opacity
            });
          },
          duration: 600
        });
      });
    });
  </script>
</body>

</html>
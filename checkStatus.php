<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true)
{
  header("location: login.php");
  exit;
}
if($_SESSION['isAdmin']==1){
  header("location: admin.php");
  exit;
}
include '_dbconnect.php';
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
  $name = $_SESSION['fname'];
  $username = $_SESSION['username'];
  $sql = "SELECT city,branch,type,doc,verification,DATE_FORMAT(date, '%D %b, %Y') as date,formno FROM loanforms WHERE username = '$username' AND verification != 'Approved'";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);
  
  if($num_rows==0){
    echo "
    <div class='container my-auto'>
    <div class='h1 text-center' style='padding-top: 250px'>Apply for a Loan first!</div>
    </div>
    ";
  }
  else{
    echo ' 
    <div class="container my-4 p-3">
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Name</th>
        <th scope="col">Loan Type</th>
        <th scope="col">City</th>
        <th scope="col">Branch</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col" style="text-align: center">Your Form</th>
      </tr>
    </thead>
    <tbody>
    ';
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno = $sno + 1;
      echo "<tr>
      <th scope='row'>" . $sno . "</th>
      <td>" . $name . "</td>
      <td>" . $row['type'] . "</td>
      <td>" . $row['city'] . "</td>
      <td>" . $row['branch'] . "</td>
      <td>" . $row['date'] . "</td>";
      if($row['verification']=='Rejected'){
        $show = 'danger';
      }
      if($row['verification']=='Processing'){
        $show = 'warning';
      }
      echo"
      <td style= 'text-align: center'> <button class='btn btn-".$show." btn-sm' type='button'>".$row['verification']."</button></td>
      
      <td style= 'text-align: center'> <a href='downloadApplications.php?file=".$row['doc']."' class='btn btn-primary btn-sm' type='button'>Download</a></td>
      </tr>";
    }
  }
  ?>
  </tbody>
  </table>
  </div>
</body>
</html>

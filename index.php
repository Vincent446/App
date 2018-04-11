<?php
$title = "App";

$bodyClass = "d-flex justify-content-center align-items-center welcome";
include "includes/header.php";

$query = "SELECT id FROM users";
$result = mysqli_query($connection, $query);
$numberOfUsers = mysqli_num_rows($result);
?>

 <!-- Background Video -->
 <video loop muted autoplay>
   <source src="video/kaffi.mp4">
     Din webbläsare stöder inte HTML5 video.
 </video>
 <!-- Background Video END -->

<!-- Main Content -->
<main class="col-12 col-sm-8 col-lg-4 animated fadeInDown">
  <img src="img/what-to-do-logo.svg" class="img-fluid">
  <p>Med <span><?php countUsers(); ?></span> registrerade användare</p>
  <div>
  <a href="login.php" class="btn btn-outline-light">Logga in</a>
  <a href="register.php" class="btn btn-outline-light">Registrera</a>
  </div>
</main>
<!-- Main Content END -->

<?php include "includes/footer.php"; ?>

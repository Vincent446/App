<?php

  $title = 'Logga in';
  $bodyClass = "d-flex justify-content-center align-items-center";
  $bodyID = 'login';
  include 'includes/header.php';
  session_start();
  $errorMessage = '';

  if (isset($_POST['login'])) {
    loginUser();
    $errorMessage = loginUser();
  }
 ?>

 <form class="col-12 col-sm-8 col-lg-4 login animated fadeInDown" action="login.php" method="post">
   <h3 class="formHeading">Logga in</h3>
   <div class="form-group">
   <input class="form-control" type="text" name="username" placeholder="Användarnamn" required autofocus>
   </div>
   <div class="form-group">
   <input class="form-control" type="password" name="password" placeholder="Lösenord" required>
   </div>
   <input class="btn btn-block" id="button" type="submit" name="login" value="Logga in">
   <a class="form-text text-muted text-center" href="register.php">Ny användare? Registrera dig här</a>
 </form>


<?php include "includes/footer.php"; ?>

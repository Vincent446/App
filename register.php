<?php
  $title = 'Registrera';
  $bodyClass = "d-flex flex-column justify-content-center align-items-center";
  include "includes/header.php";
  session_start();
  if (isset($_POST['register'])) {
    registerUser();
    $errorMessage = registerUser();
  }
?>


  <form class="col-12 col-sm-8 col-lg-4 userForms animated fadeInDown" action="register.php" method="post">
    <img src="img/what-to-do-logo.svg" class="img-fluid" alt="To-Do">
    <?php if ($errorMessage) : ?>
      <div class="alert alert-danger animated shake"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <div class="form-group">
      <input type="text" name="username" class="form-control" placeholder="Användarnamn" required autofocus>
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Lösenord" required>
    </div>
    <button type="submit" name="register" class="btn btn-block btn-outline-light">Registrera</button>
    <a href="login.php" class="form-text text-muted text-center">Redan användare? Logga in här</a>
  </form>

  <?php include "includes/footer.php"; ?>

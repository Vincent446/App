<?php
  session_start();
  $title = $_SESSION['username'] . 's' . ' uppgifter';
  include "includes/header.php";

  if (isset($_POST['addTask'])) {
    addTask();
  }
  if (substr($_SESSION['username'], -1)=='s') {
    $title = $_SESSION['username'] . ' uppgifter';
  }
  else {
    $title = $_SESSION['username'] . 's' . ' uppgifter';
  }
?>

  <?php if (isset($_SESSION['username'])) : ?>

    <?php include "includes/navigation.php"; ?>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <?php include "includes/profile.php"; ?>
        <?php include "includes/tasks.php"; ?>
      </div>
    </div>

  <?php else : ?>
    <div class="alert alert-warning">Du har inte tillgång till den här sidan!</div>
  <?php endif; ?>

  <?php $_SESSION['username']; ?>

<?php include "includes/footer.php" ?>

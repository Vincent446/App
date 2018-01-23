<?php
  $title = "Välkommen";
  include "includes/header.php";
  session_start();

  if (isset($_POST['addTask'])) {
    addTask();
  }

 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Välkommen | App</title>
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body>
  <?php if (isset($_SESSION['username'])) : ?>
    <nav>
      <a href="logout.php">Logga ut <?php echo $_SESSION['username']; ?></a>
      <h1>App</h1>
    </nav>

    <section>
      <h2>Att göra:</h2>
      <ul>
        <?php
          $query = "SELECT title FROM tasks WHERE user_id = {$_SESSION['id']} " ;
          $result = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($result)) {
            echo "<li>" . $row['title'] . "</li>";
          }
         ?>
      </ul>
      <form action="index.php" method="post">
        <input type="text" name="taskName">
        <input type="submit" name="addTask" value="Lägg till">
      </form>
    </section>

  <?php else : ?>
    <h1>Du har tillgång till den här sidan</h1>
  <?php endif; ?>

<h1>Välkommen, <?php echo $_SESSION['username']; ?></h1>

  </body>
</html>

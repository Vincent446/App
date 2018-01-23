<?php

  $title = 'Logga in';
  $bodyID = 'login';
  session_start();

  include 'includes/db.php';
  include 'includes/header.php';

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
      die('Query failed') . mysqli_error($connection);
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

      $db_id = $row['id'];
      $db_username = $row['username'];
      $db_password = $row['password'];

    }

    if ($username === $db_username && $password === $db_password) {
      $_SESSION['id'] = $db_id;
      $_SESSION['username'] = $db_username;
      Header("Location: index.php");
    }

    else {
      header("Location: login.php");
    }

  }
 ?>

 <form class="login" action="login.php" method="post">
   <h3>LOGGA IN</h3>
   <input type="text" name="username" placeholder="Användarnamn">
   <input type="password" name="password" placeholder="Lösenord">
   <input id="button" type="submit" name="login" value="LOGGA IN">
 </form>

  </body>
</html>

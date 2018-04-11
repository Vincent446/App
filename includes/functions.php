<?php
$appName = "What-To-Do";

// Räknar antalet registrerade användare
function countUsers() {
  global $connection;
  $query = "SELECT id FROM users";
  $result = mysqli_query($connection, $query);
  echo $numberOfUsers = mysqli_num_rows($result);
}

//Kolllar ifall användarnamnet är upptaget när man registrerar
function usernameExists($username) {
    global $connection;


    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  //Loggar in användaren
  function loginUser() {
    global $connection;
    $db_username = '';
    $db_password = '';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
      die('Query failed') . mysqli_error($connection);
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

      $db_id = $row['id'];
      $db_username = $row['username'];
      $db_password = $row['password'];
      $db_profilepic = $row['profilepic'];

    }

    $password = crypt($password, $db_password);


    if ($username === $db_username && $password === $db_password) {
      $_SESSION['id'] = $db_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['profilepic'] = $db_profilepic;
      Header("Location: admin.php");
    }

    else {
      return $errorMessage = "Fel användarnamn eller lösenord!";
    }

  }
  // Registrerar användaren
  function registerUser() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (usernameExists($username)) {
      return $errorMessage = "Användarnamnet finns redan!";
    }
    else {
      // Escape quotes
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);
      // Password encryption
      $hashFormat = "$2y$10$";
      $salt = "iusesomecrazystrings22";
      $hash_and_salt = $hashFormat . $salt;
      $password = crypt($password, $hash_and_salt);
      // SQL Query
      $query = "INSERT INTO users(username, password) ";
      $query .= "VALUES ('$username', '$password')";
      // Confirmation
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("Query failed") . mysqli_error($connection, $query);
      }
      else {
            Header("Location: login.php");
      }

    }

  }

  function addTask() {
    global $connection;

    if (isset($_POST['taskName'])) {
      $title = $_POST['taskName'];
      $userID = $_SESSION['id'];

      $query = "INSERT INTO tasks(title, user_id)";
      $query .= "VALUES('$title','$userID')";

      $addTaskQuery = mysqli_query($connection, $query);
    }
    else {
      echo "Wtf?";
    }
  }


// Sparar användarens profil bild
function saveProfile() {
  global $connection;

  $profilepic = $_FILES['profilepic']['name'];
  $profilepic_temp = $_FILES['profilepic']['tmp_name'];
  move_uploaded_file($profilepic_temp, "img/profilepics/$profilepic");

  $query = "UPDATE users SET profilepic = '{$profilepic}' WHERE id = '{$_SESSION['id']}' ";
  $saveProfileQuery = mysqli_query($connection, $query);

  $_SESSION['profilepic'] = $profilepic;

  if (!$saveProfileQuery) {
    die("Query failed" . mysqli_error($connection));
  }
}
 ?>

<?php
  $currentTaskName = $_GET['taskName'];
  $taskID = $_GET['taskID'];
  $title = "Edit " . $currentTaskName . "?";
  include 'includes/header.php';

  if (isset($_POST['editTask'])) {
    $newTaskName = $_POST['taskName'];
    $taskID = $_POST['taskID'];

    $query  = "UPDATE tasks SET title='$newTaskName' WHERE id = '$taskID'";
    $editTaskQuery = mysqli_query($connection, $query);
    header("Location: admin.php");
  }
 ?>


<form action="edit.php" method="post">
  <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">
  <input type="text" name="taskName" value="<?php echo $currentTaskName ?>">
  <input type="submit" name="editTask" value="ändra">
  <a href="admin.php">avbryt</a>
</form>

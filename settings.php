<?php

  $title = "Settings";

  session_start();
  include "includes/header.php";
  include "includes/navigation.php";

  if (isset($_POST['saveProfile'])) {
    saveProfile();
  }
 ?>
<div class="container-fluid">
  <div class="row uglySolutionFixLater justify-content-center">

<form class="col-12 col-sm-8 col-lg-3 userForms uglySolutionFixLater animated fadeInDownBig" action="settings.php" method="post" enctype="multipart/form-data">
  <div class="custom-file">
    <input type="file" name="profilepic" class="custom-file-input"  id="validateCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Välj fil...</label>
    <div class="invalid-feedback">Något gick fel!</div>
  </div>
  <button name="saveProfile" type="submit" class="col-12 btn btn-outline-light">Spara</button>
</form>

  </div>
</div>

<?php include "includes/footer.php"; ?>

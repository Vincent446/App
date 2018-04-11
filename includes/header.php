<?php
  include "db.php";
  include 'functions.php';

 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/app.css">
     <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

     <title><?php echo $title; ?></title>
   </head>
<?php if (isset($bodyClass)) : ?>
  <body class="<?php echo $bodyClass;?>">
  <?php else: ?>
    <body>
  <?php endif; ?>

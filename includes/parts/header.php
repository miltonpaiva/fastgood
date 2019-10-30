<?php 

  $inc = new Controller();
  global $project_name;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$project_name;?> v1 - Start</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

  <?php $inc->includeArchive('bootstrap.min.css'); ?>
  <?php $inc->includeArchive('bootstrap.min.js'); ?>

  <?php $inc->includeArchive('style.css'); ?>

</head>
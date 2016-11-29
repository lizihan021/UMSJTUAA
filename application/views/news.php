<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

  <title> SAA Website </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Bootstrap -->
    <script src="/bs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>

</head>
<body>

<div class="jumbotron text-center">
  <h1><?php echo $test_data; ?></h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3><?php echo $news->title; ?></h3>
      <p><?php echo $news->content; ?></p>
    </div>
  </div>
</div>

</body>
</html>
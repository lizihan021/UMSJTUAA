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
  <p>This is the home page of SAA Website</p> 
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>Column 1</h3>
      <p>This is a demo of how to use Bootstrap to creat responsive website.</p>
      <p>The meaningless word on column 2, 3, 4 are lorem ipsum to let you focus on the alinement of the words.</p>
    </div>
    <div class="col-sm-3">
      <h3>Column 2</h3>
      <p>Here should be the name of each departments...</p>
      <p>Here are discription and links...</p>
    </div>
    <div class="col-sm-3">
      <h3>Column 3</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-3">
      <h3>Column 4</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>
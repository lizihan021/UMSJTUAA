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
  <h1>SAA Website</h1>
  <p>This is the home page of SAA Website</p> 
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <label for="news">News:</label>
      <div class="list-group" id="news">
      <?php 
        foreach ($news as $news_item)
        {
          echo '<a href="#" class="list-group-item list-group-item-action">';
          echo '<h5 class="list-group-item-heading">'.$news_item->title.'</h5>';
          echo '</a>';
        }
      ?>
      </div>
  </div>
    <div class="col-sm-3">
      <h3>Column 3</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p><a href="/manage">Manage Page</a></p>
    </div>
    <div class="col-sm-3">
      <h3>Column 4</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p><a href="/login?url=<?php echo base64_encode($_SERVER["REQUEST_URI"]);?>">TAES Login</a></p>
    </div>
  </div>
</div>
</body>

</html>
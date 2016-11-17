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

    <!-- Editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/editor/css/froala_editor.css">
  <link rel="stylesheet" href="/editor/css/froala_style.css">
  <link rel="stylesheet" href="/editor/css/plugins/code_view.css">
  <link rel="stylesheet" href="/editor/css/plugins/colors.css">
  <link rel="stylesheet" href="/editor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="/editor/css/plugins/image_manager.css">
  <link rel="stylesheet" href="/editor/css/plugins/image.css">
  <link rel="stylesheet" href="/editor/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="/editor/css/plugins/table.css">
  <link rel="stylesheet" href="/editor/css/plugins/char_counter.css">
  <link rel="stylesheet" href="/editor/css/plugins/video.css">
  <link rel="stylesheet" href="/editor/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="/editor/css/plugins/file.css">
  <link rel="stylesheet" href="/editor/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <style>
      div#editor {
          width: 91%;
          margin: auto;
          text-align: left;
      }
  </style>

</head>
<body>

<div class="jumbotron text-center">
  <h1><?php echo $page_name; ?></h1>
  <p>This is the <?php echo $discription; ?> page of SAA Website</p> 
</div>
<div id="editor">
      <div id='edit' style="margin-top: 30px;">
        <h1>Full Featured</h1>
        <p>This is the full featured Froala WYSIWYG HTML editor.</p>
      </div>
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
      <p>Here should be the name of each departments/editor.</p>
      <p>Here are discription and links/editor.</p>
    </div>
    <div class="col-sm-3">
      <h3>Column 3</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit/editor.</p>
      <p><a href="/login/logout">Log out</a></p>
    </div>
    <div class="col-sm-3">
      <h3>Column 4</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit/editor.</p>
      <p><a href="/">Back to Home</a></p>
    </div>
  </div>
</div>







<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="/editor/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="/editor/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/video.min.js"></script>


  <script>
  $(function() {
    $('#edit').froalaEditor({
      // Set the image upload URL.
      imageUploadURL: '/manage/upload_image'
    })
  });
  </script>

</body>
</html>
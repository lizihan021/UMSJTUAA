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
		<link rel="stylesheet" href="/bs/aa_style/manage.css" />
		<link rel="stylesheet" href="/editor/themes/default/default.css" />
		<script charset="utf-8" src="/editor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					width : '100%'
				});
				K('button[id=getHtml]').click(function(e) 
				{
					var title = $("#title").val();
					var content = editor.html();
					if(title == '' || content == '')
					{
						alert("Title or content is empty, submission FAIL");
					}
					else
					{
						content = content.replace(',', '&cedil;');
						$.ajax
					    ({
							type: 'POST',
							url: '/manage/save',
							data:
							{
								title  : title,
								content: content
							},
							success: function(data)
							{
								alert('发送成功');
							},
							error: function()
							{
								alert('发送失败');
							},
							dataType: 'text'
						});
					}
				});
				K('button[name=clear]').click(function(e) {
					editor.html('');
				});

			});


		</script>


</head>
<body>	

<div class="container">
<div class="row">
	<div class="col-sm-12" align="center">
		<h2>Edit News</h2>
	</div>
</div>
<div class="form-group">
  <label for="title">标题:</label>
  <input type="text" class="form-control" id="title" placeholder="title">
</div>
  <div class="row">
  		<div class="col-sm-12">
  			<label for="editor">正文:</label>
			<textarea name="content" id="editor">KindEditor</textarea>
  		</div>
  </div>
  <div class="row">
  <div class="col-sm-12">
  	<h3>
  		<button class="btn btn-primary" id="getHtml"> 提交
  		<span class="glyphicon glyphicon-arrow-up"></span>
  		</button>
		<span>&nbsp;</span>
		<button class="btn btn-danger" name="clear" > 清空
		<span class="glyphicon glyphicon-remove"></span>
		</button>
	</h3>
  </div>
  </div>


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








</body>
</html>
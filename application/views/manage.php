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
					width : '100%',
					items : [
						'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'code', 'cut', 'copy', 'paste',
    				    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
   					     'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
   					     'superscript', 'clearhtml', '/',
   					     'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
   					     'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
   					     'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'
						],
					afterCreate : function() { 
						var self = this;
						K.ctrl(document, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(self.edit.doc, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(document, 'q', function() {
							K('button[name=clear]').click();
						});
						K.ctrl(self.edit.doc, 'q', function() {
							K('button[name=clear]').click();
						});
					}
				});
				K('button[id=getHtml]').click(function(e) 
				{
					if (editor.count('text') > 100000)
					{
						alert("Content length over limit");
						return;
					}
					var title = $("#title").val();
					
					if (title.length > 200)
					{
						alert("Title length over limit");
						return;
					}
					var content = editor.html();
					if(title == '')
						alert("Title is empty, submission FAIL");
					else if(content == '')
						alert("Content is empty, submission FAIL");
					else
					{
						content = content.replace(/'/g, '\"');
						content = content.replace(/,/g, '&cedil;');
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
								var innerhtml = '<div id="'+data+'" style="display:none">';
								innerhtml += '<a data-toggle="collapse" href="#collapse'+data;
								innerhtml += '" class="list-group-item list-group-item-action"><h5 class="list-group-item-heading">'+title;
								innerhtml += '</h5></a><div id="collapse'+data;
								innerhtml += '" class="panel-collapse collapse"><a href="/news/index/'+data;
								innerhtml += '" type="button" class="btn btn-link">Read more</a><button type="button" class="btn btn-danger" name="'+data;
								innerhtml += '" onclick="newsDelete('+data;
								innerhtml += ')">delete</button></div></div>';

								$("#newinsert").after(innerhtml);

             					$("#"+data).slideDown();

							},
							error: function()
							{
								alert('FAIL due to unknown error');
							},
							dataType: 'text'
						});
					}
				});
				K('button[name=clear]').click(function(e) {
					editor.html('');
				});

			});

			function newsDelete(id){
				$.ajax
			    ({
					type: 'POST',
					url: '/manage/delete',
					data: 
					{
						id: id /////////
					},
					success: function(data)
					{
						$("#"+id).fadeTo("fast", 0.01, function(){ //fade
             				$(this).slideUp("normal", function() { //slide up
                 			$(this).remove(); //then remove from the DOM
             			});
         });
					},
					error: function()
					{
						alert('FAIL due to unknown error');
					},
					dataType: 'text'
				});
			    
			}
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
  <label for="title">Title:</label>
  <input type="text" class="form-control" id="title" placeholder="title">
</div>
  <div class="row">
  		<div class="col-sm-12">
  			<label for="editor">News:</label>
			<textarea name="content" id="editor">Edit Here</textarea>
  		</div>
  </div>
  <div class="row">
  <div class="col-sm-12">
  	<h3>
  		<button class="btn btn-primary" id="getHtml"> Submit (Ctrl + Enter)
  		<span class="glyphicon glyphicon-arrow-up"></span>
  		</button>
		<span>&nbsp;</span>
		<button class="btn btn-danger" name="clear" > Clear (Ctrl + q)
		<span class="glyphicon glyphicon-remove"></span>
		</button>
	</h3>
  </div>
  </div>
<!-- News List -->
<div class="row">
	<div class="col-sm-12" align="center">
		<h2>News List</h2>
	</div>
</div>
<div class="list-group" id="news">
	<div id="newinsert"></div>
	<?php 
	foreach ($news as $news_item)
	{
		echo '<div id="'.$news_item->id.'">';
		echo '<a data-toggle="collapse" href="#collapse'.$news_item->id;
		echo '" class="list-group-item list-group-item-action">';
		echo '<h5 class="list-group-item-heading">'.$news_item->title.'</h5>';
		echo '</a>';
		
		echo '<div id="collapse'.$news_item->id.'" class="panel-collapse collapse">';
		
		echo '<a href="/news/index/'.$news_item->id;
		echo '" type="button" class="btn btn-link">';
		echo 'Read more</a>';

		echo '<button type="button" class="btn btn-danger" name="'.$news_item->id.'"';
		echo ' onclick="newsDelete('.$news_item->id.')">';
		echo 'delete</button>';
    	echo '</div>';

    	echo '</div>';

	}
	?>
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
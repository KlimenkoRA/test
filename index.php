<?php include("connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" href="/css/style.css">
<title>Тестовое задание</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
$(function() {
	$("#send").click(function(){
		var author = $("#author").val();
		var message = $("#message").val();				
		$.ajax({
			type: "POST",
			url: "add_comment.php",
			data: {"author": author, "message": message},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Ваше сообщение отправлено','Сообщение не отправлено Ошибка базы данных','Нельзя отправлять пустые сообщения');
				var resultStat = messageResp[Number(response)];
				if(response == 0){
					$("#author").val("");
					$("#message").val("");
					$("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong><br>"+message+"</div>");
				}
				$("#resp").text(resultStat).show().delay(1500).fadeOut(800);
				
			}
		});
		return false;
				
	});
});
</script>
<script>
      $( document ).ready(function() {
        $.post( "Block_1.php", {}, function( data ) {
          $("#Block_1").html(data);
        });
      });
    </script>
</head>
<body>
	<div id="header">
	<h1>Комментируем фотографии</h1>
	</div>
	<div id="content">
	<img class="img" src="img/picture1.jpg">
	</div>
	<div id="form">
		<header>Комментарий</header>
		<form method="post" action="add_comment.php">
			<p>Ваше имя:
			<input name="author" id="author" type="text" size="20"></p>
			<label for="textarea">Комментарий</label>
			<div>
				<textarea name="message" id="message" cols="40" rows="3"></textarea>
				<label for="photo_1"><img class="attach" src="img/attach.png"></label>
				<input type="file" id="photo_1" name="photo" accept="image/*">
			</div>
			<input name="js" type="hidden" value="no" id="js">
			<p><input name="button" type="submit" value="Добавить комментарий"></p>
		</form>
	</div>
<div id="Block_1">
</div>
</body>
</html>
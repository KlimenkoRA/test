<?php include("connect.php");
	$result = mysql_query("SELECT * FROM comment ORDER BY `id` DESC",$db);
	while($comment = mysql_fetch_array($result)){
echo "<div class='comment'>Автор: <strong>".$comment['author']."</strong><br>".$comment['message'].$comment['photo']."<hr>".$comment['date']."<form method='post' action='trash.php'>"."<input type='image' id='trash' src='img/trash.png'>"."<input type='hidden' name='pid' value='".$comment['id']."'>"."</form>"."</div>";
}
?>
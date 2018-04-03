<?php include("connect.php");
header("Content-type: text/html; charset=utf-8");
$pid=$_POST['pid'];
mysql_query("DELETE FROM comment WHERE id='$pid'");
header("Location:index.php");
?>
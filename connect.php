<?php
$db = mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("test",$db);
mysql_query("SET NAMES utf-8");
?>
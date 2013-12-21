<?php
$conn=mysql_connect("localhost","root","") or die("数据库管理错误".mysql_error());
mysql_select_db("teacher",$conn) or die("连接出错".mysql_error());
mysql_query("set names utf8");
?>


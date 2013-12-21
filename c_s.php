<?php
include "conn/conn.php";
session_start();
//$id=$_SESSION['id'];
$info=$_REQUEST['info'];
$nick_name=$info['nick_name'];
$query="update admin set nick_name = '$nick_name' where id =1";
if($result=mysql_query($query))
{
    echo "<script language=\"javascript\">alert('1');</script>";
}
else
{
    echo "<script language=\"javascript\">alert('0');</script>";
}
?>
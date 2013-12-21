<?php
include "conn/conn.php";
$name=$_REQUEST['name'];
$action=$_REQUEST['action'];
if($action==0)
{
$query="select count(*) from admin where  username ='$name'";
}
elseif($action==1)
{
    $query="select count(*) from teacher where  login_name ='$name'";
}
$result=mysql_query($query);
$row=mysql_fetch_array($result);
echo $row[0];
?>
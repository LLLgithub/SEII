<?php
include "conn/conn.php";
$id=$_POST['id'];
$reason=$_POST['reason'];
$query="update order1 set reason_no='$reason',isok=2 where order_id='$id'";
if($result=mysql_query($query))
{
    echo "1";
}
else
{
    echo "0";
}
?>
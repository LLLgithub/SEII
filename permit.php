<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include "conn/conn.php";
$id=$_POST['id'];
$query="update order1 set isok=1 where id ='$id'";
echo $query;
if($result=mysql_query($query))
{
    echo "<script language=\"javascript\">alert('审核成功!');window.location.href='teach.php'</script>";
}
else
{
    echo "<script language=\"javascript\">alert('审核失败!');window.location.href='teach.php'</script>";
}
?>
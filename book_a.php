<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
session_start();

include "conn/conn.php";
$info=$_REQUEST['info'];
$order_id=$_SESSION['id'];
$query="select * from admin where id='$order_id'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$order_name=$row['nick_name'];
$name=$info['T1'];
$time=$info['D1'];
$time2=$info['D2'];
$xiangxi=$info['year']."年".$info['month']."月".$info['day']."日".$info['ss']."时到".$info['ee']."时";
$text=$info['S1'];
$query="select * from teacher where name='$name'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$id=$row['id'];
$time_o=$time2*7+$time;
if(substr($row['time_describe'],$time2*7+$time,1)==1)
{
$query1="insert into order1 (order_id,name,teach_id,reason,isok,order_time,order_name,describe_time)
values('$order_id','$name','$id','$text',0,'$time_o','$order_name','$xiangxi')";
if($result=mysql_query($query1))
{
    echo "<script language=\"javascript\">alert('预约成功，请等待老师审核!');window.location.href='student.php'</script>";
}
else
{
    echo "<script language=\"javascript\">alert('预约失败!');window.location.href='student.php'</script>";
}
}
else
{
    echo "<script language=\"javascript\">alert('预约时间不存在或时间以被预订!');window.location.href='student.php'</script>";
}
?>
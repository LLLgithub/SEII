<?php
header("Content-Type: text/html; charset=UTF-8");
include"conn/conn.php";
$info=$_POST['info'];
$login_name=$info['login_name'];
$password=$info['password'];
$kind=$info['kind'];
if($kind==0)
{
    $query="select * from admin where username='$login_name'";
}
else
{
    $query="select * from teacher where login_name='$login_name'";
}
$result=mysql_query($query);
$row=mysql_fetch_array($result);
if($row['password']==$password)
{
    mysql_close();
    session_start();
    $_SESSION['id']=$row['id'];
    if($kind==0)
    {
        echo "<script language=\"javascript\">window.location.href='student.php'</script>";
    }
    else
    {
        echo "<script language=\"javascript\">window.location.href='teach.php'</script>";
    }
}
else
{
    mysql_close();
    echo "<script language=\"javascript\">alert('登录失败，请重新登录!');window.location.href='index.html';</script>";
}
//echo "<script language=\"javascript\">alert($login_name);</script>";
?>
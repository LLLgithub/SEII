<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
error_reporting(E_ALL^E_NOTICE);
include "conn/conn.php";
$info=$_REQUEST['info'];
$name=$info['name'];
$pw=$info['pw'];
$nick_name=$info['nick_name'];
$profession=$info['profession'];
$key_word=$info['key_word'];
for($i=1;$i<8;$i++)
{
    if($_REQUEST['S'.$i]=='') $_REQUEST['S'.$i]=0;
    if($_REQUEST['X'.$i]=='') $_REQUEST['X'.$i]=0;
    if($_REQUEST['W'.$i]=='') $_REQUEST['W'.$i]=0;
    if($_REQUEST['K'.$i]=='') $_REQUEST['K'.$i]=0;
}
$time=$_REQUEST['S1'].$_REQUEST['S2'].$_REQUEST['S3'].$_REQUEST['S4'].$_REQUEST['S5'].$_REQUEST['S6'].$_REQUEST['S7']
    .$_REQUEST['X1'].$_REQUEST['X2'].$_REQUEST['X3'].$_REQUEST['X4'].$_REQUEST['X5'].$_REQUEST['X6'].$_REQUEST['X7'].
    $_REQUEST['W1'].$_REQUEST['W2'].$_REQUEST['W3'].$_REQUEST['W4'].$_REQUEST['W5'].$_REQUEST['W6'].$_REQUEST['W7']
.$_REQUEST['K1'].$_REQUEST['K2'].$_REQUEST['K3'].$_REQUEST['K4'].$_REQUEST['K5'].$_REQUEST['K6'].$_REQUEST['K7'];
$time2=$info['time2'];
$location=$info['location'];
$email=$info['mail'];
$phone=$info['phone'];
$text_all=$info['article_text'];
$query="insert into teacher(name,major,key1,info,time_describe,login_name,password,time_d,location,email,phone)
values('$nick_name','$profession','$key_word','$text_all','$time','$name','$pw','$time2','$location','$email','$phone')";
if($result=mysql_query($query))
{
    echo "<script language=\"javascript\">alert('注册成功');window.location.href='index.html';</script>";
}
else
{
    echo "<script language=\"javascript\">alert('注册失败');window.location.href='login.htm';</script>";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教师预约系统</title>
</head>
<?php
include "conn/conn.php";
session_start();
//$id=$_SESSION['id'];
$query="select * from admin where id =1";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
?>
<body>
<div>
    <form method="post" action="c_s.php">
           <table>
            <tr>
                <td>昵称：</td>
                <td><input type="text" name="info[nick_name]" id="nm" value="<?php echo $row['nick_name'];?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="修改" onclick="return check()"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
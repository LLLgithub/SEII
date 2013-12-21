<html>

<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>教师预约</title>
    <script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
<script language="JavaScript">
    function check()
    {
        if(window.document.getElementById("name").value=="")
        {
            alert("教师名不能为空");
            return false;
        }
        if(window.document.getElementById("year").value=="")
        {
            alert("年份不能为空");
            return false;

        }
        if(window.document.getElementById("month").value=="")
        {
            alert("月份不能为空");
            return false;
        }
        if(window.document.getElementById("day").value==0)
        {
            alert("日期不能为空");
            return false;
        }
        if(window.document.getElementById("st").value=="")
        {
            alert("开始时间不能为空");
            return false;
        }
        if(window.document.getElementById("et").value=="")
        {
            alert("结束时间不能为空");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>
<script language="JavaScript">
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}
function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
    <!-- Begin
//修改链接地址
var U = "show_data.php";
//修改窗口位置、大小
var X = 600; // x position
var Y = 300; // y position
var W = 400; // width
var H = 300; // height

// Do not edit below this line.
var s="resizable,left="+X+",top="+Y+",screenX="+X+",screenY="+Y+",width="+W+",height="+H;
function popMe(){
    var name=document.getElementById("name").value;
    var U = "show_data.php?name="+name+"&choice=1";
    var SGW = window.open(U,'TheWindow',s)
}
</script>
 <?php
 include "conn/conn.php";
 error_reporting(E_ALL^E_NOTICE);
 $id=$_GET['id'];
 $query="select * from teacher where id ='$id'";
 $result=mysql_query($query);
 $row=mysql_fetch_array($result);
 ?>
</head>
<link href="css/css.css" type="text/css" rel="stylesheet">
<body >
<img border="0" src="img/Logo.jpg" width="500" height="120">
<a href="student.php"><img border="0" id="img11" src="img/button8.jpg" height="49" width="150"  onmouseover="FP_swapImg(1,0,/*id*/'img11',/*url*/'img/button4.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img11',/*url*/'img/button8.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img11',/*url*/'img/button5.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img11',/*url*/'img/button4.jpg')" ></a>
<a href="book.php"><img border="0" id="img12" src="img/button9.jpg" height="49" width="150"  onmouseover="FP_swapImg(1,0,/*id*/'img12',/*url*/'img/button6.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img12',/*url*/'img/button9.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img12',/*url*/'img/button7.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img12',/*url*/'img/button6.jpg')" ></a>
<a href="stu_order.php"><img border="0" id="img3" src="img/button1.jpg" height="33" width="100"  onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button2.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button3.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button2.jpg')" ></a>
<a href="index.html"><img border="0" id="img7" src="img/button1F.jpg" height="33" width="100" onmouseover="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button20.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button1F.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button21.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button20.jpg')" ></a>
<hr>
<div style="float: left; background-repeat: no-repeat;background-image:url(img/left.jpg); height: 600px; width: 1200px;">
<form method="post" action="book_a.php" >
    <table style="margin-left: 200px; margin-top: 150px;">
<tr>

    <td>教师姓名</td>
    <td colspan="2"><input type="text" name="info[T1]" size="28" value="<?php echo $row['name'];?>" onmouseout="show()" id="name"></td></tr>
<tr>
<td>期望时间</td>
    <td><select size="1" name="info[D1]">
<option value="0">星期一</option>
<option value="1">星期二</option>
<option value="2">星期三</option>
<option value="3">星期四</option>
<option value="4">星期五</option>
<option value="5">星期六</option>
<option value="6">星期天</option>
</select></td>
 <td><select size="1" name="info[D2]">
<option value="0">12</option>
<option value="1">34</option>
<option value="2">56</option>
<option value="3">78</option>

</select>节</td></tr>
 <tr><td>具体预约时间（注明年月日时）</td><td colspan="2">
 <input type="text" size="5" name="info[year]" id="year"/> 年
         <input type="text" size="5" name="info[month]" id="month"/>  月
         <input type="text" size="5" name="info[day]" id="day"/> 日
         <input type="text" size="5"  name="info[ss]" id="st"/> 时 ～
         <input type="text" size="5"  name="info[ee]" id="et"/>时
         </td></tr>
<tr>
<td>预约事由及说明</td>
</tr>
<tr><td colspan="3"><textarea rows="8" name="info[S1]" cols="60"></textarea></td></tr>
<tr style="height: 10px;"></tr>
<tr><td><input type="submit" onclick="return check()"/> </td>
<td><input type="reset" />
</td><td><a href="javascript:popMe()" style="text-decoration:none;">查询</a></td> </tr>    </table>
</form>
</div>
</body>

</html>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- #BeginEditable "doctitle" -->
<title>学生查询</title>
<!-- #EndEditable -->
<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
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
// -->
</script>
</head>
<?php
include "conn/conn.php";
session_start();
error_reporting(E_ALL^E_NOTICE);
$n=$_REQUEST['T1'];
$choice=$_REQUEST['D1'];
if($choice==0)
{
    $query="select * from teacher where name like '%$n%' ";
}
elseif($choice==1)
{
    $query="select * from teacher where major like '%$n%'";
}
elseif($choice==2)
{
    $query="select * from teacher where key1 like '%$n%'";
}
$result=mysql_query($query);
?>
<link href="css/css.css" type="text/css" rel="stylesheet">
<body onload="FP_preloadImgs(/*url*/'img/button2.jpg', /*url*/'img/button3.jpg', /*url*/'img/buttonB.jpg', /*url*/'img/buttonC.jpg', /*url*/'img/buttonE.jpg', /*url*/'img/buttonF.jpg', /*url*/'img/button20.jpg', /*url*/'img/button21.jpg', /*url*/'img/button23.jpg', /*url*/'img/button24.jpg', /*url*/'img/button27.jpg', /*url*/'img/button28.jpg', /*url*/'img/button2D.jpg', /*url*/'img/button2E.jpg')">
<img border="0" src="img/Logo.jpg" width="500" height="120"><a href="student.php"><img border="0" id="img1" src="img/buttonA.jpg" height="49" width="150" alt="��ѯ�Ƽ�"  onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonB.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonA.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonC.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonB.jpg')"></a>
<a href="book.php"><img border="0" id="img6" src="img/buttonD.jpg" height="49" width="150" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'img/buttonE.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'img/buttonD.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'img/buttonF.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'img/buttonE.jpg')"></a>
<a href="stu_order.php" ><img border="0" id="img3" src="img/button1.jpg" height="33" width="100"  onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button2.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button3.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button2.jpg')" ></a>
<a href="index.html"><img border="0" id="img7" src="img/button1F.jpg" height="33" width="100"  onmouseover="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button20.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button1F.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button21.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button20.jpg')"></a>
<hr>
<div style="background-repeat: no-repeat;background-image:url(img/gg.jpg); height: 600px; width: 1200px;">
    <form method="post" action="student.php">
<table style="margin-left: 20px;">
    <tr style="height: 50px;"></tr>
<tr>
    <td>检索内容</td>
    <td><input type="text" name="T1" size="20"></td>
</tr>
    <tr>
        <td>检索条件</td><td><select size="1" name="D1">
            <option value="0">教师姓名</option>
            <option value="1">教师专业</option>
            <option value="2">关键字</option>
        </select></td>
    <tr style="height: 10px;"></tr>
    <tr>
        <td ><input type="submit" > </td><td><input type="reset">  </td>
    </tr>
</table>
        </form>
</div>

<div style="position: absolute; width: 804px; height: 303px; z-index: 1; left: 290px; top: 194px; visibility:visible" id="layer1">
	<table border="1" width="90%">
		<tr>
			<td>姓名</td>
			<td>专业</td>
			<td>关键字</td>
			<td>可预约时间</td>
			<td>操作</td>
		</tr>
        <?php
        while($row=mysql_fetch_array($result))
        {?>
		<tr>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['major'];?></td>
			<td><?php echo $row['key1'];?></td>
			<td><?php echo $row['time_d'];?></td>
			<td><a href="show_data.php?id=<?php echo $row['id'];?>&choice=0">查看详细</a></td>
		</tr>
        <?php }?>
	</table>
</div>


</body>

</html>

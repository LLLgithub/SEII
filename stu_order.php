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

<div style="float: left; background-repeat: no-repeat;background-image:url(img/SIZEheight.jpg); height: 600px; width: 1200px;" >
<br />
    <table border="1" style="margin-left: 600px; color: white; width:530px;" >
        <tr><td>教师姓名</td><td>预约时间</td><td>回执情况</td><td>相关信息</td></tr>
        <?php
        $id=$_SESSION['id'];
        $query="select * from order1 where order_id ='$id' order by describe_time desc limit 0,10";
        $result=mysql_query($query);
        while($row=mysql_fetch_array($result)){?>
            <tr><td><?php echo $row['name'];?></td>
                <td><?php echo $row['describe_time']; ?></td>
                <td><?php
                    if($row['isok']==1) echo"老师已经同意！";
                    else if($row['isok']==0){echo "等待中";}
                    else if($row['isok']==2){echo "老师已拒绝！";}?></td>
                <td><?php if($row['isok']==2){echo $row['reason_no'];}?></td>
            </tr>
        <?php }?>

    </table>
</div>

</body>

</html>

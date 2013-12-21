<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教师预约系统</title>
</head>
<link href="css/css.css" type="text/css" rel="stylesheet">

<?php
include "conn/conn.php";
session_start();
error_reporting(E_ALL^E_NOTICE);
$id=$_GET['id'];
$name=$_GET['name'];
$choice=$_GET['choice'];
if($choice==1)
{
    $query="select * from teacher where name ='$name'";
}
else
{
    $query="select * from teacher where id ='$id'";
}

$result=mysql_query($query);
$row=mysql_fetch_array($result);
?>
<script language="JavaScript">
    function yuyue()
    {
        window.location.href="book.php?id=<?php echo $id;?>"
    }
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
</script>
<body>
<link href="css/css.css" type="text/css" rel="stylesheet">
<body onload="FP_preloadImgs(/*url*/'img/button2.jpg', /*url*/'img/button3.jpg', /*url*/'img/buttonB.jpg', /*url*/'img/buttonC.jpg', /*url*/'img/buttonE.jpg', /*url*/'img/buttonF.jpg', /*url*/'img/button20.jpg', /*url*/'img/button21.jpg', /*url*/'img/button23.jpg', /*url*/'img/button24.jpg', /*url*/'img/button27.jpg', /*url*/'img/button28.jpg', /*url*/'img/button2D.jpg', /*url*/'img/button2E.jpg')">
<img border="0" src="img/Logo.jpg" width="500" height="120"><a href="student.php"><img border="0" id="img1" src="img/buttonA.jpg" height="49" width="150" alt="��ѯ�Ƽ�"  onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonB.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonA.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonC.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonB.jpg')"></a>
<a href="book.php"><img border="0" id="img6" src="img/buttonD.jpg" height="49" width="150" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'img/buttonE.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'img/buttonD.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'img/buttonF.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'img/buttonE.jpg')"></a>
<a href="stu_order.php" ><img border="0" id="img3" src="img/button1.jpg" height="33" width="100"  onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button2.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'img/button3.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'img/button2.jpg')" ></a>
<a href="index.html"><img border="0" id="img7" src="img/button1F.jpg" height="33" width="100"  onmouseover="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button20.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button1F.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img7',/*url*/'img/button21.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img7',/*url*/'img/button20.jpg')"></a>
<hr>
<div align="center" style="background-repeat: no-repeat;background-image:url(img/gg.jpg); height: 600px; width: 1200px;">
     <br />
     <table border="1px" style="font-size: 20px;">
            <tr>
                <td>姓名：</td>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <td>专业：</td>
                <td><?php echo $row['major'];?></td>
            </tr>
            <tr>
                <td>关键字：</td>
                <td><?php echo $row['key1'];?></td>
            </tr>
            <tr>
                <td>可以预约时间：</td>
                <td colspan="2">
                    <table  border="1" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td class="bhead">&nbsp;</td>
                            <td class="bhead2">周一</td>
                            <td class="bhead2">周二</td>
                            <td class="bhead2">周三</td>
                            <td class="bhead2">周四</td>
                            <td class="bhead2">周五</td>
                            <td class="bhead2">周六</td>
                            <td class="bhead2">周日</td>
                        </tr>
                        <tr>
                            <td class="bhead">8：00到10：00</td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],0,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],1,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],2,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],3,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],4,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],5,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],6,1)) echo "√"; ?></td>
                        </tr>
                        <tr>
                            <td class="bhead">10：00到11：50</td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],7,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],8,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],9,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],10,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],11,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],12,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],13,1)) echo "√"; ?></td>
                        </tr>
                        <tr>
                            <td class="bhead">1：30到3：30</td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],14,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],15,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],16,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],17,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],18,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],19,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],20,1)) echo "√"; ?></td>
                        </tr>
                        <tr>
                            <td class="bhead">3：30到5：30</td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],21,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],22,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],23,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],24,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],25,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],26,1)) echo "√"; ?></td>
                            <td class="bbottom"><?php if(substr($row['time_describe'],27,1)) echo "√"; ?></td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td>时间详细描述：</td>
                <td><?php echo $row['time_d'];?></td>
            </tr>
            <tr>
            <tr>
                <td>预约地点：</td>
                <td><?php echo $row['location'];?></td>
            </tr>
            <tr>
            <td>邮箱：</td>
            <td><?php echo $row['email'];?></td>
            </tr>
            <tr>
                <td>手机</td>
                <td><?php echo $row['phone'];?></td>
            </tr>
            <tr>
                <td>简介：</td>
                <td colspan="2"><?php echo $row['info'];?></td>
            </tr>
            <?php if($choice!=1){?><tr>
                <td><input type="button" value="预约" name="预约" onclick="yuyue()" /></td>
            </tr><?Php }?>
        </table>
</div>
</body>
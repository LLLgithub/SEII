<html>

<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="js/jquery.js"></script>
<title>教师登陆</title>
<script language="JavaScript">
<!--
function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

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
// -->
</script>
</head>
<?php
include "conn/conn.php";
session_start();
$id=$_SESSION['id'];
?>
<script language="JavaScript">
 function jujue(i)
    {
        var j;
        var x=prompt("请说明拒绝理由（可以不添）",j);
        var data="id="+i+"&reason="+x;
        $.ajax({
            type:"POST",
            url:"refuse.php",
            data: data,
            success: function (html)
            {
               //alert(html);
                if(html)
                {alert("拒绝成功，学生将得到回执信息");}
                else
                {
                    alert("消息传送失败");
                }
            }
        });
    }
</script>
<body onload="FP_preloadImgs(/*url*/'img/button14.jpg', /*url*/'img/button15.jpg', /*url*/'img/buttonE1.jpg', /*url*/'img/buttonF1.jpg', /*url*/'img/button19.jpg', /*url*/'img/button25.jpg', /*url*/'img/button1A.jpg', /*url*/'img/button1B.jpg')">

<p align="center"><img border="0" src="img/Logo.jpg" width="500" height="120">
<a href="teach.php"><img border="0" id="img1" src="img/buttonD1.jpg" height="49" width="150" alt="查看预约请求" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="查看预约请求" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonE1.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonD1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonF1.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonE1.jpg')"></a>
<a href="change_teacher.php?id=<?php echo $id;?>"><img border="0" id="img4" src="img/button17.jpg" height="33" width="100" alt="修改个人信息" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="修改个人信息" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'img/button14.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'img/button17.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'img/button15.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'img/button14.jpg')"></a>
<a href="index.html"><img border="0" id="img5" src="img/button30.jpg" height="33" width="100" alt="退出登录" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'img/button19.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'img/button30.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'img/button25.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'img/button19.jpg')" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="退出登录"></a></p>
<hr>
<div style="background-repeat: no-repeat;background-image:url(img/SIZEheight.jpg); height: 600px; width: 1200px;text-align: center;margin-left: 100px;color:#ffffff" >
    <br />
	<font face="楷体" size="5">老师您好，您近期的预约情况如下：</font>
    <form action="permit.php" method="post">
    <table border="1" style="text-align: center; margin-left: 250px;color: #ffffff" >
		<tr>
			<td>预约人</td>
			<td>预约时间</td>
            <td>预约具体时间</td>
			<td>预约事由</td>
			<td>应答情况</td>
		</tr>
        <?php
        $query="select * from order1 where teach_id = '$id' order by describe_time desc";
        $result=mysql_query($query);
        while($row=mysql_fetch_array($result))
        {
        ?>
		<tr>
			<td><?php echo $row['order_name'];?>　</td>
			<td><?php
                $line=floor($row['order_time']/7);
                $line1=$row['order_time']%7;
                if($line1==0) echo"星期一 ";
                if($line1==1) echo"星期二 ";
                if($line1==2) echo"星期三 ";
                if($line1==3) echo"星期四 ";
                if($line1==4) echo"星期五 ";
                if($line1==5) echo"星期六 ";
                if($line1==6) echo"星期日 ";
                if($line==0) echo"第一二节";
                if($line==1) echo"第三四节";
                if($line==2) echo"第五六节";
                if($line==3) echo"第七八节";?>　</td>
            <td><?php echo $row['describe_time'];?></td>
			<td><?php echo $row['reason'];?>　</td>

			<td><?php if($row['isok']!=1){?><input type="submit" value="同意" name="B3" ><?php }?>
              <?php if($row['isok']!=2){?> <input type="button" name="拒绝"  value="拒绝" onclick="jujue(<?php echo $row['order_id'];?>)"><?Php }?>
            </td>
         <input type="hidden" value="<?php echo $row['id'];?>" name="id">
		</tr>
        <?php }?>
	</table>
    </form>
</div>
</body>

</html>

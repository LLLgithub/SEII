<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教师预约系统</title>
</head>
<link href="css/css.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="kindeditor-4.1.7/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor-4.1.7/plugins/code/prettify.css" />
<script charset="utf-8" src="kindeditor-4.1.7/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor-4.1.7/lang/zh_CN.js"></script>
<script charset="utf-8" src="kindeditor-4.1.7/plugins/code/prettify.js"></script>
<script type="text/javascript" charset="utf-8">
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('#editortext', {
            allowFlashUpload :false
        });
    });
</script>
<script type="text/javascript" charset="utf-8">
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
    }</script>
<body>
<?php
include "conn/conn.php";
session_start();
$id=$_GET['id'];
$query="select * from teacher where id ='$id'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
?>
<p align="center"><img border="0" src="img/Logo.jpg" width="500" height="120">
    <a href="teach.php"><img border="0" id="img1" src="img/buttonD1.jpg" height="49" width="150" alt="查看预约请求" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="查看预约请求" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonE1.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonD1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/buttonF1.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/buttonE1.jpg')"></a>
    <a href="change_teacher.php?id=<?php echo $id;?>"><img border="0" id="img4" src="img/button17.jpg" height="33" width="100" alt="修改个人信息" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="修改个人信息" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'img/button14.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'img/button17.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'img/button15.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'img/button14.jpg')"></a>
    <a href="index.html"><img border="0" id="img5" src="img/button30.jpg" height="33" width="100" alt="退出登录" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'img/button19.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'img/button30.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'img/button25.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'img/button19.jpg')" fp-style="fp-btn: Metal Tab 2; fp-font: SimSun-ExtB" fp-title="退出登录"></a></p>
<hr>
<div align="center">
    <form method="post" action="c_t.php">
        <table>
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="info[nick_name]" id="nm" value="<?php echo $row['name'];?>"/></td>
                <td width="20px;"><input type="hidden" name="info[id]" value="<?php echo $id;?>"></td>
                <td rowspan="8" ><img src="img/xiaologo.jpg"> </td>
            </tr>
            <tr>
                <td>专业：</td>
                <td><input type="text" name="info[profession]" id="profession" value="<?php echo $row['major'];?>"/></td>
            </tr>
            <tr>
                <td>关键字：</td>
                <td><input type="text" name="info[key_word]" id="key_word" value="<?php echo $row['key1'];?>"/></td>
            </tr>
            <tr>
                <td>可以预约时间：</td>
                <td colspan="2">     <table  border="1" cellspacing="0" cellpadding="0" bordercolor="#FFFFFF">
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
                            <td class="bbottom"><input type="checkbox" name="S1" value="1" <?php if(substr($row['time_describe'],0,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S2" value="1" <?php if(substr($row['time_describe'],1,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S3" value="1" <?php if(substr($row['time_describe'],2,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S4" value="1" <?php if(substr($row['time_describe'],3,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S5" value="1" <?php if(substr($row['time_describe'],4,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S6" value="1" <?php if(substr($row['time_describe'],5,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="S7" value="1" <?php if(substr($row['time_describe'],6,1)) echo "checked"; ?>></td>
                        </tr>
                        <tr>
                            <td class="bhead">10：00到11：50</td>
                            <td class="bbottom"><input type="checkbox" name="X1" value="1" <?php if(substr($row['time_describe'],7,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X2" value="1" <?php if(substr($row['time_describe'],8,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X3" value="1" <?php if(substr($row['time_describe'],9,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X4" value="1" <?php if(substr($row['time_describe'],10,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X5" value="1" <?php if(substr($row['time_describe'],11,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X6" value="1" <?php if(substr($row['time_describe'],12,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="X7" value="1" <?php if(substr($row['time_describe'],13,1)) echo "checked"; ?>></td>
                        </tr>
                        <tr>
                            <td class="bhead">1：30到3：30</td>
                            <td class="bbottom"><input type="checkbox" name="W1" value="1" <?php if(substr($row['time_describe'],14,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W2" value="1" <?php if(substr($row['time_describe'],15,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W3" value="1" <?php if(substr($row['time_describe'],16,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W4" value="1" <?php if(substr($row['time_describe'],17,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W5" value="1" <?php if(substr($row['time_describe'],18,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W6" value="1" <?php if(substr($row['time_describe'],19,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="W7" value="1" <?php if(substr($row['time_describe'],20,1)) echo "checked"; ?>></td>
                        </tr>
                        <tr>
                            <td class="bhead">3：30到5：30</td>
                            <td class="bbottom"><input type="checkbox" name="K1" value="1" <?php if(substr($row['time_describe'],21,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K2" value="1" <?php if(substr($row['time_describe'],22,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K3" value="1" <?php if(substr($row['time_describe'],23,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K4" value="1" <?php if(substr($row['time_describe'],24,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K5" value="1" <?php if(substr($row['time_describe'],25,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K6" value="1" <?php if(substr($row['time_describe'],26,1)) echo "checked"; ?>></td>
                            <td class="bbottom"><input type="checkbox" name="K7" value="1" <?php if(substr($row['time_describe'],27,1)) echo "checked"; ?>></td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td>时间详细描述：</td>
                <td><input type="text" name="info[time2]" id="time2" value="<?php echo $row['time_d'];?>"/></td>
            </tr>
            <tr>
            <tr>
                <td>预约地点：</td>
                <td><input type="text" name="info[location]" id="location" value="<?php echo $row['location'];?>" /></td>
            </tr>
            <td>邮箱：</td>
            <td><input type="text" name="info[mail]" id="mail" value="<?php echo $row['email'];?>"/></td>
            </tr>
            <tr>
                <td>手机(可以不填):</td>
                <td><input type="text" name="info[phone]" id="phone" value="<?php echo $row['phone'];?>"/></td>
            </tr>
            <tr>
                <td>简介：</td>
                <td colspan="3"><textarea id="editortext" style=" width:100%;height:300px; margin-left: 200px;" name="info[article_text]"><?php echo $row['info'];?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="修改" onclick="return check()"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
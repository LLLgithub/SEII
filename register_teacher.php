<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教师预约系统</title>
</head>
<link href="css/css.css" type="text/css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script language="javascript">
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
    function logout()
    {
        window.location.href="index.html";
    }
    function select1()
    {
        //window.document.getElementById("hi").innerHTML="该用户名可以使用！";
        var x;
        x=window.document.getElementById("name").value;
        var data="name="+x+"&action=1";
        $.ajax({
            type:"POST",
            url:"select_name.php",
            data: data,
            success: function (html)
            {
                if(html==0)
                {
                    window.document.getElementById("hi").innerHTML="该用户名可以使用！";
                    window.document.getElementById("isok").value=1;
                }
                else
                {
                    window.document.getElementById("hi").innerHTML="该用户名已经注册！";
                    window.document.getElementById("isok").value=0;
                }
            }
        });
    }
    function check()
    {
        if(window.document.getElementById("pw").value=="")
        {
            alert("密码不能为空");
            return false;
        }
        if(window.document.getElementById("nm").value=="")
        {
            alert("昵称不能为空");
            return false;

        }
        if(window.document.getElementById("name").value=="")
        {
            alert("用户名不能为空");
            return false;
        }
        if(window.document.getElementById("isok").value==0)
        {
            alert("用户名已经被使用");
            return false;
        }
        if(window.document.getElementById("pw").value!=window.document.getElementById("pw1").value)
        {
            alert("两次密码不一样");
            return false;
        }
        else
        {
            return true;
        }
    }

</script>
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
<body>
<p align="center"><img border="0" src="img/minlogo.jpg" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img border="0" id="img1" src="img/button33.jpg" height="33" width="100" alt="退出" fp-style="fp-btn: Embossed Tab 3; fp-font: SimSun-ExtB" fp-title="退出" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/button31.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/button33.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/button32.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/button31.jpg')" onclick="logout()"></p>
<hr>
<div align="center" >
    <form method="post" action="r_t.php">
        <table>
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="info[name]" id="name" onblur="select1()"/></td>
                <td id="hi"></td>
                <td rowspan="11"><img src="img/illustration1.jpg" alt=""></td>
            </tr>
            <tr>
                <td>密码：</td>
                <td><input type="password" name="info[pw]" id="pw""/></td>
                <td><input type="hidden" id="isok" ></td>
            </tr>
            <tr>
                <td>确认密码：</td>
                <td><input type="password" name="info[pw1]" id="pw1""/></td>
            </tr>
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="info[nick_name]" id="nm"/></td>
            </tr>
            <tr>
                <td>专业：</td>
                <td><input type="text" name="info[profession]" id="profession"/></td>
            </tr>
            <tr>
                <td>关键字：</td>
                <td><input type="text" name="info[key_word]" id="key_word"/></td>
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
                            <td class="bbottom"><input type="checkbox" name="S1" value="1" ></td>
                            <td class="bbottom"><input type="checkbox" name="S2" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="S3" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="S4" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="S5" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="S6" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="S7" value="1"></td>
                        </tr>
                        <tr>
                            <td class="bhead">10：00到11：50</td>
                            <td class="bbottom"><input type="checkbox" name="X1" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X2" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X3" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X4" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X5" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X6" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="X7" value="1"></td>
                        </tr>
                        <tr>
                            <td class="bhead">1：30到3：30</td>
                            <td class="bbottom"><input type="checkbox" name="W1" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W2" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W3" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W4" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W5" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W6" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="W7" value="1"></td>
                        </tr>
                        <tr>
                            <td class="bhead">3：30到5：30</td>
                            <td class="bbottom"><input type="checkbox" name="K1" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K2" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K3" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K4" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K5" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K6" value="1"></td>
                            <td class="bbottom"><input type="checkbox" name="K7" value="1"></td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td>时间详细描述：</td>
                <td><input type="text" name="info[time2]" id="time2"/></td>
            </tr>
            <tr>
            <tr>
                <td>预约地点：</td>
                <td><input type="text" name="info[location]" id="location"/></td>
            </tr>
                <td>邮箱：</td>
                <td><input type="text" name="info[mail]" id="mail"/></td>
            </tr>
            <tr>
                <td>手机(可以不填):</td>
                <td><input type="text" name="info[phone]" id="phone"/></td>
            </tr>
            <tr>
                <td>简介：</td>
                <td colspan="3"><textarea id="editortext" style=" width:100%;height:300px; margin-left: 200px;" name="info[article_text]"> </textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="确认" onclick="return check()"/></td>
                <td><input type="reset" value="清空" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
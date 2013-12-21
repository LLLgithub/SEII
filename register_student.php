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
    var data="name="+x+"&action=0";
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
<body>
<p align="center"><img border="0" src="img/Logo.jpg" width="500" height="120">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img border="0" id="img1" src="img/button33.jpg" height="33" width="100" alt="退出" fp-style="fp-btn: Embossed Tab 3; fp-font: SimSun-ExtB" fp-title="退出" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/button31.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/button33.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'img/button32.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'img/button31.jpg')" onclick="logout()"></p>
<hr>
<div style="background-image:url(img/SIZE.jpg);height: 600px; background-repeat: no-repeat;" >
    <form method="post" action="r_s.php">
        <table style="margin-left: 200px;">
            <tr style="height: 200px;"></tr>
            <tr>
               <td>用户名：</td>
               <td><input type="text" name="info[name]" id="name" onblur="select1()"/></td>
                <td id="hi"></td>
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
               <td>昵称：</td>
               <td><input type="text" name="info[nick_name]" id="nm"/></td>
            </tr>
            <tr>
                <td><input type="submit" value="确认" onclick="return check()"/></td>
                <td><input type="reset" value="清空" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
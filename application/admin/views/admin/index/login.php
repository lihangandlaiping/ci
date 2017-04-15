<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:23 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Y+后台管理- 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="<?php echo __ROOT__;?>/public/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/public/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/public/admin/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/public/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Y+</h1>

        </div>
        <h3>欢迎使用 Y+</h3>

        <form class="m-t" role="form" action="" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="uName" placeholder="用户名" required="">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="密码" required="">
            </div>
            <button type="button" id="submitButton" class="btn btn-primary block full-width m-b">登 录</button>


            <p class="text-muted text-center"> <small id="msg_alert"></small>
            </p>

        </form>
    </div>
</div>

<script src="<?php echo __ROOT__;?>/public/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/sweetalert/sweetalert.min.js?t=2"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/common.js"></script>
<script>
    document.onkeydown=function(event){
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if(e && e.keyCode==13){ // enter 键
            $.post($('form.m-t').attr('action'),$('form.m-t').serialize(),function(data){
                // console.log(data);return;
                if(data.code==1)
                {
                    swal(data.msg, "你已经登录成功即将跳转。", "success");
                    setTimeout(function(){sweetAlert.close();
                        parent.location.href=data.url;
                    },2000);
                }
                else
                {
                    swal(data.msg, "您执行的登录操作失败。", "error");
                    setTimeout(function(){sweetAlert.close();},2000);
                }
            },'json')
        }
    };
    $(function(){
        $('#submitButton').click(function(){
            $.post($('form.m-t').attr('action'),$('form.m-t').serialize(),function(data){
               // console.log(data);return;
                if(data.code==1)
                {
                    swal(data.msg, "你已经登录成功即将跳转。", "success");
                    setTimeout(function(){sweetAlert.close();
                        parent.location.href=data.url;
                    },2000);
                }
                else
                {
                    swal(data.msg, "您执行的登录操作失败。", "error");
                    setTimeout(function(){sweetAlert.close();},2000);
                }
            },'json')
        })
    })
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:23 GMT -->
</html>

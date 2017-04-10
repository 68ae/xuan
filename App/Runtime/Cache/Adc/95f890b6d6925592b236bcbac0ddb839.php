<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理1.1.1</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/public/adc/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/public/adc/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/public/adc/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/public/adc/dist/css/skins/_all-skins.min.css">
  <!-- ico -->
  <link href="/favicon.ico" rel="shortcut icon">
  <!-- jQuery 2.2.3 -->
  <script src="/public/adc/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Cheng</b>X</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">登录开始会话</p>

    <!-- <form method="post"> -->
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="username" placeholder="用户名" autofocus required oninput="Monitor()" onpropertychange="Monitor()">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" placeholder="密码" oninput="Monitor()" onpropertychange="Monitor()">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="verification()">登录</button>
        </div>
        <!-- /.col -->
      </div>
    <!-- </form> -->
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="/public/layer/layer.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/public/adc/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        // 判断鼠标去掉警示效果
        function Monitor()
        {
            $("#username").css("border-bottom","");
            $("#password").css("border-bottom","");
        }
        // 验证
        function verification()
        {
            var username = $('#username').val();
            var password = $('#password').val();

            if('' == username)
            {
                layer.alert("请输入用户名!");
                $("#username").css("border-bottom","2px solid #f0868a");
                return false;
            }
            else if('' == password)
            {
                layer.alert("请输入密码!");
                $("#password").css("border-bottom","2px solid #f0868a");
                return false;
            }

            var param = {username:username, password:password};
            $.ajax({
                type:'POST',
                url:'/adc/login/checkLogin',
                data:param,
                dataType:'json',
                success:function(data){
                    if (data.status == 'failed')
                    {
                        //登录失败
                        $("#username").css("border-bottom","2px solid #f0868a");
                        $("#password").css("border-bottom","2px solid #f0868a");
                        layer.alert(data.reason);
                        return false;
                    }
                    else
                    {
                        //成功
                        window.location.href='/adc/index/index';
                    }
                }
            });
        }
    </script>
</body>
</html>
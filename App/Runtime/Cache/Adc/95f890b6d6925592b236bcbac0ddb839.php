<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台管理1.1.1</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/adc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Public/adc/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/adc/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/adc/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/adc/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="/Public/adc/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/layer/layer.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请登录</h3>
                    </div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="用户名" id="username" name="username" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="密码" id="password" name="password" type="password" value="">
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block" onclick="verification()" value="登录">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function verification()
        {
            var username = $('#username').val();
            var password = $('#password').val();

            if('' == username)
            {
                layer.alert("请输入用户名!");
                return false;
            }
            else if('' == password)
            {
                layer.alert("请输入密码!");
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
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
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
  <!-- Left side column. contains the logo and sidebar -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/adc" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>X</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Cheng</b>X</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">切换导航</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/public/adc/dist/img/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($_SESSION['userInfo']['nickname']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/public/adc/dist/img/user.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo ($_SESSION['userInfo']['nickname']); ?> - 管理员
                  <small>注册时间<?php echo ($_SESSION['userInfo']['created_time']); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">设置</a>
                </div>
                <div class="pull-right">
                  <a href="/adc/login" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">主要导航</li>
        <li class="active treeview">
          <a href="/adc">
            <i class="fa fa-dashboard"></i> <span>首页</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>文章</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adc/news/newsadd"><i class="fa fa-circle-o"></i> 新增文章</a></li>
            <li><a href="/adc/news/newslist"><i class="fa fa-circle-o"></i> 文章列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>类别</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adc/sort/sortadd"><i class="fa fa-circle-o"></i> 新增类别</a></li>
            <li><a href="/adc/sort/sortlist"><i class="fa fa-circle-o"></i> 类别列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="/adc/comment/commentlist">
            <i class="fa fa-comments-o"></i>
            <span>评论</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>系统</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adc/set/basicset"><i class="fa fa-circle-o"></i> 基本设置</a></li>
            <li><a href="/adc/set/personalset"><i class="fa fa-circle-o"></i> 个人设置</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script type="text/javascript">
    $(function (){
      var curr_url = '<?php echo (ACTION_NAME); ?>';  //获取当前URL的方法名
      $('.sidebar-menu a').each(function(i,n){  //循环导航的a标签
          var href = $(this).attr('href').split("/").pop(); //a标签中的href链接最后的方法名
          if(href == curr_url){  //如果当前URL,和a标签中的href相等。
              $(this).parent('li').addClass('active');  //那么就给这个li标签增加active类。
              $(this).parent('li').siblings().removeClass('active');  //那么就给其他li标签增加active类。
              $(this).parent().parent().parent('li').addClass('active');  //二级列表中大类的状态
              $(this).parent().parent().parent('li').siblings().removeClass('active');  //二级列表中其他大类的状态
          }
      });
    });
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <!-- <section class="content-header">
      <h1>
        文章管理
      </h1>
    </section> -->
    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">基本设置</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="panel-body" id="form_add_basicset" name="form_add_basicset" method="POST" enctype="multipart/form-data">
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>站点名称</label>
                            <input class="form-control" id="blogname" name="blogname" value="<?php echo ($optionArr['blogname']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>站点副标题</label>
                            <input class="form-control" id="bloginfo" name="bloginfo" value="<?php echo ($optionArr['bloginfo']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>浏览器标题</label>
                            <input class="form-control" id="site_title" name="site_title" value="<?php echo ($optionArr['site_title']); ?>" >
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>站点关键字</label>
                            <input class="form-control" id="site_key" name="site_key" value="<?php echo ($optionArr['site_key']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>浏览器描述</label>
                            <input class="form-control" id="site_description" name="site_description" value="<?php echo ($optionArr['site_description']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>站点地址</label>
                            <input class="form-control" id="blogurl" name="blogurl" value="<?php echo ($optionArr['blogurl']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>ICP备案号</label>
                            <input class="form-control" id="icp" name="icp" value="<?php echo ($optionArr['icp']); ?>">
                        </div>
                    </div>
                    <div role="form" class="col-lg-10">
                        <div class="form-group">
                            <label>首页底部信息</label>
                            <textarea class="form-control" rows="3" id="footer_info" name="footer_info"><?php echo ($optionArr['footer_info']); ?></textarea>
                            <span class="help-block">(支持html,可用于添加流量统计代码)</span>
                        </div>
                    </div>
                    {__TOKEN__}
                    <div role="form" class="col-lg-12">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <button type="reset" class="btn btn-default" onclick="javascript:history.go(-1);">取消</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>版本</b> 1.1.1
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="http://chengxuan.wang">ChengX</a>.</strong> All rights
  reserved.
</footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.6 -->
<script src="/public/adc/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/public/adc/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/public/adc/dist/js/app.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/public/adc/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- 验证 -->
<script type="text/javascript" src="/public/adc/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/public/adc/validate/messages_zh.js"></script>
<script src="/public/layer/layer.js"></script>

<script type="text/javascript">
    //验证
    $().ready(function() {
        $("#form_add_basicset").validate({
            rules: {
                blogname:          { required: true },
                bloginfo:          { required: true },
                site_title:        { required: true },
                site_description:  { required: true },
                site_key:          { required: true },
                blogurl:           { required: true },
                icp:               { required: true },
                footer_info:       { required: true }
            },
            //通过之后回调
            submitHandler: function(form) {
                var param = $("#form_add_basicset").serialize();
                $.ajax({
                    url : "/adc/set/basicSetSave",
                    type : "post",
                    dataType : "json",
                    data: param,
                    success : function(data) {
                        if(data.result == 'success') {
                            layer.msg(data.msg);
                        }
                        else {
                            layer.msg(data.msg);
                        }
                    }
                });
            },
            //不通过回调
            invalidHandler: function(form, validator) {
                return false;
            }
        });
    });
    //验证结束
    </script>
</body>
</html>
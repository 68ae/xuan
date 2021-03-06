<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理1.1.1</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/Public/adc/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/Public/adc/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Public/adc/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/Public/adc/dist/css/skins/_all-skins.min.css">
  <!-- ico -->
  <link href="/favicon.ico" rel="shortcut icon">
  <!-- jQuery 2.2.3 -->
  <script src="/Public/adc/plugins/jQuery/jquery-2.2.3.min.js"></script>
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
              <img src="/Public/adc/dist/img/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($_SESSION['userInfo']['nickname']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/Public/adc/dist/img/user.jpg" class="img-circle" alt="User Image">
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
                  <a href="/index.php/adc/login" class="btn btn-default btn-flat">退出</a>
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
            <li><a href="/index.php/adc/news/newsadd"><i class="fa fa-circle-o"></i> 新增文章</a></li>
            <li><a href="/index.php/adc/news/newslist"><i class="fa fa-circle-o"></i> 文章列表</a></li>
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
            <li><a href="/index.php/adc/sort/sortadd"><i class="fa fa-circle-o"></i> 新增类别</a></li>
            <li><a href="/index.php/adc/sort/sortlist"><i class="fa fa-circle-o"></i> 类别列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="/index.php/adc/comment/commentlist">
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
            <li><a href="/index.php/adc/set/basicset"><i class="fa fa-circle-o"></i> 基本设置</a></li>
            <li><a href="/index.php/adc/set/personalset"><i class="fa fa-circle-o"></i> 个人设置</a></li>
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
<link rel="stylesheet" href="/Public/adc/plugins/datatables/dataTables.bootstrap.css">
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
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">文章列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>标题</th>
                  <th>分类</th>
                  <th>作者</th>
                  <th>时间</th>
                  <th>评论</th>
                  <th>阅读</th>
                  <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
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
<script src="/Public/adc/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/Public/adc/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public/adc/dist/js/app.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/Public/adc/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="/Public/adc/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/Public/adc/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/Public/layer/layer.js"></script>
<script type="text/javascript">
  var dataTablesnews = $('#example2').DataTable({
      language: {
          url: '/Public/adc/plugins/datatables/Chinese.json'
      },
      serverSide: true, // 是否开启服务器模式
      sAjaxSource:'/index.php/adc/news/getNewsList',
      paging: true,  //是否开启本地分页
      lengthChange: true, // 是否允许用户改变表格每页显示的记录数
      searching: true, //是否允许Datatables开启本地搜索
      info: true, // 控制是否显示表格左下角的信息
      order:[3], //默认排序

      aoColumns: [
          { "mData": "title" },
          { "mData": "sortname" },
          { "mData": "nickname" },
          { "mData": "date" },
          { "mData": "comnum" },
          { "mData": "views" }
      ],
      "aoColumnDefs":[
          {
              "aTargets": [6],
              "mRender": function (data,type,full) {
                  return '<i class="fa fa-edit btn"  onclick="edit(' + full.gid + ')"></i><i class="fa fa-trash-o btn" onclick="del(' + full.gid + ')"></i>';
              },
              "orderable":false
          }
      ]
  });

  // 编辑
  function edit(gid)
  {
    location.href='/index.php/adc/news/newsedit?gid=' + gid;
  }

  // 删除
  function del(gid)
  {
    layer.confirm('您确定要删除此文章吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
      $.ajax({
          url : "/index.php/adc/news/newsDel",
          type : "post",
          dataType : "json",
          data: {gid:gid},
          success : function(data) {
              if(data.result == 'success') {
                  layer.closeAll();
                  dataTablesnews.draw( false );
              }
              else {
                  layer.msg(data.msg);
              }
          }
      });
    });
  }
</script>
</body>
</html>
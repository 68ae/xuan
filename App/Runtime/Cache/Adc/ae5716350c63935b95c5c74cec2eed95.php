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
  <!-- <link rel="stylesheet" href="/public/adc/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
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
<body>
    <div id="wrapper">

          <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
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
            <li><a href="/adc/news/add"><i class="fa fa-circle-o"></i> 新增文章</a></li>
            <li><a href="/adc/news/list"><i class="fa fa-circle-o"></i> 文章列表</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
        <!-- /.navbar-static-side -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">文章管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            新增文章
                        </div>
                        <!-- /.panel-heading -->
                        <form class="panel-body" onclick="return false;">
                            <div role="form" class="col-lg-12">
                                <div class="form-group">
                                    <label>标题</label>
                                    <input class="form-control" placeholder="请输入标题" id="title" required="required">
                                </div>
                            </div>
                            <div role="form" class="col-lg-12">
                                <div class="form-group">
                                    <label>内容</label>
                                    <script id="content" name="content" type="text/plain"></script>
                                </div>
                            </div>
                            <div role="form" class="col-lg-4">
                                <div class="form-group">
                                    <label>标签</label>
                                    <input class="form-control" placeholder="文章标签，逗号或空格分隔，过多的标签会影响系统运行效率" id="tag">
                                </div>
                            </div>
                            <div role="form" class="col-lg-4">
                                <div class="form-group">
                                    <label>分类</label>
                                    <select class="form-control" id="sort">
                                        <option value="-1">请选择</option>
                                        <?php if(is_array($sorts)): foreach($sorts as $key=>$sort): if($sort["pid"] == 0): ?><option value="<?php echo ($sort["sid"]); ?>"><?php echo ($sort["sortname"]); ?></option>
                                                <?php if(is_array($sorts)): foreach($sorts as $key=>$tt): if($sort['sid'] == $tt['pid']): ?><option value="<?php echo ($tt["sid"]); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($tt["sortname"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div role="form" class="col-lg-4">
                                <div class="form-group">
                                    <label>发布时间</label>
                                    <input class="form-control" id="date" value="<?php echo date('Y-m-d H:i:s');?>">
                                </div>
                            </div>

                            <div role="form" class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">高级选项</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div role="form" class="col-lg-12">
                                                <div class="form-group">
                                                    <label>文章摘要</label>
                                                    <textarea class="form-control" rows="3" id="excerpt"></textarea>
                                                </div>
                                            </div>

                                            <div role="form" class="col-lg-4">
                                                <div class="form-group">
                                                    <input class="form-control" id="password" placeholder="文章访问密码:不设置,请留空.">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="y" id="top">文章置顶
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="y" id="sortop">分类置顶
                                                    </label>
                                                    <label class="checkbox-inline" value="y">
                                                        <input type="checkbox" value="y" id="allow_remark" checked="checked">允许评论
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="form" class="col-lg-12">
                                <button type="submit" class="btn btn-outline btn-primary" onclick="saveAdd()">提交</button>
                                <button type="reset" class="btn btn-outline btn-default" onclick="javascript:history.go(-1);">取消</button>
                            </div>
                        </form>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/adc/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Public/adc/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/Public/adc/dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <!-- 配置文件 -->
    <script type="text/javascript" src="/Public/adc/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/adc/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content',{
            initialFrameHeight: 260
        });
    </script>
    <script type="text/javascript">
    function saveAdd()
    {
        var title = $('#title').val();
        var content = ue.getContent();
        var tag = $('#tag').val();
        var sort = $('#sort').val();
        var date = $('#date').val();
        var excerpt = $('#excerpt').val();
        var password = $('#password').val();
        var top = $('#top').is(":checked") ? 'y':'';
        var sortop = $('#sortop').is(":checked") ? 'y':'';
        var allow_remark = $('#allow_remark').is(":checked") ? 'y':'';
        var params = {title:title, content:content, tag:tag, sort:sort, date:date, excerpt:excerpt, password:password, top:top, sortop:sortop, allow_remark:allow_remark};
        console.log(params);
    }
    </script>
</body>

</html>
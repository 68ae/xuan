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
<!-- DataTables CSS -->
<link href="/Public/adc/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="/Public/adc/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<body>
    <div id="wrapper">

        <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="/adc">后台管理</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
            <li><a href="/user"><i class="fa fa-user fa-fw"></i> 个人中心</a>
                </li>
                <li><a href="/set"><i class="fa fa-gear fa-fw"></i> 设置</a>
                </li>
                <li class="divider"></li>
                <li><a href="/adc/login"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="搜索">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="/adc"><i class="fa fa-dashboard fa-fw"></i> 首页</a>
                </li>
                <li>
                    <a href="javascript"><i class="glyphicon glyphicon-list-alt"></i> 文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/adc/news/add">新增文章</a>
                        </li>
                        <li>
                            <a href="/adc/news/list">文章列表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            文章列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables_news">
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
    <script src="/Public/adc/vendor/datatables/js/jquery.dataTables.js"></script>
    <script src="/Public/adc/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script>
    // 表格数据
    var dataTables_news = $('#dataTables_news').DataTable({
        "sAjaxSource":'/adc/news/getNewsList',
        "aoColumns": [
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
                    return '<i class="fa fa-edit btn" ></i><i class="fa fa-trash-o btn" onclick="deviceApproval(' + full.gid + ')"></i>';
                },
                "orderable":false
            }
        ]
    });
    </script>
</body>

</html>
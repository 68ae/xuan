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
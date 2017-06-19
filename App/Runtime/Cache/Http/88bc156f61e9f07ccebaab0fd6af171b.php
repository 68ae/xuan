<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>程选网,首页</title>
  <meta name="description" content="程选网,程选工作室,软件开发,网站开发,自助建站,企业建站,免费建站,程选个人网站,程选个人网站,博客,学习,网站建设">
  <meta name="keywords" content="程选网,程选工作室,软件开发,网站开发,自助建站,企业建站,免费建站,程选个人网站,程选个人网站,程选官方网站">
  <meta name="generator" content="ChengX 1.0">
  <meta name="template" content="chengx_theme">
  <link href="/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="/Public/http/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Public/http/css/material.min.css">
  <link rel="stylesheet" href="/Public/http/css/customs.css">
</head>
<body>
  <header>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <!-- <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="logo" href="http://chengxuan.wang/">ChengX 的博客</a>
        </div> -->
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://chengxuan.wang/"><!-- <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> --> ChengX 的博客</a></li>
            <li><a href="#" title="女人哪些事">女人哪些事</a></li>
            <li><a href="#" title="天天爱美食">天天爱美食</a></li>
            <li><a href="#" title="长生汤">长生汤</a></li>
            <li><a href="#" title="留言板">留言板</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://chengxuan/adc/login.php">登录</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <section class="billboard">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="intro animate fadeIn">
           <h1></h1>
           <p class="lead"></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
      <!-- 列表循环 -->
      <?php if(is_array($blogs)): foreach($blogs as $k=>$blog): ?><div class="panel panel-default">
          <div class="panel-body">
            <h3 class="post-title"><a href="http://chengxuan.wang/"><?php echo ($blog['title']); ?></a></h3>
            <div class="post-meta">
              <span>作者：<a href="http://chengxuan.wang/"><?php echo ($blog['nickname']); ?></a> | </span>
              <span>时间：<?php echo ($blog['date']); ?> | </span>
              <span>分类：<a href="http://chengxuan.wang/"><?php echo ($blog['sortname']); ?></a> | </span>
              <span>评论：<a href="http://chengxuan.wang/"><?php echo ($blog['comnum']); ?> 评论</a> </span>
              <?php if('y' == $blog['top']){?>
              <code>置顶</code>
              <?php }?>
            </div>
            <div class="post-content">
              <p>
                <?php if('' == $blog['excerpt']){echo $blog['content'];}else{echo $blog['excerpt'];}?>
              </p>
              <p><a href="" class="btn btn-info">继续阅读 »</a></p>
            </div>
          </div>
        </div><?php endforeach; endif; ?>
          <ol class="page-navigator">
            <?php echo ($page); ?>
            <!-- <li><a href="http://chengxuan.wang/page/2/">2</a></li>
            <li><a href="http://chengxuan.wang/page/3/">3</a></li>
            <li><a href="http://chengxuan.wang/page/4/">4</a></li>
            <li><a href="http://chengxuan.wang/page/7/">7</a></li>
            <li class="next"><a href="http://chengxuan.wang/page/2/">下一页 &gt;&gt;</a></li> -->
          </ol>
      </div>

      <div class="col-md-3">
  <form method="post" action="http://chengxuan.wang" class="panel-body">
    <div class="input-group">
      <div class="form-control-wrapper">
        <div class="form-control-wrapper"><input type="text" name="s" class="form-control empty" size="32"><div class="floating-label">搜索</div><span class="material-input"></span></div>
      </div>
      <span class="input-group-btn">
          <button class="btn btn-primary btn-fab btn-raised mdi-action-search" value="" id="search-btn" type="submit"></button>
      </span>
    </div>
  </form>

  <div class="panel panel-info">
      <a class="panel-heading" onclick="$('.recent_posts_box').slideToggle()" href="javascript:;">
          <h3 class="panel-title">最新文章</h3>
      </a>
      <div class="recent_posts_box">
         <a href="http://chengxuan.wang/archives/168/" class="item">江湖</a>
      </div>
  </div>

</div>
        </div>
  </div>
  <footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="pull-left copyright">Copyright © 2017&nbsp;ChengX</div>
        <ul class="footer-nav pull-right">
          <li>Powered by <a href="#" rel="nofollow">ChengX</a></li>
          <!-- <li>Optimized by <a href="#">HanSon</a></li> -->

                    <li><a href="#" rel="nofollow">备案号</a></li>
          
                  </ul>
      </div>
    </div>
  </footer>
  <script src="/Public/http/js/jquery-2.1.4.min.js"></script>
  <script src="/Public/http/js/bootstrap.min.js"></script>
  <script src="/Public/http/js/material.min.js"></script>
  <script src="/Public/http/js/ripples.min.js"></script>
  <script src="/Public/http/js/jquery.scrollUp.min.js"></script>
  <script type="text/javascript">
  $.material.init();
  $.scrollUp({
  scrollImg: true,
  scrollText: "回顶部"
  });
  $('#scrollUp').addClass('btn btn-info btn-fab btn-raised mdi-navigation-expand-less');
  </script>
  <a id="scrollUp" href="#top" class="btn btn-info btn-fab btn-raised mdi-navigation-expand-less" style="display: none; position: fixed; z-index: 2147483647;"></a> 
</body>
<script type="text/javascript">
    window.onblur = function() {
        // 发呆- ( ゜- ゜)つロ 
        document.title = "你瞅啥？( ͡° ͜ʖ ͡°)╯";
    window.onfocus = function() {
        document.title = "程选网，首页";
     }
    };
</script>
</html>
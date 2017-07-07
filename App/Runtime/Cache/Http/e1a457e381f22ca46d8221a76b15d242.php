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
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">ChengX</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="logo" href="/">ChengX 的博客</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/"> ChengX 的博客</a></li>
            <li><a href="/http/index?sid=8" title="女人哪些事">女人哪些事</a></li>
            <li><a href="/http/index?sid=15" title="天天爱美食">天天爱美食</a></li>
            <li><a href="/http/index?sid=11" title="长生汤">长生汤</a></li>
            <li><a href="/http/index?sid=9" title="长生汤">教育&文学</a></li>
            <li><a href="/http/index?sid=14" title="长生汤">数据库相关</a></li>
            <li><a href="/http/index?sid=16" title="长生汤">JAVA学习</a></li>
            <li><a href="/http/index?sid=12" title="长生汤">轻松一刻</a></li>
            <!-- <li><a href="#" title="留言板">留言板</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/adc">登录</a></li>
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
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="post-title"><a href=""><?php echo ($blog['title']); ?></a></h3>
            <div class="post-meta">
              <span>作者：<a href="/"><?php echo ($blog['nickname']); ?></a> | </span>
              <span>时间：<?php echo ($blog['date']); ?> | </span>
              <span>分类：<a href="/"><?php echo ($blog['sortname']); ?></a> | </span>
              <span>评论：<a href="/"><?php echo ($blog['comnum']); ?> 评论</a> | </span>
              <span>浏览：<?php echo ($blog['views']); ?> </span>
              <?php if('y' == $blog['top']){?>
                | <code>置顶</code>
              <?php }?>
            </div>
            <div class="post-content">
              <p>
                <?php echo ($blog['content']); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-3">
  <form method="post" action="" class="panel-body">
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
          <?php if(is_array($newBlogs)): foreach($newBlogs as $k=>$newBlog): ?><a href="/http/page?gid=<?php echo ($newBlog['gid']); ?>" class="item"><?php echo ($newBlog['title']); ?></a><?php endforeach; endif; ?>
      </div>
  </div>

  <div class="panel panel-info">
      <a class="panel-heading" onclick="$('.comments_box').slideToggle()" href="javascript:;">
          <h3 class="panel-title">最新回复</h3>
      </a>
      <div class="comments_box">
          <?php if(is_array($comments)): foreach($comments as $k=>$comment): ?><a href="/http/page?gid=<?php echo ($comment['gid']); ?>" class="item"><?php echo ($comment['poster']); ?>:<?php echo ($comment['comment']); ?></a><?php endforeach; endif; ?>
      </div>
  </div>
  
  <div class="panel panel-info">
      <a class="panel-heading" onclick="$('.friend_link').slideToggle()" href="javascript:;">
          <h3 class="panel-title">友情链接</h3>
      </a>
      <div class="friend_link">
          <?php if(is_array($links)): foreach($links as $k=>$link): ?><a href="<?php echo ($link['siteurl']); ?>" class="item" title="<?php echo ($link['description']); ?>"><?php echo ($link['sitename']); ?></a><?php endforeach; endif; ?>
      </div>
  </div>

</div>
    </div>
  </div>
    <script src="/Public/http/js/jquery-2.1.4.min.js"></script>
  <script src="/Public/http/js/ripples.min.js"></script>
  <script src="/Public/http/js/bootstrap.min.js"></script>
  <script src="/Public/http/js/material.min.js"></script>
  <script src="/Public/http/js/jquery.scrollUp.min.js"></script>
  <script src="/public/layer/layer.js"></script>
  <footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="pull-left copyright">Copyright © 2017&nbsp;ChengX</div>
        <ul class="footer-nav pull-right">
          <li>Powered by <a href="http://www.chengxuan.wang" rel="nofollow" target="new">ChengX</a></li>
          <li><a href="http://www.miibeian.gov.cn" rel="nofollow" target="new">京ICP备14058139号-3</a></li>
          <li><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254150279'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254150279%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></li>
          <li><a href="javascript:void(0);" onclick="exemption()" id="exemption" title="我们尊重原创，本网站部分文章来源或改编自互联网或公众平台，主要目的在于分享信息，版权归原作者所有，如有侵犯您的权益或版权，请及时告知我们，我们及时删除。(联系方式：admin@68ae.com)">免责声明</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script type="text/javascript">
  $.material.init();
  $.scrollUp({
  scrollImg: true,
  scrollText: "回顶部"
  });
  $('#scrollUp').addClass('btn btn-info btn-fab btn-raised mdi-navigation-expand-less');

  // 免责声明
  function exemption()
  {
    layer.msg('我们尊重原创，本网站部分文章来源或改编自互联网或公众平台，主要目的在于分享信息，版权归原作者所有，如有侵犯您的权益或版权，请及时告知我们，我们及时删除。(联系方式：admin@68ae.com)');
  }
  </script>
  <a id="scrollUp" href="#top" class="btn btn-info btn-fab btn-raised mdi-navigation-expand-less" style="display: none; position: fixed; z-index: 2147483647;"></a> 
</body>
</html>
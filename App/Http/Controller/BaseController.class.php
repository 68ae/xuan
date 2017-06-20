<?php
namespace Http\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize()
    {
        // 网站基本资料读取
        $options = M('Options')
                 ->select();

        // 右侧的最新文章
        $newBlogs = M('Blog')
        ->field('gid, title')
        ->order('date desc')
        ->limit(8)->select();
        // 右侧的最新评论
        $comments = M('Comment')
        ->field('gid, comment, poster')
        ->order('date desc')
        ->limit(6)->select();
        // 右侧的友情链接
        $links = M('Link')
        ->field('sitename, siteurl, description')
        ->where('hide=\'n\'')
        ->order('taxis asc')
        ->limit(6)->select();

        // 分配常用数据
        $assign=array(
            'newBlogs'  =>  $newBlogs,
            'comments'  =>  $comments,
            'links'     =>  $links,
            'options'   =>  $options
            );
        $this->assign($assign);
    }
}
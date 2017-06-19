<?php
namespace Http\Controller;
// use Http\Controller\BaseController;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $Blog = M('Blog'); // 实例化User对象
        $count      = $Blog
                    ->alias('a')
                    ->field('a.gid, a.title, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, b.nickname, c.sortname')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                    ->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count, C('PAGE'));// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $page       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $blogs = $Blog
               ->alias('a')
               ->field('a.gid, a.title, a.content, a.excerpt, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, a.top, b.nickname, c.sortname')
               ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
               ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
               ->order('top desc, date desc')
               ->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('blogs',$blogs);// 赋值数据集
        $this->assign('page', $page);// 赋值分页输出
        $this->display(); // 输出模板
    }
}
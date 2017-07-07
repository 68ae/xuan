<?php
namespace Http\Controller;
use Http\Controller\BaseController;

class PageController extends BaseController {
    public function Index(){
        $gid = I('gid', '');
        $Blog   = M('Blog');
        $blog   = $Blog
                ->alias('a')
                ->field('a.gid, a.title, a.content, a.excerpt, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, a.top, b.nickname, c.sortname')
                ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                ->where('gid = ' . $gid)
                ->find();
        $this->assign('blog',$blog);// 赋值数据集

        $this->display(); // 输出模板
    }
}
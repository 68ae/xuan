<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class NewsController extends BaseController {
    /*
        文章列表
    */
    public function list(){
        $this->display('list');
    }

    /*
        获取文章列表
    */
    public function getNewsList(){
        $userInfo = M('Blog')
                    ->alias('a')
                    ->field('a.gid, a.title, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, b.nickname, c.sortname')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                    ->select();
        $this->ajaxReturn(array('data' => $userInfo));
    }

    /*
        新建文章
    */
    public function add(){
        $sorts = M('Sort')->select();
        $this->assign('sorts', $sorts);
        $this->display('add');
    }
}
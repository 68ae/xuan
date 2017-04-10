<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class NewsController extends BaseController {
    /*
        文章列表
    */
    public function newsList(){
        $this->display('list');
    }

    /*
        获取文章列表
    */
    public function getNewsList()
    {
        $sEcho = I('sEcho', 0); 
        // $start = I('iDisplayStart'); //显示的起始索引
        // $length = I('iDisplayLength');//显示的行数
        // $sort_th = I('iSortCol_0');//被排序的列
        // $sort_type = I('sSortDir_0');//排序的方向 "desc" 或者 "asc". 
        // $search = I('sSearch'); 
        // $sort_key = '';
        // if($sort_th==0){//类目
        //     $sort_key = 'a.name';
        // }else if($sort_th==1){
        //     $sort_key = 'a.cityid';
        // }else if($sort_th==2){
        //     $sort_key = 'a.longitude';
        // }else if($sort_th==3){
        //     $sort_key = 'a.latitude';
        // }else if($sort_th==4){
        //     $sort_key = 'a.describe';
        // }else if($sort_th==5){
        //     $sort_key = 'a.address';
        // }else{
        //     $sort_key = 'a.created_at';
        //     $sort_type = 'desc';
        // }

        $userInfo = M('Blog')
                    ->alias('a')
                    ->field('a.gid, a.title, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, b.nickname, c.sortname')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                    ->select();
        $count = M('Blog')
                    ->alias('a')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                    ->count();

        $this->ajaxReturn(array('draw' => $sEcho, 'recordsTotal' =>$count ,'recordsFiltered'=>$count,'data' => $userInfo));
    }

    /*
        新建文章
    */
    public function newsAdd(){
        $sorts = M('Sort')->select();
        $this->assign('sorts', $sorts);
        $this->display('add');
    }
}
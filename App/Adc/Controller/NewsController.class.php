<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class NewsController extends BaseController {
    /*
        文章列表
    */
    public function newsList()
    {
        $this->display('list');
    }

    /*
        获取文章列表
    */
    public function getNewsList()
    {
        $sEcho = I('sEcho', int, 0); 
        $start = I('iDisplayStart'); //显示的起始索引
        $length = I('iDisplayLength');//显示的行数
        $sort_th = I('iSortCol_0');//被排序的列
        $sort_type = I('sSortDir_0', 'desc');//排序的方向 "desc" 或者 "asc". 
        $search = I('sSearch', ''); 

        if($sort_th==0){//类目
            $sort_key = 'a.title ';
        }else if($sort_th==1){
            $sort_key = 'c.sortname ';
        }else if($sort_th==2){
            $sort_key = 'b.nickname ';
        }else if($sort_th==3){
            $sort_key = 'a.date ';
        }else if($sort_th==4){
            $sort_key = 'a.comnum ';
        }else if($sort_th==5){
            $sort_key = 'a.views ';
        }else{
            $sort_key = 'a.gid ';
        }

        $userInfo = M('Blog')
                    ->alias('a')
                    ->field('a.gid, a.title, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date, a.type, a.comnum, a.views, b.nickname, c.sortname')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid')
                    ->limit($start,$length)
                    ->order($sort_key . $sort_type);
        if('' != $search || NULL != $search)
        {
            $userInfo = $userInfo->where("a.title like '%{$search}%' ");
        }
        $userInfo = $userInfo->select();

        $count = M('Blog')
                    ->alias('a')
                    ->join('LEFT JOIN __USER__ b ON a.author = b.uid')
                    ->join('LEFT JOIN __SORT__ c ON a.sortid = c.sid');
        if('' != $search || NULL != $search)
        {
            $count = $count->where("a.title like '%{$search}%' ");
        }
        $count = $count->count();

        $this->ajaxReturn(array('draw' => $sEcho, 'recordsTotal' =>$count, 'recordsFiltered'=>$count, 'data' => $userInfo));
    }

    /*
        新建文章
    */
    public function newsAdd()
    {
        $sorts = M('Sort')->select();
        $this->assign('sorts', $sorts);
        $this->display('add');
    }

    /*
        新建文章保存
    */
    public function newsAddSave()
    {
        $data['title'] = I('title');
        $data['content'] = I('content');
        $data['tag'] = I('tag');
        $data['sortid'] = I('sort');
        $data['date'] = strtotime(I('date'));
        $data['excerpt'] = I('excerpt');
        $data['password'] = I('password');
        $data['top'] = I('top');
        $data['sortop'] = I('sortop');
        $data['allow_remark'] = I('allow_remark');
        $data['type'] = 'bolg';
        $data['author'] = session('userInfo.uid');
        
        
        $blog = M('Blog');
        $sql = $blog->fetchSql(true)->add($data);
        echo strtotime($data['date']);

        $this->ajaxReturn(array('result' => 'success1', 'msg' => '失败了'));
    }


}
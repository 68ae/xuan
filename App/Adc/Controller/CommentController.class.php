<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class CommentController extends BaseController {
    /*
        类别列表
    */
    public function commentList()
    {
        $this->display('list');
    }

    /*
        获取类别列表
    */
    public function getCommentList()
    {
        $sEcho = I('sEcho', int, 0); 
        $start = I('iDisplayStart'); //显示的起始索引
        $length = I('iDisplayLength');//显示的行数
        $sort_th = I('iSortCol_0', -1);//被排序的列
        $sort_type = I('sSortDir_0', 'desc');//排序的方向 "desc" 或者 "asc". 
        $search = I('sSearch', ''); 

        if(0 == $sort_th){//类目
            $sort_key = 'a.sortname ';
        }else if(1 == $sort_th){
            $sort_key = 'a.alias ';
        }else if(2 == $sort_th){
            $sort_key = 'a.taxis ';
        }else if(3 == $sort_th){
            $sort_key = 'a.description ';
        }else{
            $sort_key = 'a.cid ';
        }

        $comment = M('Comment')
                    ->alias('a')
                    ->field('a.cid, a.comment, a.poster, b.title as blogname, a.ip, FROM_UNIXTIME(a.date, "%Y-%m-%d %H:%i:%S") as date')
                    ->join('LEFT JOIN __BLOG__ b ON a.gid = b.gid')
                    ->limit($start,$length)
                    ->order($sort_key . $sort_type);

        if('' != $search || NULL != $search)
        {
            $comment = $comment->where("a.comment like '%{$search}%' ");
        }
        $comment = $comment->select();

        $count = M('Comment')
                    ->alias('a')
                    ->join('LEFT JOIN __BLOG__ b ON a.gid = b.gid');
        if('' != $search || NULL != $search)
        {
            $count = $count->where("a.comment like '%{$search}%' ");
        }
        $count = $count->count();

        $this->ajaxReturn(array('draw' => $sEcho, 'recordsTotal' =>$count, 'recordsFiltered'=>$count, 'data' => $comment));
    }

    /*
        修改评论
    */
    public function commentEdit()
    {
        $cid = I('cid');
        $comment = M('Comment');
        $comment = $comment->find($cid);
        $this->assign('comment', $comment);
        $this->assign('cid', $cid);
        $this->display('edit');
    }

    /*
        评论修改
    */
    public function commentEditSave()
    {
        $cid = I('cid');
        $data['sortname'] = I('sortname');
        $data['alias'] = I('alias');
        $data['taxis'] = I('taxis');
        $data['pid'] = I('pid');
        $data['description'] = I('description');

        $sort = M('Comment');
        $flag = $sort->where('cid='.$cid)->save($data);
        if($flag)
        {
            $this->ajaxReturn(array('result' => 'success'));
        }
        else
        {
            $this->ajaxReturn(array('result' => 'false', 'msg' => '类别修改失败！'));
        }
    }

    /*
        删除类别
    */
    public function commentDel()
    {
        $cid = I('cid');
        $comment = M('Comment');
        $flag = $comment->delete($cid);
        if($flag)
        {
            $this->ajaxReturn(array('result' => 'success'));
        }
        else
        {
            $this->ajaxReturn(array('result' => 'false', 'msg' => '评论删除失败！'));
        }
    }
}
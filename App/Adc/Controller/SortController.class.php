<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class SortController extends BaseController {
    /*
        类别列表
    */
    public function sortList()
    {
        $this->display('list');
    }

    /*
        获取类别列表
    */
    public function getSortList()
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
            $sort_key = 'a.sid ';
        }

        $sort = M('Sort')
                    ->alias('a')
                    ->field('a.sid, a.sortname, a.alias, a.taxis, a.description')
                    ->limit($start,$length)
                    ->order($sort_key . $sort_type);

        if('' != $search || NULL != $search)
        {
            $sort = $sort->where("a.sortname like '%{$search}%' ");
        }
        $sort = $sort->select();

        $count = M('Sort')
                    ->alias('a');
        if('' != $search || NULL != $search)
        {
            $count = $count->where("a.sortname like '%{$search}%' ");
        }
        $count = $count->count();

        $this->ajaxReturn(array('draw' => $sEcho, 'recordsTotal' =>$count, 'recordsFiltered'=>$count, 'data' => $sort));
    }

    /*
        新建类别
    */
    public function sortAdd()
    {
        $sorts = M('Sort')->select();
        $this->assign('sorts', $sorts);
        $this->display('add');
    }

    /*
        新建类别保存
    */
    public function sortAddSave()
    {
        $data['sortname'] = I('sortname');
        $data['alias'] = I('alias');
        $data['taxis'] = I('taxis');
        $data['pid'] = I('pid');
        $data['description'] = I('description');

        $sort = M('Sort');
        $flag = $sort->add($data);
        if($flag)
        {
            $this->ajaxReturn(array('result' => 'success'));
        }
        else
        {
            $this->ajaxReturn(array('result' => 'false', 'msg' => '类别添加失败！'));
        }
    }

    /*
        修改类别
    */
    public function sortEdit()
    {
        $sid = I('sid');
        $sort = M('Sort');
        $sorts = $sort->select();
        $sort = $sort->find($sid);
        $this->assign('sorts', $sorts);
        $this->assign('sort', $sort);
        $this->assign('sid', $sid);
        $this->display('edit');
    }

    /*
        类别修改
    */
    public function sortEditSave()
    {
        $sid = I('sid');
        $data['sortname'] = I('sortname');
        $data['alias'] = I('alias');
        $data['taxis'] = I('taxis');
        $data['pid'] = I('pid');
        $data['description'] = I('description');

        $sort = M('Sort');
        $flag = $sort->where('sid='.$sid)->save($data);
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
    public function sortDel()
    {
        $sid = I('sid');
        $sort = M('Sort');
        $flag = $sort->delete($sid);
        if($flag)
        {
            $this->ajaxReturn(array('result' => 'success'));
        }
        else
        {
            $this->ajaxReturn(array('result' => 'false', 'msg' => '类别删除失败！'));
        }
    }
}
<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
        function convert($size){
            $unit=array('B','KB','MB','GB','TB','PB');
            return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
        }
        $blogs = M('Blog')->count();
        $comments = M('Comment')->count();
        $users = M('User')->count();
        $this->assign('memory', convert(memory_get_usage(true)));
        $this->assign('blogs', $blogs);
        $this->assign('comments', $comments);
        $this->assign('users', $users);
        $this->display('index');
    }
}
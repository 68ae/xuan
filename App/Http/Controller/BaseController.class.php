<?php
namespace Http\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
//         if(!session('?userInfo'))
//         {
//             $this->redirect('/adc/login/index');
//             exit();
//         }
    }
}
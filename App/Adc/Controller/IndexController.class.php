<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
        $this->display('index');
    }
}
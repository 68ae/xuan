<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class LoginController extends BaseController {
    public function index(){
        $this->display('login');
    }
}
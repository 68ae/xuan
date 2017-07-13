<?php
namespace Adc\Controller;
use Think\Controller;
class LoginController extends Controller {

    // 登录页面
    public function index()
    {
        $this->display('login');
    }

    /*
        验证登录
    */
    public function checkLogin()
    {
        $username = safeSql($_POST["username"]);
        $password = $_POST["password"];
        if(NULL != $username)
        {
            $userInfo=M('User')->where("username ='{$username}'")->find();
            if (NULL == $userInfo)
            {
                $this->ajaxReturn(array('status' => 'failed', 'reason' => '没有本用户！'));
            }
            else
            {
                $adcname     = $userInfo[username];
                $adcpassword = $userInfo[password];
                // 加密
                $check = \password_verify($password, $adcpassword);
                if (!$check)
                {
                    $this->ajaxReturn(array('status' => 'failed', 'reason' => '密码不正确！'));
                }
                else
                {
                    session('userInfo',$userInfo);
                    $this->ajaxReturn(array('status' => 'success'));
                }
            }
        }
    }

    /*
        退出
    */
    public function logout()
    {
        session('userInfo',null);
        $this->redirect('/adc/login/index');
    }
}
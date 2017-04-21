<?php
namespace Adc\Controller;
use Adc\Controller\BaseController;
class SetController extends BaseController {

    /*
        基本设置
    */
    public function basicSet()
    {
        $data['option_name'] = array('IN',array('blogname', 'bloginfo', 'site_title', 'site_description', 'site_key', 'blogurl', 'icp', 'footer_info'));
        $options = M('Options')
                    ->where($data)
                    ->select();
        
        foreach ($options as $value) {
            $optionArr[$value['option_name']] = $value['option_value'];
        }
        $this->assign('optionArr', $optionArr);
        $this->display('basicset');
    }

    /*
        基本设置保存
    */
    public function basicSetSave()
    {
        $data['blogname'] = I('blogname');
        $data['bloginfo'] = I('bloginfo');
        $data['site_title'] = I('site_title');
        $data['site_description'] = I('site_description');
        $data['site_key'] = I('site_key');
        $data['blogurl'] = I('blogurl');
        $data['icp'] = I('icp');
        $data['footer_info'] = htmlspecialchars_decode(I('footer_info'));

        $options = M('Options');
        foreach ($data as $option_name => $option_value)
        {
            $value['option_value'] = $option_value;
            $options->where('option_name=\'' . $option_name . '\'')->save($value);
        }

        $this->ajaxReturn(array('result' => 'success', 'msg' => '保存成功！'));

    }

}
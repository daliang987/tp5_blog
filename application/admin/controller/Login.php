<?php

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use app\common\model\Admin;

class Login extends Controller{

    public function index(){

        return $this->fetch();
    }


    public function vcode(){
        $config=[
            'codeSet'=>'1234567890',
            'length' =>4,
            'useNoise' => false,
            'imageH' => 35,
            'imageW' => 150,
            'fontSize' => 20,
            'useCurve' => true,
        ];

        $captcha=new Captcha($config);
        return $captcha->entry();
    }


    public function login(){
        // halt(request());
        if(request()->isPost()){
            $result=(new Admin())->login(input('post.'));
            if($result['valid']){
                $this->redirect('admin/index/index');
            }else{
                $this->error($result['msg']);exit;
            }
        }
    }


    public function logout(){
        session(null);
        $this->redirect('index');
    }
}
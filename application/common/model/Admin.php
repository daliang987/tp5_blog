<?php

namespace app\common\model;

use think\Model;
use think\Loader;
use think\Validate;

class Admin extends Model
{
    protected $pk='admin_id';

    protected $table='blog_admin';

    public function login($data){
        $validate=Loader::validate('Admin');
        if(!$validate->check($data)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }

        $userinfo=$this->where('admin_username',$data['admin_username'])->where('admin_password',md5($data['admin_password']))->find();
        // halt($userinfo);
        if(!$userinfo){
            return ['valid'=>0,'msg'=>'用户名或密码不正确'];
        }

        session('admin.admin_id',$userinfo['admin_id']);
        session('admin.admin_username',$userinfo['admin_username']);

        return ['valid'=>1,'msg'=>'登录成功'];
    }


    public function pass($data){

        $validate = new Validate([
            'admin_password' => 'require',
            'admin_newpass' => 'require',
            'confirm_newpass' => 'require|confirm:admin_newpass',
        ],[
            'admin_password.require' => '请输入原始密码',
            'admin_newpass.require' => '请输入新密码',
            'confirm_newpass.require' => '确认新密码不能为空',
            'confirm_newpass.confirm' => '两次密码输入不一致',
        ]);

        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>($validate->getError())];
        }

        $userinfo=$this->where('admin_id',session('admin.admin_id'))->where('admin_password',md5($data['admin_password']))->find();
        if(!$userinfo){
            return ['valid'=>0,'msg'=>'原始密码不正确'];
        }
        // halt($userinfo);
        $res=$this->save(['admin_password'=>md5($data['admin_newpass'])],['admin_id'=>session('admin.admin_id')]);

        if($res){
            return ['valid'=>1,'msg'=>'密码修改成功'];
        }else{
            return ['valid'=>0,'msg'=>'密码修改失败'];
        }

        

    }
}

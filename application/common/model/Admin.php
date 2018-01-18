<?php

namespace app\common\model;

use think\Model;
use think\Loader;

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
}

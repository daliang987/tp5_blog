<?php

namespace app\common\validate;

use think\Validate;

class Admin extends Validate{
    protected $rule=[
        'admin_username'=>'require',
        'admin_password'=>'require',
        'vcode'=>'require|captcha'
    ];

    protected $message=[
        'admin_username.require'=>'用户名不能为空',
        'admin_password.require'=>' 密码不能为空',
        'vcode.require'=>'请填写验证码',
        'vcode.captha'=>'验证码错误'
    ];

}

?>
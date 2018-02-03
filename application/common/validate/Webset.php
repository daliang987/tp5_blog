<?php
namespace app\common\validate;

use think\Validate;

class Webset extends Validate{

    protected $rule=[
        'webset_name'=>'require',
        'webset_value'=>'require',
    ];

    protected $message=[
        'webset_name.require'=>'网站设置名称不能为空',
        'webset_value.require'=>'网站设置参数值不能为空',
    ];
}
<?php

namespace app\common\validate;

use think\Validate;

class Tag extends Validate{
    protected $rule=[
        'tag_name'=>'require'
    ];

    protected $message=[
        'tag_name.require'=>'标签名称不能为空'
    ];
}
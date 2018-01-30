<?php

namespace app\common\validate;
use think\Validate;

class Link extends Validate{

    protected $rule=[
        'link_name'=>'require',
        'link_url'=>'require|url',
        'link_sort'=>'require|number|between:1,9999',
    ];

    protected $message=[
        'link_name.require'=>'友链名称必须填写',
        'link_url.require'=>'友链地址必须填写',
        'link_url.url'=>'友链地址格式不正确',
        'link_sort.require'=>'友链排序必须填写',
        'link_sort.number'=>'友链排序必须是数字',
        'link_sort.between'=>'友链排序必须在1-9999之间',
    ];
}
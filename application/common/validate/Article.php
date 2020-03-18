<?php

namespace app\common\validate;
use think\Validate;

class Article extends Validate{

    protected $rule=[
        'arc_title'=>'require',
        'arc_author'=>'require',
        'arc_sort'=>'require|number|between:1,99999',
        'cate_id'=>'require|notIn:0',
        // 'arc_thumb'=>'require',
        'arc_digist'=>'require',
        'arc_content'=>'require'
    ];

    protected $message=[
        'arc_title.require'=>'文章标题不能为空',
        'arc_author.require'=>'文章作证不能为空',
        'arc_sort.require'=>'文章排序不能为空',
        'arc_sort.number'=>'文章排序必须为数字',
        'arc_sort.between'=>'文章排序必须在1-99999之间',
        'cate_id.require'=>'文章分类不能为空',
        'cate_id.notIn'=>'文章分类不能为空',
        // 'arc_thumb.require'=>'请上传配图不能为空',
        'arc_digist.require'=>'文章摘要不能为空',
        'arc_content.require'=>'文章内容不能为空'
    ];
}
<?php
namespace app\common\validate;

use think\Validate;

class Comment extends Validate{
    protected $rule=[
        'comment_nickname'=>'require',
        'comment_email'=>'email',
        'comment_content'=>'require',
        'comment_url' => 'url',
    ];

    protected $message=[
        'comment_nickname.require'=>'昵称必须填写',
        'comment_email.email'=>'邮箱格式不正确',
        'comment_content.require'=>'评论内容不能为空',
        'comment_url.url'=>'博客地址格式不正确',
    ];
}
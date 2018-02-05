<?php
namespace app\common\validate;

use think\Validate;

class Comment extends Validate{
    protected $rule=[
        'comment_nickname'=>'require',
        'comment_email'=>'require|email',
        'comment_content'=>'require',
    ];

    protected $message=[
        'comment_nickname.require'=>'昵称必须填写',
        'comment_email.require'=>'邮箱必须填写',
        'comment_content.require'=>'评论内容不能为空',
    ];
}
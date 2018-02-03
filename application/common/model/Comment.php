<?php
namespace app\common\model;
use think\Model;

class Comment extends Model{
    protected $pk="comment_id";
    protected $table="blog_comment";
    
}
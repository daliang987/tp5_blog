<?php
namespace app\common\model;
use think\Model;

class Comment extends Model{
    protected $pk="comment_id";
    protected $table="blog_comment";
    
    protected $insert=['create_time'];

    protected function setCreateTimeAttr($value){
        return time();
    }

    public function store($data){
       $result=$this->validate(true)->save($data);
       if($result){
            return ['valid'=>1,'msg'=>'发表评论成功'];
       }else{
            return ['valid'=>0,'msg'=>$this->getError()];
       }
    }

    public function del($cid){
        $result=$this->destroy($cid);
        if($result){
            return ['valid'=>1,'msg'=>'删除评论成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
       }
    }
}
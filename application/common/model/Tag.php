<?php

namespace app\common\model;

use think\Model;

class Tag extends Model{

    protected $pk="tag_id";
    protected $table="blog_tag";


    public function store($data){
        // halt($this->validate(true));
        $result=$this->validate(true)->save($data);
        // dump($result);
        if($result){
            return ['valid'=>1,'msg'=>'添加标签成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }


    public function edit($data){
        $result=$this->validate(true)->save($data,[$this->pk=>$data['tag_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'修改标签成功 '];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function del($tag_id){
        $result=Tag::destroy($tag_id);
        if($result){
            return ['valid'=>1,'msg'=>'删除标签成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}
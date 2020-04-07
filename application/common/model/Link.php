<?php
namespace app\common\model;

use think\Model;

class Link extends Model{

    protected $pk="link_id";
    protected $table="blog_link";

    public function getAll(){

        $data=db('link')->order('link_sort,link_id')->paginate(10);
        return $data;
    }


    public function store($data){
        
        $result=$this->validate(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'添加成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }


    public function edit($data){
        $result=$this->validate(true)->save($data,[$this->pk=>$data['link_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'修改成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function del($link_id){
        $result=Link::destroy($link_id);
        if($result){
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}
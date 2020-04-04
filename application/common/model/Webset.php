<?php
namespace app\common\model;
use think\Model;

class Webset extends Model{
    protected $pk="webset_id";
    protected $table="blog_webset";


    public function edit($data){
        $result=$this->save($data,[$this->pk=>$data['webset_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'修改配置成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];            
        }
    }

    public function store($data){
        $result=$this->validate(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'添加配置成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];            
        }
    }

    public function del($id){
        $id=input('get.webset_id');
        $result=Webset::destroy($id);
        if($result){
            return ['valid'=>1,'msg'=>'删除配置成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];            
        }
    }


}
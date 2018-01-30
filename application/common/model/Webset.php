<?php
namespace app\common\model;
use think\Model;

class Webset extends Model{
    protected $pk="webset_id";
    protected $table="blog_webset";


    public function edit($data){
        $result=$this->save(['webset_value'=>$data['webset_value']],[$this->pk=>$data['webset_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'修改配置成功'];
        }else{
            return ['valid'=>1,'msg'=>$this->getError()];            
        }
    }


}
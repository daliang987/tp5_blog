<?php

namespace app\common\model;

use think\Model;

class Article extends Model{

    protected $table='blog_article';
    protected $pk='arc_id';
    protected $auto=['admin_id'];
    protected $insert=['sendtime'];
    protected $update=['updatetime'];

    protected function setAdminIdAttr($value){
        return session('admin.admin_id');
    }

    protected function setSendTimeAttr($value){
        return time();
    }

    protected function setUpdateTimeAttr($value){
        return time();
    }

    public function store($data){

        if(!isset($data['tag'])){
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $data['admin_id']=session('admin.admin_id');
        $result=$this->allowField(true)->validate(true)->save($data);

        if($result){
            foreach($data['tag'] as $k=>$v){
                $dataArcTag=[
                    'arc_id'=>$this->arc_id,
                    'tag_id'=>$v,
                ];
                (new \app\common\model\ArcTag())->save($dataArcTag);
            }
            return ['valid'=>1,'msg'=>'添加文章成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }


    public function getAll(){
        $data=db('article')->alias('a')->join('cate c','a.cate_id=c.cate_id')->where('is_recycle',2)->
        field('arc_id,arc_title,editor_type,arc_public,cate_name,arc_sort,sendtime')->
        order('a.arc_sort asc,a.sendtime desc,a.arc_title asc')->paginate(10);
        // halt($data);
        return $data;
    }

    public function changeSort($data){
        // halt($data);
        $result=$this->validate(
            ['arc_sort'=>'require|between:1,99999'],
            ['arc_sort.require'=>'排序不能为空',
            'arc_sort.between'=>'排序值必须在1-99999之间']
        )->save($data,[$this->pk=>$data['arc_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'操作成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }

    public function edit($data){
        if(!isset($data['tag'])){
            return ['valid'=>0,'msg'=>'请选择标签'];
        }
        $result=$this->validate(true)->allowField(true)->save($data,[$this->pk=>$data['arc_id']]);
        if($result){
            (new ArcTag())->where("arc_id",$data['arc_id'])->delete();
            foreach($data['tag'] as $value){
                $arcTagData=[
                    'arc_id'=>$data['arc_id'],
                    'tag_id'=>$value,
                ];
                (new ArcTag())->save($arcTagData);
            }
            return ['valid'=>1,'msg'=>'操作成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }

    }

    public function getRecycle(){
        $data=db('article')->alias('a')->join('cate c','a.cate_id=c.cate_id')->where('is_recycle',1)->
        field('arc_id,arc_title,cate_name,arc_sort,sendtime')->
        order('a.arc_sort asc,a.sendtime desc,a.arc_title asc')->paginate(10);
        // halt($data);
        return $data;
    }

    public function confirmDel($arc_id){
        $arc_id=input('get.arc_id');
        $result=$this->destroy($arc_id);
        if($result){
            (new ArcTag())->where('arc_id',$arc_id)->delete();
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }


}
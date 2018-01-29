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
        field('arc_id,arc_title,arc_author,cate_name,arc_sort,sendtime')->
        order('a.arc_sort asc,a.sendtime desc,a.arc_title asc')->paginate(3);
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

}
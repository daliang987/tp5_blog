<?php

namespace app\index\controller;
use think\Controller;

class Common extends Controller{

    protected function _initialize(){
        parent::_initialize();
        $this->loadCate();
        $this->loadWebset();
        $this->loadTag();
    }

    public function loadCate(){
        $dbcate=db('cate')->where('cate_pid',0)->select();
        $this->assign('_cate',$dbcate);
    }

    public function loadWebset(){
        $dbWebset=db('webset')->column('webset_name,webset_value');
        // halt($dbWebset);
        $this->assign('_webset',$dbWebset);
    }

    public function loadTag(){
        $dbTag=db('tag')->select();
        $this->assign('_tag',$dbTag);
    }


    public function getTags($arcData){
        $tag_ids=db('article')->alias('a')->join('arc_tag at','at.arc_id=a.arc_id')->where('a.arc_id',$arcData['arc_id'])->column('tag_id');
        $tadData=db('tag')->whereIn('tag_id',$tag_ids)->field('tag_id,tag_name')->select();
        return $tadData;
    }


    public function setTitle($title){
        $this->assign('title',$title);
    }

    public function setCount($arcData){
        $count=count($arcData);
        $this->assign('count',$count);
    }
}
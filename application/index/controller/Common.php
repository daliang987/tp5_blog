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
}
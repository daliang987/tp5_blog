<?php
namespace app\index\controller;
use think\Controller;

class Index extends Common
{


    public function index()
    {
        $arcdata=db('article')->order('sendtime desc')->limit(10)->select();
        $this->assign('article',$arcdata);
        return $this->fetch();
    }


    public function category(){
        $cate_id=input('param.cate_id');
        // halt($cate_id);
        $arcdata=(new \app\common\model\Category())->getArc($cate_id);
        $this->assign('arcdata',$arcdata);
        return $this->fetch();
    }

    public function content(){
        $arc_id=input('param.arc_id');
        $arcdata=db('article')->find($arc_id);
        $this->assign('arcdata',$arcdata);

        return $this->fetch();
    }


    public function link(){

        $linkdata=db('link')->select();
        $this->assign('link',$linkdata);
        return $this->fetch();
    }
}

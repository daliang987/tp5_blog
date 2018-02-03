<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{

    protected $dbcate;
    protected function _initialize(){
        parent::_initialize();
        $dbcate=db('cate')->where('cate_pid',0)->select();
        $this->assign('cate',$dbcate);
    }

    public function index()
    {
        $arcdata=db('article')->order('sendtime desc')->select();
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
}

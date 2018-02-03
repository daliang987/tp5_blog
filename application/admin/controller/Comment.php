<?php
namespace app\admin\controller;
use think\Controller;

class Comment extends Controller{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Comment();
    }

    public function index(){

        $dataComment=db('comment')->order('create_time desc')->paginate(10);

        $this->assign('commentdata',$dataComment);

        return $this->fetch();
    }


    public function del(){

    }

    public function show(){
        $comment_id=input('param.comment_id');
        $data=db('comment')->alias('c')->join('article a','c.arc_id=a.arc_id')->find($comment_id);
        // halt($data);
        $this->assign('comment',$data);
        return $this->fetch();
    }
}
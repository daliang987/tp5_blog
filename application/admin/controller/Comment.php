<?php
namespace app\admin\controller;
class Comment extends Common{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Comment();
    }

    public function index(){

        $dataComment=db('comment')->alias('c')->join('article a','c.arc_id=a.arc_id')->paginate(15);

        $this->assign('commentdata',$dataComment);

        return $this->fetch();
    }


    public function del(){
        $cid=input('get.comment_id');
        $res=$this->db->del($cid);
        if($res['valid']){
            $this->success($res['msg']);
        }else{
            $this->error($res['msg']);
        }
    }

    public function show(){
        $comment_id=input('param.comment_id');
        $data=db('comment')->alias('c')->join('article a','c.arc_id=a.arc_id')->find($comment_id);
        // halt($data);
        $this->assign('comment',$data);
        return $this->fetch();
    }
}
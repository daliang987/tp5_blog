<?php

namespace app\admin\controller;


class Link extends Common{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Link();
    }


    public function index(){

        $dataLink=$this->db->getAll();
        // halt($dataLink);
        $this->assign('datalink',$dataLink);
        return $this->fetch();
    }

    public function store(){

        if(request()->isPost()){
            $res=$this->db->store(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return $this->fetch();
    }

    public function edit(){

        if(request()->isPost()){
            $res=$this->db->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        $link_id=input('param.link_id');
        $oldData=db('link')->where('link_id',$link_id)->find();
        $this->assign('link',$oldData);
        return $this->fetch();
    }

    public function del(){
        $link_id=input('get.link_id');
        $res=$this->db->del($link_id);
        if($res['valid']){
            $this->success($res['msg'],'index');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }

}
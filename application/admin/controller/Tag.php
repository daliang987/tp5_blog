<?php
namespace app\admin\controller;

use think\Controller;

class Tag extends Controller{

    protected $db;

    public function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Tag();
    }

    public function index(){

        $tagData=db('tag')->paginate(10);
        $this->assign('tagdata',$tagData);

        return $this->fetch();
    }

    public function store(){
        if(request()->isPost()){
            // halt(input('post.'));
            $res=$this->db->store(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        return $this->fetch();
    }

    public function storeByAjax(){
        if(request()->isPost()){
            // halt(input('post.'));
            $tagdata=db('tag')->where('tag_name',input('post.tag_name'))->find();
            if($tagdata){
                $res=['valida'=>0,'msg'=>'已存在该标签'];
                return json_encode($res);
            }
            $res=$this->db->store(input('post.'));
            return json_encode($res);
        }
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

        $tag_id=input('param.tag_id');
        $tagdata=db('tag')->find($tag_id);
        $this->assign('olddata',$tagdata);
        return $this->fetch();
    }

    public function del(){
        $tag_id=input('get.tag_id');
        $res=$this->db->del($tag_id);
        if($res['valid']){
            $this->success($res['msg'],'index');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }

}
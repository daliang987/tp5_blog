<?php
namespace app\admin\controller;

use think\Controller;

class Webset extends Controller{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Webset();
    }

    public function index(){

        $setdata=db('webset')->paginate(5);
        $this->assign('setdata',$setdata);

        return $this->fetch();
    }


    public function edit(){
        
        if(request()->isAjax()){
            halt(input('post.'));
            $res=$this->db->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        $webset_id=input('param.webset_id');
        $websetdata=db('webset')->find($webset_id);
        $this->assign('webset',$websetdata);

        if(request()->isPost()){
            $res=$this->db->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

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

    public function del(){
        $webset_id=input('get.webset_id');
        $res=$this->db->del($webset_id);
        if($res['valid']){
            $this->success($res['msg'],'index');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }
 
}
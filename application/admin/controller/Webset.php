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
            // halt(input('post.'));
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
        if(request()->isAjax()){
            // halt(input('post.'));
            $this->success('love','index');exit;
        }
        return $this->fetch();
    }
 
}
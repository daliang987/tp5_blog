<?php
namespace app\admin\controller;

class Webset extends Common{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\common\model\Webset();
    }

    public function index(){

        $setdata=db('webset')->paginate(10);
        $this->assign('setdata',$setdata);

        return $this->fetch();
    }


    public function edit(){
        
        //列表页面ajax发送请求
        if(request()->isAjax()){
            $data=input('post.');
            $data['webset_value']=input('post.webset_value','',null); //不过滤网站设置值
            $res=$this->db->edit($data);
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        $webset_id=input('param.webset_id');
        $websetdata=db('webset')->find($webset_id);
        $this->assign('webset',$websetdata);


        //单独的编辑页面编辑
        if(request()->isPost()){
            $data=input('post.');
            $webset_value=input('post.webset_value','',null);
            $data['webset_value']=$webset_value; //不过滤网站设置
            
            $res=$this->db->edit($data);
            // halt($res);
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
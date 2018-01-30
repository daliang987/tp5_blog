<?php

namespace app\admin\controller;

use think\Controller;
use houdunwang\config\Config;
use houdunwang\file\File;


class Article extends Controller{
    protected $db;
    
    protected function _initialize()
    {
        parent::_initialize();
        $this->db=new \app\common\model\Article();
    }

    public function index(){

        $fields=$this->db->getAll();
        $this->assign('data',$fields);
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


        $cateData=(new \app\common\model\Category())->getAll();
        $this->assign('catedata',$cateData);

        $tagData=db('tag')->select();
        $this->assign('tagdata',$tagData);
        return $this->fetch();
    }

    public function upload(){
        
        Config::set('upload', [
            'mold' => 'local',
            'type' => 'jpg,jpeg,gif,png',
            'size' => 1000000,
            'path' => 'uploads/'.date('Y/m/d'),
            
        ]);
        $file = File::path('uploads')->upload();
        if ($file) {
            //成功时返回数据 message 为文件地址
            $json = ['valid' => 1, 'message' => '/tp5/public/'.$file[0]['path']];
        } else {
            //失败时返回数据 message 为失败原因
            $json = ['valid' => 0, 'message' => "后台提示:".File::getError()];
        }
        die(json_encode($json));
    }

    public function tp_upload(){
        $file=request()->file('image');
        // halt($file);
        if($file){
            $info=$file->validate(['size'=>1024*1024*5,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // halt($info);
                // 成功上传后 获取上传信息
                // 输出 jpg
                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getFilename();
                }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function filelist(){
        $files = glob('uploads/*');
        // halt($files);
        foreach ($files as $f) {
            $data[] = ['url' => "/tp5/public/".$f, 'path' => '/tp5/public/'.$f];
        }
        //返回数据 data为文件列表 page 为分页数据，可以使用 houdunwang/page 组件生成
        $json = ['valid'=>1,'data' => $data,'page'=>[]];
        die(json_encode($json));
    }


    public function changeSort(){
        // halt($_POST);
        if(request()->isAjax()){
            $res=$this->db->changeSort(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
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

        $arc_id=input('param.arc_id');
        
        $oldData=db('article')->find($arc_id);
        $cate_data=(new \app\common\model\Category)->getAll();
        $tag_data=db('tag')->select();

        $tag_ids=db('arc_tag')->where('arc_id',$arc_id)->column("tag_id");
        $this->assign('tag_ids',$tag_ids);
        // halt($oldData);
        $this->assign('catedata',$cate_data);
        $this->assign('tagdata',$tag_data);
        $this->assign('oldArc',$oldData);
        return $this->fetch();
    }

    public function deltorecycle(){
        $arc_id=input('get.arc_id');
        $res=$this->db->save(['is_recycle'=>1],['arc_id'=>$arc_id]);
        if($res){
            $this->success('删除到回收站','index');exit;
        }else{
            $this->error('删除失败');exit;
        }
    }

    public function recycle(){
        $fields=$this->db->getRecycle();
        $this->assign('data',$fields);
        return $this->fetch();
    }


    public function outToRecycle(){
        $arc_id=input('param.arc_id');
        $res=$this->db->save(['is_recycle'=>2],['arc_id'=>$arc_id]);
        if($res){
            $this->success('已恢复该文章','index');exit;
        }else{
            $this->error('恢复失败');exit;
        }
    }


    public function confirmDel(){
        $arc_id=input('get.arc_id');
        $res=$this->db->confirmDel($arc_id);
        if($res){
            $this->success($res['msg'],'recycle');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }
}
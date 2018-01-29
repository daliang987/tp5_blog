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
}
<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Admin;

class Index extends Common
{
    public function index(){
        return $this->fetch();
    }

    public function pass(){
        
        if(request()->isPost()){
            // halt(input('post.'));
            $res=(new Admin)->pass(input('post.'));
            
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return $this->fetch();
    }
}

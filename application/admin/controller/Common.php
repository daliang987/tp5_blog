<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request=null){
        parent::__construct($request);
        // halt(session('session.admin_id'));
        if(!session('admin.admin_id')){
            $this->redirect('admin/login/index');
        }
    }
}

<?php
namespace app\index\controller;
use think\Controller;

class Index extends Common
{


    public function index()
    {
        $arcdata=db('article')->order('sendtime desc')->limit(10)->select();
        $this->assign('article',$arcdata);
        return $this->fetch();
    }


    public function category(){
        $cate_id=input('param.cate_id');
        $son_ids=(new \app\common\model\Category())->getSon(db('cate')->select(),$cate_id);
        if($son_ids){
            $cate_sons=db('cate')->whereIn('cate_id',$son_ids)->select();
            $this->assign('cate_son',$cate_sons);
        }else{
            $this->assign('cate_son',[]);
        }
        
        

        $curr_cate=db('cate')->find($cate_id);
        $this->assign('curr_cate',$curr_cate);
        $arcdata=(new \app\common\model\Category())->getArc($cate_id);
        $this->assign('arcdata',$arcdata);
        return $this->fetch();
    }

    public function content(){
        $arc_id=input('param.arc_id');
        $arcdata=db('article')->find($arc_id);
        $this->assign('arcdata',$arcdata);

        $tag_data=db('article')->alias('a')->join('arc_tag at','a.arc_id=at.arc_id')
        ->join('tag t','t.tag_id=at.tag_id','left')->where('a.arc_id',$arc_id)->field('t.tag_id,tag_name')->select();
        $this->assign('tag',$tag_data);

        return $this->fetch();
    }


    public function link(){

        $linkdata=db('link')->select();
        $this->assign('link',$linkdata);
        return $this->fetch();
    }


    public function tag(){
        $tag_id=input('param.tag_id');
        $arcdata=db('article')->alias('a')->join('arc_tag at','a.arc_id=at.arc_id')->where('at.tag_id',$tag_id)->paginate(15);
        $this->assign('arcdata',$arcdata);
        return $this->fetch();
    }

    public function search(){

        $keyword=input('post.keyword');
        $arcdata=db('article')->alias('a')
        ->join('arc_tag at','a.arc_id=at.arc_id')
        ->join('tag t','at.tag_id=t.tag_id')
        ->join('cate c','a.cate_id=c.cate_id')
        ->where('arc_title','like','%'.$keyword.'%')
        ->whereOr('tag_name','like','%'.$keyword.'%')
        ->whereOr('cate_name','like','%'.$keyword.'%')->distinct(true)->field('a.arc_title,a.sendtime,a.arc_id')->paginate(15);
        $this->assign('arcdata',$arcdata);
        return $this->fetch();
    }


    public function comment(){
        if(request()->isPost()){
            $res=(new \app\common\model\Cooment())->store($input('post.'));

        }
    }
}

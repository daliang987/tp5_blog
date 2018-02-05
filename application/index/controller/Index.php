<?php
namespace app\index\controller;
use think\Controller;

class Index extends Common
{


    public function index()
    {
        parent::setTitle('首页');
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
        parent::setTitle($curr_cate['cate_name']);    

        $arcdata=(new \app\common\model\Category())->getArc($cate_id);
        parent::setCount($arcdata);
        $this->assign('arcdata',$arcdata);
        return $this->fetch();
    }

    public function content(){
               
        $arc_id=input('param.arc_id');
        $arcdata=db('article')->find($arc_id);
        if(!$arcdata){
            $this->error('未找到对应的文章','index');exit;
        }
        db('article')->where('arc_id',$arc_id)->setInc('arc_click',1);
        parent::setTitle($arcdata['arc_title']);
        $this->assign('arcdata',$arcdata);

        $tag_data=parent::getTags($arcdata);
        $this->assign('tag',$tag_data);
        

        return $this->fetch();
    }


    public function link(){
        parent::setTitle('友情链接');
        $linkdata=db('link')->select();
        $this->assign('link',$linkdata);
        return $this->fetch();
    }


    public function tag(){
        parent::setTitle('标签页');        
        $tag_id=input('param.tag_id');
        $arcdata=db('article')->alias('a')->join('arc_tag at','a.arc_id=at.arc_id')->where('at.tag_id',$tag_id)->paginate(15);
        $this->assign('arcdata',$arcdata);
        $currTag=db('tag')->find($tag_id);
        parent::setTitle($currTag['tag_name']); 
        parent::setCount($arcdata);
        
        return $this->fetch();
    }

    public function search(){

        $keyword=input('post.keyword');
        parent::setTitle('搜索:'.$keyword);        
        $arcdata=db('article')->alias('a')
        ->join('arc_tag at','a.arc_id=at.arc_id')
        ->join('tag t','at.tag_id=t.tag_id')
        ->join('cate c','a.cate_id=c.cate_id')
        ->where('arc_title','like','%'.$keyword.'%')
        ->whereOr('tag_name','like','%'.$keyword.'%')
        ->whereOr('cate_name','like','%'.$keyword.'%')->distinct(true)->field('a.arc_title,a.sendtime,a.arc_id')->paginate(15);
        $this->assign('arcdata',$arcdata);
        parent::setCount($arcdata);
        
        return $this->fetch();
    }


    public function comment(){
        if(request()->isAjax()){
            $res=(new \app\common\model\Comment())->store(input('post.'));
            if($res['valid']){
                $this->success($res['msg']);exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
    }
}

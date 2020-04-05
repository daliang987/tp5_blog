<?php

namespace app\index\controller;

use MessageFormatter;
use PDO;
use think\Controller;
use think\captcha\Captcha;

class Index extends Common
{


    protected $temp=[];

    public function index()
    {
        parent::setTitle('首页');
        $arcdata = db('article')->order('sendtime desc')->limit(10)->select();
        $this->assign('article', $arcdata);
        return $this->fetch();
    }


    

    public function category()
    {

        $cate_id = input('param.cate_id');
        $son_ids = (new \app\common\model\Category())->getSon(db('cate')->select(), $cate_id);
        if ($son_ids) {
            $cate_sons = db('cate')->whereIn('cate_id', $son_ids)->select();
            $this->assign('cate_son', $cate_sons);
        } else {
            $this->assign('cate_son', []);
        }

        // 当前分类
        $curr_cate = db('cate')->find($cate_id);
        $this->assign('curr_cate', $curr_cate);
        parent::setTitle($curr_cate['cate_name']);

        // 获取分类id获取文章
        $arcdata = (new \app\common\model\Category())->getArc($cate_id);
        parent::setCount($arcdata);
        $this->assign('arcdata', $arcdata);
        return $this->fetch();
    }


    public function year(){
        $year=input('param.date');
        $allyear=db('article')->distinct(true)->field("FROM_UNIXTIME(sendtime,'%Y') year")->order("FROM_UNIXTIME(sendtime,'%Y') desc")->select();
        if($year){
            
            $data=db('article')->field("sendtime,arc_title,arc_id,FROM_UNIXTIME(sendtime,'%Y') year")->where(["FROM_UNIXTIME(sendtime,'%Y')"=>$year])->order('sendtime desc')->paginate(20);
        }else{
            $data=db('article')->field("*,FROM_UNIXTIME(sendtime,'%Y')")->order('sendtime desc')->paginate(20);
        }
        


        // halt($data);
        $this->assign('articles',$data);
        $this->assign('curr_year',$year);
        $this->assign('allyear',$allyear);
        return $this->fetch();
    }

    public function content()
    {

        $arc_id = input('param.arc_id');
        $arcdata = db('article')->find($arc_id);
        if (!$arcdata) {
            $this->error('未找到对应的文章', 'index');
            exit;
        }
        db('article')->where('arc_id', $arc_id)->setInc('arc_click', 1);
        parent::setTitle($arcdata['arc_title']);
        $this->assign('arcdata', $arcdata);

        $tag_data = parent::getTags($arcdata);
        // halt($tag_data);
        $this->assign('tagdata', $tag_data);
        
        $comment = db('comment')->where('arc_id',$arc_id)->where('comment_parentid',0)->order('create_time desc')->select();
        $subcomment = db('comment')->where('arc_id',$arc_id)->where('comment_parentid','<>',0)->select();

        $new=[];
        foreach($comment as $com){
            global $temp;
            $temp=[];   
            $com["subcomment"]=$this->getSubcomment($com["comment_id"],$subcomment);
            $new[]=$com;
        }

        $this->assign('_comment', $new);
    
        return $this->fetch();
    }


    public function link()
    {
        parent::setTitle('友情链接');
        $linkdata = db('link')->select();
        $this->assign('link', $linkdata);
        return $this->fetch();
    }


    public function tag()
    {
        parent::setTitle('标签页');
        $tag_id = input('param.tag_id');
        $arcdata = db('article')->alias('a')->join('arc_tag at', 'a.arc_id=at.arc_id')->where('at.tag_id', $tag_id)->paginate(15);
        $this->assign('arcdata', $arcdata);
        $currTag = db('tag')->find($tag_id);
        parent::setTitle($currTag['tag_name']);
        parent::setCount($arcdata);

        return $this->fetch();
    }

    public function search()
    {

        $keyword = input('post.keyword');
        parent::setTitle('搜索:' . $keyword);
        $arcdata = db('article')->alias('a')
            ->join('arc_tag at', 'a.arc_id=at.arc_id')
            ->join('tag t', 'at.tag_id=t.tag_id')
            ->join('cate c', 'a.cate_id=c.cate_id')
            ->where('arc_title', 'like', '%' . $keyword . '%')
            ->whereOr('tag_name', 'like', '%' . $keyword . '%')
            ->whereOr('cate_name', 'like', '%' . $keyword . '%')->distinct(true)->field('a.arc_title,a.sendtime,a.arc_id')->paginate(15);
        $this->assign('arcdata', $arcdata);
        parent::setCount($arcdata);

        return $this->fetch();
    }


    public function comment()
    {
        if (request()->post()) {
      
            $res = (new \app\common\model\Comment())->allowField(true)->store(input('post.'));
            if ($res['valid']) {
                $this->redirect('content#comment_title',['arc_id'=>input('post.arc_id')]);
                exit;
            } else {
                $this->error($res['msg']);
                exit;
            }
        }
    }

    public function getSubcomment($parentid,$subcomment)
    {
        global $temp;

        foreach($subcomment as $sub){
            
            if($sub['comment_parentid']==$parentid){
                $temp[]=$sub;
                $this->getSubcomment($sub['comment_id'],$subcomment);
            }
        }
        
        return $temp;
    }


    public function vcode(){
        $config=[
            'codeSet'=>'1234567890',
            'length' =>3,
            'useNoise' => false,
            'imageH' => 35,
            'imageW' => 100,
            'fontSize' => 16,
            'useCurve' => true,
        ];

        $captcha=new Captcha($config);
        return $captcha->entry();
    }
}

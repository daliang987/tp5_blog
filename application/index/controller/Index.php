<?php

namespace app\index\controller;

use MessageFormatter;
use PDO;
use think\Controller;

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
        if($year){
            $data=db('artiles')->query("select a.*,FROM_UNIXTIME(a.sendtime,'%Y') as year from blog_article a group by year having year=".$year);
        }else{
            $data=db('artiles')->query("select a.*,FROM_UNIXTIME(a.sendtime,'%Y') as year from blog_article a group by year");
        }
        
        // halt($data);
        $this->assign('articles',$data);
        $this->assign('curr_year',$year);
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
        $this->assign('tag', $tag_data);
        
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
            
            $res = (new \app\common\model\Comment())->store(input('post.'));
            if ($res['valid']) {
                $this->redirect('content',['arc_id'=>input('post.arc_id')]);
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


    function get_real_ip(){
    
        $ip=FALSE;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
    
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);   
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            
            for ($i = 0; $i < count($ips); $i++) {
                    preg_match("^(10│172.16│192.168).", $ips[$i],$match);
                    if ($match) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }

        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    
    }

    public function loadweather(){
        $ip=$this->get_real_ip();
        $ak='171699eaffea974105b6e32b49eea637';
        $weatherUrl='http://api.map.baidu.com/telematics/v3/weather?location='.$ip.'&output=json&ak='.$ak;
        $ch=curl_init($weatherUrl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
        $result=curl_exec($ch);
        return json_encode($result);
    }
}

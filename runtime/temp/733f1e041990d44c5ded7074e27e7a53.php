<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\xampp\htdocs\blog\public/../application/index\view\index\tag.html";i:1547690769;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1547690769;}*/ ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($title)): ?><?php echo $title; endif; ?>--[<?php echo $_webset['blog_title']; ?>]</title>
    <script>
        window.hdjs = {};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '__STATIC__/node_modules/hdjs';
        //上传文件后台地址
        //window.hdjs.uploader = 'test/php/uploader.php?';
        window.hdjs.uploader = '<?php echo url("admin/article/upload"); ?>';
        //获取文件列表的后台地址
        window.hdjs.filesLists = '<?php echo url("admin/article/filelist"); ?>?';
    </script>

    <script src="__STATIC__/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/config.js"></script>
    <link rel="stylesheet" href="__STATIC__/node_modules/hdjs/dist/hdjs.css">

</head>

<body>
    <!-- <div hd-cloak> -->
    <div class="blog-show">
        <div class="blog-header">
            <ul>
                <li>
                    <i class="fa fa-shield fa-2x"></i>
                </li>
                <li>
                    <a href="<?php echo url('index'); ?>">首页</a>
                </li>
                <?php if(is_array($_cate) || $_cate instanceof \think\Collection || $_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('category',['cate_id'=>$category['cate_id']]); ?>"><?php echo $category['cate_name']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clear"></div>
            </ul>
            <div class="blog-title">Daliang's Blog</div>
        </div>

        <hr>
        <div hd-cloak>
            <div class="blog-content">
                

<div class="blog-function">
    <div class="func">
        <a href="javascript:history.back()" id="back">返回</a>
        <hr>
        <a href="javascript:scrolltop()">回到顶部</a>
        <hr>
        <a href="javascript:void(0)">分享
            <span>
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                </div>
                <script>window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16" }, "share": {}, "image": { "viewList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"], "viewText": "分享到：", "viewSize": "16" }, "selectShare": { "bdContainerClass": null, "bdSelectMiniList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"] } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
    </div>

</div>
<p class="text-center text-white">
    <?php if(is_array($_tag) || $_tag instanceof \think\Collection || $_tag instanceof \think\Paginator): $i = 0; $__LIST__ = $_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
    <a href="<?php echo url('tag',['tag_id'=>$tag['tag_id']]); ?>">
        <?php if(input('param.tag_id')==$tag['tag_id']): ?>
        <span class="label label-success"><?php echo $tag['tag_name']; ?></span>
        <?php else: ?>
        <span class="label label-info"><?php echo $tag['tag_name']; ?></span>
        <?php endif; ?>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <br>
    <br>
    <small>共<?php echo $count; ?>篇文章</small>
</p>

<hr>
<div class="arclist">

    <ul>
        <?php if(is_array($arcdata) || $arcdata instanceof \think\Collection || $arcdata instanceof \think\Paginator): $i = 0; $__LIST__ = $arcdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arc): $mod = ($i % 2 );++$i;?>
        <li>
            <span class="time"><?php echo date('Y/m/d H:i',$arc['sendtime']); ?></span>
            <a href="<?php echo url('content',['arc_id'=>$arc['arc_id']]); ?>"><?php echo $arc['arc_title']; ?></a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
    <?php echo $arcdata->render(); ?>
</div>




            </div>
        </div>
        <hr>
        <div class="blog-footer">
            <div class="copyright">
                <?php echo $_webset['copyright']; ?>
            </div>
            <div class="blog-footer-link">
                <ul>
                    <li>
                        <a href="<?php echo url('link'); ?>">友情链接</a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $_webset['email']; ?>">邮箱</a>
                    </li>
                    <li>
                        <a href="<?php echo $_webset['weibo']; ?>" target="_blank">微博</a>
                    </li>

                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- </div> -->
</body>

<link rel="stylesheet" href="__STATIC__/css/index.css">

</html>
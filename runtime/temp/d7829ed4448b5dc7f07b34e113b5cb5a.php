<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\index.html";i:1517841422;s:68:"D:\phpStudy\WWW\tp5\public/../application/index\view\index_base.html";i:1517926202;}*/ ?>
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
                

<div class="blog-content-left">
    <div class="index-title">Statement</div>
    <div class="desc">
        <?php echo $_webset['person_desc']; ?>
    </div>
    <div class="index-title">Search</div>
    <div class="search">
        <form action="<?php echo url('search'); ?>" method="post" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="搜索" class="btn btn-success">
        </form>
    </div>
    <div class="index-title">Archive</div>
    <div class="arclist">

        <ul>
            <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arc): $mod = ($i % 2 );++$i;?>
            <li>
                <span class="time"><?php echo date('Y M d',$arc['sendtime']); ?></span>
                <a href="<?php echo url('content',['arc_id'=>$arc['arc_id']]); ?>"><?php echo $arc['arc_title']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>
</div>
<div class="blog-content-right">
    <div class="catelist">
        <ul>
            <li onclick="javascript:cateshow()">
                <a href="javascript:void(0)">文章分类</a>
            </li>
            <?php if(is_array($_cate) || $_cate instanceof \think\Collection || $_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('category',['cate_id'=>$ca['cate_id']]); ?>"><?php echo $ca['cate_name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="taglist">
        <ul>
            <li>
                <a class="tag-title" href="javascript:void(0)">标签</a>
            </li>
            <?php if(is_array($_tag) || $_tag instanceof \think\Collection || $_tag instanceof \think\Paginator): $i = 0; $__LIST__ = $_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('tag',['tag_id'=>$tag['tag_id']]); ?>"><?php echo $tag['tag_name']; ?></a>
            </li>

            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="clear"></div>
        </ul>

    </div>
</div>



<div class="clear"></div>

<script>
    function cateshow() {
        $(".catelist ul li:first").nextAll("li").slideToggle();
    }
</script> 
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
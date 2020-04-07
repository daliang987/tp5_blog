<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index\year.html";i:1586253593;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1586242245;}*/ ?>
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
        <div class="mobile-menu">
            <ul>
                <li>
                    <i class="fa fa-shield fa-2x"></i>
                </li>
                <li><a href="/">首页</a></li>
                <li><a id="getCate">分类</a></li>
                <li><a id="getSort">归档</a></li>
                <li><a id="getTag">标签</a></li>
            </ul>
        </div>
        <div class="blog-header" id="index_cate">
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

            </ul>
            <div class="blog-title"><?php echo $_webset['blog_title']; ?></div>
            <div class="clear"></div>

        </div>

        <div class="blog-header" id="sort_arc">
            <ul>
                <li>
                    <a href="<?php echo url('index/Index/year'); ?>">所有归档</a>
                </li>
                <?php if(is_array($_date) || $_date instanceof \think\Collection || $_date instanceof \think\Paginator): $i = 0; $__LIST__ = $_date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('index/Index/year',['date'=>$da['year']]); ?>"><?php echo $da['year']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <div class="blog-header" id="tag_arc">
            <ul>
                <?php if(is_array($_tag) || $_tag instanceof \think\Collection || $_tag instanceof \think\Paginator): $i = 0; $__LIST__ = $_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('tag',['tag_id'=>$tag['tag_id']]); ?>"><?php echo $tag['tag_name']; ?></a>
                </li>

                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <hr>
        <div hd-cloak>
            <div class="blog-content">
                
<div class="blog-content-left">
    <div class="arclist">

        <ul>
            <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arc): $mod = ($i % 2 );++$i;?>
            <li>
                <span class="time"><?php echo date('Y/m/d H:i',$arc['sendtime']); ?></span>
                <a href="<?php echo url('content',['arc_id'=>$arc['arc_id']]); ?>"><?php echo $arc['arc_title']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
        <?php echo $articles->render(); ?>
    </div>
</div>
<div class="blog-content-right">
    <div class="sortlist">

        <ul>
            <?php if($curr_year == ''): ?>
            <li><a href="<?php echo url('index/Index/year'); ?>" class="link-active">所有</a></li>
            <?php else: ?>
            <li><a href="<?php echo url('index/Index/year'); ?>">所有</a></li>
            <?php endif; if(is_array($allyear) || $allyear instanceof \think\Collection || $allyear instanceof \think\Paginator): $i = 0; $__LIST__ = $allyear;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;if($d['year'] == $curr_year): ?>
            <li><a href="<?php echo url('index/Index/year',['date'=>$d['year']]); ?>" class="link-active">
                <?php echo $d['year']; ?>
            </a></li>
            <?php else: ?>
            <li><a href="<?php echo url('index/Index/year',['date'=>$d['year']]); ?>""><?php echo $d['year']; ?></a></li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>

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

<link rel="stylesheet" href="__STATIC__/css/common.css">
<link media="(max-width:800px)" rel="stylesheet" href="__STATIC__/css/mobile.css">
<link media="(min-width:800px)" rel="stylesheet" href="__STATIC__/css/desktop.css">
<script>

    require(['hdjs'], function (hdjs) {
        $('#getCate').click(function () {
            $('#sort_arc').hide();
            $('#tag_arc').hide();
            $('#index_cate').toggle(300);
        })

        $('#getSort').click(function () {
            $('#index_cate').hide();
            $('#tag_arc').hide();
            $('#sort_arc').toggle(300);
        })

        $('#getTag').click(function () {
            $('#index_cate').hide();
            $('#sort_arc').hide();
            $('#tag_arc').toggle(300);
        })

    });

</script>

</html>
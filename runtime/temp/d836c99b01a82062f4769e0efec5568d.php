<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\xampp\htdocs\blog\public/../application/index\view\index\category.html";i:1586256468;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1638429661;}*/ ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($title)): ?><?php echo $title; endif; ?>--[<?php echo $_webset['blog_title']; ?>]</title>
    <link rel="stylesheet" href="__STATIC__/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="__STATIC__/css/common.css">
    <link media="(max-width:800px)" rel="stylesheet" href="__STATIC__/css/mobile.css">
    <link media="(min-width:800px)" rel="stylesheet" href="__STATIC__/css/desktop.css">
    

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

        <hr class="blog-hr">
        <div hd-cloak>
            <div class="blog-content">
                


<div class="blog-content-left">
    <p class="text-white">
        当前分类：|--
        <span class="text-light"><?php echo $curr_cate['cate_name']; ?></span>
        <small class="text-right">共<?php echo $count; ?>篇文章</small>
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
    </div>
</div>

<div class="blog-content-right">
    <div class="sortlist">
        <ul>
            <li onclick="javascript:cateshow()">
                <a href="javascript:void(0)"><?php echo $curr_cate['cate_name']; ?></a>
            </li>

            <?php if(is_array($cate_son) || $cate_son instanceof \think\Collection || $cate_son instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_son;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('category',['cate_id'=>$son['cate_id']]); ?>"><?php echo $son['cate_name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

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


</body>
<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/bootstrap/bootstrap.min.js"></script>


<script>

    $(function () {
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

    })
</script>

</html>
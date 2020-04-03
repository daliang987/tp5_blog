<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\xampp\htdocs\blog\public/../application/index\view\index\category.html";i:1585904986;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1585825306;}*/ ?>
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
            <div class="blog-title"><?php echo $_webset['blog_title']; ?></div>
        </div>

        <hr>
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
    <div class="catelist">
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
    <!-- </div> -->
</body>

<link rel="stylesheet" href="__STATIC__/css/index.css">

</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\category.html";i:1517672380;s:68:"D:\phpStudy\WWW\tp5\public/../application/index\view\index_base.html";i:1517676831;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>白帽子博客</title>

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
</head>

<body>
    <div class="blog-show">
        <div class="header">
            <i class="fa fa-flag fa-2x pull-left"></i>
            <ul>
                <li>
                    <a href="<?php echo url('index'); ?>">首页</a>
                </li>
                <?php if(is_array($_cate) || $_cate instanceof \think\Collection || $_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('category',['cate_id'=>$category['cate_id']]); ?>"><?php echo $category['cate_name']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <hr>

        <div class="content">
            
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
        <hr>
        <div class="footer">
            <div class="copyright">
                <?php echo $_webset['copyright']; ?>
            </div>
            <div class="footer-link">
                <ul>
                    <li><a href="<?php echo url('link'); ?>">友情链接</a></li>
                    <li><a href="mailto:<?php echo $_webset['email']; ?>">邮箱</a></li>
                    <li><a href="<?php echo $_webset['weibo']; ?>" target="_blank">微博</a></li>
                    
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

</body>
<link rel="stylesheet" href="__STATIC__/css/index.css">

</html>
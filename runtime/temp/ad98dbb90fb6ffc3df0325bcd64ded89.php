<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\content.html";i:1517656940;s:68:"D:\phpStudy\WWW\tp5\public/../application/index\view\index_base.html";i:1517643468;}*/ ?>
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
            <ul>
                <li><a href="<?php echo url('index'); ?>">首页</a></li>
                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('category',['cate_id'=>$category['cate_id']]); ?>"><?php echo $category['cate_name']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <hr>
        <div class="desc"></div>
        <div class="search"></div>
        <div class="content">
            


<div class="article_header">
    <div class="title"><?php echo $arcdata['arc_title']; ?></div>
    <div class="min-title">
        <span class="author">作者：<?php echo $arcdata['arc_author']; ?></span>
        <span class="sendtime">发表时间：<?php echo date('Y/m/d H:i',$arcdata['sendtime']); ?></span>
        <span class="readcount">阅读：<?php echo $arcdata['sendtime']['arc_click']; ?></span>
    </div>

</div>

<div class="article_content">
    <div id="editormd">
        <textarea hidden><?php echo $arcdata['arc_content']; ?></textarea>
    </div>


</div>

<div class="comment">
    <div class="new-comment"></div>
    <div class="comment-detial">

    </div>
</div>

<script>
    require(['hdjs'], function (hdjs) {
        hdjs.markdownToHTML("editormd", {
            htmlDecode: "style,script,iframe,php",
            emoji: true
        });
    });
</script> 
        </div>
        <div class="footer"></div>
    </div>

</body>
<link rel="stylesheet" href="__STATIC__/css/index.css">
</html>
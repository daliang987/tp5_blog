<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\xampp\htdocs\blog/application/admin\view\webset\store.html";i:1547690768;s:53:"D:\xampp\htdocs\blog/application/admin\view\base.html";i:1585303185;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客系统</title>
    <!-- <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->
    <link rel="stylesheet" href="__STATIC__/css/blog-style.css">


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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">博客系统</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <img src="#">
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo session('admin.admin_username'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">个人资料</a>
                            </li>
                            <li>
                                <a href="<?php echo url('admin/index/pass'); ?>">密码修改</a>
                            </li>
                            <li>
                                <a href="#">消息中心</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?php echo url('admin/login/logout'); ?>">注销</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation">
                                <a href="<?php echo url('admin/index/index'); ?>">博客首页</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/category/index'); ?>">栏目管理</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/tag/index'); ?>">标签管理</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/article/index'); ?>">文章管理</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/article/recycle'); ?>">回收站</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/link/index'); ?>">友链管理</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/webset/index'); ?>">网站设置</a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo url('admin/comment/index'); ?>">评论管理</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-10">
                

<div class="alert alert-info">
    网站配置
</div>
<div class="panel panel-info">
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li>
                <a href="<?php echo url('admin/webset/index'); ?>">网站配置</a>
            </li>
            <li class="active">
                <a href="<?php echo url('admin/webset/store'); ?>">添加配置</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">配置名称</label>
                        <div class="col-md-8">
                            <input type="text" name="webset_name" class="form-control" placeholder="配置名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">配置值</label>
                        <div class="col-md-8">
                            <input type="text" name="webset_value" class="form-control" placeholder="配置值">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">描述</label>
                        <div class="col-md-8">
                            <input type="text" name="webset_desc" class="form-control" placeholder="描述">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-offset-2 col-md-8">
                            <input type="submit" class="form-control col-md-12 btn-info" value="添加配置">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>


</body>

</html>
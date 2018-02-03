<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpStudy\WWW\tp5\public/../application/admin\view\webset\index.html";i:1517668165;s:62:"D:\phpStudy\WWW\tp5\public/../application/admin\view\base.html";i:1517663358;}*/ ?>
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
                                <a href="<?php echo url('admin/entry/pass'); ?>">密码修改</a>
                            </li>
                            <li>
                                <a href="#">消息中心</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">注销</a>
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
                                <a href="<?php echo url('admin/entry/index'); ?>">博客首页</a>
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
            <li class="active">
                <a href="<?php echo url('admin/webset/index'); ?>">网站配置</a>
            </li>
            <li>
                <a href="<?php echo url('admin/webset/store'); ?>">添加配置</a>
            </li>
        </ul>
    </div>


    <div class="container-fluid">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr class="info">
                <th>编号</th>
                <th>配置名称</th>
                <th>配置值</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($setdata) || $setdata instanceof \think\Collection || $setdata instanceof \think\Paginator): $i = 0; $__LIST__ = $setdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$webset): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $webset['webset_id']; ?></td>
                <td><?php echo $webset['webset_name']; ?></td>
                <td>
                    <input type="text" class="form-control" name="webset_value" value="<?php echo $webset['webset_value']; ?>" id="websetvalue" onblur="changeValue('<?php echo $webset['webset_id']; ?>',this)">
                </td>
                <td><?php echo $webset['webset_desc']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">操作
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo url('admin/webset/edit',['webset_id'=>$webset['webset_id']]); ?>">编辑</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="javascript:del(<?php echo $webset['webset_id']; ?>)">删除</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <?php echo $setdata->render(); ?>
    </div>

</div>
<script>
    function changeValue(id, obj) {
        $.post("<?php echo url('edit'); ?>", { webset_id: id, webset_value: $(obj).val() }, function (res) {
            if (res.code) {
                require(['hdjs'], function (hdjs) {
                    hdjs.message(res.msg, 'refresh', 'success', res.wait);
                });
            } else {
                require(['hdjs'], function (hdjs) {
                    hdjs.message(res.msg, 'back', 'error', res.wait);
                });
            }
        });
    }

    function del(id) {
        require(['hdjs'], function (hdjs) {
            hdjs.confirm('确定删除吗?', function () {
                location.href = '<?php echo url("del"); ?>?webset_id=' + id;
            })
        })
    }
</script> 
            </div>
        </div>
    </div>


</body>

</html>
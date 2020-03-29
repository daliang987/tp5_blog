<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\phpstudy_pro\WWW\tp5\public/../application/admin\view\article\mdstore.html";i:1585496675;s:66:"D:\phpstudy_pro\WWW\tp5\public/../application/admin\view\base.html";i:1585319215;}*/ ?>
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                        <img src="__STATIC__/img/head.jpg" class="user-head">
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <?php echo session('admin.admin_username'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo url('admin/index/pass'); ?>">密码修改</a>
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
    添加文章
</div>

<div class="panel panel-info">
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li>
                <a href="<?php echo url('admin/article/index'); ?>">文章管理</a>
            </li>
            <li class="active">
                <a href="<?php echo url('admin/article/mdstore'); ?>">文章添加</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">文章标题</label>
                        <div class="col-md-10">
                            <input type="text" name="arc_title" class="form-control"
                                value="<?php echo session('formdata.arc_title'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">文章作者</label>
                        <div class="col-md-10">
                            <input type="text" name="arc_author" class="form-control"
                                value="<?php echo session('formdata.arc_author'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">文章排序</label>
                        <div class="col-md-10">
                            <input type="number" name="arc_sort" class="form-control"
                                value="<?php echo session('formdata.arc_sort'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">所属分类</label>
                        <div class="col-md-10">
                            <select class="form-control" name="cate_id">
                                <?php if(session('formdata.cate_id') != ''): if(is_array($catedata) || $catedata instanceof \think\Collection || $catedata instanceof \think\Paginator): $i = 0; $__LIST__ = $catedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['cate_id']; ?>" <?php if($vo['cate_id']==session('formdata.cate_id')): ?>
                                    selected<?php endif; ?>><?php echo $vo['_cate_name']; ?> </option> 
                                <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($catedata) || $catedata instanceof \think\Collection || $catedata instanceof \think\Paginator): $i = 0; $__LIST__ = $catedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['cate_id']; ?>"><?php echo $vo['_cate_name']; ?></option> 
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </select> 
                        </div> 
                    </div> 
                    
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">添加标签</label>
                        <div class="col-md-9">
                            <input type="text" id="arc_tag" class="form-control"
                                value="<?php echo session('formdata.arc_tag'); ?>">
                        </div>
                        <div class="col-md-1">
                            <input type="button" class="btn btn-primary col-md-12" id="btn-add-tag"
                                value="添加">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">选择标签</label>
                            <div class="col-md-10">
                                <div class="checkbox" id="tag_checkbox">
                                    <?php if(session('formdata.tag') != ''): if(is_array($tagdata) || $tagdata instanceof \think\Collection || $tagdata instanceof \think\Paginator): $i = 0; $__LIST__ = $tagdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                                    <label>
                                        <input type="checkbox" <?php if(in_array($tag['tag_id'],session('formdata.tag'))): ?>checked<?php endif; ?>
                                            name="tag[]" value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></label>
                                    <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($tagdata) || $tagdata instanceof \think\Collection || $tagdata instanceof \think\Paginator): $i = 0; $__LIST__ = $tagdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                                    <label>
                                        <input type="checkbox" name="tag[]" value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></label>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">缩略图</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input class="form-control" name="arc_thumb" readonly=""
                                        value="<?php echo session('formdata.arc_thumb'); ?>">
                                    <div class="input-group-btn">
                                        <button onclick="upImagePc(this)" class="btn btn-default"
                                            type="button">选择图片</button>
                                    </div>
                                </div>
                                <div class="input-group" style="margin-top:5px;">
                                    <?php if(session('formdata.arc_thumb') != ''): ?>
                                    <img src="<?php echo session('formdata.arc_thumb'); ?>" class="img-responsive img-thumbnail"
                                        width="150">
                                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                                        onclick="removeImg(this)">×</em>
                                    <?php else: ?>
                                    <img src="__STATIC__/img/nopic.jpg" class="img-responsive img-thumbnail"
                                        width="150">
                                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                                        onclick="removeImg(this)">×</em>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">文章摘要</label>
                            <div class="col-md-10">
                                <textarea name="arc_digist" id="" rows="3"
                                    class="form-control"><?php echo session('formdata.arc_digist'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">文章内容<br>
                                <a href="javascript:void(0)" id="switch_editor" class="btn btn-info">切换编辑器</a></label>

                            <div class="col-md-10" id="md">
                                <div id="mdeditor">
                                    <textarea name="arc_content" hidden><?php echo session('formdata.arc_content'); ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="editor_type" name="editor_type" value="md">
                            <input type="hidden" name="switch" id="switch" value="no">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-offset-2 col-md-2">
                            <input type="submit" class="form-control col-md-12 btn-info" value="添加文章">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>


    //上传图片
    function upImagePc() {
        require(['hdjs'], function (hdjs) {
            var options = {
                multiple: false,//是否允许多图上传
                //data是向后台服务器提交的POST数据
                data: { name: '后盾人', year: 2099 },
            };
            hdjs.image(function (images) {
                //上传成功的图片，数组类型
                $("[name='arc_thumb']").val(images[0]);
                $(".img-thumbnail").attr('src', images[0]);
            }, options)
        });
    }


    //移除图片
    function removeImg(obj) {
        $(obj).prev('img').attr('src', '__STATIC__/img/nopic.jpg');
        $(obj).parent().prev().find('input').val('');
    }


    require(['hdjs'], function (hdjs) {
        hdjs.markdown("mdeditor", {
            width: '100%',
            heigth: 300,
            autoFocus: false
        })



        $('#switch_editor').click(function () {
            $('#switch').val('yes');
            $('form').submit();
        })

        //添加标签

        $('#btn-add-tag').click(function () {
            if ($('#arc_tag').val().trim()) {
                $.ajax({
                    url: "<?php echo url('admin/tag/storeByAjax'); ?>",
                    type: 'post',
                    data: { 'tag_name': $('#arc_tag').val().trim() },
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.valid == 1) {
                            $('#tag_checkbox').append('<label><input type="checkbox" name="tag[]" checked value="' + data.tagid + '">' + $('#arc_tag').val() + '</label>');
                        } else {
                            alert(data.msg);
                        }
                    }
                })
            }
        })
    })
</script> 
            </div>
        </div>
    </div>


</body>

</html>
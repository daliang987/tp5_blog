<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\xampp\htdocs\blog\public/../application/admin\view\article\index.html";i:1638263846;s:63:"D:\xampp\htdocs\blog\public/../application/admin\view\base.html";i:1638262400;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客系统</title>
    <link rel="stylesheet" href="__STATIC__/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/font-awesome.min.css">
    <link rel="stylesheet" href="__STATIC__/css/blog-style.css">
     
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
                <a class="navbar-brand" target="_blank" href="/">博客系统</a>
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
            <div hidden><a href="javascript:;" id="show-menu" class="hidden">展开菜单</a></div>
            <div class="col-md-2" id="menu_id">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation">
                                <a href="javascript:void(0);" id="hide_menu">隐藏菜单</a>
                            </li>
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
            <div class="col-md-10" id="main-content">
                

<div class="alert alert-info">
    文章列表
</div>

<div class="panel panel-info">
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="<?php echo url('admin/article/index'); ?>">文章管理</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">文章添加 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo url('admin/article/mdstore'); ?>">添加Markdown文章</a></li>
                    <li><a href="<?php echo url('admin/article/bdstore'); ?>">添加普通文章</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr class="info">
                <th>编号</th>
                <th>文章名称</th>
                <th class="col-md-1">排序</th>
                <th>所属分类</th>
                <th>文章类型</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $article['arc_id']; ?></td>
                <td>
                    <?php if($article['editor_type'] == 'bd'): ?>
                    <a href="<?php echo url('bdedit',['arc_id'=>$article['arc_id']]); ?>"> <?php echo $article['arc_title']; ?></a>
                    <?php else: ?>
                    <a href="<?php echo url('mdedit',['arc_id'=>$article['arc_id']]); ?>"> <?php echo $article['arc_title']; ?></a>
                    <?php endif; ?>
                </td>
                <td>
                    <input type="number" value="<?php echo $article['arc_sort']; ?>" class="form-control"
                        onblur="changeSort(this,'<?php echo $article['arc_id']; ?>')" />
                </td>
                <td><?php echo $article['cate_name']; ?></td>
                <td><?php if($article['arc_public'] == 1): ?>已发布<?php else: ?>草稿<?php endif; ?></td>
                <td><?php echo date('Y-m-d H:i:s',$article['sendtime']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">操作
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?php if($article['editor_type'] == 'bd'): ?>
                                <a href="<?php echo url('bdedit',['arc_id'=>$article['arc_id']]); ?>">编辑</a>
                                <?php else: ?>
                                <a href="<?php echo url('mdedit',['arc_id'=>$article['arc_id']]); ?>">编辑</a>
                                <?php endif; ?>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="javascript:confirmDel(<?php echo $article['arc_id']; ?>)">删除到回收站</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pull-right">
            <?php echo $data->render(); ?>
        </div>
    </div>
</div>

<!-- 信息删除确认 -->
<div class="modal fade" id="delcfmModel">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title">提示信息</h4>
            </div>
            <div class="modal-body">
                <p>您确认要删除吗？</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="url" />
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a onclick="urlSubmit()" class="btn btn-danger" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="infoshow">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title">提示信息</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2"><i id="tip_icon" class="fa  fa-4x"></i></div>
                    <div class="col-md-10">
                        <h4 class="text-success" id="info_detail"></h4>
                        <p class="text-info">本窗口<span id="timeout"></span>秒后自动关闭</p>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

            </div>
        </div>
    </div>


</body>
<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/bootstrap/bootstrap.min.js"></script>
<script>

    $('#hide_menu').click(function () {
        // alert(1);
        $('#menu_id').hide();
        $('#main-content').removeClass('col-md-10').addClass('col-md-12');
    })

</script>


<script src="__STATIC__/js/common.js"></script>

<script>
    function confirmDel(arc_id) {
        $('#url').val('deltorecycle?arc_id=' + arc_id);
        $('#delcfmModel').modal();
    }

    function urlSubmit() {
        var url = $.trim($('#url').val());
        window.location.href = url;
    }


    function changeSort(obj, arc_id) {
        value = $(obj).val();
        // alert(value);
        // alert(arc_id);
        $.post("<?php echo url('changeSort'); ?>", { arc_sort: value, arc_id: arc_id }, function (res) {
            // alert(res.code);
            if (res.code) {
                //先注册事件
                $('#infoshow').on('show.bs.modal', function () {
                    var modal = $(this);
                    modal.find('#info_detail').text(res.msg);
                    modal.find('#timeout').text(res.wait);
                    modal.find('#tip_icon').addClass('fa-check-square text-success')
                    timeout = res.wait;
                    timer = setInterval(function () {
                        if (timeout <= 1) {
                            modal.modal('hide');
                            clearTimeout(timer);
                            window.location.reload()
                            return;
                        } else {
                            timeout--;
                            modal.find("#timeout").text(timeout);
                        }
                    }, 1000)
                })
                $('#infoshow').on('hide.bs.modal', function () {
                    clearInterval(timer);
                })
                $('#infoshow').modal('show');
            } else {
                $('#infoshow').on('show.bs.modal', function () {
                    var modal = $(this);
                    modal.find('#info_detail').text(res.msg);
                    modal.find('#timeout').text(res.wait);
                    modal.find('#tip_icon').addClass('fa-warning text-warning')
                    timeout = res.wait;
                    timer = setInterval(function () {
                        if (timeout <= 1) {
                            modal.modal('hide');
                            clearTimeout(timer);
                            return;
                        } else {
                            timeout--;
                            modal.find("#timeout").text(timeout);
                        }
                    }, 1000)

                })
                $('#infoshow').on('hide.bs.modal', function () {
                    clearInterval(timer);
                })
                $('#infoshow').modal('show');
            }
        }, 'json');
    }
</script> 

</html>
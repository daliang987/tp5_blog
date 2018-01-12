<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"/var/www/html/tp5/application/admin/view/entry/index.html";i:1515771720;s:50:"/var/www/html/tp5/application/admin/view/base.html";i:1514908032;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客系统</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">个人资料</a>
                            </li>
                            <li>
                                <a href="#">密码修改</a>
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
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active">
                        <a href="#">博客首页</a>
                    </li>
                    <li role="presentation">
                        <a href="#">分类管理</a>
                    </li>
                    <li role="presentation">
                        <a href="#">标签管理</a>
                    </li>
                    <li role="presentation">
                        <a href="#">文章管理</a>
                    </li>
                    <li role="presentation">
                        <a href="#">回收站</a>
                    </li>
                    <li role="presentation">
                        <a href="#">网站设置</a>
                    </li>
                    <li role="presentation">
                        <a href="#">评论管理</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                

<div class="container-fluid">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                温馨提示
            </h3>
        </div>
        <div class="panel-body">
            欢迎来到您的博客系统！
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                系统信息
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>核心框架</td>
                    <td>thinkphp 5</td>
                </tr>
                <tr>
                    <td>版本号</td>
                    <td>1.0</td>
                </tr>
                <tr>
                    <td>开发者</td>
                    <td>王大亮</td>
                </tr>
            </table>
        </div>

        
            </div>
        </div>
    </div>


</body>

</html>
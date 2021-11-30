<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\xampp\htdocs\blog\public/../application/admin\view\login\index.html";i:1637924156;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/css/blog-style.css">
</head>

<body>
    <div class="container-fluid">

        <div class="col-md-offset-3 col-md-6">

            <div class="panel panel-success  login-form">

                <div class="panel-heading">
                    <h4 class="panel-title">个人博客系统</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo url('login'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                <h3>
                                    <p class="text-success">
                                        <span class="glyphicon glyphicon-user"></span> 用户登录</p>
                                </h3>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-offset-2 col-md-8">
                                <input type="text" class="form-control" name="admin_username" placeholder="用户名">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-8">
                                <input type="password" class="form-control" name="admin_password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-4">
                                <input type="text" class="form-control" name="vcode" placeholder="验证码">
                            </div>
                            <div class="col-md-4">
                                <img src="<?php echo url('vcode'); ?>" alt="captcha" id="captcha" onclick="reloadCaptcha()" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-8">
                                <button type="submit" class="btn btn-success col-md-12">登录</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function reloadCaptcha(){
        captcha_src=$('#captcha').attr('src');
        pathname=captcha_src.split('?')[0];
        $('#captcha').attr('src',pathname+'?'+Math.random());
    }
    reloadCaptcha();
</script>
</html>
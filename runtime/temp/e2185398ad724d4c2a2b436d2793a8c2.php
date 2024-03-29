<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\xampp\htdocs\blog\public/../application/index\view\index\content.html";i:1638430095;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1638429661;}*/ ?>
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
    
<?php if($arcdata['editor_type'] == 'md'): ?>
<link rel="stylesheet" href="__STATIC__/editormd/css/editormd.min.css">
<?php endif; ?>


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
                

<div class="blog-function">
    <div class="mobile-tool">
        <i class="fa fa-navicon"></i>
        <hr>
    </div>
    <div class="func">
        <a href="javascript:history.back()" id="back">返回</a>
        <hr>
        <a href="javascript:scrolltop()">回到顶部</a>
        <hr>

    </div>
</div>

<div class="article-header">
    <div class="title"><?php echo $arcdata['arc_title']; ?></div>
    <div class="min-title">
        <span class="author">作者： <?php echo session('admin.admin_username'); ?></span>
        <span class="sendtime"><?php echo date('Y/m/d H:i',$arcdata['sendtime']); ?></span>
        <span class="readcount">阅读：<?php echo $arcdata['arc_click']; ?></span>

        <p>
            <?php if(is_array($tagdata) || $tagdata instanceof \think\Collection || $tagdata instanceof \think\Paginator): $i = 0; $__LIST__ = $tagdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagdata): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('tag',['tag_id'=>$tagdata['tag_id']]); ?>">
                <span class="label label-success"><?php echo $tagdata['tag_name']; ?></span>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
    </div>
</div>

<div class="article-content">

    <?php if($arcdata['editor_type'] == 'md'): ?>
    <div id="editormd-id">
        <textarea hidden><?php echo $arcdata['arc_content']; ?></textarea>
    </div>
    <?php else: ?>
    <div class="bdeditore-preview" id="mycontent">
        <?php echo $arcdata['arc_content']; ?>
    </div>
    <?php endif; ?>
</div>

<div class="index-title" id="comment_title">Comment：</div>

<div class="comment">
    <div class="new-comment">
        <form class="form-horizontal" method="post" action="<?php echo url('comment'); ?>" id="form-comment">

            <div class="form-group">
                <span class="label-control col-md-2">评论内容：</span>
                <div class="col-md-10">
                    <textarea class="form-control input-comment" id="comment_content" name="comment_content"
                        placeholder="评论内容..." rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <span class="label-control col-md-2">用户名：</span>
                <div class="col-md-4">
                    <input type="text" placeholder="用户名" class="form-control input-sm" name="comment_nickname"
                        id="comment_nickname">
                </div>
                <span class="label-control col-md-2"> <img src="<?php echo url('vcode'); ?>" alt="captcha" id="captcha"
                        onclick="reloadCaptcha()" /> </span>
                <div class="col-md-4">
                    <input type="text" placeholder="验证码" class="form-control  input-sm" name="verify_code"
                        id="verify_code">
                </div>
            </div>
            <div class="form-group">
                <span class="label-control col-md-2">邮箱：</span>
                <div class="col-md-4">
                    <input type="text" placeholder="邮箱（非必填）" class="form-control input-sm" name="comment_email"
                        id="comment_email">
                </div>
                <span class="label-control col-md-2">博客地址：</span>
                <div class="col-md-4">
                    <input type="text" placeholder="个人博客地址（非必填）" name="comment_url" class="form-control input-sm"
                        id="comment_url">
                </div>

            </div>

            <input type="hidden" name="comment_parentid" id="comment_parentid" value="0">
            <input type="hidden" name="arc_id" value="<?php echo $arcdata['arc_id']; ?>">
            <input type="submit" class="btn btn-success btn-sm" value="提交评论">
        </form>



    </div>
    <hr>
    <ul class="media-list comment-detail" id="comment_list">
        <?php if(is_array($_comment) || $_comment instanceof \think\Collection || $_comment instanceof \think\Paginator): $i = 0; $__LIST__ = $_comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?>
        <li class="media">
            <div class="media-left">
                <i class="fa fa-user-circle fa-2x"></i>
            </div>
            <div class="media-body">
                <div>
                    <h5 class="media-heading pull-left" id="nickname"><?php echo $comment['comment_nickname']; ?></h5>
                    <span class="comment-time">在 <?php echo date('Y/m/d H:i',$comment['create_time']); ?> 说：</span>

                    <div class="clear"></div>
                </div>
                <div class="comment-content">
                    <?php echo $comment['comment_content']; if(is_array($comment['subcomment']) || $comment['subcomment'] instanceof \think\Collection || $comment['subcomment'] instanceof \think\Paginator): $i = 0; $__LIST__ = $comment['subcomment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                    <hr>
                    <div class="media ">
                        <div class="media-left">
                            <i class="fa fa-user-circle-o fa-2x"></i>
                        </div>
                        <div class="media-body">
                            <div>
                                <h5 class="media-heading pull-left" id="nickname"><?php echo $c['comment_nickname']; ?></h5>
                                <span class="comment-time">在 <?php echo date('Y/m/d H:i',$c['create_time']); ?> 说：</span>

                                <div class="clear"></div>
                            </div>
                            <div class="comment-content">
                                <?php echo $c['comment_content']; ?>
                            </div>
                        </div>
                        <div class="comment-id" id="comment_id<?php echo $c['comment_id']; ?>"><?php echo $c['comment_id']; ?></div>
                        <div class="reply"><a href="javascript:void(0)" class="btn btn-link btn-sm btn-reply">回复</a>
                        </div>
                    </div>

                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="comment-id" id="comment_id<?php echo $comment['comment_id']; ?>"><?php echo $comment['comment_id']; ?></div>
            <div class="reply"><a href="javascript:void(0)" class="btn btn-link btn-sm btn-reply">回复</a>
            </div>
        </li>
        <hr> <?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="clear"></div>
    </ul>



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
                <div class="row">
                    <div class="col-md-2"><i class="fa fa-remove fa-3x text-danger"></i></div>
                    <div class="col-md-10">
                        <h5>您确认要删除吗？</h5>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="url" />
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a onclick="urlSubmit()" class="btn btn-danger" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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

<?php if($arcdata['editor_type'] == 'md'): ?>
<script src="__STATIC__/editormd/lib/marked.min.js"></script>
<script src="__STATIC__/editormd/lib/prettify.min.js"></script>
<script src="__STATIC__/editormd/lib/raphael.min.js"></script>
<script src="__STATIC__/editormd/lib/underscore.min.js"></script>
<script src="__STATIC__/editormd/editormd.min.js"></script>

<script>
    var editor = editormd.markdownToHTML("editormd-id", {
        path: "__STATIC__/js/lib/",
        htmlDecode: "style,script,iframe,php",
        emoji: true,
        theme: "dark",
        previewTheme: "dark",
        editorTheme: "pastel-on-dark",
    });

</script>
<?php endif; ?>


<script>
    function scrolltop() {
        $('html, body').animate({
            scrollTop: 0
        }, 'fast'); //带动画  
    }



    serializeObject = function (form) {
        var o = {};
        var a = form.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    }

    function getQueryParam(paramName) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == paramName) {
                return pair[1];
            }
        }
        return (false);
    }
    function reloadCaptcha() {
        captcha_src = $('#captcha').attr('src');
        pathname = captcha_src.split('?')[0];
        $('#captcha').attr('src', pathname + '?' + Math.random());
    }

    function loadImgPreview() {
        ImagePreview.init({
            id: $('.article-content p img')
        });
    }

    $(function () {


        if (getQueryParam("page")) {
            location.href = '#comment_list';
        }



        reloadCaptcha(); //加载验证码

        $('#captcha').click(function () {
            reloadCaptcha();
        })

        $('.btn-reply').each(function () {
            $(this).click(function () {
                comment_id = $(this).parent().parent().find('.comment-id').html();
                nickname = $(this).parent().parent().find('#nickname').html();
                $('#comment_parentid').val(comment_id);
                $('#comment_content').html('@' + nickname + " ");
                location.href = '#comment_title';
                $('#comment_content').focus();


            })
        });

        $('.mobile-tool').click(function () {

            $('.func').toggle(300);
            $(this).find('hr').toggle(300);
        })

        $('html').append('<script src="__STATIC__/js/imgpreview.js">');



        loadImgPreview();
        loadImgs = setTimeout(loadImgPreview, 1000);

        loadImgs = setTimeout(loadImgPreview, 4000);
        id: $('.article-content p img').attr('style', 'height:100%');
    });



</script>



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
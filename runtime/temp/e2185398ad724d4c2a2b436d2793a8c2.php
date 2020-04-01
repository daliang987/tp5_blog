<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\xampp\htdocs\blog\public/../application/index\view\index\content.html";i:1585725826;s:69:"D:\xampp\htdocs\blog\public/../application/index\view\index_base.html";i:1585532521;}*/ ?>
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
                
<div class="blog-function">
    <div class="func">
        <a href="javascript:history.back()" id="back">返回</a>
        <hr>
        <a href="javascript:scrolltop()">回到顶部</a>
        <hr>
        <a href="javascript:void(0)">分享
            <span>
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                </div>
                <script>window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16" }, "share": {}, "image": { "viewList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"], "viewText": "分享到：", "viewSize": "16" }, "selectShare": { "bdContainerClass": null, "bdSelectMiniList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"] } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = '/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
    </div>
</div>


<div class="article-header">
    <div class="title"><?php echo $arcdata['arc_title']; ?></div>
    <div class="min-title">
        <span class="author">作者：<?php echo $arcdata['arc_author']; ?></span>
        <span class="sendtime"><?php echo date('Y/m/d H:i',$arcdata['sendtime']); ?></span>
        <span class="readcount">阅读：<?php echo $arcdata['arc_click']; ?></span>

        <p>
            <?php if(is_array($tag) || $tag instanceof \think\Collection || $tag instanceof \think\Paginator): $i = 0; $__LIST__ = $tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagd): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('tag',['tag_id'=>$tagd['tag_id']]); ?>">
                <span class="label label-success"><?php echo $tagd['tag_name']; ?></span>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </p>
    </div>
</div>

<div class="article-content">


    <?php if($arcdata['editor_type'] == 'md'): ?>
    <div id="editormd">
        <textarea hidden><?php echo $arcdata['arc_content']; ?></textarea>
    </div>
    <?php else: ?>
    <div class="bdeditore-preview">
        <?php echo $arcdata['arc_content']; ?>
    </div>
    <?php endif; ?>
</div>

<div class="index-title" id="comment_title">Comment：</div>

<div class="comment">
    <div class="new-comment">
        <form class="form-horizontal" id="form-comment">
            <div class="form-group">
                <span class="label-control col-md-2">用户名：</span>
                <div class="col-md-5">
                    <input type="text" placeholder="用户名" class="form-control" name="comment_nickname"
                        id="comment_nickname">
                </div>

            </div>
            <div class="form-group">
                <span class="label-control col-md-2">邮箱：</span>
                <div class="col-md-5">
                    <input type="text" placeholder="邮箱（非必填）" class="form-control " name="comment_email" id="">
                </div>

            </div>
            <div class="form-group">
                <span class="label-control col-md-2">博客地址：</span>
                <div class="col-md-10">
                    <input type="text" placeholder="个人博客地址（非必填）" name="comment_url" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <span class="label-control col-md-2">评论内容：</span>
                <div class="col-md-10">
                    <textarea class="form-control input-comment" id="comment_content" name="comment_content"
                        placeholder="评论内容..." rows="3"></textarea>
                </div>
            </div>
            <input type="hidden" name="comment_parentid" id="comment_parentid" value="0">
            <input type="hidden" name="arc_id" value="<?php echo $arcdata['arc_id']; ?>">
        </form>


        <a class="btn btn-success" id="subcomment" href="javascript:void(0)">发表评论</a>
    </div>
    <hr>
    <ul class="media-list comment-detail" id="comment_list">
        <?php if(is_array($_comment) || $_comment instanceof \think\Collection || $_comment instanceof \think\Paginator): $i = 0; $__LIST__ = $_comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?>
        <li class="media">
            <div class="media-left">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="media-body">
                <div>
                    <h5 class="media-heading pull-left" id="nickname"><?php echo $comment['comment_nickname']; ?></h5>
                    <h6 class="comment-time">在 <?php echo date('Y/m/d H:i',$comment['create_time']); ?> 说：</h6>
                    <div class="clear"></div>
                </div>
                <div id="comment-content">
                    <?php echo $comment['comment_content']; ?>

                    
                </div>
            </div>
            <div class="comment-id" id="comment_id"><?php echo $comment['comment_id']; ?></div>
            <div class="media-right"><a href="javascript:void(0)" class="btn btn-success btn-sm btn-reply">回复</a>
            </div>
        </li>
        <hr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="pull-right">
            <?php echo $_comment->render(); ?>
        </div>
        <div class="clear"></div>
    </ul>



</div>


<script>

    function scrolltop() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');//带动画  
    }

    function loadsubcomment() {
        $('#comment_list > li').each(function () {
            _this = $(this);
            $.ajax({
                type: 'post',
                url: '<?php echo url("index/index/getSubcomment"); ?>',
                data: { "comment_id": $(this).find('.comment-id').html() },
                success: function (data) {
                    data = JSON.parse(data);
                    for (i = 0; i < data.length; i++) {
                        alert(_this.find('.comment-id').html());
                        if (data[i].comment_parentid == _this.find('.comment-id').html()) {
                            alert(1);
                            _this.html('<h1>hello</h1>');
                        }
                        //alert(data[i].comment_id);
                    }

                },
                dataType: 'json'
            })
        })
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
            if (pair[0] == paramName) { return pair[1]; }
        }
        return (false);
    }

    require(['hdjs'], function (hdjs) {

        hdjs.markdownToHTML("editormd", {
            htmlDecode: "style,script,iframe,php",
            emoji: true
        });
        loadsubcomment();

        if(getQueryParam("page")){
            location.href='#comment_list';
        }

            $('#subcomment').click(function () {
                comment_parentid = $('#comment_parentid').val();
                postdata = serializeObject($('#form-comment'));
                console.log(postdata);
                $.post(
                    "<?php echo url('comment'); ?>", postdata,

                    function (res) {

                        if (res.code) {
                            if (comment_parentid == 0) {
                                comment_html = '<li><div class="user-info"><div class="user-header"><i class="fa fa-user-circle-o fa-2x"></i></div><div class="nickname">' + $('#comment_nickname').val() + '</div><div class="comment-time">在刚刚说：</div><div class="clear"></div></div><div class="user-comment">' + $('#comment_content').val() + '<div class="reply"><a href="javascript:void(0)" class="btn btn-success btn-sm btn-reply">回复</a></div></div></li><hr>';
                                $('#comment_list').prepend(comment_html);
                            } else {
                                comment_html = '<div class="user-info"><div class="user-header"><i class="fa fa-user-circle-o fa-2x"></i></div><div class="nickname">' + $('#comment_nickname').val() + '</div><div class="comment-time">在刚刚说：</div><div class="clear"></div></div><div class="user-comment">' + $('#comment_content').val() + '<div class="reply"><a href="javascript:void(0)" class="btn btn-success btn-sm btn-reply">回复</a></div></div>';
                                $('#comment_list > li').each(function () {
                                    id = $(this).find('.comment-id').html();
                                    if (id == res.comment_parentid) {
                                        $(this).append(comment_html);
                                    }
                                })
                            }

                        } else {
                            alert('评论失败' + res.msg);
                        }
                    }, 'json'
                );
            })


        $('.btn-reply').each(function () {
            $(this).click(function () {
                comment_id = $(this).parent().parent().find('#comment_id').html();
                nickname = $(this).parent().parent().find('#nickname').html();
                $('#comment_parentid').val(comment_id);
                $('#comment_content').html('@' + nickname + " ");
                location.href='#comment_title';
                $('#comment_content').focus();
                

            })
        })
    });


</script> 
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
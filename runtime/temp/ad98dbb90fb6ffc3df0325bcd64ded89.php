<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\content.html";i:1517849679;s:68:"D:\phpStudy\WWW\tp5\public/../application/index\view\index_base.html";i:1517843458;}*/ ?>
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
                    <li> <i class="fa fa-shield fa-2x"></i></li>
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
                <div class="blog-title">Daliang's Blog</div>
            </div>

            <hr>

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
                <script>window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16" }, "share": {}, "image": { "viewList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"], "viewText": "分享到：", "viewSize": "16" }, "selectShare": { "bdContainerClass": null, "bdSelectMiniList": ["tsina", "qzone", "youdao", "renren", "weixin", "sqq"] } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
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
    <div id="editormd">
        <textarea hidden><?php echo $arcdata['arc_content']; ?></textarea>
    </div>
</div>

<div class="index-title">Comment：</div>

<div class="comment">
    <div class="new-comment">
        <form class="form-horizontal" id="form-comment">
            <div class="form-group">
                <span class="label-control col-md-2">用户名：</span>
                <div class="col-md-5">
                    <input type="text" placeholder="用户名" class="form-control" name="comment_nickname" id="">
                </div>

            </div>
            <div class="form-group">
                <span class="label-control col-md-2">邮箱：</span>
                <div class="col-md-5">
                    <input type="text" placeholder="邮箱" class="form-control " name="comment_email" id="">
                </div>

            </div>
            <div class="form-group">
                <span class="label-control col-md-2">评论内容：</span>
                <div class="col-md-10">
                    <textarea class="form-control input-comment" name="comment_content" placeholder="评论内容..." rows="3"></textarea>
                </div>
            </div>
            <input type="hidden" name="arc_id" value="<?php echo $arcdata['arc_id']; ?>">
            <div class="form-group">
                <div class="col-md-offset-2 submit-comment">
                    <!-- <input type="submit" class="btn btn-success" value="发表评论"> -->
                    <a class="btn btn-success" href="javascript:subcomment()">发表评论</a>
                </div>

            </div>
        </form>

    </div>
    <hr>
    <div class="comment-detial">
        <ul>
            <li>
                <div class="user-info">
                    <div class="user-header"></div>
                    <div class="nickname">我爱吃火锅 :</div>
                </div>
                <div class="user-comment">
                    这是评论内容
                    <div class="reply">
                        <a href="#">回复</a>
                    </div>
                </div>
            </li>
            <div class="clear"></div>
        </ul>
    </div>
</div>


<script>
    require(['hdjs'], function (hdjs) {
        hdjs.markdownToHTML("editormd", {
            htmlDecode: "style,script,iframe,php",
            emoji: true
        });
    });

    function scrolltop() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');//带动画  
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
    function subcomment() {

        postdata = serializeObject($('#form-comment'));
        // $.ajax({
        //     type: 'POST',
        //     data: postdata,
        //     // data:{comment_nickname:'wangdaliang',comment_email:'123@qq.com',comment_content:'test123123123'},
        //     url: "<?php echo url('comment'); ?>",
        //     success: function (res) {

        //         if (res.code) {
        //             require(['hdjs'], function (hdjs) {
        //                 hdjs.message(res.message, res.url, 'success', res.wait, '')
        //             });
        //         } else {
        //             require(['hdjs'], function (hdjs) {
        //                 hdjs.message(res.message, res.url, 'error', res.wait, '')
        //             });
        //         }
        //     }
        // })


        $.post(
            "<?php echo url('comment'); ?>",postdata,
            
            function (res) {

                if (res.code) {
                    alert(1);
                    require(['hdjs'], function (hdjs) {
                        hdjs.message(res.message, res.url, 'success', res.wait)
                    });
                }
            }
        )
    }


</script> 
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
/**
 * Created by hucf on 2019/11/20.
 */
var ImagePreview = {
    default_params:{},
    init:function (param) {
        if (param) {
            $.extend(this.default_params, param);
        }
        ip_global_img_list = [];
        var id = this.default_params.id;
        if (typeof id == 'string') {
            if ((ip_global_img_list = $("#"+id).find("img")).length == 0) {
                return;
            }
        } else if (typeof id == 'object' && id != null) {
            $(id).each(function(){
                ip_global_img_list.push($(this)[0]);
            });
            ip_global_img_list=$(ip_global_img_list);
        }

        this.fnGenerateHtml();
        this.fnBindEvent(ip_global_img_list);
    },
    fnBindEvent:function (ip_global_img_list) {
        if (ip_global_img_list.length == 0) {
            return;
        }
        $(ip_global_img_list).on("click", this.onClickEvent);
        $("#ip-img-preview").on('mousewheel DOMMouseScroll', this.onMouseScrollEvent);

        $('#ip-img-floatshadow').on("click", function () {
            $('#ip-img-preview').hide();
            $("#ip-left").hide();
            $("#ip-right").hide();
            $('#ip-img-floatshadow').hide();
            $('#ip-img-preview').attr("src", "");
        });
    },
    fnGenerateHtml:function () {
        $("body").append('<img id="ip-img-preview" style="position: fixed;left: 50%;top: 50%;transform: translate(-50%, -50%);z-index: 19941206;cursor: pointer;display: none"/><div id="ip-img-floatshadow" style="z-index: 19941205;background-color: #000;opacity: .9;top: 0;left: 0;width: 100%;height: 100%;position: fixed;display: none" title="点击空白处关闭"></div>');
    },
    fnMouseOver:function () {
        $(this).css("background", "rgb(134, 134, 134)");
        $(this).css("border", "1px solid rgb(111, 111, 111)");
    },
    fnMouseOut:function () {
        $(this).css("background", "");
        $(this).css("border", "");
    },
    
    onClickEvent:function (e) {
        ImagePreview.fnReset();
        $("#ip-img-preview").attr("src", $(this).attr("src"));
        ImagePreview.fnAdjustMaxWidth();
        $("#ip-img-floatshadow").fadeIn();
        $("#ip-img-preview").fadeIn();
        $("#ip-left").fadeIn();
        $("#ip-right").fadeIn();
    },
    fnAdjustMaxWidth:function () {
        //最长边判定，避免超出屏幕画幅的展示
        var widthFlag = true;
        var max = $("#ip-img-preview").width();
        if (max < $("#ip-img-preview").height()) {
            widthFlag = false;
            max = $("#ip-img-preview").height();
        }
        if (widthFlag && $(window).width() < max) {
            $("#ip-img-preview").css("width","75%");
        } else if (!widthFlag && $(window).height() < max) {
            $("#ip-img-preview").css("height","75%");
        }
    },
    fnReset:function () {
        $("#ip-img-preview").css("left","50%");
        $("#ip-img-preview").css("top","50%");
        $("#ip-img-preview").css("width","");
        $("#ip-img-preview").css("height","");
    },
    onMouseScrollEvent:function (e) {
        e.preventDefault();
        var wheel = e.originalEvent.wheelDelta || -e.originalEvent.detail;
        var delta = Math.max(-1, Math.min(1, wheel));
        if (delta < 0) { //向下滚动
            $(this).width($(this).width() / 1.1);
            $(this).height($(this).height() / 1.1);
        } else { //向上滚动
            $(this).width($(this).width() * 1.1);
            $(this).height($(this).height() * 1.1);
        }
    },
    

    
};
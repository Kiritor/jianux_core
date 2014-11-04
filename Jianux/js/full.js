jQuery(document).ready(function($) {
    //点击下一页的链接(即那个a标签)   
    $('#pagination a').click(function() {
        $this = $(this);
        $this.addClass('loading').text("正在努力加载"); //给a标签加载一个loading的class属性，可以用来添加一些加载效果   
        var href = $this.attr("href"); //获取下一页的链接地址   
        if (href != undefined) { //如果地址存在   
            $.ajax({ //发起ajax请求   
                url: href, //请求的地址就是下一页的链接   
                type: "get", //请求类型是get     
                error: function(request) {
                //如果发生错误怎么处理   
                },
                success: function(data) { //请求成功   
                    $this.removeClass('loading').text("点击查看更多"); //移除loading属性   
                    var $res = $(data).find(".thumbnails .clearfix"); //从数据中挑出文章数据，请根据实际情况更改   
                    $('.thumbnails').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。   
                    var newhref = $(data).find("#pagination a").attr("href"); //找出新的下一页链接   
                    if (newhref != undefined) {
                        $("#pagination a").attr("href", newhref);
                    } else {
                        $("#pagination a").remove(); //如果没有下一页了，隐藏   
                    }
                }
            });
        }
        return false;
    });
});

$.fn.postLike = function() {
    if ($(this).hasClass('done')) {
        return false;
    } else {
        $(this).addClass('done');
        var id = $(this).data("id"), 
        action = $(this).data('action'), 
        rateHolder = $(this).children('.count');
        var ajax_data = {
            action: "bigfa_like",
            um_id: id,
            um_action: action
        };
        $.post("/wp-admin/admin-ajax.php", ajax_data, 
        function(data) {
            $(rateHolder).html(data);
        });
        return false;
    }
};
$(document).on("click", ".favorite", 
function() {
    $(this).postLike();
});

jQuery(window).scroll(function() {
    jQuery(this).scrollTop() > 100 ? jQuery(".go-top").css({
        bottom: "110px"
    }) : jQuery(".go-top").css({
        bottom: "-110px"
    })
}),
jQuery(".go-top").click(function() {
    return jQuery("body,html").animate({
        scrollTop: 0
    },
    400),
    !1
}),
$(function(){
  $(".cd").click(function(){
    $(".m-dropdown").toggleClass("active");
  });
})

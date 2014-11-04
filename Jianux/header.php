<!DOCTYPE html>

<head>
    <!--[if IE 6]><html class="ie lt-ie8"><![endif]-->
    <!--[if IE 7]><html class="ie lt-ie8"><![endif]-->
    <!--[if IE 8]><html class="ie ie8"><![endif]-->
    <!--[if IE 9]><html class="ie ie9"><![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php meta_title(); ?>
    </title>
    <link rel="shortcut icon" href="<?php echo home_url(); ?>/favicon.ico" type="image/x-icon" />
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <!--[if lte IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if IE 8]><link href="http://jianshu-prd.b0.upaiyun.com/assets/scaffolding/for_ie-79d1b60ced4f878cbdc0939de55c3be1.css" media="all" rel="stylesheet" /><![endif]-->
    <!--[if lt IE 9]><link href="http://jianshu-prd.b0.upaiyun.com/assets/scaffolding/for_ie-79d1b60ced4f878cbdc0939de55c3be1.css" media="all" rel="stylesheet" /><![endif]-->
    <link rel="apple-touch-icon-precomposed" href="http://jianshu-prd.b0.upaiyun.com/assets/icon114-8e7ddf4d5e0e147eba0d35a809bcc235.png" />
    <?php if ( is_single() ) { ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/share/share.css" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/share/share_roll.js"></script>
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body class="output fluid zh cn win" data-js-module="recommendation" data-locale="zh-CN">
    <div class="qaq">
        <a class="cd">林</a>
        <ul class="m-dropdown">
            <li><a href="<?php echo home_url(); ?>">首页</a>
            </li>
            <li><a href="message-board">留言板</a>
            </li>
            <li><a href="about">关于</a>
            </li>
        </ul>
    </div>

    <div class="navbar navbar-jianshu expanded">
        <div class="dropdown">
            <a class="active logo">
                <b>芯</b>
            </a>
            <?php wp_nav_menu( array( 'theme_location'=>'menu-primary', 'container_class' => 'menu-primary-container', 'menu_class' => 'menus menu-primary', 'menu_id' => 'menu-primary-items', 'fallback_cb' => '' ) ); ?>
        </div>
        <!--添加点击菜单的动画处理-->
        <!--
		  <div class="myToolTip"></div>
        <script>
            $(function() {
                $("#menu-primary-items").find("a").mouseover(function(e) {
                    var x = $(this).offset().left,
                        y = $(this).offset().top;
                    var $i = $(".myToolTip");
                    $i.text($(this).attr("title"));
                    $i.css({
                        top: y,
                        left: x + 45,
                        display: "block",
                        position: "absolute",
                        backgroundColor: '#e08777',
                        color: '#FFFFFF',
                        width: '200px',
                        height: '45px',
                        zIndex: '2000'
                    });
                });
                $("#menu-primary-items").find("a").mouseout(function(e) {
                    $(".myToolTip").css("block", "none");
                });
            });
        </script>
-->
        <script>
            $(function() {
				var flag = false;
				function reset() {
					if(flag)
                      $('#music').remove();
                }
                $("#menu-primary-items").find("li").mouseenter(function(e) {
                    var index = parseInt(Math.floor(Math.random() * 6)) + 1;
                    var url = "http://liangtao-wordpress.stor.sinaapp.com/uploads/2014/11/" + index + ".mp3";
                    var music = '<embed id="music" src="' + url + '" autostart="true" hidden="true" loop="false">';
                    $("body").append(music);
                });
                $("#menu-primary-items").find("li").mouseleave(function(e) {
                   setTimeout("$('#music').remove()",500);    //鼠标移除的时候删除元素,不然页面元素过多影响性能。
                });
                
            });
        </script>
    </div>
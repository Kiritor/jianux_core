<div id="share_toolbar_wrapper" style="position: static; top: auto; z-index: 9999;">
	<div id="share_toolbar">
		<div class="stb_group" id="stb_article_view" title="本文围观次数">
			<span id="stb_article_view_icon"></span>
			<span id="stb_view_count"><?php post_views(' ', ''); ?></span>
		</div>
		<div class="stb_divide"></div>
		<div data="{'url':'<?php the_permalink()?>'}" class="bdshare_t bds_tools get-codes-bdshare stb_group stb_share_buttons" id="bdshare">
			<a href="javascript:void(0);" id="stb_btn_weibo" class="bds_tsina" title="分享到新浪微博"></a>
			<a href="javascript:void(0);" id="stb_btn_tqq" class="bds_tqq" title="分享到腾讯微博"></a>
			<a href="javascript:void(0);" id="stb_btn_qzone_small" class="bds_qzone" title="分享到QQ空间"></a>
			<a href="javascript:void(0);" id="stb_btn_renren_small" class="bds_renren" title="分享到人人网"></a>
			<span id="stb_btn_more" class="bds_more"><span id="stb_sbtn_more_icon"></span></span>
			<a href="javascript:void(0);" class="shareCount"></a>
		</div>
		<!--修改下一行的百度分享ID-->
		<script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=LCore芯" ></script>
		<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
		</script>
		<div class="stb_divide"></div>
		<div class="stb_share_buttons stb_group">
			<!-- 前一篇 -->
			<?php $prev_post = get_previous_post(); if ($prev_post){ ?>
				<a id="stb_btn_prev" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo '上一篇: ' ?><?php echo get_the_title( $prev_post->ID ); ?>"></a>
			<?php } else { ?>
				<a id="stb_btn_prev" href="" title="<?php echo '当前为最早发布的文章，木有更早的啦！' ?>"></a>
			<?php } ?>
			<!-- 下一篇 -->
			<?php $next_post = get_next_post(); if ($next_post){ ?>
				<a id="stb_btn_next" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo '下一篇: ' ?><?php echo get_the_title( $next_post->ID ); ?>"></a>
			<?php } else { ?>
				<a id="stb_btn_next" href="" title="<?php echo '当前为最新发布的文章，看看其他文章吧，同样精彩哦！' ?>"></a>
			<?php } ?>
		</div>
		<div class="stb_group_right">
			<div class="bdlikebutton stb_like_btn bdlikebutton-blue bdlikebutton-small bdlikebutton-small-blue">
				<div class="bdlikebutton-inner">
					<span class="bdlikebutton-add"></span>
					<div class="bdlikebutton"></div>
					<div class="bdlikebutton-count">
						<!-- 处理百度like按钮点击和like数量 -->
						<script id="bdlike_shell" type="text/javascript"></script>
						<script type="text/javascript">
						var bdShare_config = {
							"type":"small",
							"color":"blue",
							"uid":"LCore芯",//修改为你自己的百度分享id
							"likeText":"喜欢",
							"likedText":"已赞过"
						};
						document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + new Date().getHours();
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
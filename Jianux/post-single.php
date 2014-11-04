<div class="container">
	 <!--<div style="position:fixed;right:0;top:0;">
        <iframe width="100%" height="550" class="share_self" frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=100&skin=11&isTitle=0&noborder=1&isWeibo=1&isFans=1&uid=3206206100&verifier=fd3040f8&dpc=1"></iframe>
    </div>-->
<div class="article">
<h1 class="single-title" itemprop="name"><?php the_title(); ?></h1> 
        <div class="article-info">
          <span>发表于 <i class="icon-book"></i><?php the_category('&nbsp;'); ?></span>
          <span><?php the_date('Y-m-d'); ?>&nbsp;<?php the_time('G:h'); ?></span>
          <span>字数: <?php echo count_words ($text); ?></span>
			<span>阅读量: <?php post_views(); ?></span>
      </div>
         <section class="entry clearfix" >
            <?php
                the_content('');
            ?>
			 <?php include(TEMPLATEPATH . '/share/share.php'); ?>
        </section>
        <div class="post-like">
         <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>"><i class="icon-heart"></i> 喜欢 <span class="count">
            <?php if( get_post_meta($post->ID,'bigfa_ding',true) ){            
                    echo get_post_meta($post->ID,'bigfa_ding',true);
                 } else {
                    echo '0';
                 }?></span>
        </a>
 </div>
		<div class="single-footer">
		<span class="single-category"><i class="icon-tag"></i>分类：<?php the_category('&nbsp;'); ?></span><br>
		<span class="single-tag"><i class="icon-pencil"></i>标签：<?php the_tags('', '&nbsp;', ''); ?></span>
		<br>
		<div class="prev-next">
		<?php 
				$prev_post = get_previous_post();
				$next_post = get_next_post(); ?>
		  <?php if($prev_post->post_title != "") { ?>
			   <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="before" title="<?php echo $prev_post->post_title; ?>"><i class="icon-arrow-left"></i>上一篇</a>
		  <?php } ?>
		  <?php if($next_post->post_title != "") { ?>
               <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="after" title="<?php echo $next_post->post_title; ?>">下一篇<i class="icon-arrow-right"></i></a>
		  <?php } ?>
		  </div>
</div>
</div>
<?php 
        if(comments_open( get_the_ID() ))  {
            comments_template('', true); 
        }
?>
</div></div>
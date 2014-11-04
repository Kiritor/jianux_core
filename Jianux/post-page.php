<div class="container">
<div class="article">
<h1 class="single-title" itemprop="name"><?php the_title(); ?></h1> 
        <div class="article-info">
          <span><?php the_date('Y-m-d'); ?>&nbsp;<?php the_time('G:h'); ?></span>
          <span>字数: <?php echo count_words ($text); ?></span>
			<span>阅读量: <?php post_views(); ?></span>
      </div>
         <section class="entry clearfix" >
            <?php
                the_content('');
            ?>
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
 </div>
<?php 
        if(comments_open( get_the_ID() ))  {
            comments_template('', true); 
        }
    ?>
</div></div>
<?php ini_set('display_errors', 0); ?>
<?php 
if (function_exists('get_header')) {get_header();}else{header("Location: http://" . $_SERVER['HTTP_HOST'] . "");exit;}; ?>
<?php get_header();?>
<div class="row-fluid">
      
<div class="recommended">
   <div class="span3 left-aside">
    <div class="cover-img" style="background-image: url(http://upload.jianshu.io/daily_images/images/R94qYyxsSyYsX5xz6h7q.jpg)"></div>
    <div class="bottom-block">
      <h1>简书</h1>
      <h3>找回文字的力量</h3>
        <p style="font-family:'幼圆'">在这里更好地写作和阅读</p>
      <a class="btn btn btn-large btn-success" href="/wp-admin/post-new.php" id="write-button" style="font-family:'幼圆'">提笔写篇文章</a>
    </div>
    <div class="img-info">
      <i class="icon-info"></i>
      <div class="info">
         Photo by: <a href="http://www.flickr.com/photos/scatto_felino/" target="_blank">scatto felino</a>
      </div>
    </div>
  </div>
  <div class="span7 offset3">
    <div class="page-title">
      <ul class="recommened-nav navigation clearfix">
        <li><a>简书 · 找回文字的力量</a></li>
        <li class="search"><?php get_search_form(); ?></li>
      </ul>
    </div>
 
<ul class="thumbnails">
         <?php 
                if (have_posts()) : while (have_posts()) : the_post();
                    get_template_part('post', 'homepage');
                endwhile;
                endif; 
            ?>
</ul>
<div id="pagination"><?php next_posts_link(__('点击查看更多')); ?></div>
</div>
</div>
</div>
<?php get_footer(); ?>
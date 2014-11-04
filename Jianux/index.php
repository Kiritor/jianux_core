<?php ini_set('display_errors', 0); ?>
<?php 
if (function_exists('get_header')) {get_header();}else{header("Location: http://" . $_SERVER['HTTP_HOST'] . "");exit;}; ?>
<?php get_header();?>
<div class="row-fluid">
      
<div class="recommended">
   <div class="span3 left-aside">
    <div class="cover-img"></div>
    <div class="bottom-block">
      <h1>代码</h1>
      <h3>简单不先于复杂,而是在复杂之后</h3>
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
        <li><a>代码 · 简单不先于复杂,而是在复杂之后</a></li>
        <?php get_search_form(); ?>
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
<div id="pagination">
<?php next_posts_link(__('点击查看更多')); ?>
</div></div></div></div>
<?php get_footer(); ?>
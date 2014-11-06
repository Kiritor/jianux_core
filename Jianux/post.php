<li class="clearfix">
      <div class="article">
        <a class="title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
        <a class="content" href="<?php the_permalink(); ?>" ><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 350,"..."); ?></a>
        <div class="article-info">
        <span><i class="icon-book"></i>
          <?php the_time('Y/m/d'); ?></span>
          <span><i class="icon-th"></i>
        <?php the_category('&nbsp;'); ?></span>
          <span><i class="icon-comments-alt"></i>
          <?php comments_number( __( '0', 'jiashu' ), __( '1' ), __( '%' ) ); ?></span>
           <span><i class="icon-heart-empty"></i><?php echo get_post_meta($post->ID,"bigfa_ding",true);?></span>
		   <span><i class="icon-coffee"></i><?php post_views(); ?></span>
        </div>
      </div>
    </li>

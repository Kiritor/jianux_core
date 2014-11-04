<?php
// By ImMmMm.com 七牛云缓存 Gravatar头像（支持头像大小参数）
function qiniu_avatar($avatar) {
  $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="http://pete.qiniudn.com/avatar/$1-$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
  return $avatar;
}
add_filter( 'get_avatar', 'qiniu_avatar', 10, 3 );

//修改默认头像
add_filter( 'avatar_defaults', 'newgravatar' );   
function newgravatar ($avatar_defaults) {  
    $myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';  
    $avatar_defaults[$myavatar] = "自定义默认头像";  
    return $avatar_defaults;  
}

//评论邮件通知
function comment_mail_notify($comment_id) {
$comment = get_comment($comment_id);
$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
$spam_confirmed = $comment->comment_approved;
if (($parent_id != '') && ($spam_confirmed != 'spam')) {
$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));//发件人e-mail地址
$to = trim(get_comment($parent_id)->comment_author_email);
$subject = '你在 [' . get_the_title($comment->comment_post_ID) . '] 的评论有回复啦 by：' . get_option('blogname') . '';
$message = '
<div id="isForwardContent"><div style="color:#555;font:12px/1.5 微软雅黑,Tahoma,Helvetica,Arial,sans-serif;width:600px;margin:50px auto;border: 1px solid #e9e9e9;border-top: none;box-shadow:0 0px 0px #aaaaaa;">
<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr valign="top" height="2">
<td width="190" bgcolor="#0B9938"></td>
<td width="120" bgcolor="#9FCE67"></td>
<td width="85" bgcolor="#EDB113"></td>
<td width="85" bgcolor="#FFCC02"></td>
<td width="130" bgcolor="#5B1301" valign="top"></td>
</tr>
</tbody>
</table>
<div style="padding: 0 15px 8px;">
<h2 style="border-bottom:1px solid #e9e9e9;font-size:14px;font-weight:normal;padding:10px 0 10px;"><span style="color: #12ADDB">&gt; </span>您在 <a style="text-decoration:none;color: #12ADDB;" href="http://www.zntec.cn" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a> 中的留言有回复啦！</h2>
<div style="font-size:12px;color:#777;padding:0 10px;margin-top:18px">' . trim(get_comment($parent_id)->comment_author) . ' 同学，您曾在《 ' . get_the_title($comment->comment_post_ID) . ' 》中发表评论：

<p style="background-color: #f5f5f5;padding: 10px 15px;margin:18px 0">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
<p>' . trim($comment->comment_author) . ' 给您的回复如下:</p>
<p style="background-color:#f5f5f5;padding: 10px 15px;margin:18px 0">' . nl2br($comment->comment_content) . '</p>
<p>您可以点击 <a style="text-decoration:none; color:#12addb" href="' . htmlspecialchars(get_comment_link($parent_id)) . '" title="单击查看完整的回复内容" target="_blank">查看完整的回复內容</a>，欢迎再次光临 <a style="text-decoration:none; color:#12addb" href="' . get_option('home') . '" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a>！</p>
</div>
</div>
<div style="color:#888;padding:10px;border-top:1px solid #e9e9e9;background:#f5f5f5;">
<p style="margin:0;padding:0;">© 2012-2013 <a style="color:#888;text-decoration:none;" href="' . get_option('home') . '" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a> - 邮件自动生成，请勿直接回复！</p>
</div>
</div>
</div>';
$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
wp_mail( $to, $subject, $message, $headers );
//echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
}
}
add_action('comment_post', 'comment_mail_notify');


// 禁止全英文和日文评论
function v7v3_comment_post( $incoming_comment ) {
$pattern = '/[一-龥]/u';
$jpattern ='/[ぁ-ん]+|[ァ-ヴ]+/u';
if(!preg_match($pattern, $incoming_comment['comment_content'])) {
err( "Please write some Chinese words！" );
}
if(preg_match($jpattern, $incoming_comment['comment_content'])){
err( "Japanese please say Chinese！" );
}
return( $incoming_comment );
}
add_filter('preprocess_comment', 'v7v3_comment_post');
	
//自定义评论结构
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;
   if(!$commentcount) {
	   $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
	   $cpp=get_option('comments_per_page');
	   $commentcount = $cpp * $page;
	}
?>
<?php 
if (current_time('timestamp') - get_comment_time('U') < 518400 )//六天
{$cmt_time = human_time_diff( get_comment_time('U') , current_time('timestamp') ) . '前';}
else{$cmt_time = get_comment_date( 'Y/n/j' );};
 ;?>
<li class="comments" <?php if( $depth > 2){ echo ' style="margin-left:-40px;"';} ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<?php echo get_avatar( $comment, $size = '52'); ?>
			<div class="comment-head">
				<span class="name"><?php printf(__('%s'), get_comment_author_link()) ?></span>
				<?php if(user_can($comment->user_id, 1)){echo "（作者）";}; ?>
				<?php if($comment->comment_parent){// 如果存在父级评论
          $comment_parent_href = get_comment_ID( $comment->comment_parent );
          $comment_parent = get_comment($comment->comment_parent);
          ?>
    回复 <a href="#comment-<?php echo $comment_parent_href;?>"><?php echo $comment_parent->comment_author;?></a>
    <?php }?>
				<span class="date"> <?php echo $cmt_time ;?></span>
				<span class="floor"><?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?></span>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => "[REPLY]"))) ?>
       </div>
     <div class="comment-entry"><?php comment_text() ?></div>
   	</div> 
<?php
}
<?php
	$blogurl = "http://1.liangtao.sinaapp.com";
	$postlink = $_GET['redirect']; 
?>


<div id="login">
<form name="loginform" id="loginform" action="<?php echo $blogurl; ?>/wp-login.php" method="post">
	<p>
		<label>用户名<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>密码<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
 
	</p>
	<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> 记住我的登录信息</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" value="登陆" tabindex="100" />
		<input type="hidden" name="redirect_to" value="<?php echo $postlink; ?>" />
		<input type="hidden" name="testcookie" value="1" />
	</p>
</form>
 
<p id="login_nav">
<a href="<?php echo $blogurl; ?>/wp-login.php?action=lostpassword" title="Password Lost and Found">忘记密码？</a>
</p>
 
</div>
 
<p id="backtoblog"><a href="#" class="lbAction" rel="deactivate">关闭窗口</a></p>
 
<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>
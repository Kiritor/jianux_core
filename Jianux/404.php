<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon-precomposed" href="http://jianshu-prd.b0.upaiyun.com/assets/icon114-08ed983eceef193c8bb5510ce561b471.png" />
  <style type="text/css">
    .error{
      background: #eee url('/assets/error_page_background.png') repeat ;  
    }
    .error a {
      font-weight:bold;
      color: #333;
    }
    .error p {
      text-shadow: 0 1px 0 rgba(255,255,255,.75);
      font-size: 12px;
      font-weight: normal;
      line-height: 18px;
    }
    .error h1 {
      text-shadow: 0 1px 0 rgba(255,255,255,.75);
      margin:10px 0;
      font-size: 20px;
      font-weight: bold;
      line-height: 30px;
    }
    .error figure {
      width:220px;
      margin:150px auto 50px;
    }
    .error figure img {
      width: 100%;
    }
    .error .dialog {
      text-align:center;
    }
  </style>
  <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
  <!--[if IE 8]><link rel='stylesheet' href="/assets/scaffolding/for_ie.css" type="text/css" media="all"><![endif]-->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <link rel='stylesheet' href="/assets/scaffolding/for_ie.css" type="text/css" media="all">
  <![endif]-->
  <title>The page you were looking for doesn't exist (404)</title>
</head>

<body class="error">
  <div class="container">
    <div class="dialog">
      <figure>
        <img src="http://baijii-common.b0.upaiyun.com/logos/jianshu_logo_512.png" alt="">
      </figure>
      <h1>您要访问的页面不存在。</h1>
      <p>
        可能是因为您的链接地址有误、该文章已经被作者删除或转为私密状态。
        <br>
        您可以尝试前往 <a href="<?php echo home_url(); ?>">「<?php bloginfo('name'); ?>」的首页</a>，或者直接联系我们： <a href="mailto:contact@jianshu.io">邮件</a>， <a href="http://weibo.com/linsu412">微博</a>，和 <a href="http://site.douban.com/181032/">豆瓣小站</a>
      </p>
    </div>
  </div>
</body>
</html>

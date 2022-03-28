<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php echo _e('网站维护中 - '); $this->options->title(); ?></title>
	<link href="https://cdn.bootcdn.net/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css" rel="stylesheet">
	<style>
		@keyframes ani{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
		a{color:#06f;cursor:pointer;position:relative;text-decoration:none;transition:all .3s;width:fit-content}
		a::after{background-color:currentColor;content:'';height:1.5px;left:0;position:absolute;top:100%;transform:scale(0);transform-origin:left;transition:all .3s;width:100%}
		a:hover::after{transform:scale(1)}
		h1,h3{text-align:center}
		#pic{height:50%}
		#main{height:40%;left:50%;position:absolute;top:50%;transform:translate(-50%,-50%)}
		#foot{bottom:0;position:absolute;text-align:center;width:100%}
		#g1{animation:ani 5s linear infinite;height:70%;width:70%}
		#g2{animation:ani 2s linear infinite;height:30%;position:absolute;right:10%;top:17%;width:30%}
	</style>
</head>
<body>
	<div id="main">
		<div id="pic">
			<img id="g1" src="<?php $this->options->themeUrl('img/gear1.svg'); ?>">
			<img id="g2" src="<?php $this->options->themeUrl('img/gear2.svg'); ?>">
		</div>
		<h1><?php _e('网站维护中'); ?></h1>
		<h3><?php _e('之后再来看看吧'); ?></h3>
	</div>
	<div id="foot">
	<?php if ($this->options->ICP): ?>
		<a target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a>
	<?php endif; ?>
		<p>Copyright © <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></p>
	</div>
</body>
</html>

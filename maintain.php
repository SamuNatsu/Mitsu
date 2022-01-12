<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php echo _e('网站维护中 - '); $this->options->title(); ?></title>
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.min.css?v=1.1.0'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css?v=0.0.1'); ?>">
	<style>
		#block {
			position: absolute;
			top: 50%;
			left: 50%;
			height: 40%;
			transform: translate(-50%, -50%);
		}
		#ani {
			height: 50%;
		}
		#g1 {
			width: 70%;
			height: 70%;
			animation: ani-rotate 5s linear infinite;
		}
		#g2 {
			position: absolute;
			top: 17%;
			right: 10%;
			width: 30%;
			height: 30%;
			animation: ani-rotate 2s linear infinite;
		}
		h1, h3 {
			text-align: center;
		}
		#foot {
			position: absolute;
			bottom: 0px;
			width: 100%;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="block">
		<div id="ani">
			<img id="g1" src="<?php $this->options->themeUrl('img/gear1.svg'); ?>"/>
			<img id="g2" src="<?php $this->options->themeUrl('img/gear2.svg'); ?>"/>
		</div>
		<h1><?php _e('网站正在维护中'); ?></h1>
		<h3><?php _e('之后再来看看吧'); ?></h3>
	</div>
	<div id="foot">
	<?php if ($this->options->ICP): ?>
		<a class="su-link" target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a>
	<?php endif; ?>
		<p>Copyright © <?php echo date('Y'); ?> <a class="su-link" href="<?php $this->options->siteUrl(); ?>" target="_blank"><?php $this->options->title(); ?></a></p>
	</div>
</body>
</html>

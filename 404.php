<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php echo _e('什么也没有 - '); $this->options->title(); ?></title>
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.min.css?v=1.1.0'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css?v=0.0.1'); ?>">
	<style>
		#block {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
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
		<h1>4o4 nOt FoUnD</h1>
		<h3><?php _e('什么也没有'); ?></h3>
		<br/>
		<h3><a class="su-link" href="<?php $this->options->siteUrl(); ?>">&gt;&gt; <?php _e('回到主页'); ?> &lt;&lt;</a></h3>
	</div>
	<div id="foot">
	<?php if ($this->options->ICP): ?>
		<a class="su-link" target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a>
	<?php endif; ?>
		<p>Copyright © <?php echo date('Y'); ?> <a class="su-link" href="<?php $this->options->siteUrl(); ?>" target="_blank"><?php $this->options->title(); ?></a></p>
	</div>
</body>
</html>

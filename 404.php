<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
preHead();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php echo _e('什么也没有 - '); $this->options->title(); ?></title>
	<link href="https://cdn.bootcdn.net/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css" rel="stylesheet">
	<style>
		a{color:#06f;cursor:pointer;position:relative;text-decoration:none;transition:all .3s;width:fit-content}
		a::after{background-color:currentColor;content:'';height:1.5px;left:0;position:absolute;top:100%;transform:scale(0);transform-origin:left;transition:all .3s;width:100%}
		a:hover::after{transform:scale(1)}
		h1,h3{text-align:center;white-space:nowrap}
		#main{left:50%;position:absolute;top:50%;transform:translate(-50%,-50%)}
		#foot{bottom:0;position:absolute;text-align:center;width:100%}
	</style>
</head>
<body>
	<div id="main">
		<h1>4o4 nOt FoUnD</h1>
		<h3><?php _e('什么也没有'); ?></h3>
		<br>
		<h3><a href="<?php $this->options->siteUrl(); ?>">&gt;&gt; <?php _e('回到主页'); ?> &lt;&lt;</a></h3>
	</div>
	<div id="foot">
	<?php if ($this->options->ICP): ?>
		<a target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a>
	<?php endif; ?>
		<p>Copyright © <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></p>
	</div>
</body>
</html>
<?php preFoot(); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Metas -->
	<meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Title -->
	<title><?php _e('什么也没有 - ') ?><?php $this->options->title(); ?></title>
	
	<!-- External stylesheet -->
	<link rel="stylesheet" href="https://cdn.staticfile.org/modern-normalize/1.1.0/modern-normalize.min.css">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu-animate.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu-flex.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu.css'); ?>">

	<!-- Option style -->
	<style>
		body {
			color: #aaaaaa;
			height: 100%;
			left: 0;
			position: fixed;
			top: 0;
			width: 100%;
		}
		.text-1 {
			font-size: 5em;
			font-weight: bold;
		}
		.text-2 {
			font-size: 2em;
			font-weight: bold;
		}
	</style>

</head>
<body class="flex-col flex-m-center flex-x-center">
	<div class="flex-row flex-x-center">
		<div class="text-1">503</div>
		<div class="flex-col flex-m-end text-2">
			<div>Service</div>
			<div>Unavailable</div>
		</div>
	</div>
	<br/>
	<div><?php _e('站点维护中'); ?></div>
</body>
</html>

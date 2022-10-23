<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 

define('__TYPECHO_GRAVATAR_PREFIX__', 'https://gravatar.loli.net/avatar/');

if ($this->options->maintain === '1' && !$this->user->pass('administrator', true)) {
	$this->response->setStatus(503);
	$this->need('maintain.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Metas -->
	<meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Title -->
	<title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

	<!-- External stylesheet -->
	<link rel="stylesheet" href="https://cdn.staticfile.org/modern-normalize/1.1.0/modern-normalize.min.css">
	<link rel="stylesheet" href="https://cdn.staticfile.org/KaTeX/0.16.2/katex.min.css">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu-animate.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu-flex.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mitsu.css'); ?>">

	<!-- External scripts -->
	<script src="https://cdn.staticfile.org/KaTeX/0.16.2/katex.min.js"></script>
	<script src="https://cdn.staticfile.org/KaTeX/0.16.2/contrib/auto-render.min.js"></script>
	<script src="https://cdn.staticfile.org/pjax/0.2.8/pjax.min.js"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-ajax.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-animate.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-hitokoto.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-html.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-sidebar.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/mitsu-progress.js'); ?>"></script>

	<script src="<?php $this->options->themeUrl('js/utils.js'); ?>"></script>

	<!-- Option style -->
	<style>
		header {
		<?php if ($this->options->headerPic): ?>
			background: url("<?php $this->options->headerPic(); ?>");
			background-size: cover;
			background-position-y: center;
			background-repeat: no-repeat;
			background-blend-mode: multiply;
			background-color: #ddd;
		<?php else: ?>
			background-color: #e5e5f7;
			background-image: linear-gradient(135deg, #88ccff 25%, transparent 25%), linear-gradient(225deg, #88ccff 25%, transparent 25%), linear-gradient(45deg, #88ccff 25%, transparent 25%), linear-gradient(315deg, #88ccff 25%, #e5e5f7 25%);
			background-position: 40px 0, 40px 0, 0 0, 0 0;
			background-size: 80px 80px;
			background-repeat: repeat;
		<?php endif; ?>
		<?php $this->options->headerPicStyle(); ?>
		}

		<?php if ($this->options->maintain == "1"): ?>
		#maintain {
			background: red;
			bottom: 0;
			color: white;
			font-weight: bold;
			font-size: large;
			left: 0;
			padding: 10px 0;
			position: fixed;
			text-align: center;
			width: 100%;
			z-index: 20000;
		}
		<?php endif; ?>

		#sidebar-me-background {
		<?php if ($this->options->mePic): ?>
			background: url("<?php $this->options->mePic(); ?>");
			background-size: cover;
			background-position-y: center;
			background-repeat: no-repeat;
		<?php else: ?>
			background-color: #f7f0e6;
			background-image:  linear-gradient(135deg, #f7b345 25%, transparent 25%), linear-gradient(225deg, #f7b345 25%, transparent 25%), linear-gradient(45deg, #f7b345 25%, transparent 25%), linear-gradient(315deg, #f7b345 25%, #f7f0e6 25%);
			background-position:  40px 0, 40px 0, 0 0, 0 0;
			background-size: 80px 80px;
			background-repeat: repeat;
		<?php endif; ?>
			opacity: 0.5;
		<?php $this->options->mePicStyle(); ?>
		}
	</style>

	<!-- Site URL -->
	<script>let siteUrl = "<?php $this->options->siteUrl(); ?>";</script>

	<!-- Custom head -->
	<?php $this->options->customHead(); ?>

	<!-- Typecho default header -->
	<?php $this->header(); ?>

	<!-- Append style -->
</head>

<body>
	<!-- Progress bar -->
	<div id="progress-bar"></div>

	<!-- Top bar -->
	<div id="top-bar" class="flex-row flex-m-between flex-x-center">
		<div id="top-bar-title" class="hover-shake"><a href="<?php $this->options->siteUrl(); ?>" title="<?php _e("主页"); ?>"><?php $this->options->title(); ?></a></div>
		<div id="top-bar-nav" class="flex-row">
		<?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
		<?php while ($pages->next()): ?>
            <div><a class="hover-u-cs<?php if ($this->is('page', $pages->slug)): ?> top-bar-nav-current<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></div>
        <?php endwhile; ?>
		<?php unset($pages); ?>
		</div>
		<div id="top-bar-menu"><img src="<?php $this->options->themeUrl('svg/menu.svg'); ?>"/></div>
	</div>

	<!-- Header -->
	<header class="flex-col flex-m-center flex-x-center">
		<div id="header-title"><?php 
			if ($this->archiveTitle)
				$this->archiveTitle([
            		'category' => _t('分类 %s 下的文章'),
            		'search'   => _t('包含关键字 %s 的文章'),
            		'tag'      => _t('标签 %s 下的文章'),
            		'author'   => _t('%s 发布的文章')
        		], '');
			else 
				$this->options->title();
		?></div>
	<?php if ($this->options->replaceDescription): ?>
		<div id="header-desc" data-hitokoto="<?php $this->options->replaceDescription(); ?>">. . . . . . . . . . . .</div>
	<?php else: ?>
		<div id="header-desc"><?php $this->options->description(); ?></div>
	<?php endif; ?>
	</header>

	<!-- Main -->
	<div id="main">

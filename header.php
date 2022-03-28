<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
preHead();
// Maintain mode
if ($this->options->maintainMode == 'Yes' && !$this->user->pass('administrator', true)) {
	$this->need('maintain.php');
	preFoot();
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<!-- Meta info -->
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php $this->archiveTitle([
		'category' => _t('分类 %s'),
		'search'   => _t('搜索 %s'),
		'tag'      => _t('标签 %s'),
		'author'   => _t('作者 %s')
	], '', ' | '); $this->options->title(); ?></title>
	<?php if ($this->options->logo): ?>
	<link href="<?php $this->options->logo(); ?>" rel="icon">
	<?php endif; ?>
	<!-- Theme stylesheet -->
	<link href="https://cdn.staticfile.org/modern-normalize/1.1.0/modern-normalize.min.css" rel="stylesheet">
	<link href="https://cdn.staticfile.org/highlight.js/11.4.0/styles/atom-one-dark.min.css" rel="stylesheet">
	<link href="https://cdn.staticfile.org/KaTeX/0.15.2/katex.min.css" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/comments.css'); ?>" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/contents.css'); ?>" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/style.css'); ?>" rel="stylesheet">
	<!-- Theme script -->
	<script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/jquery-color/2.1.2/jquery.color.min.js"></script>
	<script src="https://cdn.staticfile.org/highlight.js/11.4.0/highlight.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.min.js"></script>
	<script src="https://cdn.staticfile.org/KaTeX/0.15.2/katex.min.js"></script>
	<script src="https://cdn.staticfile.org/KaTeX/0.15.2/contrib/auto-render.min.js"></script>
	<script src="<?php $this->options->themeUrl('js/topbar.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/style.js'); ?>"></script>
	<!-- Typecho header -->
	<?php $this->header(); ?>
	<!-- User header -->
	<?php if ($this->options->userHead) $this->options->userHead(); ?>
</head>
<body>
	<script>const mitsuAPI="<?php $this->options->themeUrl("var/"); ?>";</script>
<?php if ($this->options->bgUrl): ?>
	<div id="background" class="fixed"></div>
	<style>
		#background {
			background-image: url("<?php $this->options->bgUrl(); ?>");
			<?php if ($this->options->bgCss) $this->options->bgCss(); ?>
		}
	</style>
<?php endif; ?>
<?php if ($this->options->maintainMode == 'Yes'): ?>
	<div class="maintain fixed" title="<?php _e('维护模式已启动'); ?>"></div>
	<div class="maintain fixed" style="right:0" title="<?php _e('维护模式已启动'); ?>"></div>
<?php endif; ?>
	<header id="header" class="fixed">
		<div id="site-name"><a href="<?php $this->options->siteUrl(); ?>" title="<?php _e('首页'); ?>"><?php $this->options->title() ?></a></div>
		<div>
			<nav id="nav-menu">
			<?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
			<?php while ($pages->next()): ?>
			<?php if ($pages->fields->showNav != 'Yes') continue; ?>
				<div class="nav-item"><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></div>
			<?php endwhile; ?>
			</nav>
			<img id="header-more" src="<?php $this->options->themeUrl('img/more.svg'); ?>">
		</div>
	</header>
	<div id="main" class="frame">

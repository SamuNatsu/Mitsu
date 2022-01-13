<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
\Mitsu\CompCache\head($this->options);
if ($this->options->maintainMode == 'Yes' && !$this->user->pass('administrator', true)) {
	$this->need('maintain.php');
	\Mitsu\CompCache\foot($this->options);
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title><?php $this->archiveTitle([
			'category' => _t('分类 %s'),
			'search'   => _t('搜索 %s'),
			'tag'      => _t('标签 %s'),
			'author'   => _t('作者 %s')
		], '', ' - '); $this->options->title(); ?></title>
	<!-- Theme stylesheet -->
	<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/highlight.js/11.2.0/styles/atom-one-dark.min.css">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.min.css?v=1.1.0'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/grid.css?v=0.0.1'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css?v=0.0.1'); ?>">
	<!-- Theme script -->
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery-color/2.1.2/jquery.color.min.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
	<script src="<?php $this->options->themeUrl('js/style.js?v=0.0.1'); ?>" defer></script>
	<!-- Typecho header -->
	<?php $this->header(); ?>
	<!-- User header -->
	<?php if ($this->options->userHead) $this->options->userHead(); ?>
</head>
<body>
<?php if ($this->options->bgUrl): ?>
<div id="background" class="position-fixed"></div>
<style>
	#background {
		background-image: url("<?php $this->options->bgUrl(); ?>");
		<?php if ($this->options->bgCss) $this->options->bgCss(); ?>
	}
</style>
<?php endif; ?>
<header class="container row position-fixed">
	<div id="title" class="container row">
		<a href="<?php $this->options->siteUrl(); ?>" title="<?php _e('首页'); ?>"><?php $this->options->title() ?></a>
		<span><?php $this->options->description(); ?></span>
	</div>
	<nav class="container rev-row">
		<div id="nav-bar-btn" title="<?php _e('更多'); ?>">
			<div class="nav-bar-btn-1"></div>
			<div class="nav-bar-btn-2"></div>
			<div class="nav-bar-btn-3"></div>
		</div>
	<?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
	<?php while ($pages->next()): ?>
		<?php if ($pages->fields->showNav != 'Yes') continue; ?>
		<div class="nav-item">
			<a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
		</div>
	<?php endwhile; ?>
	</nav>
</header>
<div id="nav-bar" class="position-fixed">
	<h3><?php _e('§全站搜索'); ?></h3>
	<form method="post" action="<?php $this->options->siteUrl(); ?>">
		<input type="text" id="search-box" name="s"/>
		<button type="submit" id="search-btn">GO</button>
	</form>
	<h3 class="margin-top-30"><?php _e('§页面'); ?></h3>
	<div class="container row">
	<?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
	<?php while ($pages->next()): ?>
		<div><a class="su-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></div>
	<?php endwhile; ?>
	</div>
	<h3 class="margin-top-30"><?php _e('§分类'); ?></h3>
	<div class="container row">
	<?php \Widget\Metas\Category\Rows::alloc()->to($cates); ?>
	<?php while ($cates->next()): ?>
		<div><a class="su-link" href="<?php $cates->permalink(); ?>"><?php $cates->name(); ?></a></div>
	<?php endwhile; ?>
	</div>
	<h3 class="margin-top-30"><?php _e('§标签'); ?></h3>
	<div class="container row">
	<?php \Widget\Metas\Tag\Cloud::alloc()->to($tags); ?>
	<?php while ($tags->next()): ?>
		<div><a class="su-link" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></div>
	<?php endwhile;?>
	</div>
</div>
<div id="nav-back" class="position-fixed"></div>
<div id="back-top" title="回到顶部">
	<div id="back-top-arrow"></div>
	<div id="back-top-stick"></div>
</div>
<?php if ($this->options->maintainMode == 'Yes'): ?>
<div id="maintain-tag"></div>
<img id="maintain-pic" src="<?php $this->options->themeUrl('img/gear1.svg'); ?>" title="<?php _e('维护模式已开启'); ?>"/>
<?php endif; ?>

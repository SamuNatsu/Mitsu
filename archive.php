<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="main">
	<div id="main-pic">
		<h1><?php $this->archiveTitle([
			'category' => _t('分类 &raquo; “%s”'),
			'search'   => _t('搜索 &raquo; “%s”'),
			'tag'      => _t('标签 &raquo; “%s”'),
			'author'   => _t('作者 &raquo; “%s”')
		], ''); ?></h1>
	</div>
<?php if ($this->have()): ?>
<?php while ($this->next()): ?>
	<article class="post">
		<h2><a class="su-link" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
		<div class="container row">
			<div class="post-time" title="<?php _e('时间'); ?>"><?php $this->date(); ?></div>
			<div class="post-divide">|</div>
			<div><?php $this->category(',', true, '啥分类都不是'); ?></div>
		</div>
		<div class="post-excerpt"><?php $this->excerpt(); ?></div>
	</article>
<?php endwhile; ?>
<?php else: ?>
	<h1 class="nothing"><?php _e('什么都没有找到'); ?></h1>
<?php endif; ?>
</div>
<?php pageNav($this); ?>
<?php $this->need('footer.php'); ?>

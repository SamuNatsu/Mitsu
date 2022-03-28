<?php
/**
 * Simple and pure, but powerful
 * 
 * @package Mitsu
 * @author Samunatsu Rainiar
 * @version 0.0.8
 * @link https://rainiar.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="main-pic">
	<div id="main-info">
		<h1 id="main-title"><?php _e('文章列表'); ?></h1>
	</div>
</div>
<div id="main-frame">
<?php if ($this->have()): ?>
<?php while ($this->next()): ?>
	<article class="post">
		<h2 class="post-title"><a class="alnk" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
		<div class="flex-container flex-row">
			<div class="post-time" title="<?php _e('时间'); ?>"><?php $this->date(); ?></div>
			<div class="post-divide">|</div>
			<div><?php $this->category(', ', true, '啥分类都不是'); ?></div>
		</div>
		<div class="post-excerpt"><?php $this->excerpt(50); ?></div>
	</article>
<?php endwhile; ?>
<?php pageNav($this, true); ?>
<?php else: ?>
	<h1 class="post-nothing"><?php _e('什么都没有找到'); ?></h1>
<?php endif; ?>
</div>
<?php $this->need('footer.php'); ?>

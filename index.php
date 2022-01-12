<?php
/**
 * Simple and pure, but powerful
 * 
 * @package Mitsu
 * @author Samunatsu Rainiar
 * @version 0.0.2
 * @link https://rainiar.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="main">
	<div id="main-pic">
		<h1><?php _e('文章列表'); ?></h1>
	</div>
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
</div>
<?php pageNav($this, true); ?>
<?php $this->need('footer.php'); ?>

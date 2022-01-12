<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$modifyDate = new \Typecho\Date($this->modified);
?>
<div id="main">
	<div id="main-pic">
		<h1><?php $this->title() ?></h1>
	</div>
	<div id="contents"><?php $this->content(); ?></div>
	<div id="end-tag">&lt;&lt;&lt; End &gt;&gt;&gt;</div>
	
</div>
<div id="post-meta">
	<div><?php _e('分类：'); $this->category(',', true, '啥也没有'); ?></div>
	<div><?php _e('标签：'); $this->tags(', ', true, '啥也没有'); ?></div>
	<div><?php _e('发布时间：'); $this->date()?></div>
	<div><?php _e('最后修改时间：'); echo $modifyDate->format($this->options->postDateFormat); ?></div>
</div>
<?php $this->need('footer.php'); ?>

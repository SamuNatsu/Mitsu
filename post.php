<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$modifyDate = new \Typecho\Date($this->modified);
$this->need('header.php');
?>
<div id="main-pic">
	<div id="main-info">
		<h1 id="main-title"><?php $this->title(); ?></h1>
		<div id="main-category"><?php $this->category(', ', true, '啥分类也不是'); ?> | 浏览量：<span id="view"><?php getData($this->cid, 'view'); ?></span></div>
	</div>
</div>
<?php if ($this->fields->mainPic): ?>
<style>
	#main-pic {
		background-image: url("<?php $this->fields->mainPic(); ?>") !important;
	}
</style>
<?php endif; ?>
<div id="main-frame" currentID="<?php $this->cid(); ?>">
	<div id="contents"><?php $this->content(); ?></div>
	<div id="end-tag">&lt;&lt;&lt; End &gt;&gt;&gt;</div>
	<div id="main-tags"><?php $this->tags(''); ?></div>
	<div id="last-modify"><?php _e('最后修改时间：'); echo $modifyDate->format($this->options->postDateFormat); ?></div>
	<div id="like" onclick="mitsuLike.sendLike()">👍 <?php getData($this->cid, 'like'); ?></div>
</div>
<?php $this->need('footer.php'); ?>

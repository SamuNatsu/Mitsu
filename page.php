<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
if (trim($this->fields->mainPic) != ''): ?>
<style>
	#main-pic {
		background-image: url("<?php $this->fields->mainPic(); ?>") !important;
	}
</style>
<?php endif; ?>
<div id="main">
	<div id="main-pic">
		<h1><?php $this->title() ?></h1>
	</div>
	<div id="contents"><?php $this->content(); ?></div>
	<div id="end-tag">&lt;&lt;&lt; End &gt;&gt;&gt;</div>
</div>
<?php $this->need('footer.php'); ?>

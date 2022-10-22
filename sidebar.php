<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="side-btn" class="flex-col flex-m-center">
	<div id="side-btn-top" title="<?php _e('回到顶部'); ?>"><img src="<?php $this->options->themeUrl('svg/top.svg'); ?>"/></div>
	<div id="side-btn-search" title="<?php _e('搜索'); ?>"><img src="<?php $this->options->themeUrl('svg/search.svg'); ?>"/></div>
	<div id="side-btn-bar" title="<?php _e('更多'); ?>"><img src="<?php $this->options->themeUrl('svg/bar.svg'); ?>"/></div>
</div>
<div id="sidebar-background"></div>
<div id="sidebar" class="flex-col flex-x-center">
	<div id="sidebar-cross"><img src="<?php $this->options->themeUrl('svg/cross.svg'); ?>"/></div>
	<div id="sidebar-me">
		<div id="sidebar-me-background"></div>
		<div id="sidebar-me-gravatar"><?php 
			if ($this->options->replaceGravatar)
				echo '<img src="' . $this->options->replaceGravatar . '"/>';
			else 
				$this->author->gravatar(120); 
		?></div>
		<div id="sidebar-me-name" class="flex-row flex-m-center flex-x-center"><?php $this->author(); ?></div>
		<div id="sidebar-me-desc" class="flex-row flex-m-center flex-x-center"><?php $this->options->description(); ?></div>
	</div>
</div>

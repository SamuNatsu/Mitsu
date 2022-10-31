<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="side-btn" class="flex-col flex-m-center">
	<div id="side-btn-top" title="<?php _e('回到顶部'); ?>"><img src="<?php $this->options->themeUrl('svg/top.svg'); ?>"/></div>
	<div id="side-btn-search" title="<?php _e('搜索'); ?>"><img src="<?php $this->options->themeUrl('svg/search.svg'); ?>"/></div>
	<div id="side-btn-bar" title="<?php _e('更多'); ?>"><img src="<?php $this->options->themeUrl('svg/menu.svg'); ?>"/></div>
</div>

<div id="sidebar-background"></div>

<div id="sidebar" class="flex-col flex-x-center">
	<div id="sidebar-cross"><img src="<?php $this->options->themeUrl('svg/cross.svg'); ?>"/></div>

	<div id="sidebar-me">
		<div id="sidebar-me-background"></div>
		<div id="sidebar-me-gravatar"><?php 
			if ($this->options->customGravatar)
				echo '<img src="' . $this->options->customGravatar . '"/>';
			else 
				$this->author->gravatar(120); 
		?></div>
		<div id="sidebar-me-name" class="flex-row flex-m-center flex-x-center"><?php $this->author(); ?></div>
		<div id="sidebar-me-desc" class="flex-row flex-m-center flex-x-center"><?php $this->options->description(); ?></div>
	</div>

<?php $hasLink = false; ?>
	<div id="sidebar-links" class="flex-row flex-m-around flex-x-center flex-wrap">
	<?php if ($this->options->mailTo): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="mailto:<?php $this->options->mailTo(); ?>" title="<?php _e('电子邮箱'); ?>"><img src="<?php $this->options->themeUrl('svg/mail.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php if ($this->options->weiboURL): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="<?php $this->options->weiboURL(); ?>" title="<?php _e('新浪微博'); ?>" target="_blank"><img src="<?php $this->options->themeUrl('svg/weibo.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php if ($this->options->biliURL): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="<?php $this->options->biliURL(); ?>" title="<?php _e('Bilibili'); ?>" target="_blank"><img src="<?php $this->options->themeUrl('svg/bili.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php if ($this->options->tgURL): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="<?php $this->options->tgURL(); ?>" title="<?php _e('Telegram'); ?>" target="_blank"><img src="<?php $this->options->themeUrl('svg/tg.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php if ($this->options->githubURL): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="<?php $this->options->githubURL(); ?>" title="<?php _e('Github'); ?>" target="_blank"><img src="<?php $this->options->themeUrl('svg/github.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php if ($this->options->giteeURL): ?>
		<?php $hasLink = true; ?>
		<div class="hover-shake"><a href="<?php $this->options->giteeURL(); ?>" title="<?php _e('Gitee'); ?>" target="_blank"><img src="<?php $this->options->themeUrl('svg/gitee.svg'); ?>"/></a></div>
	<?php endif; ?>

	<?php 
	if ($this->options->customURL) {
		$arr = json_decode($this->options->customURL, true);
		if (is_array($arr))
			foreach ($arr as $item) {
				if (!isset($item['name']) || !isset($item['icon']) || !isset($item['url']))
					continue;
				if (!is_string($item['name']) || !is_string($item['icon']) || !is_string($item['url']))
					continue;
				$hasLink = true;
				echo "<div class=\"hover-shake\"><a href=\"{$item['url']}\" title=\"{$item['name']}\" target=\"_blank\"><img src=\"{$item['icon']}\"/></a></div>";
			}
	}
	?>
	</div>
<?php if (!$hasLink): ?>
	<style>#sidebar-links{display:none}</style>
<?php endif; ?>
<?php unset($hasLink); ?>

</div>

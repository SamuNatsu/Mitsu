<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="top" class="side-btn" style="display:none"><img src="<?php $this->options->themeUrl('img/top.svg'); ?>"></div>
<div id="more" class="side-btn"><img src="<?php $this->options->themeUrl('img/more.svg'); ?>"></div>
<?php if ($this->is('single')): ?>
<div id="comment" class="side-btn"><img src="<?php $this->options->themeUrl('img/comment.svg'); ?>"></div>
<?php endif; ?>
<div id="darkback" class="fixed"></div>
<div id="sidebar" class="fixed">
	<img id="sidebar-back" src="<?php $this->options->themeUrl('img/back.svg'); ?>">
	<div class="flex-container flex-column">
		<!-- Info card -->
		<div id="sidebar-info" class="sidebar-item">
		<?php if ($this->options->infoBgUrl): ?>
			<div id="author-background"></div>
			<style>
				#author-background {
					background-image: url('<?php $this->options->infoBgUrl(); ?>');
					<?php if ($this->options->infoBgCss) $this->options->infoBgCss(); ?>
				}
			</style>
		<?php endif; ?>
			<div id="author-card">
				<img id="author-img" src="<?php echo \Typecho\Common::gravatarUrl($this->author->mail, 100); ?>">
				<div id="author-info">
					<div id="author-name"><?php $this->author(); ?></div>
					<div id="social-info">
					<?php if ($this->options->infoGH): ?>
						<a class="social-link" href="<?php $this->options->infoGH(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/github.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoGE): ?>
						<a class="social-link" href="<?php $this->options->infoGE(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/gitee.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoBL): ?>
						<a class="social-link" href="<?php $this->options->infoBL(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/bili.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoWB): ?>
						<a class="social-link" href="<?php $this->options->infoWB(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/weibo.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoTT): ?>
						<a class="social-link" href="<?php $this->options->infoTT(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/twitter.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoTG): ?>
						<a class="social-link" href="<?php $this->options->infoTG(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/telegram.svg'); ?>"></img></a>
					<?php endif; ?>
					<?php if ($this->options->infoML): ?>
						<a class="social-link" href="<?php $this->options->infoML(); ?>"><img class="social-img" src="<?php $this->options->themeUrl('img/mail.svg'); ?>"></img></a>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Search bar -->
		<form id="sidebar-search" class="sidebar-item" method="post" action="<?php $this->options->siteUrl(); ?>">
			<input id="search-bar" type="text" name="s">
			<button id="search-btn" type="submit"><?php _e('搜索'); ?></button>
		</form>
		<!-- Pages -->
		<div id="sidebar-pages" class="sidebar-item">
			<div id="pages-title"><?php _e('页面'); ?></div>
		<?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
		<?php while ($pages->next()): ?>
			<a class="alnk page-name" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
		<?php endwhile; ?>
		</div>
	</div>
</div>

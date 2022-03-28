<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId)
			$commentClass = ' comment-by-author';
		else 
			$commentClass = ' comment-by-user';
	}
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php echo $comments->levels > 0 ? ' comment-child' : ' comment-parent'; echo $commentClass; ?>">
	<div id="<?php $comments->theId(); ?>" class="flex-column">
		<div class="flex-container flex-row">
			<?php $comments->gravatar('50', ''); ?>
			<div class="flex-column">
				<div class="comment-author"><?php $comments->author(); ?></div>
				<?php $comments->content(); ?>
				<div class="comment-meta"><a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y/m/d H:i:s'); ?></a><span><?php $comments->reply(); ?></span></div>
			</div>
		</div>
	</div>
<?php if ($comments->children): ?>
	<div class="comment-children"><?php $comments->threadedComments($options); ?></div>
<?php endif; ?>
</li>
<?php
}
?>
<a name="anchor-comments"></a>
<div id="comments" class="frame" style="display:none">
<?php if ($this->allow('comment')): ?>
	<?php $this->comments()->to($comments); ?>
	<div id="<?php $this->respondId(); ?>" class="respond">
		<?php $comments->cancelReply(); ?>
		<h3 class="response-title"><?php _e('发送一条友好的评论'); ?></h3>
		<form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
		<?php if ($this->user->hasLogin()): ?>
			<p><?php _e('登录身份: '); ?><a class="alnk" href="<?php $this->options->profileUrl(); ?>" target="_blank"><?php $this->user->screenName(); ?></a> | <a class="alnk" href="<?php $this->options->logoutUrl(); ?>" style="color:red" no-pjax><?php _e('登出'); ?></a></p>
		<?php else: ?>
			<input type="text" name="author" class="response-item" value="<?php $this->remember('author'); ?>" placeholder="<?php _e('昵称（必填）'); ?>" required>
			<input type="email" name="mail" class="response-item" value="<?php $this->remember('mail'); ?>" placeholder="<?php _e('电子邮箱'); if ($this->options->commentsRequireMail) _e('（必填）'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>>
			<input type="url" name="url" class="response-item" value="<?php $this->remember('url'); ?>" placeholder="<?php _e('博客链接'); if ($this->options->commentsRequireURL) _e('（必填）'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>>
		<?php endif; ?>
			<textarea name="text" id="response-text" class="response-item" placeholder="<?php _e('评论内容（必填）'); ?>" required><?php $this->remember('text'); ?></textarea>
			<button type="submit" id="response-submit"><?php _e('发送'); ?></button>
		</form>
	</div>
	<h3 class="response-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
	<?php $comments->listComments(); ?>
<?php else: ?>
	<h3 class="post-nothing">评论已关闭</h3>
<?php endif; ?>
</div>

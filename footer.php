<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer>
	<?php if ($this->options->userFooter) $this->options->userFooter(); ?>
	<?php if ($this->options->ICP): ?>
	<div><a class="su-link" target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a></div>
	<?php endif; ?>
	<div>Copyright © <?php echo date('Y'); ?> <a class="su-link" href="<?php $this->options->siteUrl(); ?>" target="_blank"><?php $this->options->title(); ?></a></div>
	<div>Powered by <a class="su-link" target="_blank" href="https://typecho.org">Typecho</a> | Theme <a class="su-link" href="https://github.com/SamuNatsu/Mitsu" target="_blank">Mitsu</a></div>
	<?php printTime($this->options->setupTime); ?>
</footer>
</body>
</html>
<?php
\Mitsu\CompCache\foot($this->options);

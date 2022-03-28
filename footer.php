<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
	</div>
	<?php $this->need('comments.php'); ?>
	<?php $this->need('sidebar.php'); ?>
	<footer id="footer" class="frame">
	<?php if ($this->options->userFooter) $this->options->userFooter(); ?>
	<?php if ($this->options->ICP): ?>
		<div class="footer-item"><a class="alnk a-blue" target="_blank" href="https://beian.miit.gov.cn"><?php $this->options->ICP(); ?></a></div>
	<?php endif; ?>
		<div class="footer-item">Copyright © <?php echo date('Y'); ?> <a class="alnk a-blue" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></div>
		<div class="footer-item">Powered by <a class="alnk a-blue" target="_blank" href="https://typecho.org">Typecho</a> | Theme <a class="alnk a-blue" href="https://github.com/SamuNatsu/Mitsu" target="_blank">Mitsu</a></div>
		<div id="footer-time"><?php printTime(); ?></div>
	</footer>
</body>
</html>
<?php preFoot(); ?>

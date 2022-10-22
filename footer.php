<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
	</div>

	<!-- Sidebar -->
	<?php $this->need('sidebar.php'); ?>

	<!-- Footer -->
	<div id="before-footer">EOF</div>
	<footer class="flex-col flex-m-center flex-x-center">
		<div>Copyright © <?php echo date('Y'); ?> <a class="hover-em" href="<?php $this->options->siteUrl();?>"><?php $this->options->title(); ?></a></div>
		<div>Powered By <a class="hover-em" href="https://typecho.org" target="_blank">Typecho</a> | Theme <a class="hover-em" href="https://github.com/SamuNatsu/Mitsu" target="_blank">Mitsu</a></div>
		<?php if ($this->options->ICP): ?>
		<div><a class="hover-em" href="https://beian.miit.gov.cn/" target="_blank"><?php $this->options->ICP(); ?></a></div>
		<?php endif; ?>
		<script src="<?php $this->options->themeUrl('js/mitsu.js'); ?>"></script>
		<?php $this->options->customFooter(); ?>
	</footer>

	<?php if ($this->options->maintain == "1"): ?>
	<!-- Maintain bar -->
	<div id="maintain"><?php _e('维护模式已开启'); ?></div>
	<?php endif; ?>
</body>
</html>

<?php 
namespace Mitsu\CompCache;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

include_once 'TinyMinify.php';

function head($opt) {
	ob_start('ob_gzhandler');
	if ($opt->compress == 'No')
		return;
	ob_start();
}

function foot($opt) {
	if ($opt->compress == 'Yes') {
		$html = ob_get_contents();
		ob_end_clean();
		echo \TinyMinify::html($html, array('collapse_whitespace' => true));
	}
	ob_end_flush();
}

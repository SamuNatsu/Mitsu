<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	$maintainMode = new \Typecho\Widget\Helper\Form\Element\Radio(
		'maintainMode',
		[
			'Yes'	=> _t('开启'),
			'No'	=> _t('关闭')
		],
		'No',
		_t('维护模式'),
		_t('开启维护模式后，只有登录管理员才能查看页面，其他访客则会进入维护提示页面')
	);
	$form->addInput($maintainMode);
	$setupTime = new \Typecho\Widget\Helper\Form\Element\Text(
		'setupTime',
		null,
		null,
		_t('建站时间'),
		_t('用于在底部显示本站运行时长，格式为YYYY/MM/DD')
	);
	$form->addInput($setupTime);
	$bgUrl = new \Typecho\Widget\Helper\Form\Element\Text(
		'bgUrl',
		null,
		null,
		_t('背景图片URL'),
		_t('在这里填入一个图片URL，留空则是默认白色背景')
	);
	$form->addInput($bgUrl);
	$bgCss = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'bgCss',
		null,
		null,
		_t('背景图片附加样式'),
		_t('如果你的背景图片展示与你的预期有偏差，你可以在这里调整<br/>注：只有“背景图片URL”项非空时才生效，部分条目需要用“!important”覆盖')
	);
	$form->addInput($bgCss);
	$compress = new \Typecho\Widget\Helper\Form\Element\Radio(
		'compress',
		[
			'Yes'		=> _t('开启'),
			'No'		=> _t('关闭')
		],
		'No',
		_t('网页压缩'),
		_t('注：如果网页压缩后出错，请检查原HTML是否含有不规范的代码')
	);
	$form->addInput($compress);
	$cache = new \Typecho\Widget\Helper\Form\Element\Radio(
		'cache',
		[
			'Yes'		=> _t('开启'),
			'No'		=> _t('关闭')
		],
		'No',
		_t('网页缓存'),
		_t('')
	);
	$form->addInput($cache);
	$userHead = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'userHead',
		null,
		null,
		_t('自定义head内容'),
		_t('在&lt;head&gt;&lt;/head&gt中添加自定义内容')
	);
	$form->addInput($userHead);
	$userFooter = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'userFooter',
		null,
		null,
		_t('自定义footer内容'),
		_t('在&lt;footer&gt;&lt;/footer&gt;中添加自定义内容')
	);
	$form->addInput($userFooter);
	$ICP = new \Typecho\Widget\Helper\Form\Element\Text(
		'ICP',
		null,
		null,
		_t('ICP备案号')
	);
	$form->addInput($ICP);
}

function pageNav($context, $overpass = false) {
	if (!$overpass && !$context->is('archive'))
		return;
	if ($context->getTotal() > $context->parameter->pageSize) {
		echo '<div id="page-nav" class="container row"><div id="page-nav-prev">';
		$context->pageLink('&lt;&lt; 上一页', 'prev');
		echo '</div><div id="page-nav-next">';
		$context->pageLink('下一页 &gt;&gt;', 'next');
		echo '</div></div>';
	}
}

function printTime($time) {
	$date = date_create_from_format('Y/m/d', $time, new DateTimeZone('Asia/Shanghai'));
	if ($date === false)
		return;
	$itv = $date->diff(new DateTime('now'), true);
	echo '<div id="footer-time">Run for ';
	if ($itv->y)
		echo $itv->y . ' Y ';
	if ($itv->m)
		echo $itv->m . ' M ';
	echo $itv->d . ' D</div>';
}

include_once 'var/compress_cache.php';

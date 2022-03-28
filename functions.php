<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit() {
	define('__TYPECHO_GRAVATAR_PREFIX__', 'https://gravatar.loli.net/avatar/');
	Helper::options()->commentsAntiSpam = false;
}

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
		_t('用于在底部显示本站运行时长，填写格式为YYYY/MM/DD')
	);
	$form->addInput($setupTime);
	$logo = new \Typecho\Widget\Helper\Form\Element\Text(
		'logo',
		null,
		null,
		_t('网站Logo URL'),
		_t('在导航栏显示的logo图标，如果需要针对特定设备采用特定logo，请在下面的<a href="#custom-head" style="color:#06f">自定义head内容</a>添加')
	);
	$form->addInput($logo);
	$bgUrl = new \Typecho\Widget\Helper\Form\Element\Text(
		'bgUrl',
		null,
		null,
		_t('背景图片URL')
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
	$infoBgUrl = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoBgUrl',
		null,
		null,
		_t('侧边栏：信息卡背景图片URL')
	);
	$form->addInput($infoBgUrl);
	$infoBgCss = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'infoBgCss',
		null,
		null,
		_t('侧边栏：信息卡背景图片附加样式'),
		_t('如果你的背景图片展示与你的预期有偏差，你可以在这里调整<br/>注：只有“侧边栏信息卡背景图片URL”项非空时才生效，部分条目需要用“!important”覆盖')
	);
	$form->addInput($infoBgCss);
	$infoGH = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoGH',
		null,
		null,
		_t('侧边栏：信息卡Github URL')
	);
	$form->addInput($infoGH);
	$infoGE = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoGE',
		null,
		null,
		_t('侧边栏：信息卡码云URL')
	);
	$form->addInput($infoGE);
	$infoBL = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoBL',
		null,
		null,
		_t('侧边栏：信息卡B站URL')
	);
	$form->addInput($infoBL);
	$infoWB = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoWB',
		null,
		null,
		_t('侧边栏：信息卡微博URL')
	);
	$form->addInput($infoWB);
	$infoTT = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoTT',
		null,
		null,
		_t('侧边栏：信息卡推特URL')
	);
	$form->addInput($infoTT);
	$infoTG = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoTG',
		null,
		null,
		_t('侧边栏：信息卡Telegram URL')
	);
	$form->addInput($infoTG);
	$infoML = new \Typecho\Widget\Helper\Form\Element\Text(
		'infoML',
		null,
		null,
		_t('侧边栏：信息卡邮箱地址')
	);
	$form->addInput($infoML);
	$compress = new \Typecho\Widget\Helper\Form\Element\Radio(
		'compress',
		[
			'Yes'	=> _t('开启'),
			'No'	=> _t('关闭')
		],
		'No',
		_t('网页压缩'),
		_t('注：如果网页压缩后出错，请检查原HTML是否含有不规范的代码')
	);
	$form->addInput($compress);
	$cache = new \Typecho\Widget\Helper\Form\Element\Radio(
		'cache',
		[
			'Yes'	=> _t('开启'),
			'No'	=> _t('关闭')
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
		_t('<a name="custom-head"></a>自定义head内容'),
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

function themeFields($layout) {
	$mainPic = new \Typecho\Widget\Helper\Form\Element\Text(
		'mainPic',
		null,
		null,
		_t('文章头图URL'),
		_t('在这里填入一个图片URL，留空则是默认头图')
	);
	$layout->addItem($mainPic);
	$showNav = new \Typecho\Widget\Helper\Form\Element\Radio(
		'showNav',
		[
			'Yes'	=> _t('显示'),
			'No'	=> _t('隐藏')
		],
		'No',
		_t('页面是否在导航栏显示'),
		_t('注：该选项仅针对页面生效，默认不显示')
	);
	$layout->addItem($showNav);
}

function pageNav($context, $overpass = false) {
	if (!$overpass && !$context->is('archive'))
		return;
	echo '<div id="page-nav" class="flex-container flex-row">';
	if ($context->getTotal() > $context->parameter->pageSize) {
		echo '<div id="page-nav-prev">';
		$context->pageLink('&lt;&lt; 上一页', 'prev');
		echo '</div><div id="page-nav-next">';
		$context->pageLink('下一页 &gt;&gt;', 'next');
		echo '</div>';
	}
	echo '</div>';
}

function printTime() {
	$date = date_create_from_format('Y/m/d', Helper::options()->setupTime, new DateTimeZone('Asia/Shanghai'));
	if ($date === false)
		return;
	$itv = $date->diff(new DateTime('now'), true);
	echo 'Run for ';
	if ($itv->y)
		echo $itv->y . ($itv->y > 1 ? ' Years ' : ' Year ');
	if ($itv->m)
		echo $itv->m . ($itv->m > 1 ? ' Months ' : ' Month ');
	echo $itv->d . ($itv->d > 1 ? ' Days</div>' : ' Day</div>');
}

require_once 'var/TinyHtmlMinifier.php';

function preHead() {
	ob_start('ob_gzhandler');
	if (Helper::options()->compress == 'Yes')
		ob_start();
}

function preFoot() {
	if (Helper::options()->compress == 'Yes') {
		$html = ob_get_contents();
		ob_end_clean();
		$minifier = new TinyHtmlMinifier(array('collapse_whitespace' => true));
		echo $minifier->minify($html);
	}
	ob_end_flush();
}

require_once 'db/DB.php';

function getData($cid, $dat) {
	$db = new \Mitsu\DB();
	$rtn = $db->get($cid . '.' . $dat);
	echo $rtn === null ? 0 : $rtn;
}

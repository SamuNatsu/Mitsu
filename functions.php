<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	$maintain = new \Typecho\Widget\Helper\Form\Element\Radio(
		'maintain',
		[
			'0' => _t('关闭'),
			'1' => _t('开启')
		],
		'0',
		_t('【全局】启动维护模式'),
		_t('除非管理员登录，否则站点将显示为 503')
	);
	$form->addInput($maintain);

	$customHead = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'customHead',
		null,
		null,
		_t('【全局】自定义 Head'),
		_t('插入 head 标签内的 HTML 代码')
	);
	$form->addInput($customHead);

	$customFooter = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'customFooter',
		null,
		null,
		_t('【全局】自定义 Footer'),
		_t('插入 footer 标签内的 HTML 代码')
	);
	$form->addInput($customFooter);

	$ICP = new \Typecho\Widget\Helper\Form\Element\Text(
        'ICP',
        null,
        null,
        _t('【全局】ICP 备案号'),
		_t('<style>.mitsu-hr{margin:30px 0;background-color:#fff;border-top:5px dashed #8c8b8b}</style><hr class="mitsu-hr"/>')
    );
	$form->addInput($ICP);

	$headerPic = new \Typecho\Widget\Helper\Form\Element\Text(
        'headerPic',
        null,
        null,
        _t('【横幅】背景图片 URL'),
		_t('留空则使用默认图案')
    );
	$form->addInput($headerPic);

	$headerPicStyle = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'headerPicStyle',
        null,
        null,
        _t('【横幅】背景附加 CSS'),
		_t('你可以用来调整背景图片的样式，或者覆盖掉默认图案使用你自己的背景图案')
    );
	$form->addInput($headerPicStyle);

	$replaceDescription = new \Typecho\Widget\Helper\Form\Element\Text(
        'replaceDescription',
        null,
        null,
        _t('【横幅】使用「一言」代替 Header 中显示的站点描述'),
		_t('填入「一言」API，留空则不进行替代<hr class="mitsu-hr"/>')
    );
	$form->addInput($replaceDescription);

	$mePic = new \Typecho\Widget\Helper\Form\Element\Text(
        'mePic',
        null,
        null,
        _t('【侧边栏 - 名片】背景 URL'),
		_t('留空则使用默认图案')
    );
	$form->addInput($mePic);

	$mePicStyle = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'mePicStyle',
        null,
        null,
        _t('【侧边栏 - 名片】背景附加 CSS'),
		_t('你可以用来调整背景图片的样式，或者覆盖掉默认图案使用你自己的背景图案')
    );
	$form->addInput($mePicStyle);

	$customGravatar = new \Typecho\Widget\Helper\Form\Element\Text(
        'customGravatar',
        null,
        null,
        _t('【侧边栏 - 名片】头像 URL'),
		_t('留空则使用 Gravatar 与邮箱信息自动生成头像<hr class="mitsu-hr"/>')
    );
	$form->addInput($customGravatar);

	$mailTo = new \Typecho\Widget\Helper\Form\Element\Text(
        'mailTo',
        null,
        null,
        _t('【侧边栏 - 链接】电子邮箱'),
		_t('留空则不显示')
    );
	$form->addInput($mailTo);

	$weiboURL = new \Typecho\Widget\Helper\Form\Element\Text(
        'weiboURL',
        null,
        null,
        _t('【侧边栏 - 链接】新浪微博'),
		_t('留空则不显示')
    );
	$form->addInput($weiboURL);

	$biliURL = new \Typecho\Widget\Helper\Form\Element\Text(
        'biliURL',
        null,
        null,
        _t('【侧边栏 - 链接】Bilibili'),
		_t('留空则不显示')
    );
	$form->addInput($biliURL);

	$tgURL = new \Typecho\Widget\Helper\Form\Element\Text(
        'tgURL',
        null,
        null,
        _t('【侧边栏 - 链接】Telegram'),
		_t('留空则不显示')
    );
	$form->addInput($tgURL);

	$githubURL = new \Typecho\Widget\Helper\Form\Element\Text(
        'githubURL',
        null,
        null,
        _t('【侧边栏 - 链接】Github'),
		_t('留空则不显示')
    );
	$form->addInput($githubURL);

	$giteeURL = new \Typecho\Widget\Helper\Form\Element\Text(
        'giteeURL',
        null,
        null,
        _t('【侧边栏 - 链接】Gitee'),
		_t('留空则不显示')
    );
	$form->addInput($giteeURL);

	$customURL = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'customURL',
        null,
        null,
        _t('【侧边栏 - 链接】自定义'),
		_t('如果上面的默认链接都不符合你的要求，你可以在这里设置自定义链接。<br/>你需要填写一个 JSON 数组，数组的每个元素都是对象，对象包括 name、icon 和 href 三个字符串属性，分别表示链接的名字、链接的图标 URL 和链接。<br/>你可以使用我们默认的一个链接图标 URL：' . \Utils\Helper::options()->themeUrl . '/svg/link.svg<br/><br/>例：[{"name":"Gitlab","icon":"https://gitlab.youdomain.com/icon.svg","href":"https://gitlab.yourdomain.com"}]<br/>这个例子表示添加了一个 Gitlab 链接项。<br/><br/>注：如果 JSON 解析失败，则可能会出现不符合预期的输出。<hr class="mitsu-hr"/>')
    );
	$form->addInput($customURL);

}

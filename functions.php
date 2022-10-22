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
        _t('【全局】ICP 备案号')
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
		_t('填入「一言」API，留空则不进行替代')
    );
	$form->addInput($replaceDescription);

	$mePic = new \Typecho\Widget\Helper\Form\Element\Text(
        'mePic',
        null,
        null,
        _t('【侧边栏】名片背景 URL'),
		_t('留空则使用默认图案')
    );
	$form->addInput($mePic);

	$mePicStyle = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'mePicStyle',
        null,
        null,
        _t('【侧边栏】名片背景附加 CSS'),
		_t('你可以用来调整背景图片的样式，或者覆盖掉默认图案使用你自己的背景图案')
    );
	$form->addInput($mePicStyle);

	$replaceGravatar = new \Typecho\Widget\Helper\Form\Element\Text(
        'replaceGravatar',
        null,
        null,
        _t('【侧边栏】头像 URL'),
		_t('留空则使用 Gravatar 与邮箱信息自动生成头像')
    );
	$form->addInput($replaceGravatar);

}

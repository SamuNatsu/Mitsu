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
		_t('启动维护模式'),
		_t('除非管理员登录，否则站点将显示为 503')
	);
	$form->addInput($maintain);

	$customHead = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'customHead',
		null,
		null,
		_t('Custom Head'),
		_t('Contents that insert into &lt;head&gt;&lt;/head&gt;')
	);
	$form->addInput($customHead);

	$customFooter = new \Typecho\Widget\Helper\Form\Element\Textarea(
		'customFooter',
		null,
		null,
		_t('Custom Header'),
		_t('Contents that insert into &lt;footer&gt;&lt;/footer&gt;')
	);
	$form->addInput($customFooter);

	$headerPic = new \Typecho\Widget\Helper\Form\Element\Text(
        'headerPic',
        null,
        null,
        _t('Header picture URL')
    );
	$form->addInput($headerPic);

	$headerPicStyle = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'headerPicStyle',
        null,
        null,
        _t('Header picture custom style'),
		_t('Adjust header picture such as background-position (Not effect when there is no header picture)')
    );
	$form->addInput($headerPicStyle);

	$replaceDescription = new \Typecho\Widget\Helper\Form\Element\Text(
        'replaceDescription',
        null,
        null,
        _t('Replace header descrption with Hitokoto'),
		_t('Input Hitikoto API URL')
    );
	$form->addInput($replaceDescription);

	$ICP = new \Typecho\Widget\Helper\Form\Element\Text(
        'ICP',
        null,
        null,
        _t('ICP')
    );
	$form->addInput($ICP);

}

<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'language' => 'ru',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	    'i18n' => [
		    'translations' => [
			    'app*' => [
				    'class' => yii\i18n\PhpMessageSource::class,
				    'basePath' => '@app/messages',
			    ],
		    ],
	    ],
    ],
];

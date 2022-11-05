<?php
return [
	'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name'       => 'Console Application',
	'preload'    => ['log'],
	'components' => [
		'db' => require(dirname(__FILE__) . '/database.php'),
		'log' => [
			'class'  => 'CLogRouter',
			'routes' => [
				[
					'class'  => 'CFileLogRoute',
					'levels' => 'error, warning',
				],
			],
		],
	],
];

<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Slider',
	array(
		'Slider' => 'list, show, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Slider' => 'create, update, delete',
		
	)
);

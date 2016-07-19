<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'AG.' . $_EXTKEY,
	'Agdmail',
	array(
		'AgSubscription' => 'list',
		
	),
	// non-cacheable actions
	array(
		'AgSubscription' => '',
		
	)
);

<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(
		'Products' => 'list, show, searchAjax',
		
	),
	// non-cacheable actions
	array(
		'Products' => 'list, show, searchAjax',
		
	)
);

/**
 * eID for Product Finder
 */
$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('productfinder');
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['ajaxProductFinder'] = $extensionPath.'Classes/Utility/AjaxDispatcherUtility.php';

<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(
		'Jobs' => 'list, show, searchAjax',
		
	),
	// non-cacheable actions
	array(
		'Jobs' => 'list, show, searchAjax',
		
	)
);

/**
 * eID for Jobs Finder
 */
$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('jobs');
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['ajaxJobsFinder'] = $extensionPath.'Classes/Utility/AjaxDispatcherUtility.php';

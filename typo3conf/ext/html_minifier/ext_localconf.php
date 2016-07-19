<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath( 'html_minifier' ) . '/Classes/Hooks/ContentPostProcessor.php:DWnet\\HtmlMinifier\\Hooks\\ContentPostProcessor->render_Cache';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath( 'html_minifier' ) . '/Classes/Hooks/ContentPostProcessor.php:DWnet\\HtmlMinifier\\Hooks\\ContentPostProcessor->render_noCache';
<?php
defined('TYPO3_MODE') or die();

// Add TsConfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTSConfig/User/main.ts">');

/***************
 * PageTs
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$_EXTKEY.'/Configuration/TypoScript/pageTS.txt">');

// Add menu item to clear system cache for Development & Testing context
$context = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->__toString();
if ($context === 'Development' || $context === 'Testing') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('options.clearCache.system = 1');
}

// Modify flexform values
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['getFlexFormDSClass'][$_EXTKEY] = 'TYPO3\\WebsiteTemplate\\Hooks\\Backend\\BackendUtilityHook';

// Backend layouts
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['file'] = 'TYPO3\\WebsiteTemplate\\View\\BackendLayout\\FileProvider';

unset($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook']['TYPO3\\CMS\\T3skin\\Hook\\StyleGenerationHook']);

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_feuser_register']['tx_srfeuserregister_pi1']['model'][] = 
	'TYPO3\\WebsiteTemplate\\Hooks\\TxsrfeuserregisterevalFunc';
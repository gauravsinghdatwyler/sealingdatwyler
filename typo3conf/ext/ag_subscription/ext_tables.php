<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'AG.' . $_EXTKEY,
	'Agdmail',
	'Directmail Subscription'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Directmail Subscription');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_agsubscription_domain_model_agsubscription', 'EXT:ag_subscription/Resources/Private/Language/locallang_csh_tx_agsubscription_domain_model_agsubscription.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_agsubscription_domain_model_agsubscription');

$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
$frontendpluginName = 'agdmail';
$pluginSignature = strtolower($extensionName) . '_'.strtolower($frontendpluginName); 

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages'; 
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform.xml');

// add wizard icon to the "add new record" in backend
if (TYPO3_MODE == "BE") {
    $TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["AgSubscriptionWizicon"] =
         \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Helper/AgSubscriptionWizicon.php';
}

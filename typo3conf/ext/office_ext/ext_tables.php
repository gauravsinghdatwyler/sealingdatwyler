<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Datwyler.' . $_EXTKEY,
	'Branchfilter',
	'Branch filter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Datwyler.' . $_EXTKEY,
	'Contactfilter',
	'Contact filter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Datwyler.' . $_EXTKEY,
	'singleContact',
	'Single Contact'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Office Management');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_continent', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_continent.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_continent');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_country', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_country.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_country');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_industry', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_industry.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_industry');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_branchoffice', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_branchoffice.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_branchoffice');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_contactperson', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_contactperson.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_contactperson');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_awards', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_awards.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_awards');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_query', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_query.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_query');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_officedoctype', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_officedoctype.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_officedoctype');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_officedocuments', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_officedocuments.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_officedocuments');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_docmaster', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_docmaster.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_docmaster');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_officeext_domain_model_contacttype', 'EXT:office_ext/Resources/Private/Language/locallang_csh_tx_officeext_domain_model_contacttype.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_officeext_domain_model_contacttype');


$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$frontendpluginName = 'singleContact'; //Your Front-end Plugin Name
$pluginSignature = strtolower($extensionName) . '_'.strtolower($frontendpluginName);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/singleContact.xml');

?>
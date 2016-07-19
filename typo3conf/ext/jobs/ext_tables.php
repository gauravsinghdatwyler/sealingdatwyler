<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	'Jobs Finder'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Jobs');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobs_domain_model_country', 'EXT:jobs/Resources/Private/Language/locallang_csh_tx_jobs_domain_model_country.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobs_domain_model_country');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobs_domain_model_jobfield', 'EXT:jobs/Resources/Private/Language/locallang_csh_tx_jobs_domain_model_jobfield.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobs_domain_model_jobfield');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobs_domain_model_jobs', 'EXT:jobs/Resources/Private/Language/locallang_csh_tx_jobs_domain_model_jobs.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobs_domain_model_jobs');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobs_domain_model_town', 'EXT:jobs/Resources/Private/Language/locallang_csh_tx_jobs_domain_model_town.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobs_domain_model_town');


/*
 * Adding Flexform for 'Products' frontend plugin
 */
// you add pi_flexform to be renderd when your plugin is shown
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';
// now, add your flexform xml-file
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:jobs/Configuration/FlexForms/setup.xml');

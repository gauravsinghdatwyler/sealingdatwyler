<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	'Product Finder'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Product Finder');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_applications', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_applications.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_applications');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_types', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_types.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_types');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_dimensions', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_dimensions.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_dimensions');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_materials', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_materials.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_materials');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_products', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_products.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_products');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_productfinder_domain_model_pdfs', 'EXT:productfinder/Resources/Private/Language/locallang_csh_tx_productfinder_domain_model_pdfs.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_productfinder_domain_model_pdfs');


/*
 * Adding Flexform for 'Products' frontend plugin
 */
// you add pi_flexform to be renderd when your plugin is shown
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';
// now, add your flexform xml-file
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:productfinder/Configuration/FlexForms/setup.xml');
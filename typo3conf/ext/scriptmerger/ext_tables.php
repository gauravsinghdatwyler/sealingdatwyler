<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/** @noinspection PhpUndefinedVariableInspection */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/', 'Scriptmerger');

?>

<?php

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('scriptmerger');

return array(
	'minify_importprocessor' => $extensionPath . 'Resources/Minify/ImportProcessor.php',
	'minify_commentpreserver' => $extensionPath . 'Resources/Minify/CommentPreserver.php',
	'minify_css' => $extensionPath . 'Resources/Minify/CSS.php',
	'minify_css_compressor' => $extensionPath . 'Resources/Minify/CSS/Compressor.php',
	'minify_css_urirewriter' => $extensionPath . 'Resources/Minify/CSS/UriRewriter.php',
	'jsminplus' => $extensionPath . 'Resources/jsminplus.php',
	'jsmin' => $extensionPath . 'Resources/jsmin.php',
	'jshrink\\minifier' => $extensionPath . 'Resources/JShrink/Minifier.php',
);
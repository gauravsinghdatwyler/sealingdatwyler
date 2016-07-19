<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Website Template');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('TYPO3.website_template', 'Content');

// Add some fields to FE Users table to show TCA fields definitions
// USAGE: TCA Reference > $TCA array reference > ['columns'][fieldname]['config'] / TYPE: "select"
$temporaryColumns = array (
		'productname' => array(
			'exclude' => 1,
			'label' => 'Product Name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => '1024',
				'eval' => 'trim'
			),
		),
        'image' => array(
		'exclude' => 1,
		'label' => 'Image',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'image',
			array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				),
				'foreign_types' => array(
					'0' => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					)
				),
				'maxitems' => 1
			),
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		),
	),
	'text' => array(
		'exclude' => 1,
		'label' => 'Text',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		),
		'defaultExtras' => 'richtext[]'
	),
	'morelink' => array(
		'exclude' => 1,
		'label' => 'More Link',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'max' => '1024',
			'eval' => 'trim',
			'wizards' => array(
				'link' => array(
					'type' => 'popup',
					'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
					'icon' => 'link_popup.gif',
					'module' => array(
						'name' => 'wizard_element_browser',
						'urlParameters' => array(
							'mode' => 'wizard'
						)
					),
					'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
				)
			),
			'softref' => 'typolink'
		),
	),
	'pdfdownload' => array(
		'exclude' => 1,
		'label' => 'PDF-Download',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'pdfdownload',
			array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
				),
				'foreign_types' => array(
					'0' => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					)
				),
				'maxitems' => 1
			)
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $temporaryColumns,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'productname, image, text, morelink, pdfdownload'
);

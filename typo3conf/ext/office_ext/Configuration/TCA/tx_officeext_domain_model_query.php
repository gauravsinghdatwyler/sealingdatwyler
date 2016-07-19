<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query',
		'label' => 'full_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'full_name,email,country,company,message,office_id,contact_person',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('office_ext') . 'Resources/Public/Icons/tx_officeext_domain_model_query.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, full_name, email, country, company, message,office_id,contact_person',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, full_name, email, country, company, message,office_id,contact_person, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_officeext_domain_model_query',
				'foreign_table_where' => 'AND tx_officeext_domain_model_query.pid=###CURRENT_PID### AND tx_officeext_domain_model_query.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'full_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.full_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'country' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'company' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'message' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'office_id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.office_id',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_officeext_domain_model_branchoffice',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'contact_person' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:office_ext/Resources/Private/Language/locallang_db.xlf:tx_officeext_domain_model_query.contact_person',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_officeext_domain_model_contactperson',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);
<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Datwyler.' . $_EXTKEY,
	'Branchfilter',
	array(
		'Continent' => 'list, show, new, create, edit, update, delete',
		'Country' => 'list, show, new, create, edit, update, delete',
		'Industry' => 'list, show, new, create, edit, update, delete',
		'BranchOffice' => 'list, show, new, create, edit, update, delete',
		'ContactPerson' => 'list, show, new, addQueries, create, edit, update, delete, sendMail',
		'Awards' => 'list, show, new, create, edit, update, delete',
		'Query' => 'list, show, new, create, edit, update, delete',
		'OfficeDocType' => 'list, show, new, create, edit, update, delete',
		'OfficeDocuments' => 'list, show, new, create, edit, update, delete',

	),
	// non-cacheable actions
	array(
		'Continent' => 'create, update, delete',
		'Country' => 'create, update, delete',
		'Industry' => 'create, update, delete',
		'BranchOffice' => 'create, update, delete',
		'ContactPerson' => 'create, update, delete',
		'Awards' => 'create, update, delete',
		'Query' => 'create, update, delete',
		'OfficeDocType' => 'create, update, delete',
		'OfficeDocuments' => 'create, update, delete',

	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Datwyler.' . $_EXTKEY,
	'Contactfilter',
	array(
		'ContactPerson' => 'list, show, new, addQueries, create, edit, update, delete',
		'Continent' => 'list, show, new, create, edit, update, delete',
		'Country' => 'list, show, new, create, edit, update, delete',
		'Query' => 'list, show, new, create, edit, update, delete',
	),
	// non-cacheable actions
	array(
		'Continent' => 'create, update, delete',
		'Country' => 'create, update, delete',
		'ContactPerson' => 'create, update, delete',
		'Query' => 'create, update, delete',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Datwyler.' . $_EXTKEY,
	'singleContact',
	array(
		'ContactPerson' => 'showSingleContact, list, show',
		'Continent' => 'list, show',
		'Country' => 'list, show',
		'Query' => 'list, show, new, create, edit',
	),
	// non-cacheable actions
	array(
		'Continent' => 'create, update, delete',
		'Country' => 'create, update, delete',
		'ContactPerson' => 'showSingleContect, create, update, delete',
		'Query' => 'create, update, delete',
	)
);
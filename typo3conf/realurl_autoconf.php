<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']=array (
  '_DEFAULT' =>
  array (
    'init' =>
    array (
      'appendMissingSlash' => 'ifNotFile,redirect',
      'emptyUrlReturnValue' => '/',
    ),
    'pagePath' =>
    array (
      'rootpage_id' => '1',
    ),
    'fixedPostVars' => array(
          // Product finder
        '105' => array(
          array(
                    'GETvar' => 'tx_productfinder_pi1[controller]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_productfinder_pi1[action]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_productfinder_pi1[products]',
                    'lookUpTable' => array(
                        'table' => 'tx_productfinder_domain_model_products',
                        'id_field' => 'uid',
                        'alias_field' => 'name',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'useUniqueCache' => 0,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        ),
                        'languageGetVar' => 'L',
                        'languageExceptionUids' => '',
                        'languageField' => 'sys_language_uid',
                        'transOrigPointerField' => 'l10n_parent',
                        'autoUpdate' => 1,
                        'expireDays' => 180,
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
        // Jobs finder
        '109' => array(
          array(
                    'GETvar' => 'tx_jobs_pi1[controller]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_jobs_pi1[action]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_jobs_pi1[jobs]',
                    'lookUpTable' => array(
                        'table' => 'tx_jobs_domain_model_jobs',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        )
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
        // Global Location
        '5' => array(
          array(
                    'GETvar' => 'tx_officeext_branchfilter[controller]',
                ),
                array(
                    'GETvar' => 'tx_officeext_branchfilter[action]',
                ),
                array(
                    'GETvar' => 'tx_officeext_branchfilter[branches]',
                    'lookUpTable' => array(
                        'table' => 'tx_officeext_domain_model_branchoffice',
                        'id_field' => 'uid',
                        'alias_field' => 'name',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        )
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
        // Contact Person
        '111' => array(
          array(
                    'GETvar' => 'tx_officeext_singlecontact[controller]',

                ),
                array(
                    'GETvar' => 'tx_officeext_singlecontact[action]',

                ),
                array(
                    'GETvar' => 'tx_officeext_singlecontact[contactPerson]',
                    'lookUpTable' => array(
                        'table' => 'tx_officeext_domain_model_contactperson',
                        'id_field' => 'uid',
                        'alias_field' => 'name',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        )
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
        // News
        '96' => array(
                array(
                    'GETvar' => 'tx_news_pi1[controller]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_news_pi1[action]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_news_pi1[news]',
                    'lookUpTable' => array(
                        'table' => 'tx_news_domain_model_news',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'enable404forInvalidAlias' => 1,
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        )
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
        // Events
        '63' => array(
                array(
                    'GETvar' => 'tx_news_pi1[controller]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_news_pi1[action]',
                    'noMatch' => 'bypass',
                ),
                array(
                    'GETvar' => 'tx_news_pi1[news]',
                    'lookUpTable' => array(
                        'table' => 'tx_news_domain_model_news',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                        'enable404forInvalidAlias' => 1,
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        )
                    )
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass',
                ),
        ),
    ),
    'fileName' =>
    array (
      'defaultToHTMLsuffixOnPrev' => 1,
      'acceptHTMLsuffix' => 1,
      'index' =>
      array (
        'print' =>
        array (
          'keyValues' =>
          array (
            'type' => 98,
          ),
        ),
      ),
    ),
    'preVars' =>
    array (
      0 =>
      array (
        'GETvar' => 'L',
        'valueMap' =>
        array (
          'de' => '1',
        ),
        'noMatch' => 'bypass',
      ),
    ),
    'postVarSets' =>
    array (
      '_DEFAULT' =>
      array (
      ),
    ),
  ),
);
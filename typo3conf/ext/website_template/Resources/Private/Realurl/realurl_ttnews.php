<?php

/**
 * tt_news config
 */
class tx_ttnews_realurl_config {

	/**
	 * Add config
	 *
	 * @param array $params
	 * @param object $pObj
	 * @return array
	 */
	public function addConfig($params, &$pObj) {

		$config = array(
			'postVarSets' => array(
				'_DEFAULT' => array(
					/* tt_news */
					// news archive parameters
					'archive' => array(
						array(
							'GETvar' => 'tx_ttnews[year]'
						),
						array(
							'GETvar' => 'tx_ttnews[month]',
						),
						array(
							'GETvar' => 'tx_ttnews[day]',
							'noMatch' => 'bypass',
						),
						array(
							'GETvar' => 'tx_ttnews[pS]',
							'noMatch' => 'bypass',
						),
						array(
							'GETvar' => 'tx_ttnews[pL]',
							'noMatch' => 'bypass',
						)
					),
					// news pagebrowser
					'newspage' => array(
						array(
							'GETvar' => 'tx_ttnews[pointer]'
						)
					),
					// news category
					'newscategory' => array (
						array(
							'GETvar' => 'tx_ttnews[cat]',
							'lookUpTable' => array(
								'table' => 'tt_news_cat',
								'id_field' => 'uid',
								'alias_field' => 'title',
								'addWhereClause' => ' AND deleted != 1',
								'useUniqueCache' => 1,
								'autoUpdate' => 1,
								'useUniqueCache_conf' => array(
									'strtolower' => 1,
								),
							),
						),
					),
					'article' => array(
						array(
							'GETvar' => 'tx_ttnews[tt_news]',
							'lookUpTable' => array(
								'table' => 'tt_news',
								'id_field' => 'uid',
								// MLC Goolge wants uniqueness for spidering
								'alias_field' => 'concat(title, " ", uid)',
								'addWhereClause' => ' AND deleted != 1',
								'useUniqueCache' => 1,
								'autoUpdate' => 1,
								'useUniqueCache_conf' => array(
									'strtolower' => 1,
									'spaceCharacter' => '-'
								)
							)
						),
						array(
							'GETvar' => 'tx_ttnews[swords]'
						)
					),
					'abp' => array(
						array(
							'GETvar' => 'tx_ttnews[backPid]'
						)
					),
					'nq' => array(
						array(
							'GETvar' => 'news_search[search_text]'
						)
					),
					'nqc' => array(
						array(
							'GETvar' => 'news_search[category][]'
						)
					),
				),
			),
		);

		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($params['config'], $config);
		return $params['config'];
	}
}
<?php

/**
 * Default config
 */
class tx_default_realurl_config {

	/**
	 * Add config
	 *
	 * @param array $params
	 * @param object $pObj
	 * @return array
	 */
	public function addConfig($params, &$pObj) {

		$config = array(
			'fileName' => array (
				'index' => array(
					'index.html' => array(
						'keyValues' => array(
							'type' => 0,
						)
					),
					'print.html' => array(
						'keyValues' => array(
							'type' => 98,
						)
					),
					'text.html' => array(
						'keyValues' => array(
							'type' => 99,
						)
					),
					'rss.xml' => array(
						'keyValues' => array(
							'type' => 100,
						)
					),
					'rss091.xml' => array(
						'keyValues' => array(
							'type' => 101,
						)
					),
					'rdf.xml' => array(
						'keyValues' => array(
							'type' => 102,
						)
					),
					'atom.xml' => array(
						'keyValues' => array(
							'type' => 103,
						)
					),
					'sitemap.xml' => array(
						'keyValues' => array(
							'type' => 941,
						)
					),
					'_DEFAULT' => array(
						'keyValues' => array()
					)
				),
				'defaultToHTMLsuffixOnPrev' => 1,
				'acceptHTMLsuffix' => 1
			),
			'preVars' => array(
				array(
					'GETvar' => 'no_cache',
					'valueMap' => array(
						'nc' => '1',
					),
					'noMatch' => 'bypass',
				),
			),
		);

		\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($params['config'], $config);
		return $params['config'];
	}
}
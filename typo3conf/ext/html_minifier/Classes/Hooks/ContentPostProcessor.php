<?php

namespace DWnet\HtmlMinifier\Hooks;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Dominik Weber <info@dominikweber.net>, www.dominikweber.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * HTML Minifier
 *
 * @author		Dominik Weber <info@dominikweber.net>
 * @package		TYPO3
 * @subpackage	html_minifier
 */
class ContentPostProcessor{

	function minifyOutput(){
		$pluginSettings = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_htmlminifier.']['settings.'];
		if( isset( $pluginSettings['ignorePids'] ) ){
			$pages = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode( ',' , $pluginSettings['ignorePids'] );
			if( $pages ){
				$pages = array_flip( $pages );
				if( isset( $pages[ $GLOBALS['TSFE']->page['uid'] ] ) ){
					$ignoreCurrentPage = true;
				}
			}
		}
		if( ! $ignoreCurrentPage ){
			$minifyHtml = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
				'DWnet\\HtmlMinifier\\Utility\\MinifyHtml',
    			$GLOBALS['TSFE']->content
    		);
    		$GLOBALS['TSFE']->content = $minifyHtml->minify( $GLOBALS['TSFE']->content , NULL , unserialize( $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['html_minifier'] ) );
    		$GLOBALS['TSFE']->content = str_replace( "\n" , " " , $GLOBALS['TSFE']->content );
    	}
    }
	
	/**
	 *	render_Cache method
	 *	render method for cached pages
	 */
	public function render_Cache(){
		if( ! $GLOBALS['TSFE']->isINTincScript() ){
			$this->minifyOutput();	
		}
	}
	
	/**
	 *	render_noCache method
	 *	render method for INT pages
	 */
	public function render_noCache(){
		if( $GLOBALS['TSFE']->isINTincScript() ){
			$this->minifyOutput();
		}
	}

}
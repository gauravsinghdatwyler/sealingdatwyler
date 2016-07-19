<?php
namespace TYPO3\Jobs\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Core\Bootstrap;
use TYPO3\CMS\Frontend\Utility\EidUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Ravi Sachaniya
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
 * This class could called with AJAX via eID
 *
 * @subpackage CarzillaApiEid
 */
class AjaxDispatcherUtility
{

    /**
     * configuration
     *
     * @var array
     */
    protected $configuration;

    /**
     * bootstrap
     *
     * @var array
     */
    protected $bootstrap;

    /**
     * Generates the output
     *
     * @return string rendered action
     */
    public function run()
    {
        return $this->bootstrap->run('', $this->configuration);
    }

    /**
     * Initialize Extbase
     *
     * @param array $TYPO3_CONF_VARS The global array. Will be set internally
     */
    public function __construct($TYPO3_CONF_VARS)
    {
        $this->bootstrap = new Bootstrap();

        $userObj = EidUtility::initFeUser();
        $pid = (GeneralUtility::_GET('id') ? GeneralUtility::_GET('id') : 1);
        $GLOBALS['TSFE'] = GeneralUtility::makeInstance(
            'TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController',
            $TYPO3_CONF_VARS,
            $pid,
            0,
            true
        );
        $GLOBALS['TSFE']->connectToDB();
        $GLOBALS['TSFE']->fe_user = $userObj;
        $GLOBALS['TSFE']->id = $pid;
        $GLOBALS['TSFE']->checkAlternativeIdMethods();
        $GLOBALS['TSFE']->determineId();
        $GLOBALS['TSFE']->initTemplate();
        $GLOBALS['TSFE']->getConfigArray();
        
        // Get Plugins TypoScript
        $TypoScriptService = new \TYPO3\CMS\Extbase\Service\TypoScriptService();
        $pluginConfiguration = $TypoScriptService->convertTypoScriptArrayToPlainArray($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_jobs_pi1.']);

        $this->configuration = [
            'pluginName' => 'Pi1',
            'vendorName' => 'TYPO3',
            'extensionName' => 'Jobs',
            'controller' => 'Jobs',
            'action' => 'searchAjax',
            'mvc' => [
                'requestHandlers' => [
                    'TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler' =>
                        'TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler'
                ]
            ],
            'settings' => $pluginConfiguration['settings'],
            'persistence' => array (
                'storagePid' => $pluginConfiguration['persistence']['storagePid']
            )
        ];
        // $_POST['tx_carzillahackerott_minisearch']['action'] = 'searchCatalog';
    }
}
$eid = GeneralUtility::makeInstance('TYPO3\\Jobs\\Utility\\AjaxDispatcherUtility', $GLOBALS['TYPO3_CONF_VARS']);
echo $eid->run();

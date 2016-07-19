<?php
namespace TYPO3\Jobs\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
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
use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
/**
 * JobsController
 */
class JobsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * jobsRepository
     *
     * @var \TYPO3\Jobs\Domain\Repository\JobsRepository
     * @inject
     */
    protected $jobsRepository = NULL;
    
     /**
     * countryRepository
     *
     * @var \TYPO3\Jobs\Domain\Repository\CountryRepository
     * @inject
     */
    protected $countryRepository = NULL;
    
    /**
     * jobFieldRepository
     *
     * @var \TYPO3\Jobs\Domain\Repository\JobFieldRepository
     * @inject
     */
    protected $jobFieldRepository = NULL;
    
     /**
     * Initialize List action
     *
     */
    public function initializeListAction() {
        $querySettings = $this->jobsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->jobsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->countryRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->countryRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->jobFieldRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->jobFieldRepository->setDefaultQuerySettings($querySettings);
    }
    
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction(){
		if(!($GLOBALS["TSFE"]->fe_user->getKey("ses","ajaxjobsArguments"))) {
            $jobs = $this->jobsRepository->findAll();
        } else {
            $args = $GLOBALS["TSFE"]->fe_user->getKey("ses","ajaxjobsArguments");
            $jobs = $this->jobsRepository->searchJobs($args);

            if (mktime() >= $this->getSessionTimeout()) {
                $this->cleanUpSession();
                $GLOBALS['TSFE']->fe_user->setKey("ses","ajaxjobsArguments",NULL);
            }
            $this->setSessionTimeout();

            $this->view->assign('ajaxjobsArguments', $args);
        }
        
        $jobarray = array();
        foreach($jobs as $key=>$value){
			$jobarray[$value->getTown()->getName()][$value->getTown()->getCountry()->getName()][] = $value;
		}
		
		$this->view->assign('count', count($jobs));
        $this->view->assign('jobss', $jobarray);
        
        $country = $this->countryRepository->findAll();
        $this->view->assign('countrys', $country);
        
        $jobfield = $this->jobFieldRepository->findAll();
        $this->view->assign('jobfields', $jobfield);
    }
    
    /**
     * action show
     *
     * @param \TYPO3\Jobs\Domain\Model\Jobs $jobs
     * @return void
     */
    public function showAction(\TYPO3\Jobs\Domain\Model\Jobs $jobs) {
        $this->view->assign('jobs', $jobs);
    }
    
    /**
     * action searchAjax
     *
     * @return void
     */
    public function searchAjaxAction() {
		
        $args = $this->request->getArguments();

        $GLOBALS['TSFE']->fe_user->setKey("ses","ajaxjobsArguments",$args['arguments']);
        $GLOBALS['TSFE']->fe_user->storeSessionData();

        $confs = explode(',', $args['arguments']['psetconf']);
        
        if(count($confs)>0) {
            $querySettings = $this->jobsRepository->createQuery()->getQuerySettings();
            $querySettings->setStoragePageIds(array($confs['0']));
            $this->jobsRepository->setDefaultQuerySettings($querySettings);

            $this->view->assign('jobsDetailPid', $confs[1]);
        }
       

        $result = $this->jobsRepository->searchJobs($args['arguments']);
        $jobarray = array();
        foreach($result as $key=>$value){
			$jobarray[$value->getTown()->getName()][$value->getTown()->getCountry()->getName()][] = $value;
		}
        
        $this->view->assign('count', count($result));
        $this->view->assign('jobss', $jobarray);
    }

	/*
     * Session Helper Methods
     */
    protected function cleanUpSession() {
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'basket', NULL);
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'basketLifetime', NULL);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }

    protected function setSessionTimeout() {
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'basketLifetime', mktime() + 300);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }

    protected function getSessionTimeout() {
        return $GLOBALS['TSFE']->fe_user->getKey('ses', 'basketLifetime');
    }
    /*
     * Session Helper Methods
     */

}

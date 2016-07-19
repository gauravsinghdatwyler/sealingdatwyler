<?php
namespace TYPO3\Productfinder\Controller;

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
 * ProductsController
 */
class ProductsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * productsRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\ProductsRepository
     * @inject
     */
    protected $productsRepository = NULL;

    /**
     * applicationsRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\ApplicationsRepository
     * @inject
     */
    protected $applicationsRepository = NULL;

    /**
     * dimensionsRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\DimensionsRepository
     * @inject
     */
    protected $dimensionsRepository = NULL;

    /**
     * materialsRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\MaterialsRepository
     * @inject
     */
    protected $materialsRepository = NULL;

    /**
     * typesRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\TypesRepository
     * @inject
     */
    protected $typesRepository = NULL;

    /**
     * pdfsRepository
     *
     * @var \TYPO3\Productfinder\Domain\Repository\PdfsRepository
     * @inject
     */
    protected $pdfsRepository = NULL;

    public function initializeAction() {
        $defaultOrderings = array(
            'issecure' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        );
        $this->pdfsRepository->setDefaultOrderings($defaultOrderings);
    }

    /**
     * Initialize List action
     *
     */
    public function initializeListAction() 
    {
        $querySettings = $this->productsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->productsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->applicationsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->applicationsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->dimensionsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->dimensionsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->materialsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->materialsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->typesRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->typesRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->pdfsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->pdfsRepository->setDefaultQuerySettings($querySettings);
    }
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if(!($GLOBALS["TSFE"]->fe_user->getKey("ses","ajaxArguments"))) {
            $products = $this->productsRepository->findAll();
        }
        else {
            $args = $GLOBALS["TSFE"]->fe_user->getKey("ses","ajaxArguments");
            $products = $this->productsRepository->searchProduct($args);

            if (mktime() >= $this->getSessionTimeout()) {
                $this->cleanUpSession();
                $GLOBALS['TSFE']->fe_user->setKey("ses","ajaxArguments",NULL);
            }
            $this->setSessionTimeout();

            $this->view->assign('ajaxArguments', $args);
        }

        $applications = $this->applicationsRepository->findAll();
        $dimensions = $this->dimensionsRepository->findAll();
        $materials = $this->materialsRepository->findAll();
        $types = $this->typesRepository->findAll();

        $this->view->assign('products', $products);
        $this->view->assign('applications', $applications);
        $this->view->assign('dimensions', $dimensions);
        $this->view->assign('materials', $materials);
        $this->view->assign('types', $types);
    }

    /**
     * Initialize List action
     *
     */
    public function initializeShowAction() 
    {
        $querySettings = $this->productsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->productsRepository->setDefaultQuerySettings($querySettings);

        $querySettings = $this->pdfsRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->settings['storageFolderPid']));
        $this->pdfsRepository->setDefaultQuerySettings($querySettings);
    }
    
    /**
     * action show
     *
     * @param \TYPO3\Productfinder\Domain\Model\Products $products
     * @return void
     */
    public function showAction(\TYPO3\Productfinder\Domain\Model\Products $products)
    {
        $loginStatus = false;
        if($GLOBALS['TSFE']->fe_user->user) {
            $loginStatus = true;
        }
        else {
            $loginStatus = false;
        }

        $publicPDFs = $this->pdfsRepository->findPublicPDFs($products->getUid());
        $privatePDFs = $this->pdfsRepository->findPrivatePDFs($products->getUid(), $loginStatus);
        
        $this->view->assign('products', $products);
        $this->view->assign('publicPDF', $publicPDFs);
        $this->view->assign('privatePDF', $privatePDFs);
        $this->view->assign('loginStatus', $loginStatus);
    }


    /**
     * action searchAjax
     *
     * @return void
     */
    public function searchAjaxAction() {
        $args = $this->request->getArguments();

        $GLOBALS['TSFE']->fe_user->setKey("ses","ajaxArguments",$args['arguments']);
        $GLOBALS['TSFE']->fe_user->storeSessionData();

        $confs = explode(',', $args['arguments']['psetconf']);
        if(count($confs)>0) {
            $querySettings = $this->productsRepository->createQuery()->getQuerySettings();
            $querySettings->setStoragePageIds(array($confs['0']));
            $this->productsRepository->setDefaultQuerySettings($querySettings);

            $this->view->assign('productDetailPid', $confs[1]);
        }

        $result = $this->productsRepository->searchProduct($args['arguments']);
        $this->view->assign('count', count($result));
        $this->view->assign('products', $result);
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
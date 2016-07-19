<?php
namespace AG\AgSubscription\Controller;

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

/**
 * AgSubscriptionController
 */
use \TYPO3\CMS\Core\Utility\GeneralUtility;
class AgSubscriptionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * agSubscriptionRepository
     *
     * @var \AG\AgSubscription\Domain\Repository\AgSubscriptionRepository
     * @inject
     */
    protected $agSubscriptionRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

        $GLOBALS["TSFE"]->set_no_cache();

       // $actionUrl = $this->request->getBaseUri(); //$this->uriBuilder->getRequest()->getRequestUri();
        $actionUrl = $this->uriBuilder->getRequest()->getRequestUri();
       // echo $actionUrl;die;
        $getmethodsData = $_GET;

		$settings = $this->settings;
		$postData = $_POST;

		$agFields = $this->agSubscriptionRepository->agFields($settings['ttaddress']);
        $requiredFields = $this->agSubscriptionRepository->agFields($settings['requiredFields']);
        $agSubscriptions = $this->agSubscriptionRepository->findDataForUpdate($settings,$getmethodsData);
        $insertPostData = $this->agSubscriptionRepository->insertPostData($settings,$postData,$agFields,$actionUrl,$requiredFields);
		$subscriptionProcess = $this->agSubscriptionRepository->subscriptionProcess($settings,$getmethodsData,$actionUrl);

        $this->view->assignMultiple(
            array(
                'subscriptionProcess' => $subscriptionProcess,
                'agFields' => $agFields,
                'actionUrl' => $actionUrl,
                'postData' => $postData,
                'requiredFields' => $requiredFields,
                'recordInsert' => $insertPostData,
                'snd' => $getmethodsData['snd'],
                'infoEdit' => $agSubscriptions,
                'editId' => base64_decode($getmethodsData['subscribeID'])
            )
        );
    }
}
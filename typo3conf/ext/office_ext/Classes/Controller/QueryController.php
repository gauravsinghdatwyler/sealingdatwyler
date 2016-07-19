<?php
namespace Datwyler\OfficeExt\Controller;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
 * QueryController
 */
class QueryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * queryRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\QueryRepository
     * @inject
     */
    protected $queryRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $queries = $this->queryRepository->findAll();
        $this->view->assign('queries', $queries);
    }

    /**
     * action show
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Query $query
     * @return void
     */
    public function showAction(\Datwyler\OfficeExt\Domain\Model\Query $query)
    {
        $this->view->assign('query', $query);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Query $newQuery
     * @return void
     */
    public function createAction(\Datwyler\OfficeExt\Domain\Model\Query $newQuery)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);

        if(GeneralUtility::validEmail($newQuery->getemail())){
            $this->queryRepository->add($newQuery);
       //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newQuery);

            $adminEmail = $this->settings['adminEmail'];
            $contactPersonMail = $newQuery->getcontactPerson()->getemail();
            $userEmail = $newQuery->getemail();

            $sendUser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
            $sendAdmin = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
            $sendPerson = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');

            // Email For the User
            $sendUser->setSubject('Thank you for contacting Datwyler Sealing Solutions!');
            $sendUser->setFrom('no-reply@datwyler.com');
            $sendUser->setFrom(array('no-reply@datwyler.com' => 'Datwyler Sealing Solutions'));
            $sendUser->setTo($userEmail);
            $sendUser->setBody(
                '<html><head></head><body>'.
                '<p>Hello '.$newQuery->getfullName().',</p>'.
                '<p>Thank you for contacting Datwyler Sealing Solutions.<br />'.
                'We would reply as soon as possible.</p>'.
                '<p>Datwyler Sealing Solutions Team!</p>'.
                '</body></html>','text/html'
                );
            $sendUser->send();

            //Email For The Admin
            $sendAdmin->setSubject('User contacted '. $newQuery->getcontactPerson()->getOfficeId()->getName());
            $sendAdmin->setFrom('no-reply@datwyler.com');
            $sendAdmin->setFrom(array('no-reply@datwyler.com' => 'Datwyler Sealing Solutions'));
            $sendAdmin->setTo($adminEmail);
            $sendAdmin->setBody(
                '<html><head></head><body>' .
                '<p>Hello Team,</p>'.
                '<p>User '.$newQuery->getfullName().' has contacted -'. $newQuery->getcontactPerson()->getOfficeId()->getName().'-'.$newQuery->getcontactPerson()->getCountryId()->getName().' with the following query message and details, Please check. </p>'.
                '<p><b>Name</b>: '.$newQuery->getfullName().'<br />'.
                '<b>Company</b>: '.$newQuery->getcompany().'<br />'.
                '<b>Email</b>: '.$userEmail.'<br />'.
                '<b>Country</b>: '.$newQuery->getcountry().'<br />'.
                '<b>Message</b>: '.$newQuery->getmessage().'<br /></p>'.
                '<p>Thanks!</p>'.
                '</body></html>',
                'text/html'
            );
            $sendAdmin->send();

            //Email For The Contact Person
            $sendPerson->setSubject('User contacted '. $newQuery->getcontactPerson()->getOfficeId()->getName());
            $sendPerson->setFrom('no-reply@datwyler.com');
            $sendPerson->setFrom(array('no-reply@datwyler.com' => 'Datwyler Sealing Solutions'));
            $sendPerson->setTo($contactPersonMail);
            $sendPerson->setBody(
                '<html><head></head><body>' .
                '<p>Hello Team,</p>'.
                '<p>User '.$newQuery->getfullName().' has contacted -'. $newQuery->getcontactPerson()->getOfficeId()->getName().'-'.$newQuery->getcontactPerson()->getCountryId()->getName().' with the following query message and details, Please check. </p>'.
                '<p><b>Name</b>: '.$newQuery->getfullName().'<br />'.
                '<b>Company</b>: '.$newQuery->getcompany().'<br />'.
                '<b>Email</b>: '.$userEmail.'<br />'.
                '<b>Country</b>: '.$newQuery->getcountry().'<br />'.
                '<b>Message</b>: '.$newQuery->getmessage().'<br /></p>'.
                '<p>Thanks!</p>'.
                '</body></html>',
                'text/html'
            );
            $sendPerson->send();
            $this->redirect('list');
        }else{
            $this->redirect('edit');
        }
    }

    /**
     * action edit
     *
     * @return void
     */
    public function editAction()
    {
        $this->view->assign('query', $query);
    }

    /**
     * action update
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Query $query
     * @return void
     */
    public function updateAction(\Datwyler\OfficeExt\Domain\Model\Query $query)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->queryRepository->update($query);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Query $query
     * @return void
     */
    public function deleteAction(\Datwyler\OfficeExt\Domain\Model\Query $query)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->queryRepository->remove($query);
        $this->redirect('list');
    }

}

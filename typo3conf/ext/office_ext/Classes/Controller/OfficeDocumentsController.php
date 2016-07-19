<?php
namespace Datwyler\OfficeExt\Controller;

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
 * OfficeDocumentsController
 */
class OfficeDocumentsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * officeDocumentsRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\OfficeDocumentsRepository
     * @inject
     */
    protected $officeDocumentsRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $officeDocuments = $this->officeDocumentsRepository->findAll();
        $this->view->assign('officeDocuments', $officeDocuments);
    }
    
    /**
     * action show
     *
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments
     * @return void
     */
    public function showAction(\Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments)
    {
        $this->view->assign('officeDocuments', $officeDocuments);
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
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocuments $newOfficeDocuments
     * @return void
     */
    public function createAction(\Datwyler\OfficeExt\Domain\Model\OfficeDocuments $newOfficeDocuments)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->officeDocumentsRepository->add($newOfficeDocuments);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments
     * @ignorevalidation $officeDocuments
     * @return void
     */
    public function editAction(\Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments)
    {
        $this->view->assign('officeDocuments', $officeDocuments);
    }
    
    /**
     * action update
     *
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments
     * @return void
     */
    public function updateAction(\Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->officeDocumentsRepository->update($officeDocuments);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments
     * @return void
     */
    public function deleteAction(\Datwyler\OfficeExt\Domain\Model\OfficeDocuments $officeDocuments)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->officeDocumentsRepository->remove($officeDocuments);
        $this->redirect('list');
    }

}
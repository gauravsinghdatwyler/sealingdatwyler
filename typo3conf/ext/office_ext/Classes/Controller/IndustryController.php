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
 * IndustryController
 */
class IndustryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * industryRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\IndustryRepository
     * @inject
     */
    protected $industryRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $industries = $this->industryRepository->findAll();
        $this->view->assign('industries', $industries);
    }
    
    /**
     * action show
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $industry
     * @return void
     */
    public function showAction(\Datwyler\OfficeExt\Domain\Model\Industry $industry)
    {
        $this->view->assign('industry', $industry);
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
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $newIndustry
     * @return void
     */
    public function createAction(\Datwyler\OfficeExt\Domain\Model\Industry $newIndustry)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->industryRepository->add($newIndustry);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $industry
     * @ignorevalidation $industry
     * @return void
     */
    public function editAction(\Datwyler\OfficeExt\Domain\Model\Industry $industry)
    {
        $this->view->assign('industry', $industry);
    }
    
    /**
     * action update
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $industry
     * @return void
     */
    public function updateAction(\Datwyler\OfficeExt\Domain\Model\Industry $industry)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->industryRepository->update($industry);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $industry
     * @return void
     */
    public function deleteAction(\Datwyler\OfficeExt\Domain\Model\Industry $industry)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->industryRepository->remove($industry);
        $this->redirect('list');
    }

}
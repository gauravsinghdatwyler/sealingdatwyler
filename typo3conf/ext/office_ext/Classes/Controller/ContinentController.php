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
 * ContinentController
 */
class ContinentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

   
    /**
     * awardsRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\AwardsRepository
     * @inject
     */
    protected $awardsRepository = NULL;


    /**
     * docMasterRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\DocMasterRepository
     * @inject
     */
    protected $docMasterRepository = NULL;
    

    /**
     * officeDocTypeRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\OfficeDocTypeRepository
     * @inject
     */
    protected $officeDocTypeRepository = NULL;
   

    /**
     * officeDocumentsRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\OfficeDocumentsRepository
     * @inject
     */
    protected $officeDocumentsRepository = NULL;

    /**
     * contactPersonRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\ContactPersonRepository
     * @inject
     */
    protected $contactPersonRepository = NULL;

    /**
     * industryRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\IndustryRepository
     * @inject
     */
    protected $industryRepository = NULL;
    
    /**
     * branchOfficeRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\BranchOfficeRepository
     * @inject
     */
    protected $branchOfficeRepository = NULL;
    
    /**
     * continentRepository
     *
     * @var \Datwyler\OfficeExt\Domain\Repository\ContinentRepository
     * @inject
     */
    protected $continentRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $continents = $this->continentRepository->findAll();
        $this->view->assign('continents', $continents);
        
        $branches = $this->branchOfficeRepository->findAll();
        $this->view->assign('branches', $branches);
        
        $industry = $this->industryRepository->findAll();
        $this->view->assign('industries', $industry);
        
        $this->view->assign('base_url', $this->request->getBaseUri());
    }
    
    /**
     * action show
     *
     * @param \Datwyler\OfficeExt\Domain\Model\BranchOffice $branches
     * @return void
     */
    public function showAction(\Datwyler\OfficeExt\Domain\Model\BranchOffice $branches)
    {
        $this->view->assign('branches', $branches);
        $uid = $branches->getuid();
        
        $ContactPerson = $this->contactPersonRepository->findContactPerson($uid);
        $this->view->assign('person', $ContactPerson);
        
        $docs = $this->officeDocumentsRepository->findDocuments($uid);
        $this->view->assign('document', $docs);
        
        $master = $this->docMasterRepository->findAll();

        $dType = array();

        $doctype = $this->officeDocTypeRepository->findAll();
        $this->view->assign('doctype', $doctype);
        

        // Generate List of Document Types in Branch
        foreach ($doctype as $keys => $values) {
	        $typeId = $values->getuid();
	        foreach($docs as $key => $val){
	        	$docid = $val->getdocumentType()->getuid();
	        	if($docid == $typeId){
                    array_push($dType, array(
                        'id'=>$val->getdocumentType()->getuid(), 
                        'type'=>$val->getdocumentType()->getname(),
                        'uid'=>$val->getdocumentType()->getmasterType()->getuid()
                        )
                    );
                    break;        		
	        	}
	        }
        }

        // Generate Master Document List
        $masterVal = array();
        foreach($master as $mkey => $mval){
            $mId = $mval->getuid(); 
            for($i=0; $i<sizeof($dType); $i++){
                if($mId == $dType[$i]['uid']){
                    array_push($masterVal, array(
                        'uid' => $mId,
                        'title' => $mval->getTitle(),
                        'teaser' => $mval->getTeaser(),
                        )
                    );
                    break;
                }
            }
        }
        $this->view->assign('masterDoc', $masterVal);
        $this->view->assign('docType', $dType);

        $Awards = $this->awardsRepository->findAwards($uid);
        $this->view->assign('awards', $Awards);        
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
     * @param \Datwyler\OfficeExt\Domain\Model\Continent $newContinent
     * @return void
     */
    public function createAction(\Datwyler\OfficeExt\Domain\Model\Continent $newContinent)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->continentRepository->add($newContinent);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Continent $continent
     * @ignorevalidation $continent
     * @return void
     */
    public function editAction(\Datwyler\OfficeExt\Domain\Model\Continent $continent)
    {
        $this->view->assign('continent', $continent);
    }
    
    /**
     * action update
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Continent $continent
     * @return void
     */
    public function updateAction(\Datwyler\OfficeExt\Domain\Model\Continent $continent)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->continentRepository->update($continent);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Continent $continent
     * @return void
     */
    public function deleteAction(\Datwyler\OfficeExt\Domain\Model\Continent $continent)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->continentRepository->remove($continent);
        $this->redirect('list');
    }

}

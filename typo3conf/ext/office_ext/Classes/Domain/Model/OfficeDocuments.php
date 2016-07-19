<?php
namespace Datwyler\OfficeExt\Domain\Model;

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
 * OfficeDocuments
 */
class OfficeDocuments extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * file
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $file = null;
    
    /**
     * officeId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\BranchOffice
     */
    protected $officeId = null;
    
    /**
     * documentType
     *
     * @var \Datwyler\OfficeExt\Domain\Model\OfficeDocType
     */
    protected $documentType = null;
    
    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the file
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * Sets the file
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     * @return void
     */
    public function setFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $file)
    {
        $this->file = $file;
    }
    
    /**
     * Returns the officeId
     *
     * @return \Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId
     */
    public function getOfficeId()
    {
        return $this->officeId;
    }
    
    /**
     * Sets the officeId
     *
     * @param \Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId
     * @return void
     */
    public function setOfficeId(\Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId)
    {
        $this->officeId = $officeId;
    }
    
    
    /**
     * Returns the documentType
     * @return \Datwyler\OfficeExt\Domain\Model\OfficeDocType $documentType
     * 
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }
    
    /**
     * Sets the documentType
     *
     * @param \Datwyler\OfficeExt\Domain\Model\OfficeDocType $documentType
     * @return void
     */
    public function setDocumentType(\Datwyler\OfficeExt\Domain\Model\OfficeDocType $documentType)
    {
        $this->documentType = $documentType;
    }

}
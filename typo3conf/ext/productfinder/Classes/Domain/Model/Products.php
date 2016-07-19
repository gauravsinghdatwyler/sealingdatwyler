<?php
namespace TYPO3\Productfinder\Domain\Model;

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
 * Products
 */
class Products extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * application
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Applications>
     * @cascade remove
     */
    protected $application = null;
    
    /**
     * size
     *
     * @var \TYPO3\Productfinder\Domain\Model\Dimensions
     */
    protected $size = null;
    
    /**
     * material
     *
     * @var \TYPO3\Productfinder\Domain\Model\Materials
     */
    protected $material = null;
    
    /**
     * type
     *
     * @var \TYPO3\Productfinder\Domain\Model\Types
     */
    protected $type = null;
    
    /**
     * pdfs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Pdfs>
     * @cascade remove
     */
    protected $pdfs = null;
    
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
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Returns the size
     *
     * @return \TYPO3\Productfinder\Domain\Model\Dimensions $size
     */
    public function getSize()
    {
        return $this->size;
    }
    
    /**
     * Sets the size
     *
     * @param \TYPO3\Productfinder\Domain\Model\Dimensions $size
     * @return void
     */
    public function setSize(\TYPO3\Productfinder\Domain\Model\Dimensions $size)
    {
        $this->size = $size;
    }
    
    /**
     * Returns the material
     *
     * @return \TYPO3\Productfinder\Domain\Model\Materials $material
     */
    public function getMaterial()
    {
        return $this->material;
    }
    
    /**
     * Sets the material
     *
     * @param \TYPO3\Productfinder\Domain\Model\Materials $material
     * @return void
     */
    public function setMaterial(\TYPO3\Productfinder\Domain\Model\Materials $material)
    {
        $this->material = $material;
    }
    
    /**
     * Returns the type
     *
     * @return \TYPO3\Productfinder\Domain\Model\Types $type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Sets the type
     *
     * @param \TYPO3\Productfinder\Domain\Model\Types $type
     * @return void
     */
    public function setType(\TYPO3\Productfinder\Domain\Model\Types $type)
    {
        $this->type = $type;
    }
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->application = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->pdfs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a PDFs
     *
     * @param \TYPO3\Productfinder\Domain\Model\Pdfs $pdf
     * @return void
     */
    public function addPdf(\TYPO3\Productfinder\Domain\Model\Pdfs $pdf)
    {
        $this->pdfs->attach($pdf);
    }
    
    /**
     * Removes a PDFs
     *
     * @param \TYPO3\Productfinder\Domain\Model\Pdfs $pdfToRemove The Pdfs to be removed
     * @return void
     */
    public function removePdf(\TYPO3\Productfinder\Domain\Model\Pdfs $pdfToRemove)
    {
        $this->pdfs->detach($pdfToRemove);
    }
    
    /**
     * Returns the pdfs
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Pdfs> pdfs
     */
    public function getPdfs()
    {
        return $this->pdfs;
    }
    
    /**
     * Sets the pdfs
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Pdfs> $pdfs
     * @return void
     */
    public function setPdfs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $pdfs)
    {
        $this->pdfs = $pdfs;
    }
    
    /**
     * Adds a Applications
     *
     * @param \TYPO3\Productfinder\Domain\Model\Applications $application
     * @return void
     */
    public function addApplication(\TYPO3\Productfinder\Domain\Model\Applications $application)
    {
        $this->application->attach($application);
    }
    
    /**
     * Removes a Applications
     *
     * @param \TYPO3\Productfinder\Domain\Model\Applications $applicationToRemove The Applications to be removed
     * @return void
     */
    public function removeApplication(\TYPO3\Productfinder\Domain\Model\Applications $applicationToRemove)
    {
        $this->application->detach($applicationToRemove);
    }
    
    /**
     * Returns the application
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Applications> $application
     */
    public function getApplication()
    {
        return $this->application;
    }
    
    /**
     * Sets the application
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Productfinder\Domain\Model\Applications> $application
     * @return void
     */
    public function setApplication(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $application)
    {
        $this->application = $application;
    }

}
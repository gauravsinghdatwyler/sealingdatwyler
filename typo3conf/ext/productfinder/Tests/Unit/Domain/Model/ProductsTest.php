<?php

namespace TYPO3\Productfinder\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\Productfinder\Domain\Model\Products.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProductsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TYPO3\Productfinder\Domain\Model\Products
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TYPO3\Productfinder\Domain\Model\Products();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApplicationReturnsInitialValueForApplications()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getApplication()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationForObjectStorageContainingApplicationsSetsApplication()
	{
		$application = new \TYPO3\Productfinder\Domain\Model\Applications();
		$objectStorageHoldingExactlyOneApplication = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneApplication->attach($application);
		$this->subject->setApplication($objectStorageHoldingExactlyOneApplication);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneApplication,
			'application',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addApplicationToObjectStorageHoldingApplication()
	{
		$application = new \TYPO3\Productfinder\Domain\Model\Applications();
		$applicationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$applicationObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($application));
		$this->inject($this->subject, 'application', $applicationObjectStorageMock);

		$this->subject->addApplication($application);
	}

	/**
	 * @test
	 */
	public function removeApplicationFromObjectStorageHoldingApplication()
	{
		$application = new \TYPO3\Productfinder\Domain\Model\Applications();
		$applicationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$applicationObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($application));
		$this->inject($this->subject, 'application', $applicationObjectStorageMock);

		$this->subject->removeApplication($application);

	}

	/**
	 * @test
	 */
	public function getSizeReturnsInitialValueForDimensions()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 */
	public function setSizeForDimensionsSetsSize()
	{
		$sizeFixture = new \TYPO3\Productfinder\Domain\Model\Dimensions();
		$this->subject->setSize($sizeFixture);

		$this->assertAttributeEquals(
			$sizeFixture,
			'size',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMaterialReturnsInitialValueForMaterials()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getMaterial()
		);
	}

	/**
	 * @test
	 */
	public function setMaterialForMaterialsSetsMaterial()
	{
		$materialFixture = new \TYPO3\Productfinder\Domain\Model\Materials();
		$this->subject->setMaterial($materialFixture);

		$this->assertAttributeEquals(
			$materialFixture,
			'material',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForTypes()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForTypesSetsType()
	{
		$typeFixture = new \TYPO3\Productfinder\Domain\Model\Types();
		$this->subject->setType($typeFixture);

		$this->assertAttributeEquals(
			$typeFixture,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPdfsReturnsInitialValueForPdfs()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPdfs()
		);
	}

	/**
	 * @test
	 */
	public function setPdfsForObjectStorageContainingPdfsSetsPdfs()
	{
		$pdf = new \TYPO3\Productfinder\Domain\Model\Pdfs();
		$objectStorageHoldingExactlyOnePdfs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePdfs->attach($pdf);
		$this->subject->setPdfs($objectStorageHoldingExactlyOnePdfs);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePdfs,
			'pdfs',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPdfToObjectStorageHoldingPdfs()
	{
		$pdf = new \TYPO3\Productfinder\Domain\Model\Pdfs();
		$pdfsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$pdfsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($pdf));
		$this->inject($this->subject, 'pdfs', $pdfsObjectStorageMock);

		$this->subject->addPdf($pdf);
	}

	/**
	 * @test
	 */
	public function removePdfFromObjectStorageHoldingPdfs()
	{
		$pdf = new \TYPO3\Productfinder\Domain\Model\Pdfs();
		$pdfsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$pdfsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($pdf));
		$this->inject($this->subject, 'pdfs', $pdfsObjectStorageMock);

		$this->subject->removePdf($pdf);

	}
}

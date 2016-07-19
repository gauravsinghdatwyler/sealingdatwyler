<?php

namespace Datwyler\OfficeExt\Tests\Unit\Domain\Model;

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
 * Test case for class \Datwyler\OfficeExt\Domain\Model\OfficeDocuments.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class OfficeDocumentsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Datwyler\OfficeExt\Domain\Model\OfficeDocuments
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();
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
	public function getFileReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getFile()
		);
	}

	/**
	 * @test
	 */
	public function setFileForFileReferenceSetsFile()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setFile($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'file',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOfficeIdReturnsInitialValueForBranchOffice()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getOfficeId()
		);
	}

	/**
	 * @test
	 */
	public function setOfficeIdForBranchOfficeSetsOfficeId()
	{
		$officeIdFixture = new \Datwyler\OfficeExt\Domain\Model\BranchOffice();
		$this->subject->setOfficeId($officeIdFixture);

		$this->assertAttributeEquals(
			$officeIdFixture,
			'officeId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDocumentTypeReturnsInitialValueForOfficeDocType()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDocumentType()
		);
	}

	/**
	 * @test
	 */
	public function setDocumentTypeForObjectStorageContainingOfficeDocTypeSetsDocumentType()
	{
		$documentType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();
		$objectStorageHoldingExactlyOneDocumentType = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDocumentType->attach($documentType);
		$this->subject->setDocumentType($objectStorageHoldingExactlyOneDocumentType);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDocumentType,
			'documentType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDocumentTypeToObjectStorageHoldingDocumentType()
	{
		$documentType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();
		$documentTypeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$documentTypeObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($documentType));
		$this->inject($this->subject, 'documentType', $documentTypeObjectStorageMock);

		$this->subject->addDocumentType($documentType);
	}

	/**
	 * @test
	 */
	public function removeDocumentTypeFromObjectStorageHoldingDocumentType()
	{
		$documentType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();
		$documentTypeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$documentTypeObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($documentType));
		$this->inject($this->subject, 'documentType', $documentTypeObjectStorageMock);

		$this->subject->removeDocumentType($documentType);

	}
}

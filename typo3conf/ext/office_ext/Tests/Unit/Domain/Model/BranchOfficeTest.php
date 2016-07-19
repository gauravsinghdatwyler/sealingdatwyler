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
 * Test case for class \Datwyler\OfficeExt\Domain\Model\BranchOffice.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class BranchOfficeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Datwyler\OfficeExt\Domain\Model\BranchOffice
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Datwyler\OfficeExt\Domain\Model\BranchOffice();
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
	public function getAddressReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress()
	{
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity()
	{
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getZipReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getZip()
		);
	}

	/**
	 * @test
	 */
	public function setZipForStringSetsZip()
	{
		$this->subject->setZip('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSiteUrlReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSiteUrl()
		);
	}

	/**
	 * @test
	 */
	public function setSiteUrlForStringSetsSiteUrl()
	{
		$this->subject->setSiteUrl('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'siteUrl',
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
	public function getLatitudeReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getLatitude()
		);
	}

	/**
	 * @test
	 */
	public function setLatitudeForFloatSetsLatitude()
	{
		$this->subject->setLatitude(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'latitude',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getLongitudeReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getLongitude()
		);
	}

	/**
	 * @test
	 */
	public function setLongitudeForFloatSetsLongitude()
	{
		$this->subject->setLongitude(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'longitude',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getCountryIdReturnsInitialValueForCountry()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCountryId()
		);
	}

	/**
	 * @test
	 */
	public function setCountryIdForCountrySetsCountryId()
	{
		$countryIdFixture = new \Datwyler\OfficeExt\Domain\Model\Country();
		$this->subject->setCountryId($countryIdFixture);

		$this->assertAttributeEquals(
			$countryIdFixture,
			'countryId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIndustryIdReturnsInitialValueForIndustry()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getIndustryId()
		);
	}

	/**
	 * @test
	 */
	public function setIndustryIdForIndustrySetsIndustryId()
	{
		$industryIdFixture = new \Datwyler\OfficeExt\Domain\Model\Industry();
		$this->subject->setIndustryId($industryIdFixture);

		$this->assertAttributeEquals(
			$industryIdFixture,
			'industryId',
			$this->subject
		);
	}
}

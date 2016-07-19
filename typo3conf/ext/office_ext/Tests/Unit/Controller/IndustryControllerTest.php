<?php
namespace Datwyler\OfficeExt\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
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
 * Test case for class Datwyler\OfficeExt\Controller\IndustryController.
 *
 */
class IndustryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\IndustryController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\IndustryController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllIndustriesFromRepositoryAndAssignsThemToView()
	{

		$allIndustries = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$industryRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\IndustryRepository', array('findAll'), array(), '', FALSE);
		$industryRepository->expects($this->once())->method('findAll')->will($this->returnValue($allIndustries));
		$this->inject($this->subject, 'industryRepository', $industryRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('industries', $allIndustries);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenIndustryToView()
	{
		$industry = new \Datwyler\OfficeExt\Domain\Model\Industry();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('industry', $industry);

		$this->subject->showAction($industry);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenIndustryToIndustryRepository()
	{
		$industry = new \Datwyler\OfficeExt\Domain\Model\Industry();

		$industryRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\IndustryRepository', array('add'), array(), '', FALSE);
		$industryRepository->expects($this->once())->method('add')->with($industry);
		$this->inject($this->subject, 'industryRepository', $industryRepository);

		$this->subject->createAction($industry);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenIndustryToView()
	{
		$industry = new \Datwyler\OfficeExt\Domain\Model\Industry();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('industry', $industry);

		$this->subject->editAction($industry);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenIndustryInIndustryRepository()
	{
		$industry = new \Datwyler\OfficeExt\Domain\Model\Industry();

		$industryRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\IndustryRepository', array('update'), array(), '', FALSE);
		$industryRepository->expects($this->once())->method('update')->with($industry);
		$this->inject($this->subject, 'industryRepository', $industryRepository);

		$this->subject->updateAction($industry);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenIndustryFromIndustryRepository()
	{
		$industry = new \Datwyler\OfficeExt\Domain\Model\Industry();

		$industryRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\IndustryRepository', array('remove'), array(), '', FALSE);
		$industryRepository->expects($this->once())->method('remove')->with($industry);
		$this->inject($this->subject, 'industryRepository', $industryRepository);

		$this->subject->deleteAction($industry);
	}
}

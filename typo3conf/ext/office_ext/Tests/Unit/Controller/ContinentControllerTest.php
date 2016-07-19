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
 * Test case for class Datwyler\OfficeExt\Controller\ContinentController.
 *
 */
class ContinentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\ContinentController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\ContinentController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllContinentsFromRepositoryAndAssignsThemToView()
	{

		$allContinents = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$continentRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContinentRepository', array('findAll'), array(), '', FALSE);
		$continentRepository->expects($this->once())->method('findAll')->will($this->returnValue($allContinents));
		$this->inject($this->subject, 'continentRepository', $continentRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('continents', $allContinents);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenContinentToView()
	{
		$continent = new \Datwyler\OfficeExt\Domain\Model\Continent();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('continent', $continent);

		$this->subject->showAction($continent);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenContinentToContinentRepository()
	{
		$continent = new \Datwyler\OfficeExt\Domain\Model\Continent();

		$continentRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContinentRepository', array('add'), array(), '', FALSE);
		$continentRepository->expects($this->once())->method('add')->with($continent);
		$this->inject($this->subject, 'continentRepository', $continentRepository);

		$this->subject->createAction($continent);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenContinentToView()
	{
		$continent = new \Datwyler\OfficeExt\Domain\Model\Continent();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('continent', $continent);

		$this->subject->editAction($continent);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenContinentInContinentRepository()
	{
		$continent = new \Datwyler\OfficeExt\Domain\Model\Continent();

		$continentRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContinentRepository', array('update'), array(), '', FALSE);
		$continentRepository->expects($this->once())->method('update')->with($continent);
		$this->inject($this->subject, 'continentRepository', $continentRepository);

		$this->subject->updateAction($continent);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenContinentFromContinentRepository()
	{
		$continent = new \Datwyler\OfficeExt\Domain\Model\Continent();

		$continentRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContinentRepository', array('remove'), array(), '', FALSE);
		$continentRepository->expects($this->once())->method('remove')->with($continent);
		$this->inject($this->subject, 'continentRepository', $continentRepository);

		$this->subject->deleteAction($continent);
	}
}

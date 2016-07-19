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
 * Test case for class Datwyler\OfficeExt\Controller\AwardsController.
 *
 */
class AwardsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\AwardsController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\AwardsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAwardssFromRepositoryAndAssignsThemToView()
	{

		$allAwardss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$awardsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\AwardsRepository', array('findAll'), array(), '', FALSE);
		$awardsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAwardss));
		$this->inject($this->subject, 'awardsRepository', $awardsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('awardss', $allAwardss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAwardsToView()
	{
		$awards = new \Datwyler\OfficeExt\Domain\Model\Awards();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('awards', $awards);

		$this->subject->showAction($awards);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenAwardsToAwardsRepository()
	{
		$awards = new \Datwyler\OfficeExt\Domain\Model\Awards();

		$awardsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\AwardsRepository', array('add'), array(), '', FALSE);
		$awardsRepository->expects($this->once())->method('add')->with($awards);
		$this->inject($this->subject, 'awardsRepository', $awardsRepository);

		$this->subject->createAction($awards);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenAwardsToView()
	{
		$awards = new \Datwyler\OfficeExt\Domain\Model\Awards();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('awards', $awards);

		$this->subject->editAction($awards);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenAwardsInAwardsRepository()
	{
		$awards = new \Datwyler\OfficeExt\Domain\Model\Awards();

		$awardsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\AwardsRepository', array('update'), array(), '', FALSE);
		$awardsRepository->expects($this->once())->method('update')->with($awards);
		$this->inject($this->subject, 'awardsRepository', $awardsRepository);

		$this->subject->updateAction($awards);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenAwardsFromAwardsRepository()
	{
		$awards = new \Datwyler\OfficeExt\Domain\Model\Awards();

		$awardsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\AwardsRepository', array('remove'), array(), '', FALSE);
		$awardsRepository->expects($this->once())->method('remove')->with($awards);
		$this->inject($this->subject, 'awardsRepository', $awardsRepository);

		$this->subject->deleteAction($awards);
	}
}

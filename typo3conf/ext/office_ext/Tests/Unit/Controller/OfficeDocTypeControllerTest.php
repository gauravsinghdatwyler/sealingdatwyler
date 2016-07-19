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
 * Test case for class Datwyler\OfficeExt\Controller\OfficeDocTypeController.
 *
 */
class OfficeDocTypeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\OfficeDocTypeController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\OfficeDocTypeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllOfficeDocTypesFromRepositoryAndAssignsThemToView()
	{

		$allOfficeDocTypes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$officeDocTypeRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocTypeRepository', array('findAll'), array(), '', FALSE);
		$officeDocTypeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allOfficeDocTypes));
		$this->inject($this->subject, 'officeDocTypeRepository', $officeDocTypeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('officeDocTypes', $allOfficeDocTypes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenOfficeDocTypeToView()
	{
		$officeDocType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('officeDocType', $officeDocType);

		$this->subject->showAction($officeDocType);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenOfficeDocTypeToOfficeDocTypeRepository()
	{
		$officeDocType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();

		$officeDocTypeRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocTypeRepository', array('add'), array(), '', FALSE);
		$officeDocTypeRepository->expects($this->once())->method('add')->with($officeDocType);
		$this->inject($this->subject, 'officeDocTypeRepository', $officeDocTypeRepository);

		$this->subject->createAction($officeDocType);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenOfficeDocTypeToView()
	{
		$officeDocType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('officeDocType', $officeDocType);

		$this->subject->editAction($officeDocType);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenOfficeDocTypeInOfficeDocTypeRepository()
	{
		$officeDocType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();

		$officeDocTypeRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocTypeRepository', array('update'), array(), '', FALSE);
		$officeDocTypeRepository->expects($this->once())->method('update')->with($officeDocType);
		$this->inject($this->subject, 'officeDocTypeRepository', $officeDocTypeRepository);

		$this->subject->updateAction($officeDocType);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenOfficeDocTypeFromOfficeDocTypeRepository()
	{
		$officeDocType = new \Datwyler\OfficeExt\Domain\Model\OfficeDocType();

		$officeDocTypeRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocTypeRepository', array('remove'), array(), '', FALSE);
		$officeDocTypeRepository->expects($this->once())->method('remove')->with($officeDocType);
		$this->inject($this->subject, 'officeDocTypeRepository', $officeDocTypeRepository);

		$this->subject->deleteAction($officeDocType);
	}
}

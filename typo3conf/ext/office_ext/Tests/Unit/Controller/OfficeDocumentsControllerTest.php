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
 * Test case for class Datwyler\OfficeExt\Controller\OfficeDocumentsController.
 *
 */
class OfficeDocumentsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\OfficeDocumentsController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\OfficeDocumentsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllOfficeDocumentssFromRepositoryAndAssignsThemToView()
	{

		$allOfficeDocumentss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$officeDocumentsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocumentsRepository', array('findAll'), array(), '', FALSE);
		$officeDocumentsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allOfficeDocumentss));
		$this->inject($this->subject, 'officeDocumentsRepository', $officeDocumentsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('officeDocumentss', $allOfficeDocumentss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenOfficeDocumentsToView()
	{
		$officeDocuments = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('officeDocuments', $officeDocuments);

		$this->subject->showAction($officeDocuments);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenOfficeDocumentsToOfficeDocumentsRepository()
	{
		$officeDocuments = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();

		$officeDocumentsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocumentsRepository', array('add'), array(), '', FALSE);
		$officeDocumentsRepository->expects($this->once())->method('add')->with($officeDocuments);
		$this->inject($this->subject, 'officeDocumentsRepository', $officeDocumentsRepository);

		$this->subject->createAction($officeDocuments);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenOfficeDocumentsToView()
	{
		$officeDocuments = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('officeDocuments', $officeDocuments);

		$this->subject->editAction($officeDocuments);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenOfficeDocumentsInOfficeDocumentsRepository()
	{
		$officeDocuments = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();

		$officeDocumentsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocumentsRepository', array('update'), array(), '', FALSE);
		$officeDocumentsRepository->expects($this->once())->method('update')->with($officeDocuments);
		$this->inject($this->subject, 'officeDocumentsRepository', $officeDocumentsRepository);

		$this->subject->updateAction($officeDocuments);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenOfficeDocumentsFromOfficeDocumentsRepository()
	{
		$officeDocuments = new \Datwyler\OfficeExt\Domain\Model\OfficeDocuments();

		$officeDocumentsRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\OfficeDocumentsRepository', array('remove'), array(), '', FALSE);
		$officeDocumentsRepository->expects($this->once())->method('remove')->with($officeDocuments);
		$this->inject($this->subject, 'officeDocumentsRepository', $officeDocumentsRepository);

		$this->subject->deleteAction($officeDocuments);
	}
}

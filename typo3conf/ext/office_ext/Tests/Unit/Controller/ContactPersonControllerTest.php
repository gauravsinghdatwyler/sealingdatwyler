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
 * Test case for class Datwyler\OfficeExt\Controller\ContactPersonController.
 *
 */
class ContactPersonControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Datwyler\OfficeExt\Controller\ContactPersonController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Datwyler\\OfficeExt\\Controller\\ContactPersonController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllContactPersonsFromRepositoryAndAssignsThemToView()
	{

		$allContactPersons = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$contactPersonRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContactPersonRepository', array('findAll'), array(), '', FALSE);
		$contactPersonRepository->expects($this->once())->method('findAll')->will($this->returnValue($allContactPersons));
		$this->inject($this->subject, 'contactPersonRepository', $contactPersonRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('contactPersons', $allContactPersons);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenContactPersonToView()
	{
		$contactPerson = new \Datwyler\OfficeExt\Domain\Model\ContactPerson();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('contactPerson', $contactPerson);

		$this->subject->showAction($contactPerson);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenContactPersonToContactPersonRepository()
	{
		$contactPerson = new \Datwyler\OfficeExt\Domain\Model\ContactPerson();

		$contactPersonRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContactPersonRepository', array('add'), array(), '', FALSE);
		$contactPersonRepository->expects($this->once())->method('add')->with($contactPerson);
		$this->inject($this->subject, 'contactPersonRepository', $contactPersonRepository);

		$this->subject->createAction($contactPerson);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenContactPersonToView()
	{
		$contactPerson = new \Datwyler\OfficeExt\Domain\Model\ContactPerson();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('contactPerson', $contactPerson);

		$this->subject->editAction($contactPerson);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenContactPersonInContactPersonRepository()
	{
		$contactPerson = new \Datwyler\OfficeExt\Domain\Model\ContactPerson();

		$contactPersonRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContactPersonRepository', array('update'), array(), '', FALSE);
		$contactPersonRepository->expects($this->once())->method('update')->with($contactPerson);
		$this->inject($this->subject, 'contactPersonRepository', $contactPersonRepository);

		$this->subject->updateAction($contactPerson);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenContactPersonFromContactPersonRepository()
	{
		$contactPerson = new \Datwyler\OfficeExt\Domain\Model\ContactPerson();

		$contactPersonRepository = $this->getMock('Datwyler\\OfficeExt\\Domain\\Repository\\ContactPersonRepository', array('remove'), array(), '', FALSE);
		$contactPersonRepository->expects($this->once())->method('remove')->with($contactPerson);
		$this->inject($this->subject, 'contactPersonRepository', $contactPersonRepository);

		$this->subject->deleteAction($contactPerson);
	}
}

<?php
namespace TYPO3\Productfinder\Domain\Repository;

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
 * The repository for Products
 */
class ProductsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'l10n_parent' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );


    public function searchProduct($arguments) {
    	$query = $this->createQuery();
		$constraints = array();

		if ($arguments['query'] != '') {
			$constraints[] = $query->like('name', $arguments['query']);
		}

		if ($arguments['application'] != '') {
			$constraints[] = $query->contains('application', $arguments['application']);
		}

		if ($arguments['type'] != '') {
			$constraints[] = $query->equals('type', $arguments['type']);
		}

		if ($arguments['dimension'] != '') {
			$constraints[] = $query->equals('size', $arguments['dimension']);
		}

		if ($arguments['material'] != '') {
			$constraints[] = $query->equals('material', $arguments['material']);
		}
		
		if(count($constraints)>0) {
			$query->matching($query->logicalAnd($constraints));
		}
		return $query->execute();
    }
}
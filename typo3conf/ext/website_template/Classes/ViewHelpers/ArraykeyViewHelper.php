<?php
namespace TYPO3\WebsiteTemplate\ViewHelpers;
/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */
/**
 */
class ArraykeyViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * @param int $key
	 * @return mixed
	 */
	public function render($key) {

		$keyArray =  array(
								1 => 'one',
								2 => 'two',
								3 => 'three',
								4 => 'four',
							);
		return $keyArray[$key];
	}
}

?>
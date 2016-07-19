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
 *
 * Author: Ashish
 * Date:   Fri Jan 1 17:10:22 2015 +0530
 */
/**
 */
class VideoidViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * @param int $parameter
	 * @return mixed
	 */
	public function render($parameter) {

		$arr = array();
		$arr = explode("?", $parameter);
		return substr($arr[1], strpos($arr[1], "=")+1);

	}
}

?>

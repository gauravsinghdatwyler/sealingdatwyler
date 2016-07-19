<?php
namespace AG\AgSubscription\Service;
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Ajay Gohel <ajaygohel30@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */


/**
 * Description of class HtmlTags
 *
 * @author Ajay Gohel <ajaygohel30@gmail.com>
 * @package AG 
 */
class HtmlTags {
   
    public function htmlTableTagsStart()
    { 
    $html  = '<html><head><title>HTML email</title></head><body><table width="100%" style="font-size:14px;line-height:16px;"><tr><td>';                
    return $html;
    }

    public function htmlTableTagsEnd()
    { 
    $html  = '</td></tr></table></body></html>';                
    return $html;
    }

    public function setreturnVal($a){
        return $a;
    }

}
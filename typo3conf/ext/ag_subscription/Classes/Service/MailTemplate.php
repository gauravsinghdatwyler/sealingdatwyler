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


use \TYPO3\CMS\Core\Utility\GeneralUtility;
use AG\AgSubscription\Service\MailTemplate;
use AG\AgSubscription\Service\HtmlTags;
use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
/**
 * Description of class MailTemplate
 *
 * @author Ajay Gohel <ajaygohel30@gmail.com>
 * @package AG 
 */
class MailTemplate {

    public function __construct(){
        $this->localLang = 'LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:';
        
    }

    /**
     * falImages
     *
     * @param $result
     * @param $tablename
     * @param $fieldname
     * @return
     */

    public function subscribeUserLinkContent($record,$actionUrl,$info="")
    {   
        $this->localLang = 'LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:';    
        $approveUrl = $actionUrl.'?act=1&subscribeID='.base64_encode($record[0]['uid']); 
        $deleteUrl = $actionUrl.'?del=1&subscribeID='.base64_encode($record[0]['uid']);
        $editUrl = $actionUrl.'?edit=1&subscribeID='.base64_encode($record[0]['uid']);
        $html  = HtmlTags::htmlTableTagsStart();  
        if($info == 1) {
            $html .= '
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.dear').' '.$record[0]['name'].' '.$record[0]['first_name'].' <br><br>';
        }else if($info == 2){
            // For update
             $html .= '
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.dear').' '.$record[0]['name'].' '.$record[0]['first_name'].' <br><br>
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.updatedProfile.I.0').'
             <br><br>';
        }else{
            $html .= '
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.dear').' '.$record[0]['name'].' '.$record[0]['first_name'].' <br><br>
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptionContent.I.0').'
            <br><br>';
        }             
        $html .='
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptionContent.I.1').'
            <br>
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptionContent.I.2').'
            <br>
            '.$approveUrl.' <br><br>
            '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptionContent.I.3').'
            <br>
            '.$deleteUrl.' <br><br>';
            //'.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptionContent.I.4').'
            //<br>
            //'.$editUrl.' <br><br>';

        $html  .= HtmlTags::htmlTableTagsEnd();             
        return $html;
    }

    public function subscribeAdminEmail($record){
        $this->localLang = 'LLL:EXT:ag_subscription/Resources/Private/Language/locallang_ttaddress_fields.xlf:';
        $html  = HtmlTags::htmlTableTagsStart(); 
        $html .= ($record[0]['name']) ? LocalizationUtility::translate($this->localLang.'tt_address.name').' : '.$record[0]['name'] : '';
        $html .= '<br>';
        $html .= LocalizationUtility::translate($this->localLang.'tt_address.email').' : '.$record[0]['email'];
        $html .= HtmlTags::htmlTableTagsEnd(); 
        return $html;
    }   

    public function subscribeConfirmation($record){
        $this->localLang = 'LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:';
        $html  = HtmlTags::htmlTableTagsStart();
        $html .= '
        '.LocalizationUtility::translate($this->localLang.'flexforms_general.dear').' '.$record[0]['name'].' '.$record[0]['first_name'].' <br><br>
        '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.successconfiramation').' <br>
        ';
        $html  .= HtmlTags::htmlTableTagsEnd();             
        return $html;
    }
    
    public function unsubscribeConfirmation($record){
        $this->localLang = 'LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:';  
        $html  = HtmlTags::htmlTableTagsStart();      
        $html .= '
        '.LocalizationUtility::translate($this->localLang.'flexforms_general.dear').' '.$record[0]['name'].' '.$record[0]['first_name'].' <br><br>
        '.LocalizationUtility::translate($this->localLang.'flexforms_general.mail.subscriptiondelete').' 
        <br>
        ';
        $html  .= HtmlTags::htmlTableTagsEnd();
        return $html;
    }

}
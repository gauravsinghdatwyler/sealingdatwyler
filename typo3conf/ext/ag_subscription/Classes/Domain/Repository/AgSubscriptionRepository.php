<?php
namespace AG\AgSubscription\Domain\Repository;

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
 * The repository for AgSubscriptions
 */
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \AG\AgSubscription\Service\MailTemplate;
use \AG\AgSubscription\Service\HtmlTags;
class AgSubscriptionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	public function findDataForUpdate($settings,$getmethodsData){
		$uid = base64_decode($getmethodsData['subscribeID']); 
		$fields = '*';
		$table = 'tt_address';		
		$where = ' deleted = 0 and pid = '.$settings['storageFolder'].' AND uid = '.$uid;
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,$where);
		return $getRows;
	}
	
	public function agFields($fields){
		
		$fieldsArray = explode(',',$fields);
		return $fieldsArray;
	}
    
	public function insertPostData($settings,$postData,$fields,$actionUrl,$requiredFields){
		
		// For User
			$snd = $_GET['snd'];
			$edit = $_GET['edit'];
			$to = $postData['email'];
			$from = $settings['senderEmail'];
			$subject = $settings['senderSubject'];
			$mailName = $settings['senderName'];
			// For Receiver
			$r_to = $settings['receiverEmail'];
			$r_from = $settings['senderEmail'];
			$r_subject = $settings['receiverSubject'];
			$r_mailName = $settings['receiverName'];

			$fields = '*';
			$table = 'tt_address';
			if(isset($snd)){
				$wher = 'hidden = 0 AND ';
			}
			$where = $wher.' deleted = 0 and pid = '.$settings['storageFolder'].' AND email = "'.$to.'" ';
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,$where);
			$res_num_rows = count($res); 
			if($res_num_rows == 0 && !isset($snd)){
				$insert = $GLOBALS['TYPO3_DB']->exec_INSERTquery($table,$postData);
				$lastInsertId = $GLOBALS['TYPO3_DB']->sql_insert_id();								
				$getRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,'uid='.$lastInsertId);
				if($insert){
					$mailcontent = MailTemplate::subscribeUserLinkContent($getRecord,$actionUrl,$info);

					if($settings['sendToReceiver'] == 1) {
						$r_mailcontent = MailTemplate::subscribeAdminEmail($getRecord);
						$sendToReceiver = $this->sendEmails($r_to,$r_from,$r_subject,$r_mailcontent,$r_mailName); // mail to Receiver	
					}
					$sendEmails = $this->sendEmails($to,$from,$subject,$mailcontent,$mailName); // mail to User
					if($sendEmails){
						return HtmlTags::setreturnVal(1);
					}				
				}
			}else if($res_num_rows  > 0){
				if(isset($snd) && $postData['email'] != "" ){
					$info = 1;
					$lastInsertId = $res[0]['uid'];							
					$getRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,'uid='.$lastInsertId);
					$mailcontent = MailTemplate::subscribeUserLinkContent($getRecord,$actionUrl,$info);						
					$sendEmails = $this->sendEmails($to,$from,$subject,$mailcontent,$mailName); // mail to User
					if($sendEmails){
						return HtmlTags::setreturnVal(2);
					}else{
						return HtmlTags::setreturnVal(-1);		
					}	
				}else if(  !isset($snd) && ($postData['email'] == $res[0]['email']) && $res[0]['hidden'] == 1 ){
					// Already registered but not activated.
					return HtmlTags::setreturnVal(-4);
				}else if( ( (isset($edit) && ($postData['email'] == $res[0]['email']) ) ) ){
					$info = 2; 
					$lastInsertId = $res[0]['uid'];
					$update = $GLOBALS['TYPO3_DB']->exec_UPDATEquery($table,'uid='.$lastInsertId,$postData);
					$getRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,'uid='.$lastInsertId);
					if($update){
						$mailcontent = MailTemplate::subscribeUserLinkContent($getRecord,$actionUrl,$info);
						/*if($settings['sendToReceiver'] == 1) {
							$r_mailcontent = MailTemplate::subscribeAdminEmail($getRecord);
							$sendToReceiver = $this->sendEmails($r_to,$r_from,$r_subject,$r_mailcontent,$r_mailName); // mail to Receiver	
						}*/
						$sendEmails = $this->sendEmails($to,$from,$subject,$mailcontent,$mailName); // mail to User
						if($sendEmails){
							return HtmlTags::setreturnVal(-3);
						}				
					}
				}
				return HtmlTags::setreturnVal(-1);
			}else if($res_num_rows == 0 && isset($snd) && isset($to) ){
				return HtmlTags::setreturnVal(-2);
			}
		
		
		return HtmlTags::setreturnVal(0);		
	}

	public function subscriptionProcess($settings,$getmethodsData){
		$act = $getmethodsData['act'];
		$del = $getmethodsData['del'];
		

		$fields = '*';
		$table = 'tt_address';
		$uid = base64_decode($getmethodsData['subscribeID']); 
		$getRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields,$table,'uid='.$uid);
		// For User
		$to = $getRecord[0]['email'];
		$from = $settings['senderEmail'];
		$subject = $settings['senderSubject'];
		$mailName = $settings['senderName'];
		if(isset($act)){
			$updateArray = array(
				'hidden'	=> 0,
			);
			$update = $GLOBALS['TYPO3_DB']->exec_UPDATEquery($table,'uid='.$uid,$updateArray);
			if($update){
				$mailcontent = MailTemplate::subscribeConfirmation($getRecord);
				$sendEmails = $this->sendEmails($getRecord[0]['email'],$from,$subject,$mailcontent,$mailName); // mail to User
				if($sendEmails){
					return 1;
				}				
			}
		}
		else if(isset($del)){
			$delete = $GLOBALS['TYPO3_DB']->exec_DELETEquery($table,'uid='.$uid);
			if($delete){
				$mailcontent = MailTemplate::unsubscribeConfirmation($getRecord);
				$sendEmails = $this->sendEmails($to,$from,$subject,$mailcontent,$mailName); // mail to User
				if($sendEmails){
					return -1;
				}				
			}
		}
		
	}

	function sendEmails($recipient,$sender_email,$subject,$mailcontent,$mailName){
		$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		$mail->setFrom($sender_email);							
		$mail->setFrom(array($sender_email => $mailName));				
		$mail->setTo($recipient);
		$mail->setSubject($subject);
		$mail->setBody($mailcontent, 'text/html');
		return $mail->send();
	}
}
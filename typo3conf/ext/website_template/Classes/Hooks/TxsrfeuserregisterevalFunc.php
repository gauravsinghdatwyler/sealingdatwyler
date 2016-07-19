<?php
namespace TYPO3\WebsiteTemplate\Hooks;

use SJBR\SrFeuserRegister\Utility\LocalizationUtility;
/**
 * Hook handler for eval_func for extension Front End User Registration (sr_feuser_register)
 *
 * @author Robert Gonda
 */
class TxsrfeuserregisterevalFunc {


	function evalValues( $theTable, $dataArray, $origArray, $markContentArray, $cmdKey, $requiredArray, $theField, $cmdParts, $invokingObj ) {
 			$filter = '/^([\w\.-]+@((?!gmail|yahoo|hotmail|outlook|asdfasdfmail|dfoofmail|asdooeemail|asooemail|rtotlmail|qwkcmail|mail|yandex|anaptanium|tom).)[\w\.-]+\.\w{2,4})?$/';
 			$data = preg_match($filter, $dataArray['email']);
 			$plugin = &$invokingObj;
			if($data == '0') {
				$theField = 'email';
				$theCmd = 'user_email_check'; 
				$plugin->inError[$theField] = TRUE;
				$plugin->failureMsg[$theField][] = $this->getFailureText( $theField, $theCmd , 'evalErrors_preg_email' );
				return $theField;
			}

	}

		/**
	 * Gets the error message to be displayed
	 *
	 * @param string $theField: the name of the field being validated
	 * @param string $theRule: the name of the validation rule being evaluated
	 * @param string $label: a default error message provided by the invoking function
	 * @param integer $orderNo: ordered number of the rule for the field (>0 if used)
	 * @param string $param: parameter for the error message
	 * @return string the error message to be displayed
	 */
	public function getFailureText($theField, $theRule, $label, $orderNo = 0, $param = '')
	{
		$failureLabel = '';
 		if ($orderNo && $theRule && isset($this->conf['evalErrors.'][$theField . '.'][$theRule . '.'])) {
			$count = 0;
			foreach ($this->conf['evalErrors.'][$theField . '.'][$theRule . '.'] as $k => $v) {
				if (MathUtility::canBeInterpretedAsInteger($k)) {
					$count++;
					if ($count === $orderNo) {
						$failureLabel = $v;
						break;
					}
				}
			}
		}
		if (!$failureLabel) {
			if ($theRule && isset($this->conf['evalErrors.'][$theField . '.'][$theRule])) {
				$failureLabel = $this->conf['evalErrors.'][$theField . '.'][$theRule];
			} else {
				if ($theRule) {
					$failureLabel = LocalizationUtility::translate('evalErrors_' . $theRule . '_' . $theField, $this->extensionName);
					$failureLabel = $failureLabel ?: LocalizationUtility::translate('evalErrors_' . $theRule, $this->extensionName);
				}
				if (!$failureLabel) {
					$failureLabel = LocalizationUtility::translate($label, $this->extensionName);
				}
			}
		}
		if ($param) {
			$failureLabel = sprintf($failureLabel, $param);
		}
		return $failureLabel;
	}


}
  
if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS']['TYPO3_MODE']['XCLASS']['ext/website_template/hooks/TxsrfeuserregisterevalFunc.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS']['TYPO3_MODE']['XCLASS']['ext/website_template/hooks/TxsrfeuserregisterevalFunc.php']);
}
/*
if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/website_template/Classes/Hooks/TxsrfeuserregisterevalFunc.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/website_template/Classes/Hooks/TxsrfeuserregisterevalFunc.php']);
}*/

?>
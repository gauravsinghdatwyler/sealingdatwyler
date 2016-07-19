<?php
/**
 * Created by Ajay Gohel.
 * User: Ajay
 */
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 */
class AgSubscriptionWizicon {

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems : The wizard items
     * @return Modified array with wizard items
     */
    function proc( $wizardItems ) {

        $wizardItems['plugins_tx_agsubscription_agdmail'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ag_subscription') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:plugin-title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:ag_subscription/Resources/Private/Language/locallang.xlf:plugin-description'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=plugins_tx_agsubscription_agdmail'
        );

        return $wizardItems;
    }
}
?>
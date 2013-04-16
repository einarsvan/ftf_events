<?php

// Why? require_once(t3lib_extMgm::extPath('realurl').'class.tx_realurl.php');
$GLOBALS['TSFE'] = t3lib_div::makeInstance('tslib_fe', $GLOBALS['TYPO3_CONF_VARS'], 0, 0);
tslib_eidtools::connectDB();
tslib_eidtools::initLanguage();
$GLOBALS['TSFE']->initFEuser();
$GLOBALS['TSFE']->set_no_cache();
$GLOBALS['TSFE']->checkAlternativeIdMethods();
$GLOBALS['TSFE']->determineId();
$GLOBALS['TSFE']->initTemplate();
$GLOBALS['TSFE']->getConfigArray();
$GLOBALS['TSFE']->includeTCA();
// Why? $GLOBALS['TSFE']->config['config']['tx_realurl_enable'] = 1;
$GLOBALS['TSFE']->cObj = t3lib_div::makeInstance('tslib_cObj');
$GLOBALS['TSFE']->settingLanguage();

TSpagegen::pagegenInit();

$configuration = array(
	'extensionName' => 'FtfEvents',
	'pluginName' => \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('pluginName'),
	'vendorName' => 'FTF',
	'switchableControllerActions' => array(
		'Event' => array('calendar')
	),
	'persistence' => array(
		'storagePid' => 5 // HOW do I make this dynamic. Why is this here???
	)
);

$bootstrap = t3lib_div::makeInstance('Tx_Extbase_Core_Bootstrap');
$bootstrap->cObj = $GLOBALS['TSFE']->cObj;

echo $bootstrap->run('', $configuration);

$GLOBALS['TSFE']->fe_user->storeSessionData();

?>
<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Event',
	'Events'
);

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_event';

$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_main.xml');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Events');

t3lib_extMgm::addLLrefForTCAdescr('tx_ftfevents_domain_model_event', 'EXT:ftf_events/Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_event.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ftfevents_domain_model_event');
$TCA['tx_ftfevents_domain_model_event'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xml:tx_ftfevents_domain_model_event',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,teaser,description,location,event_start,event_stop,recurring_days,recurring_weeks,recurring_stop,calendar,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Event.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ftfevents_domain_model_event.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ftfevents_domain_model_calendar', 'EXT:ftf_events/Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_calendar.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ftfevents_domain_model_calendar');
$TCA['tx_ftfevents_domain_model_calendar'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xml:tx_ftfevents_domain_model_calendar',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Calendar.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ftfevents_domain_model_calendar.gif'
	),
);

?>
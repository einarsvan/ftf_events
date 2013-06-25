<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Event',
	array(
    'Event' => 'list, calendar, show',
  ),
	// non-cacheable actions
	array(
    'Event' => 'list, calendar, show',
  )
);

// Ajax, eID
$TYPO3_CONF_VARS['FE']['eID_include']['FtfEvents'] = 'EXT:' . $_EXTKEY . '/Classes/Ajax/Dispatcher.php';

?>
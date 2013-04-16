<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'FTF.' . $_EXTKEY,
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
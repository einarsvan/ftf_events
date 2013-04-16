<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ftfevents_domain_model_event'] = array(
	'ctrl' => $TCA['tx_ftfevents_domain_model_event']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, teaser, description, location, event_start, event_stop, recurring_days, recurring_weeks, recurring_stop, calendar',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, teaser, description, location, event_start, event_stop, recurring_days, recurring_weeks, recurring_stop, calendar,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ftfevents_domain_model_event',
				'foreign_table_where' => 'AND tx_ftfevents_domain_model_event.pid=###CURRENT_PID### AND tx_ftfevents_domain_model_event.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'teaser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.teaser',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'location' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'event_start' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.event_start',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'event_stop' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.event_stop',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time() + 3600
			),
		),
		'recurring_days' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days',
			'config' => array(
				'type' => 'check',
        'items' => array(
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.0', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.1', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.2', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.3', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.4', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.5', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_days.6', '')
        )
			),
		),
		'recurring_weeks' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks',
			'config' => array(
				'type' => 'check',
        'items' => array(
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks.0', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks.1', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks.2', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks.3', ''),
          array('LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_weeks.4', '')
        )			
      ),
		),
		'recurring_stop' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.recurring_stop',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1
			),
		),
		'calendar' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ftf_events/Resources/Private/Language/locallang_db.xlf:tx_ftfevents_domain_model_event.calendar',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ftfevents_domain_model_calendar',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
);

?>
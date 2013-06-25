<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ftf_events".
 *
 * Auto generated 16-04-2013 15:32
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Events',
	'description' => 'FTF Events, basically a fork of gb_events',
	'category' => 'plugin',
	'author' => 'Einar Gislason',
	'author_email' => 'einarsvan@gmail.com',
	'author_company' => 'FTF',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'xliff' => '1.0.1-',
		),
	),
	'_md5_values_when_last_written' => 'a:58:{s:12:"ext_icon.gif";s:4:"d8a3";s:17:"ext_localconf.php";s:4:"2c91";s:14:"ext_tables.php";s:4:"c45a";s:14:"ext_tables.sql";s:4:"753e";s:9:"README.md";s:4:"1c57";s:10:"Readme.rst";s:4:"f13b";s:27:"Classes/Ajax/Dispatcher.php";s:4:"e504";s:41:"Classes/Controller/CalendarController.php";s:4:"da2c";s:38:"Classes/Controller/EventController.php";s:4:"daab";s:33:"Classes/Domain/Model/Calendar.php";s:4:"8bd6";s:30:"Classes/Domain/Model/Event.php";s:4:"cd34";s:48:"Classes/Domain/Repository/CalendarRepository.php";s:4:"3cc3";s:45:"Classes/Domain/Repository/EventRepository.php";s:4:"2c07";s:41:"Configuration/FlexForms/flexform_main.xml";s:4:"77ee";s:30:"Configuration/TCA/Calendar.php";s:4:"2b64";s:27:"Configuration/TCA/Event.php";s:4:"1747";s:38:"Configuration/TypoScript/constants.txt";s:4:"6638";s:34:"Configuration/TypoScript/setup.txt";s:4:"b878";s:37:"Documentation/_IncludedDirectives.rst";s:4:"53e5";s:37:"Documentation/AdministratorManual.rst";s:4:"2562";s:33:"Documentation/DeveloperCorner.rst";s:4:"e805";s:23:"Documentation/Index.rst";s:4:"6cb5";s:36:"Documentation/ProjectInformation.rst";s:4:"152a";s:38:"Documentation/RestructuredtextHelp.rst";s:4:"c86e";s:37:"Documentation/TyposcriptReference.rst";s:4:"5829";s:28:"Documentation/UserManual.rst";s:4:"3308";s:44:"Documentation/Images/IntroductionPackage.png";s:4:"cdeb";s:30:"Documentation/Images/Typo3.png";s:4:"4fac";s:61:"Documentation/Images/AdministratorManual/ExtensionManager.png";s:4:"14fc";s:47:"Documentation/Images/UserManual/BackendView.png";s:4:"ba6c";s:32:"Documentation/_De/UserManual.rst";s:4:"82b7";s:51:"Documentation/_De/Images/UserManual/BackendView.png";s:4:"ba6c";s:32:"Documentation/_Fr/UserManual.rst";s:4:"56b8";s:51:"Documentation/_Fr/Images/UserManual/BackendView.png";s:4:"ba6c";s:40:"Resources/Private/Language/locallang.xlf";s:4:"b79a";s:40:"Resources/Private/Language/locallang.xml";s:4:"bb29";s:79:"Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_calendar.xlf";s:4:"d024";s:79:"Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_calendar.xml";s:4:"38f1";s:76:"Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_event.xlf";s:4:"23bf";s:76:"Resources/Private/Language/locallang_csh_tx_ftfevents_domain_model_event.xml";s:4:"0e71";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"87d5";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"9ec5";s:38:"Resources/Private/Layouts/Default.html";s:4:"a214";s:46:"Resources/Private/Partials/Event/Calendar.html";s:4:"6766";s:48:"Resources/Private/Partials/Event/Properties.html";s:4:"4118";s:47:"Resources/Private/Templates/Event/Calendar.html";s:4:"576a";s:43:"Resources/Private/Templates/Event/List.html";s:4:"3c74";s:43:"Resources/Private/Templates/Event/Show.html";s:4:"2eac";s:34:"Resources/Public/Css/ftfEvents.css";s:4:"8bb7";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:61:"Resources/Public/Icons/tx_ftfevents_domain_model_calendar.gif";s:4:"1103";s:58:"Resources/Public/Icons/tx_ftfevents_domain_model_event.gif";s:4:"905a";s:45:"Resources/Public/Images/ftf_events_arrows.png";s:4:"eb54";s:40:"Resources/Public/JavaScript/ftfEvents.js";s:4:"772c";s:45:"Tests/Unit/Controller/EventControllerTest.php";s:4:"4814";s:40:"Tests/Unit/Domain/Model/CalendarTest.php";s:4:"2cb7";s:37:"Tests/Unit/Domain/Model/EventTest.php";s:4:"b34b";s:14:"doc/manual.sxw";s:4:"8d2d";}',
);

?>
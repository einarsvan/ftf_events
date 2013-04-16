<?php
namespace FTF\FtfEvents\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Einar Gislason <einarsvan@gmail.com>, FTF
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
 *
 *
 * @package ftf_events
 * @scope prototype
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CalendarController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * calendarRepository
	 *
	 * @var \FTF\FtfEvents\Domain\Repository\CalendarRepository
	 * @inject
	 */
	protected $calendarRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$calendars = $this->calendarRepository->findAll();
		$this->view->assign('calendars', $calendars);
	}
	
	/**
	 * action show
	 *
	 * @param \FTF\FtfEvents\Domain\Model\Calendar $calendar
	 * @return void
	 */
	public function showAction(\FTF\FtfEvents\Domain\Model\Calendar $calendar) {
		$this->view->assign('calendar', $calendar);
	}
	
}
?>
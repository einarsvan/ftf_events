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
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * eventRepository
	 *
	 * @var \FTF\FtfEvents\Domain\Repository\EventRepository
	 * @inject
	 */
	protected $eventRepository;
	
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
		$events = $this->eventRepository->findAll($this->settings);
		$this->view->assign('events', $events);
	}
	
	/**
	 * action show
	 *
	 * @param \FTF\FtfEvents\Domain\Model\Event $event
	 * @return void
	 */
	public function showAction(\FTF\FtfEvents\Domain\Model\Event $event) {
		$this->view->assign('event', $event);
	}
	
	/**
   * Displays all Events as a browseable calendar
   *
   * @param string $start
   * @param int $calendar
   * @param int $ajax
   * @param string $active
   * @return void
   */
  public function calendarAction($start = 'today', $calendar = 0, $ajax = 0, $active = 'today') {
  
  
    // Set start date
    // See http://www.php.net/manual/en/datetime.formats.relative.php
    $startDate = new \DateTime('today');
    try {
      $startDate->modify($start);
    } catch(Exception $e) {
      $startDate->modify('midnight');
    }

    // The first date of the calendar display.
    $preDate = clone($startDate);
    if($startDate->format("N") !== 1) {
      $preDate->modify('last monday of previous month');
    }
    
    // The end date for this calendar display
    $stopDate = clone($startDate);
    $stopDate->modify('last day of this month');
    $stopDate->modify('+86399 seconds'); // Plus all but one second in a day. A day has 86.400 sec.

    $postDate = clone($stopDate);
    if($stopDate->format("N") !== 7) { // "N" stands for ISO-8601 numeric representation of the day of the week (1 = Monday ... 7 = Sunday)
      $postDate->modify('next sunday');
    }
    
    // Navigational dates
    $nextMonth = clone($startDate);
    $nextMonth->modify('first day of next month');
    $previousMonth = clone($startDate);
    $previousMonth->modify('first day of previous month');
    
    $days = array();
    $runDate = clone($preDate);
    while($runDate <= $postDate) {
      $days[$runDate->format("Y-m-d")] = array('date' => clone($runDate), 'events' => array(), 'disabled' => (($runDate < $startDate) || ($runDate > $stopDate)));
      $runDate->modify('tomorrow');
    }
    
    // Set active date (TODO: overwrite this from params...)
    $actDate = new \DateTime($active);
    $days[$actDate->format("Y-m-d")]['active'] = 1;
    
    
    // Set calendar(s)
    $calendar = $calendar == 0 ? intval($this->settings['calendar']) : $calendar;

    $events = $this->eventRepository->findAllBetween($preDate, $postDate, $calendar);
    
    foreach($events as $event) {
      foreach($event->getEventDates($preDate, $postDate) as $eventDate) {
        $days[$eventDate->format('Y-m-d')]['events'][$event->getUid()] = $event;
      }
    }

    $weeks = array();
    for($i = 0; $i < floor(count($days)/7); $i++) {
      $weeks[] = array_slice($days, $i*7, 7, TRUE);
    }
    
    // Find all calendars
    $calendars = $this->calendarRepository->findAll();

    $this->view->assignMultiple(array(
      'calendar' => $weeks,
      'nextMonth' => $nextMonth->format('Y-m-d'),
      'prevMonth' => $previousMonth->format('Y-m-d'),
      'calendars' => $calendars,
      'selectedCalendar' => $calendar,
      'selectedMonth' => $start,
      'selectedDate' => $active,
      'ajax' => $ajax
    ));
  }

}
?>
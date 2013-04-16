<?php
namespace FTF\FtfEvents\Domain\Model;

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
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The title of the event
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * A short teaser text
	 *
	 * @var \string
	 */
	protected $teaser;

	/**
	 * A detailed description of the event
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * The location of the event
	 *
	 * @var \string
	 */
	protected $location;

	/**
	 * The starting date of the event
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $eventStart;

	/**
	 * The ending time of the event
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $eventStop;

	/**
	 * The days of the week the event should occur at
	 *
	 * @var \integer
	 */
	protected $recurringDays;

	/**
	 * The weeks of the month the event should occur at
	 *
	 * @var \integer
	 */
	protected $recurringWeeks;

	/**
	 * When to stop the recurring event
	 *
	 * @var \DateTime
	 */
	protected $recurringStop;

	/**
	 * The calendar of this event
	 *
	 * @var \FTF\FtfEvents\Domain\Model\Calendar
	 */
	protected $calendar;

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the teaser
	 *
	 * @return \string $teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets the teaser
	 *
	 * @param \string $teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the location
	 *
	 * @return \string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param \string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the eventStart
	 *
	 * @return \DateTime $eventStart
	 */
	public function getEventStart() {
		return $this->eventStart;
//		return $this->eventStart->modify('midnight');
	}

	/**
	 * Sets the eventStart
	 *
	 * @param \DateTime $eventStart
	 * @return void
	 */
	public function setEventStart($eventStart) {
		$this->eventStart = $eventStart;
	}

	/**
	 * Returns the eventStop
	 *
	 * @return \DateTime $eventStop
	 */
	public function getEventStop() {
	return $this->eventStop;
//		return ($this->eventStop == '') ? $this->eventStart : $this->eventStop;
	}

	/**
	 * Sets the eventStop
	 *
	 * @param \DateTime $eventStop
	 * @return void
	 */
	public function setEventStop($eventStop) {
		$this->eventStop = $eventStop;
	}
		
	/**
	 * Returns the recurringDays
	 *
	 * @return \integer $recurringDays
	 */
	public function getRecurringDays() {
		return $this->recurringDays;
	}

	/**
	 * Sets the recurringDays
	 *
	 * @param \integer $recurringDays
	 * @return void
	 */
	public function setRecurringDays($recurringDays) {
		$this->recurringDays = $recurringDays;
	}

	/**
	 * Returns the recurringWeeks
	 *
	 * @return \integer $recurringWeeks
	 */
	public function getRecurringWeeks() {
		return $this->recurringWeeks;
	}

	/**
	 * Sets the recurringWeeks
	 *
	 * @param \integer $recurringWeeks
	 * @return void
	 */
	public function setRecurringWeeks($recurringWeeks) {
		$this->recurringWeeks = $recurringWeeks;
	}

	/**
	 * Returns the recurringStop
	 *
	 * @return \DateTime $recurringStop
	 */
	public function getRecurringStop() {
		return $this->recurringStop;
	}

	/**
	 * Sets the recurringStop
	 *
	 * @param \DateTime $recurringStop
	 * @return void
	 */
	public function setRecurringStop($recurringStop) {
		$this->recurringStop = $recurringStop;
	}

	/**
	 * __construct
	 *
	 * @return Event
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		// empty
	}
	
	
	/**
   * This returns the initial event dates including
   * all recurring events up to and including the
   * stopDate, taking the defined end of recurrance
   * into account
   *
   * @param DateTime $startDate
   * @param DateTime $stopDate
   */
  public function getEventDates(\DateTime $startDate, \DateTime $stopDate) {
  
    $oneDay = new \DateInterval('P1D');
    $oneMonth = new \DateInterval('P1M');

    $startMonth = clone($startDate);
    $startMonth->modify('first day of this month');
    $stopMonth = clone($stopDate);
    $stopMonth->modify('last day of this month');
    $recurringMonths = array();
    while($startMonth < $stopMonth) {
      $recurringMonths[] = clone($startMonth);
      $startMonth->add($oneMonth);
    }

    $recurringWeeks = $this->getRecurringWeeksAsText();
    $recurringDays = $this->getRecurringDaysAsText();
    $eventDates = array();
    foreach($recurringMonths as $workDate) {
      # Weeks have been selected, check every nth week / day combination
      if(count($recurringWeeks) !== 0) {
        foreach($this->getRecurringWeeksAsText() as $week) {
          foreach($this->getRecurringDaysAsText() as $day) {
            $workDate->modify(sprintf("%s %s of this month", $week, $day));
            if($workDate >= $this->getEventStart() && (is_null($this->getRecurringStop()) || $workDate <= $this->getRecurringStop()) && $workDate >= $startDate && $workDate <= $stopDate) {
              $eventDates[$workDate->format('Y-m-d')] = clone($workDate);
              $re_StartDate = clone($workDate);
              $difference = $this->getEventStart()->diff($re_StartDate);
              $re_StopDate = clone($this->getEventStop());
              $re_StopDate->add($difference);
              while($re_StartDate <= $re_StopDate) {
                $eventDates[$re_StartDate->format('Y-m-d')] = clone($re_StartDate);
                $re_StartDate->modify('+1 day');
              }
            }
          }
        }
      } else {
        # Check the weekdays only, ignoring the weeks of the month
        $stopDay = clone($workDate);
        $stopDay->modify('last day of this month');
        while($workDate <= $stopDay) {
          $addCurrentDay = FALSE;
          switch($workDate->format('w')) {
          case 0:
            $addCurrentDay = in_array('Sunday', $recurringDays);
            break;
          case 1:
            $addCurrentDay = in_array('Monday', $recurringDays);
            break;
          case 2:
            $addCurrentDay = in_array('Tuesday', $recurringDays);
            break;
          case 3:
            $addCurrentDay = in_array('Wednesday', $recurringDays);
            break;
          case 4:
            $addCurrentDay = in_array('Thursday', $recurringDays);
            break;
          case 5:
            $addCurrentDay = in_array('Friday', $recurringDays);
            break;
          case 6:
            $addCurrentDay = in_array('Saturday', $recurringDays);
            break;
          }
          if($addCurrentDay) {
            if($workDate >= $this->getEventStart() && (is_null($this->getRecurringStop()) || $workDate <= $this->getRecurringStop()) && $workDate >= $startDate && $workDate <= $stopDate) {
              $eventDates[$workDate->format('Y-m-d')] = clone($workDate);
              $re_StartDate = clone($workDate);
              $difference = $this->getEventStart()->diff($re_StartDate);
              $re_StopDate = clone($this->getEventStop());
              $re_StopDate->add($difference);
              while($re_StartDate <= $re_StopDate) {
                $eventDates[$re_StartDate->format('Y-m-d')] = clone($re_StartDate);
                $re_StartDate->modify('+1 day');
              }
            }
          }
          $workDate->add($oneDay);
        }
      }
    }
    $myStartDate = clone($this->getEventStart());
    $myStopDate = $this->getEventStop();
    while($myStartDate <= $myStopDate) {
      $eventDates[$myStartDate->format('Y-m-d')] = clone($myStartDate);
      $myStartDate->modify('+1 day');
    }


    $eventDates[$this->getEventStart()->format('Y-m-d')] = $this->getEventStart();
    ksort($eventDates);
    return $eventDates;
  }
  
  /**
   * getRecurringDaysAsText function.
   * 
   * @access protected
   * @return array
   */
  protected function getRecurringDaysAsText() {
    $days = array();
    if($this->getRecurringDays() === 0 && $this->getRecurringWeeks() !== 0) {
      switch($this->getEventStart()->format('w')) {
      case 0:
      case 7:
        $days[] = 'Sunday';
        break;
      case 1:
        $days[] = 'Monday';
        break;
      case 2:
        $days[] = 'Tuesday';
        break;
      case 3:
        $days[] = 'Wednesday';
        break;
      case 4:
        $days[] = 'Thursday';
        break;
      case 5:
        $days[] = 'Friday';
        break;
      case 6:
        $days[] = 'Saturday';
        break;
      }
    } else {
      if($this->getRecurringDays() & 1) {
        $days[] = 'Monday';
      }
      if($this->getRecurringDays() & 2) {
        $days[] = 'Tuesday';
      }
      if($this->getRecurringDays() & 4) {
        $days[] = 'Wednesday';
      }
      if($this->getRecurringDays() & 8) {
        $days[] = 'Thursday';
      }
      if($this->getRecurringDays() & 16) {
        $days[] = 'Friday';
      }
      if($this->getRecurringDays() & 32) {
        $days[] = 'Saturday';
      }
      if($this->getRecurringDays() & 64) {
        $days[] = 'Sunday';
      }
    }
    return $days;
  }
  
  /**
   * getRecurringWeeksAsText function.
   * 
   * @access protected
   * @return array
   */
  protected function getRecurringWeeksAsText() {
    $weeks = array();
    if($this->getRecurringWeeks() & 1) {
      $weeks[] = 'first';
    }
    if($this->getRecurringWeeks() & 2) {
      $weeks[] = 'second';
    }
    if($this->getRecurringWeeks() & 4) {
      $weeks[] = 'third';
    }
    if($this->getRecurringWeeks() & 8) {
      $weeks[] = 'fourth';
    }
    if($this->getRecurringWeeks() & 16) {
      $weeks[] = 'fifth';
    }
    if($this->getRecurringWeeks() & 32) {
      $weeks[] = 'last';
    }
    return $weeks;
  }

	
	/**
   * Tries an intelligent guess as to the start time of an event
   *
   * @return DateInterval
   */
  protected function getEventTimeAsDateInterval() {
    $hours = $minutes = 0;
    $matches = array();
    if(preg_match('#(\d{1,2}):?(\d{2})#', $this->getEventTime(), $matches)) {
      $hours = $matches[1];
      $minutes = $matches[2];
    }
    return new \DateInterval(sprintf("PT%dH%dM0S", $hours, $minutes));
  }
	
	/**
	 * Returns the calendar
	 *
	 * @return \FTF\FtfEvents\Domain\Model\Calendar $calendar
	 */
	public function getCalendar() {
		return $this->calendar;
	}

	/**
	 * Sets the calendar
	 *
	 * @param \FTF\FtfEvents\Domain\Model\Calendar $calendar
	 * @return void
	 */
	public function setCalendar(\FTF\FtfEvents\Domain\Model\Calendar $calendar) {
		$this->calendar = $calendar;
	}

}
?>
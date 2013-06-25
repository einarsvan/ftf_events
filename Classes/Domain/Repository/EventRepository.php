<?php

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
class Tx_FtfEvents_Domain_Repository_EventRepository extends Tx_Extbase_Persistence_Repository {
	
  /**
   * findAll function.
   * 
   * @access public
   * @return void
   */
  public function findAll($calendar = 0) {
  	 
    $query = $this->createQuery();
//    $query->setOrderings(array('event_start' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    $query->matching(
    	$query->greaterThanOrEqual('event_start', new DateTime('midnight'))
    );
    return $query->execute();
  }
  
  /**
	 * findAllBetween function.
	 * 
	 * @access public
	 * @param DateTime $startDate
	 * @param DateTime $stopDate
	 * @param int $calendar
	 * @return void
	 */
	public function findAllBetween(DateTime $startDate, DateTime $stopDate, $calendar = 0) {
		
		// Stupid way of ensuring all calendars are shown
		if($calendar == 0){
			$queryparam = 'greaterThanOrEqual';
		} else {
			$queryparam = 'in';
			$calendar = explode(',', $calendar);
		}
		
    $query = $this->createQuery();
    $query->setOrderings(array('event_start' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    $query->getQuerySettings()->setRespectStoragePage(FALSE);
    $query->matching(
    	
    	$query->logicalAnd(
    		$query->$queryparam('calendar', $calendar),
    		$query->logicalOr(
	        # Individual event in this time window
	        $query->logicalAnd(
	          $query->greaterThanOrEqual('event_start', $startDate),
	          $query->lessThanOrEqual('event_start', $stopDate)
	        ),
	        # Recurring events
	        $query->logicalAnd(
	          # Starts before the end of this period
	          $query->lessThanOrEqual('event_start', $stopDate),
	          # At least one repetition criterion set
	          $query->logicalOr(
	            $query->greaterThan('recurringDays', 0),
	            $query->greaterThan('recurringWeeks', 0)
	          ),
	          # No end date or end date in/after this start date
	          $query->logicalOr(
	            $query->equals('recurringStop', 0),
	            $query->greaterThanOrEqual('recurringStop', $startDate)
	          )
	        )
	      )
    	)
    	
    );
    return $query->execute();
  }

}
?>
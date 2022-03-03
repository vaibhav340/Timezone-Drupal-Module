<?php

/**
* @file providing the service to get Date Time in spefific 
*  format for given time zone.
*
*/

namespace  Drupal\datetime_block;

use Drupal\Core\Datetime\DateFormatter;

class GetDate {

	public $dateFormatter;
	/**
	* Constructs a new DateFormatter object.
	* @param \Drupal\Core\Datetime\DateFormatter $dateFormatter
	*/

	public function __construct(DateFormatter $dateFormatter) {
		$this->dateFormatter = $dateFormatter;
	}
	
	/**
	* Function to get Date with specific format
	* @param $timezone
	*   Timezone for date.
	*/
	public function  getDate($timezone = ''){
		if (!empty($timezone)) {
			return $this->dateFormatter->format(time(), 'custom', 'jS F  Y - g:i a', $timezone);
		}
		else {
			return date('jS F  Y - g:i a');
		}
 }	

}
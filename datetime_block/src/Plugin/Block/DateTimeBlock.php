<?php

namespace Drupal\datetime_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a 'Date' Block.
 *
 * @Block(
 *   id = "datetime_block",
 *   admin_label = @Translation("Date Time"),
 *   category = @Translation("Date Time"),
 * )
 */
class DateTimeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	
 	$country = \Drupal::config('datetime_block.settings')->get('country_name');
	$city = \Drupal::config('datetime_block.settings')->get('city_name');
	$timezone = \Drupal::config('datetime_block.settings')->get('timezone');
	// Date Time Service Used to get date time based on timezone
	$datetime =\Drupal::service('datetime_block.get_datetime')->getDate($timezone);
	
	return [
      	  '#theme' => 'datetime_block',
          '#data' => ['Country' => $country, 'City' => $city, 'Date and Time' => $datetime],
          '#cache' => [
            'max-age' => 0,
          ],	
        ];
  }

}

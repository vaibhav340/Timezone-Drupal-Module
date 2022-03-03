<?php

namespace Drupal\datetime_block\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures date time settings.
 */
class TimeZoneConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'datetime_block_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'datetime_block.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('datetime_block.settings');
    $form['country_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country'),
      '#default_value' => $config->get('country_name'),
    ];
    $form['city_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $config->get('city_name'),
    ];
    $form['timezone'] = [
      '#type' => 'select',
      '#title' => $this->t('Timezone'),
      '#options' => [
	'America/Chicago' => 'America/Chicago',
	'America/New_York' => 'America/New_York',
	'Asia/Tokyo' => 'Asia/Tokyo',
	'Asia/Dubai' => 'Asia/Dubai',
	'Asia/Kolkata' => 'Asia/Kolkata',
	'Europe/Amsterdam' => 'Europe/Amsterdam',
	'Europe/Oslo' => 'Europe/Oslo',
	'Europe/London' => 'Europe/London',
	],
      '#default_value' => $config->get('timezone'),
    ];
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('datetime_block.settings')
       ->set('country_name', $form_state->getValue('country_name'))
       ->set('city_name', $form_state->getValue('city_name'))
       ->set('timezone', $form_state->getValue('timezone'))
       ->save();
    parent::submitForm($form, $form_state);
  }

}

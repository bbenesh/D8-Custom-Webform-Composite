<?php

namespace Drupal\zombree_webform\Element;

use Drupal\Component\Utility\Html;
use Drupal\webform\Element\WebformCompositeBase;

/**
 * Provides a 'colleges_attended' composite element.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (ie checkboxes)
 * or composites (ie webform_address)
 *
 * @FormElement("colleges_attended")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\zombree_webform\Element\CollegesAttended
 */
class CollegesAttended extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return parent::getInfo() + ['#theme' => 'zombree_webform_colleges_attended_composite'];
  }

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    // Generate an unique ID that can be used by #states.
    $html_id = Html::getUniqueId('colleges_attended');

    $elements = [];
    $elements['college_name'] = [
      '#type' => 'textfield',
      '#title' => t('College name'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--college_name'],
      '#states' => [
        'required' => [
          ':input[name="issue"]' => ['value' => 'Scholarship Application'],
        ],
      ],
    ];
    $elements['start_date'] = [
      '#type' => 'date',
      '#title' => t('Start Date'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--start_date'],
      '#states' => [
        'required' => [
          ':input[name="issue"]' => ['value' => 'Scholarship Application'],
        ],
      ],
    ];
    $elements['end_date'] = [
      '#type' => 'date',
      '#title' => t('End Date'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--end_date'],
      '#states' => [
        'required' => [
          ':input[name="issue"]' => ['value' => 'Scholarship Application'],
        ],
      ],
    ];
    $elements['degrees_earned'] = [
      '#type' => 'textfield',
      '#title' => t('Degrees earned (if any)'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--degrees_earned'],
    ];
    return $elements;
  }

}

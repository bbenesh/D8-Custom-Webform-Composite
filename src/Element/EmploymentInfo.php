<?php

namespace Drupal\zombree_webform\Element;

use Drupal\Component\Utility\Html;
use Drupal\webform\Element\WebformCompositeBase;

/**
 * Provides an 'employment_info' composite element.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (ie checkboxes)
 * or composites (ie webform_address)
 *
 * @FormElement("employment_info")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\zombree_webform\Element\EmploymentInfo
 */
class EmploymentInfo extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return parent::getInfo() + ['#theme' => 'zombree_webform_employment_info_composite'];
  }

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    // Generate an unique ID that can be used by #states.
    $html_id = Html::getUniqueId('employment_info');

    $elements = [];
    $elements['employment_date'] = [
      '#type' => 'textfield',
      '#title' => t('Employment date'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--employment_date'],
    ];
    $elements['employer_name'] = [
      '#type' => 'textfield',
      '#title' => t('Employer name'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--employer_name'],
    ];
    $elements['employer_city_state'] = [
      '#type' => 'textfield',
      '#title' => t('City, State'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--employer_city_state'],
    ];
    $elements['employer_physci_or_engineer'] = [
      '#type' => 'checkbox',
      '#title' => t('Physical Sciences or Engineering?'),
      '#attributes' => ['data-webform-composite-id' => $html_id . '--employer_physci_or_engineer'],
    ];
    return $elements;
  }

}

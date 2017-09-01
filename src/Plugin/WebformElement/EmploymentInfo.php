<?php

namespace Drupal\zombree_webform\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides an 'employment_info' element.
 *
 * @WebformElement(
 *   id = "employment_info",
 *   label = @Translation("Employment Info"),
 *   description = @Translation("Provides a custom employment info composite element."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see \Drupal\zombree_webform\Element\EmploymentInfo
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositeBase
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class EmploymentInfo extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  protected function formatHtmlItemValue(array $element, WebformSubmissionInterface $webform_submission, array $options = []) {
    return $this->formatTextItemValue($element, $webform_submission, $options);
  }

  /**
   * {@inheritdoc}
   */
  protected function formatTextItemValue(array $element, WebformSubmissionInterface $webform_submission, array $options = []) {
    $value = $this->getValue($element, $webform_submission, $options);
    $lines = [];
    $lines[] = ($value['employer_name'] ? $value['employer_name'] : '') .
      ($value['employer_city_state'] ? ' - ' . $value['employer_city_state'] : '') .
      ($value['employment_date'] ? ' (' . $value['employment_date'] .')' : '') .
      ($value['employer_physci_or_engineer'] ? '[PHYSCI/ENGINEER: TRUE]' : '[PHYSCI/ENGINEER: FALSE]');

    return $lines;
  }

}

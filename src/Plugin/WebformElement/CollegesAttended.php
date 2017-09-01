<?php

namespace Drupal\zombree_webform\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides a 'colleges_attended' element.
 *
 * @WebformElement(
 *   id = "colleges_attended",
 *   label = @Translation("Colleges Attended"),
 *   description = @Translation("Provides a custom colleges attended composite element."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see \Drupal\zombree_webform\Element\CollegesAttended
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositeBase
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class CollegesAttended extends WebformCompositeBase {

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
    $lines[] = ($value['college_name'] ? $value['college_name'] : '') .
      ($value['start_date'] ? ' (' . $value['start_date'] : '') .
      ($value['end_date'] ? ' to ' . $value['end_date'] .')' : '') .
    ($value['degrees_earned'] ? ' ' . $value['degrees_earned'] : '');

    return $lines;
  }

}

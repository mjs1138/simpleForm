<?php

namespace Drupal\simpleForm\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;

/**
 * Simple page controller for drupal.
 */
class Page extends ControllerBase {

  /**
   * Lists the examples provided by form_example.
   */
  public function description() {
    // Create a list of links to the form examples.
    $content['links'] = [
      '#theme' => 'item_list',
      '#items' => [
        Link::createFromRoute($this->t('Simple Form'), 'simpleForm.simple_form'),
      ],
    ];
    return $content;
  }

}

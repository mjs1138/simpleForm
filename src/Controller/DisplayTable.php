<?php

namespace Drupal\simpleForm\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;

/**
 * Simple page controller for drupal.
 */
class DisplayTable extends ControllerBase {

  /**
   * Lists the examples provided by form_example.
   */
  public function description_one() {


      $query = \Drupal::database()->select('users_field_data', 'u');
      $query->fields('u', ['uid','name','mail']);
      $results = $query->execute()->fetchAll();

      $header = [
          'userid' => t('User id'),
          'Username' => t('username'),
          'email' => t('Email'),
      ];

      // Initialize an empty array
      $output = array();
// Next, loop through the $results array
      foreach ($results as $result) {
//          if ($result->uid != 0 && $result->uid != 1) {
              $output[$result->uid] = [
                  'userid' => $result->uid,     // 'userid' was the key used in the header
                  'Username' => $result->name, // 'Username' was the key used in the header
                  'email' => $result->mail,    // 'email' was the key used in the header
              ];
//          }
      }

      $form['table'] = [
          '#type' => 'tableselect',
          '#header' => $header,
          '#rows' => $output[0][1],
          '#empty' => t('No users found'),
      ];

    return $form;
  }

}

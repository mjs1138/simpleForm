<?php

namespace Drupal\simpleForm\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Simple page controller for drupal.
 */
class DisplayTable_2 extends ControllerBase
{

    public function description_one()
    {
        $header = [
            'first_name' => $this->t('First Name'),
            'last_name' => $this->t('Last Name'),
        ];

        $options = [
            1 => ['first_name' => 'Indy', 'last_name' => 'Jones'],
            2 => ['first_name' => 'Darth', 'last_name' => 'Vader'],
            3 => ['first_name' => 'Super', 'last_name' => 'Man'],
        ];

        $form['table'] = array(
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $options,
            '#empty' => $this->t('No users found!!!'),
        );

        return $form;
    }

}

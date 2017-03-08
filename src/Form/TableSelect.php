<?php
namespace Drupal\simpleForm\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Simple page controller for drupal.
 */
class TableSelect extends FormBase
{
    public function buildForm(array $form, FormStateInterface $form_state)
    {

        // TableSelect.
        $options = [
            1 => ['first_name' => 'Indy', 'last_name' => 'Jones'],
            2 => ['first_name' => 'Darth', 'last_name' => 'Vader'],
            3 => ['first_name' => 'Super', 'last_name' => 'Man'],
        ];

        $header = [
            'first_name' => t('First Name'),
            'last_name' => t('Last Name'),
        ];

        $form['table'] = [
            '#type' => 'tableselect',
            '#title' => $this->t('Users'),
            '#header' => $header,
            '#options' => $options,
            '#empty' => t('No users found'),
        ];

        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#description' => $this->t('Submit, #type = submit'),
        ];


        return $form;

    }



    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'tableselect_1_form_demo';
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Find out what was submitted.
        $values = $form_state->getValues();
        foreach ($values as $key => $value) {
            $label = isset($form[$key]['#title']) ? $form[$key]['#title'] : $key;

            // Many arrays return 0 for unselected values so lets filter that out.
            if (is_array($value)) {
                $value = array_filter($value);
            }

            // Only display for controls that have titles and values.
            if ($value && $label) {
                $display_value = is_array($value) ? preg_replace('/[\n\r\s]+/', ' ', print_r($value, 1)) : $value;
                $message = $this->t('Value for %title: %value', array('%title' => $label, '%value' => $display_value));
                drupal_set_message($message);
            }
        }
    }

}

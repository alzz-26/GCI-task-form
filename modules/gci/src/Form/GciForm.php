<?php

namespace Drupal\Gci\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class GciForm extends FormBase {
	
	public function getFormId() {
		return 'gci_form';
	}
	
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form['Name'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Enter Your Name'),
		  ];
		  
	    $form['Age'] = [
		  '#type' => 'tel',
		  '#title' => $this->t('Enter Your Age'),
		  ];
		  
		$form['Gender'] = [
		  '#type' => 'radios',
		  '#title' => $this->t('Select your Gender'),
		  '#options' => array(
		    'male' => $this->t('Male'),
			'female' => $this->t('Female'),
			'other' => $this->t('Other'),
			),
		];
			
		$form['DateOfBirth'] = [
		  '#type' => 'date',
		  '#title' => $this->t('Enter Your Date of Birth'),
		  ];
		  
		$form['Submit'] = [
		  '#type' => 'submit',
		  '#value' => 'Submit',
		  '#button_type' => 'primary',
		  ];
		  
		  return $form;
	}
	
    public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->messenger()->addMessage($this->t('Your Name :- '.$form_state->getValue('Name')));
        $this->messenger()->addMessage($this->t('Your Age :- '.$form_state->getValue('Age')));
        $this->messenger()->addMessage($this->t('Your Gender :- '.$form_state->getValue('Gender')));
        $this->messenger()->addMessage($this->t('Your Date of Birth :- '.$form_state->getValue('DateOfBirth')));
    }
	
	
}	
	
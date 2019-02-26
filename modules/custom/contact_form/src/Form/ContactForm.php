<?php
/**
 * @file
 * Contains \Drupal\contact_form\Form\ContactForm.
 */
namespace Drupal\custom\contact_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class ContactForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contact_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Your name:'),
      '#required' => TRUE,
    );
    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Your e-mail address:'),
      '#required' => TRUE,
    );
    $form['subject'] = array(
      '#type' => 'textfield',
      '#title' => t('Subject:'),
      '#required' => TRUE,
    );
    $form['message'] = array (
      '#type' => 'textarea',
      '#title' => t('Message:'),
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Send message'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

      drupal_set_message($this->t('@name ,Your message is posted successfully. We will get back to you soon!', array('@name' => $form_state->getValue('name'))));
  }
}

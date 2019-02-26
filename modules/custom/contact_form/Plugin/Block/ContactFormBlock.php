<?php
/**
 * @file
 * Contains \Drupal\contact_form\Plugin\Block\ContactFormBlock.
 */

namespace Drupal\article\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'contactform' block.
 *
 * @Block(
 *   id = "contact_form_block",
 *   admin_label = @Translation("Contact Form block"),
 *   category = @Translation("Custom contact form block")
 * )
 */
class ContactFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\custom\contact_form\Form\ContactForm');
    return $form;
  }
}

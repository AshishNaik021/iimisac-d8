<?php
/**
 * @file
 * Contains \Drupal\flag\Form\FlagEditForm.
 */

namespace Drupal\flag\Form;

use Drupal\flag\Form\FlagFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the flag edit form.
 *
 * Like FlagAddForm, this class derives from FlagFormBase. This class modifies
 * the submit button name.
 *
 * @see \Drupal\flag\Form\FlagFormBase
 */
class FlagEditForm extends FlagFormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $entity_type = NULL) {
    $form = parent::buildForm($form, $form_state);

    $form['global']['#disabled'] = TRUE;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function actions(array $form, FormStateInterface $form_state) {
    $actions = parent::actions($form, $form_state);
    $actions['submit']['#value'] = t('Save Flag');
    return $actions;
  }

}

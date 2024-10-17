<?php

namespace Drupal\tour\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Form controller for the tour entity clone form.
 */
class TourCloneForm extends EntityForm {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state): array {
    $form = parent::form($form, $form_state);

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tour name'),
      '#required' => TRUE,
      '#default_value' => $this->entity->label(),
    ];

    $form['old_name'] = [
      '#type' => 'value',
      '#value' => $this->entity->getOriginalId(),
    ];

    $form['new_name'] = [
      '#title' => 'File name for new tour item.',
      '#type' => 'textfield',
      '#description' => $this->t('This value should start with <strong>tour.tour.</strong> and may not exist.'),
      '#field_prefix' => 'tour.tour.',
      '#default_value' => $this->entity->getOriginalId(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state, $redirect = TRUE): void {
    $old_name = $form_state->getValue('old_name');
    $new_name = $form_state->getValue('new_name');

    if ($form_state->isValueEmpty('new_name')) {
      $form_state->setError($form['new_name'], $this->t('The tour file name cannot be empty.'));
    }

    if ($old_name == $new_name) {
      $form_state->setError($form['new_name'], $this->t('You must change the new tour file name', ['%tip' => 'XXX']));
    }
  }

  /**
   * {@inheritdoc}
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->entity = $this->entity->createDuplicate();
    $this->entity->set('id', $form_state->getValue('new_name'));
    $this->entity->save();

    // Redirect to Entity edition.
    $form_state->setRedirect('entity.tour.edit_form', ['tour' => $this->entity->id()]);
  }

}

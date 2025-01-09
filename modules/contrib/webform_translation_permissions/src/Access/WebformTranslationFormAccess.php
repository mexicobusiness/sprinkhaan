<?php

namespace Drupal\webform_translation_permissions\Access;

use Drupal\config_translation\Access\ConfigTranslationFormAccess;
use Drupal\config_translation\ConfigMapperInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Checks access for displaying the translation add, edit, and delete forms.
 */
class WebformTranslationFormAccess extends ConfigTranslationFormAccess {

  /**
   * Checks access given an account, configuration mapper, and source language.
   *
   * Similar to the checks performed by
   * ConfigTranslationOverviewAccess::doCheckAccess() this makes sure the
   * target
   * language is not locked and the target language is not the source language.
   * Additionally, this checks the permissions for 'translate any' and
   * 'translate own' webform.
   *
   * Although technically configuration can be overlaid with translations in
   * the
   * same language, that is logically not a good idea.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account to check access for.
   * @param \Drupal\config_translation\ConfigMapperInterface $mapper
   *   The configuration mapper to check access for.
   * @param \Drupal\Core\Language\LanguageInterface|null $source_language
   *   The source language to check for, if any.
   * @param \Drupal\Core\Language\LanguageInterface|null $target_language
   *   The target language to check for, if any.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The result of the access check.
   *
   * @see \Drupal\config_translation\Access\ConfigTranslationOverviewAccess::doCheckAccess()
   */
  protected function doCheckAccess(AccountInterface $account, ConfigMapperInterface $mapper, $source_language = NULL, $target_language = NULL) {
    $entity = $mapper->getEntity();
    $uid = $entity->getOwnerId();
    $is_owner = ($account->isAuthenticated() && $account->id() == $uid);

    $access =
      ($account->hasPermission('translate configuration') ||
        $account->hasPermission('translate any webform') ||
        $account->hasPermission('translate own webform') && $is_owner) &&
      $mapper->hasSchema() &&
      $mapper->hasTranslatable() &&
      (!$source_language || !$source_language->isLocked());

    return AccessResult::allowedIf($access)->cachePerPermissions();
  }

}

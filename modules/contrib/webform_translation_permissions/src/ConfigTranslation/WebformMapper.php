<?php

namespace Drupal\webform_translation_permissions\ConfigTranslation;

use Drupal\config_translation\ConfigEntityMapper;
use Symfony\Component\Routing\Route;

/**
 * Provides a configuration mapper for webforms.
 */
class WebformMapper extends ConfigEntityMapper {

  /**
   * Overrides the default route requirements.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   The route object to process.
   */
  protected function processRoute(Route $route) {
    $route->setRequirements(
      ['_webform_translation_form_access' => 'TRUE']
    );
    return parent::processRoute($route);
  }

}

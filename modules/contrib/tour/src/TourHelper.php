<?php

namespace Drupal\tour;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Path\PathMatcher;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class TourHelper.
 *
 * Provides helper methods for the Tour module.
 */
class TourHelper implements ContainerInjectionInterface {

  use StringTranslationTrait;

  /**
   * Constructs a new TourHelper object.
   *
   * @param \Drupal\Core\Routing\CurrentRouteMatch $currentRouteMatch
   *   Checks the current route.
   * @param \Drupal\Core\Path\PathMatcher $pathMatcher
   *   Path matching helper service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The config factory.
   */
  public function __construct(
    protected CurrentRouteMatch $currentRouteMatch,
    protected PathMatcher $pathMatcher,
    protected EntityTypeManagerInterface $entityTypeManager,
    protected ConfigFactoryInterface $configFactory,
  ) {
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('current_route_match'),
      $container->get('path_matcher'),
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
    );
  }

  /**
   * Sets $route_name with custom handling for the front page.
   *
   * @return string
   *   The route name.
   */
  public function checkRoute(): string {
    $route_name = $this->currentRouteMatch->getRouteName();
    if ($this->pathMatcher->isFrontPage()) {
      $route_name = '<front>';
    }
    return $route_name;
  }

  /**
   * Returns tour entities from current route regardless of access level.
   *
   * @return array
   *   An associative array of tour entities keyed by their entity IDs.
   */
  public function loadTourEntities(): array {
    $route_match = $this->currentRouteMatch;
    $route_name = $this->checkRoute();
    try {
      $results = $this->entityTypeManager->getStorage('tour')
        ->getQuery()
        ->condition('routes.*.route_name', $route_name);

      if ($route_match->getRouteObject()) {
        foreach ($route_match->getParameters() as $name => $parameter) {
          if ($parameter instanceof EntityInterface && is_numeric($parameter->id())) {
            $results->condition('routes.*.route_params.' . $name, $parameter->id());
            break;
          }
          elseif ($parameter instanceof ConfigEntityInterface && !$parameter instanceof TourInterface) {
            $name = $name === 'dashboard' ? 'id' : $name;
            $results->condition('routes.*.route_params.' . $name, $parameter->id());
            break;
          }
        }
      }

      return $results->condition('status', TRUE)
        ->accessCheck(FALSE)
        ->execute();
    }
    catch (InvalidPluginDefinitionException | PluginNotFoundException) {
      return [];
    }
  }

  /**
   * Check settings and set string values for Tour/No Tour.
   *
   * @return array
   *   An associative array of tour labels.
   */
  public function getTourLabels(): array {
    $config = $this->configFactory->get('tour.settings');
    if ($config->get('display_custom_labels')) {
      $tour_avail_text = $config->get('tour_avail_text');
      $tour_no_avail_text = $config->get('tour_no_avail_text');
    }
    else {
      $tour_avail_text = $this->t('Tour');
      $tour_no_avail_text = $this->t('No tour');
    }

    return [
      'tour_avail_text' => $tour_avail_text,
      'tour_no_avail_text' => $tour_no_avail_text,
    ];
  }

  /**
   * Check settings and if empty tours should be hidden.
   *
   * @param bool $isEmpty
   *   If the current page has any tips.
   *
   * @return bool
   *   If the tour should be hidden or not.
   */
  public function shouldEmptyBeHidden(bool $isEmpty): bool {
    if ($isEmpty) {
      $config = $this->configFactory->get('tour.settings');
      if ($config->get('hide_tour_when_empty')) {
        return TRUE;
      }
      return FALSE;
    }
    return FALSE;
  }

}

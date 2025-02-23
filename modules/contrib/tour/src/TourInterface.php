<?php

namespace Drupal\tour;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a tour entity.
 */
interface TourInterface extends ConfigEntityInterface {

  /**
   * The routes that this tour will appear on.
   *
   * @return array
   *   Returns array of routes for the tour.
   */
  public function getRoutes(): array;

  /**
   * Whether the tour matches a given set of route parameters.
   *
   * @param string $route_name
   *   The route name the parameters are for.
   * @param array $route_params
   *   Associative array of raw route params.
   *
   * @return bool
   *   TRUE if the tour matches the route parameters.
   */
  public function hasMatchingRoute(string $route_name, array $route_params): bool;

  /**
   * Returns tip plugin.
   *
   * @param string $id
   *   The identifier of the tip.
   *
   * @return \Drupal\tour\TipPluginInterface
   *   The tip plugin.
   */
  public function getTip(string $id): TipPluginInterface;

  /**
   * Returns the tips for this tour.
   *
   * @return array
   *   An array of tip plugins.
   */
  public function getTips(): array;

  /**
   * Resets the statically cached keyed routes.
   */
  public function resetKeyedRoutes();

}

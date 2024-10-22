<?php

declare(strict_types=1);

namespace Drupal\tour\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a tour navigation block class.
 *
 * @internal
 */
#[Block(
  id: 'navigation_tour',
  admin_label: new TranslatableMarkup('Tour'),
)]
class NavigationTourBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Constructs a new NavigationTourBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Routing\CurrentRouteMatch $route_match
   *   The route match service.
   * @param \Drupal\Core\Path\PathMatcherInterface $pathMatcher
   *   The path matcher.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected CurrentRouteMatch $route_match,
    protected PathMatcherInterface $pathMatcher,
    protected EntityTypeManagerInterface $entityTypeManager,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_route_match'),
      $container->get('path.matcher'),
      $container->get('entity_type.manager'),
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account): AccessResultInterface {
    return AccessResult::allowedIfHasPermission($account, 'access tour');
  }

  /**
   * {@inheritdoc}
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function build(): array {
    // Load all the items and match on route name.
    $route_match = $this->route_match;
    $route_name = $route_match->getRouteName();

    // Check if the current matching path is the front page.
    if ($this->pathMatcher->isFrontPage()) {
      $route_name = '<front>';
    }

    $results = $this->entityTypeManager->getStorage('tour')
      ->getQuery()
      ->condition('routes.*.route_name', $route_name);

    if ($route_match->getRouteObject()) {
      foreach ($route_match->getParameters() as $name => $parameter) {
        if ($parameter instanceof EntityInterface && is_numeric($parameter->id())) {
          $results->condition('routes.*.route_params.' . $name, $parameter->id());
          break;
        }
      }
    }

    $results = $results->condition('status', TRUE)
      ->accessCheck(FALSE)
      ->execute();
    $no_tips = empty($results);

    return [
      'tour' => [
        '#lazy_builder' => [
          'tour.lazy_builders:renderTour',
          [$no_tips, 'navigation_tour'],
        ],
        '#cache' => [
          'contexts' => ['url'],
          'tags' => ['tour_settings'],
        ],
      ],
      '#attached' => [
        'library' => [
          'tour/tour',
        ],
      ],
    ];
  }

}

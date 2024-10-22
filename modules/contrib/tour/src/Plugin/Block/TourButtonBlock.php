<?php

namespace Drupal\tour\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block containing a Tour button.
 */
#[Block(
  id: "tour_button_block",
  admin_label: new TranslatableMarkup("Tour button"),
)]
class TourButtonBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Constructs a new TourButtonBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Routing\RouteMatchInterface $currentRoute
   *   The currently active route match object.
   * @param \Drupal\Core\Path\PathMatcherInterface $pathMatcher
   *   The path matcher.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The config factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected RouteMatchInterface $currentRoute,
    protected PathMatcherInterface $pathMatcher,
    protected ConfigFactoryInterface $configFactory,
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
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
    );
  }

  /**
   * {@inheritdoc}
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function build(): array {
    // Load all the items and match on route name.
    $route_match = $this->currentRoute;
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

    $config = $this->configFactory->get('tour.settings');
    if ($config->get('display_custom_labels')) {
      $tour_avail_text = $config->get('tour_avail_text');
      $tour_no_avail_text = $config->get('tour_no_avail_text');
    }
    else {
      $tour_avail_text = $this->t('Tour');
      $tour_no_avail_text = $this->t('No tour');
    }

    $classes = [
      'tour-button',
      'js-tour-start-button',
    ];

    if ($no_tips) {
      $classes = array_merge($classes, ['toolbar-tab-empty']);
    }

    return [
      'content' => [
        '#type' => 'html_tag',
        '#tag' => 'button',
        '#cache' => [
          'contexts' => ['url'],
          'tags' => ['tour_settings'],
        ],
        '#value' => $no_tips ? $tour_no_avail_text : $tour_avail_text,
        '#attributes' => [
          'class' => $classes,
          'aria-haspopup' => 'dialog',
          'type' => 'button',
          'aria-disabled' => $no_tips ? 'true' : 'false',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(): array {
    return [
      'label_display' => FALSE,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account): AccessResultInterface {
    return AccessResult::allowedIfHasPermission($account, 'access tour');
  }

}

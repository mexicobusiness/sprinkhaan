<?php

namespace Drupal\tour;

use Drupal\Component\Utility\Html;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Entity\EntityViewBuilder;

/**
 * Provides a Tour view builder.
 *
 * Note: Does not invoke any alter hooks. In other view
 * builders, the view alter hooks are run later in the process.
 */
class TourViewBuilder extends EntityViewBuilder {

  /**
   * {@inheritdoc}
   */
  public function viewMultiple(array $entities = [], $view_mode = 'full', $langcode = NULL): array {
    /** @var \Drupal\tour\TourInterface[] $entities */
    $tour = [];
    $cache_tags = [];
    $total_tips = 0;
    $all_tips = [];
    foreach ($entities as $entity_id => $entity) {
      $all_tips = array_merge($all_tips, $entity->getTips());
      $tour[$entity_id] = $entity->getTips();
      $total_tips += count($tour[$entity_id]);
      $cache_tags = Cache::mergeTags($cache_tags, $entity->getCacheTags());
    }

    uasort($all_tips, function ($a, $b) {
      return $a->getWeight() <=> $b->getWeight();
    });

    $items = [];
    $counter = 0;
    foreach ($all_tips as $tip) {
      $classes = [
        'tip-type-' . Html::getClass($tip->getPluginId()),
        'tip-' . Html::getClass($tip->id()),
      ];

      $selector = $tip->getSelector() ? $tip->getSelector() : NULL;
      $location = $tip->getLocation();

      $body_render_array = $tip->getBody();
      $body = (string) \Drupal::service('renderer')
        ->renderInIsolation($body_render_array);
      $output = [
        'body' => $body,
        'title' => $tip->getLabel(),
      ];

      if ($output) {
        $items[] = [
          'id' => $tip->id(),
          'selector' => $selector,
          'type' => $tip->getPluginId(),
          'counter' => $this->t('@tour_item of @total', [
            '@tour_item' => $counter + 1,
            '@total' => $total_tips,
          ]),
          'attachTo' => [
            'element' => $selector,
            'on' => $location ?? 'bottom-start',
          ],
          // Shepherd expects classes to be provided as a string.
          'classes' => implode(' ', $classes),
        ] + $output;
      }
      $counter++;
    }

    // If there is at least one tour item, build the tour.
    if ($items) {
      end($items);
      $key = key($items);
      $items[$key]['cancelText'] = t('End tour');
    }

    $build = [
      '#cache' => [
        'tags' => $cache_tags,
      ],
    ];

    // If at least one tour was built, attach tips and the tour library.
    if ($items) {
      $build['#attached']['drupalSettings']['tourShepherdConfig'] = [
        'defaultStepOptions' => [
          'classes' => 'drupal-tour',
          'cancelIcon' => [
            'enabled' => TRUE,
            'label' => $this->t('Close'),
          ],
          'modalOverlayOpeningPadding' => 3,
          'scrollTo' => [
            'behavior' => 'smooth',
            'block' => 'center',
          ],
          'popperOptions' => [
            'modifiers' => [
              // Prevent overlap with the element being highlighted.
              [
                'name' => 'offset',
                'options' => [
                  'offset' => [-10, 20],
                ],
              ],
              // Pad the arrows, so they don't hit the edge of rounded corners.
              [
                'name' => 'arrow',
                'options' => [
                  'padding' => 12,
                ],
              ],
              // Disable Shepherd's focusAfterRender modifier, which results in
              // the tour item container being focused on any scroll or resize
              // event.
              [
                'name' => 'focusAfterRender',
                'enabled' => FALSE,
              ],

            ],
          ],
        ],
        'useModalOverlay' => TRUE,
      ];
      // This property is used for storing the tour items. It may change without
      // notice and should not be extended or modified in contrib.
      // see: https://www.drupal.org/project/drupal/issues/3214593
      $build['#attached']['drupalSettings']['_tour_internal'] = $items;
      $build['#attached']['library'][] = 'tour/tour';
    }
    return $build;
  }

}

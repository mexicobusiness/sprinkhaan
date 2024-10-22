<?php

namespace Drupal\tour\EventSubscriber;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Config install subscriber for config update on config install.
 *
 * @internal
 */
class ConfigInstallSubscriber implements EventSubscriberInterface {

  /**
   * Constructs a ConfigInstallSubscriber object.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $moduleHandler
   *   The module handler service.
   */
  public function __construct(protected ModuleHandlerInterface $moduleHandler) {
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    $events[ConfigEvents::SAVE][] = ['onConfigSave'];
    return $events;
  }

  /**
   * Responds to the config save event.
   *
   * @param \Drupal\Core\Config\ConfigCrudEvent $event
   *   The configuration event.
   */
  public function onConfigSave(ConfigCrudEvent $event): void {
    if (!$this->moduleHandler->moduleExists('navigation')) {
      return;
    }
    $saved_config = $event->getConfig();
    // Place the tour to the navigation.
    if ($saved_config->getName() == 'navigation.block_layout' && empty($saved_config->getOriginal())) {
      $sections = $saved_config->get('sections');
      if (isset($sections[0])) {
        $components = $sections[0]['components'];
        if (!isset($components['2c53c0b8-7140-44da-90a2-0a5befa2d8bf'])) {
          $component = [
            'uuid' => '2c53c0b8-7140-44da-90a2-0a5befa2d8bf',
            'region' => 'content',
            'configuration' => [
              'id' => 'navigation_tour',
              'label' => 'Tour',
              'label_display' => '0',
              'provider' => 'navigation',
              'status' => TRUE,
              'info' => '',
              'view_mode' => 'default',
            ],
            'weight' => 0,
            'additional' => [],
          ];
          $components['2c53c0b8-7140-44da-90a2-0a5befa2d8bf'] = $component;
          $sections[0]['components'] = $components;
          $saved_config->set('sections', $sections)->save();
        }
      }
    }
  }

}

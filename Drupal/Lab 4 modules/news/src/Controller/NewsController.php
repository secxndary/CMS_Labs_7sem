<?php

namespace Drupal\news\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for the News module.
 */
class NewsController extends ControllerBase {

  /**
   *
   * @return array
   *   A simple renderable array.
   */
  public function content() {
    return [
      '#markup' => '<h1>News</h1>',
    ];
  }

}

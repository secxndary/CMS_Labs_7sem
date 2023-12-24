<?php

namespace Drupal\news\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'News' block.
 *
 * @Block(
 *   id = "news_block",
 *   admin_label = @Translation("News Block"),
 *   category = @Translation("Custom")
 * )
 */
class NewsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Display the block content.
    return [
      '#markup' => $this->t('This is a news block'),
    ];
  }

}

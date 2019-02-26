<?php
/**
 * @file
 * Contains \Drupal\custom_flexslider\Plugin\Block\CustomFlexsliderBlock.
 */

namespace Drupal\custom_flexslider\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Html;

/**
 * Provides a 'custom_flexslider' block.
 *
 * @Block(
 *   id = "custom_flexslider_block",
 *   admin_label = @Translation("Custom Flexslider block"),
 *   category = @Translation("Custom flexslider block based on content type")
 * )
 */
class CustomFlexsliderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::entityQuery('node')
   ->condition('status', 1)
   ->condition('type', 'projects');
    $nids = $query->execute();
    $nodes = node_load_multiple($nids);
    $style = \Drupal::entityTypeManager()->getStorage('image_style')->load('projects_large');
    $slidercontent = [];
    foreach($nodes as $node)
    {
      $imageUrl = $node->get('field_image')->entity->uri->value;
      $slidercontent[$node->id()]['title'] = Html::escape($node->getTitle());
      $slidercontent[$node->id()]['description'] = $node->body->value;
      $slidercontent[$node->id()]['image'] = $style->buildUrl($imageUrl);
      $slidercontent[$node->id()]['url'] = $node->toUrl()->toString();
    }
    return array(
      //'#type' => 'markup',
      //'#markup' => 'This block list the custom flexslider.',
      '#theme' => 'customflexslider',
      '#slidercontent' => $slidercontent,
    );
  }
}

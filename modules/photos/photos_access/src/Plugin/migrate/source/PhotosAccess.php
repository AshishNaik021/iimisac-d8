<?php

/**
 * @file
 * Contains \Drupal\photos_access\Plugin\migrate\source\PhotosAccess.
 */

namespace Drupal\photos_access\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for photos album access.
 *
 * @MigrateSource(
 *   id = "photos_access"
 * )
 */
class PhotosAccess extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {

    $query = $this->select('photos_access_album', 'a')
      ->fields('a', ['id', 'nid', 'viewid', 'updateid', 'pass']);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('ID'),
      'nid' => $this->t('Node ID'),
      'viewid' => $this->t('Access type'),
      'updateid' => $this->t('Update ID'),
      'pass' => $this->t('Password'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'a',
      ],
    ];
  }

}

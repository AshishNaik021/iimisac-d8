<?php

/**
 * @file
 * Contains \Drupal\video_embed_field\Tests\VideoEmbedFieldWebTestBase.
 */

namespace Drupal\video_embed_field\Tests;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\simpletest\WebTestBase as CoreWebTestBase;

/**
 * Test the video embed field widget.
 *
 * @group video_embed_field
 */
abstract class WebTestBase extends CoreWebTestBase {

  /**
   * A user with permission to administer content types, node fields, etc.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * The field name
   *
   * @var string
   */
  protected $fieldName;

  /**
   * The name of the content type.
   *
   * @var string
   */
  protected $contentTypeName;

  /**
   * The entity display.
   *
   * @var \Drupal\Core\Entity\Display\EntityViewDisplayInterface
   */
  protected $entityDisplay;

  /**
   * The form display.
   *
   * @var \Drupal\Core\Entity\Display\EntityFormDisplayInterface
   */
  protected $entityFormDisplay;

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'video_embed_field',
    'field_ui',
    'node',
  ];

  /**
   * Permissions to grant admin user.
   *
   * @var array
   */
  protected $permissions = [
    'access content',
    'administer content types',
    'administer node fields',
    'administer node form display',
    'bypass node access',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->fieldName = strtolower($this->randomMachineName());
    $this->contentTypeName = strtolower($this->randomMachineName());
    $this->drupalCreateContentType(['type' => $this->contentTypeName]);
    $this->adminUser = $this->drupalCreateUser($this->permissions);
    $field_storage = FieldStorageConfig::create([
      'field_name' => $this->fieldName,
      'entity_type' => 'node',
      'type' => 'video_embed_field',
      'settings' => [
        'allowed_providers' => [],
      ],
    ]);
    $field_storage->save();
    FieldConfig::create([
      'field_storage' => $field_storage,
      'bundle' => $this->contentTypeName,
      'settings' => [],
    ])->save();
    $this->fieldName = $this->fieldName;
    $this->entityDisplay = entity_get_display('node', $this->contentTypeName, 'default');
    $this->entityFormDisplay = entity_get_form_display('node', $this->contentTypeName, 'default');
    $this->resetAll();
  }

}

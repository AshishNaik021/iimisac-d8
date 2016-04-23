<?php
/**
 * @file
 * Contains \Drupal\fillpdf_test\Plugin\FillPdfBackend\TestFillPdfBackend.
 */

namespace Drupal\fillpdf_test\Plugin\FillPdfBackend;

use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;
use Drupal\fillpdf\FillPdfBackendPluginInterface;
use Drupal\fillpdf\FillPdfFormInterface;

/**
 * @Plugin(
 *   id = "test",
 *   label = @Translation("Pass-through plugin for testing")
 * )
 */
class TestFillPdfBackend implements FillPdfBackendPluginInterface {
  /** @var array $configuration */
  protected $configuration;

  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    $this->configuration = $configuration;
  }

  /**
   * @inheritdoc
   */
  public function parse(FillPdfFormInterface $fillpdf_form) {
    $return = [
      0 => [
        'name' => 'ImageField',
        'value' => '',
        'type' => 'Pushbutton',
      ],
      1 => [
        'name' => 'Button',
        'value' => '',
        'type' => 'Pushbutton',
      ],
      2 => [
        'name' => 'TextField',
        'value' => '',
        'type' => 'Text',
      ],
    ];

    return $return;
  }

  /**
   * @inheritdoc
   */
  public function populateWithFieldData(FillPdfFormInterface $pdf_form, array $field_mapping, array $context) {
    // Not really populated, but that isn't our job.
    $populated_pdf = file_get_contents(drupal_get_path('module', 'fillpdf_test') . '/files/fillpdf_test_v3.pdf');

    return $populated_pdf;
  }

}

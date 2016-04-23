<?php
/**
 * @file
 * Contains \Drupal\fillpdf\Tests\FillPdfBackendTest
 */

namespace Drupal\fillpdf\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Ensure backends work properly.
 *
 * @ingroup fillpdf
 *
 * @group FillPDF
 */
class FillPdfBackendTest extends WebTestBase {

  static public $modules = ['fillpdf_test'];
  protected $profile = 'minimal';

  public function testTestBackend() {

    $backend_manager = $this->container->get('plugin.manager.fillpdf_backend');

    $test_backend = $backend_manager->createInstance('test');

    $this->assertTrue(is_a($test_backend, 'Drupal\fillpdf_test\Plugin\FillPdfBackend\TestFillPdfBackend'), 'Test FillPDF Backend was successfully instantiated.');

  }

}


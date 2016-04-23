<?php
/**
 * @file
 * Contains \Drupal\fillpdf\Tests\FillPdfOverviewFormTest.
 */

namespace Drupal\fillpdf\Tests;

use Drupal\Core\Url;
use Drupal\simpletest\WebTestBase;

/**
 * Ensure the overview form at /admin/structure/fillpdf functions correctly.
 *
 * @ingroup fillpdf
 *
 * @group FillPDF
 */
class FillPdfOverviewFormTest extends WebTestBase {

  static public $modules = ['fillpdf'];
  protected $profile = 'minimal';

  public function testUploadForm() {
    // Create and log in our privileged user.
    $user = $this->createUser([
      'access administration pages',
      'administer pdfs',
    ]);
    $this->drupalLogin($user);

    $this->drupalGet(Url::fromRoute('fillpdf.forms_admin'));
  }

}


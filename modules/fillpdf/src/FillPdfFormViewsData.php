<?php
/**
 * @file
 * Contains \Drupal\fillpdf\FillPdfFormViewsData.
 */

namespace Drupal\fillpdf;

use Drupal\views\EntityViewsData;

/**
 * Class FillPdfFormViewsData.
 *
 * @package Drupal\fillpdf
 */
class FillPdfFormViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['fillpdf_forms']['table']['group'] = $data['fillpdf_forms']['table']['base']['title'] = t('FillPDF forms');

    $data['fillpdf_forms']['table']['base']['help'] = t('FillPDF forms are uploaded on the FillPDF administration page and are used by the FillPDF module.');

    return $data;
  }

}

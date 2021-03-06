<?php
/**
 * @file
 * Contains \Drupal\fillpdf\FillPdfContextManagerInterface\FillPdfContextManagerInterface.
 */

namespace Drupal\fillpdf;

/**
 * Load entities from a FillPDF $context.
 *
 * Provides a common interface for loading and serialization of the $context
 * array returned by FillPdfLinkManipulator::parseRequest().
 *
 * @package Drupal\fillpdf\FillPdfContextManagerInterface
 */
interface FillPdfContextManagerInterface {

  /**
   * Loads the entities specified in $context['entity_ids'].
   *
   * @param array $context
   * @return array
   */
  public function loadEntities(array $context);

}

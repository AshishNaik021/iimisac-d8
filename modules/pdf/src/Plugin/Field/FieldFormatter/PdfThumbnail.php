<?php /**
 * @file
 * Contains \Drupal\pdf\Plugin\Field\FieldFormatter\PdfThumbnail.
 */
namespace Drupal\pdf\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * @FieldFormatter(
 *  id = "pdf_thumbnail",
 *  label = @Translation("PDF: Display the first page"),
 *  description = @Translation("Display the first page of the PDF file."),
 *  field_types = {"file"}
 * )
 */
class PdfThumbnail extends FormatterBase {
  public static function defaultSettings() {
    return array(
      'scale' => 1,
      'width' => '',
      'height' => '',
    ) + parent::defaultSettings();
  }

  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);
    $elements['scale'] = array(
      '#type' => 'textfield',
      '#title' => t('Set the scale of PDF pages'),
      '#default_value' => $this->getSetting('scale'),
    );
    $elements['width'] = array(
      '#type' => 'textfield',
      '#title' => 'Width',
      '#default_value' => $this->getSetting('width'),
      '#description' => t('Width of the viewer. Ex: 250px or 100%'),
    );
    $elements['height'] = array(
      '#type' => 'textfield',
      '#title' => 'Height',
      '#default_value' => $this->getSetting('height'),
      '#description' => t('Height of the viewer. Ex: 250px or 100%'),
    );
    return $elements;
  }

  public function settingsSummary() {
    $summary = array();

    $scale = $this->getSetting('scale');
    $width = $this->getSetting('width');
    $height = $this->getSetting('height');
    if (empty($scale) && empty($width) && empty($height)) {
      $summary[] = $this->t('No settings');
    }
    else {
      $summary[] =  t('Scale: @scale, Widht: @width, Height: @height', array('@scale' => $scale, '@width' => $width, '@height' => $height) );
    }
    return $summary;
  }
  
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();
    foreach ($items as $delta => $item) {
      $filename = $item->entity->getFilename();
      if ($item->isDisplayed() && $item->entity && strpos($filename, 'pdf' ) ) {
        $file_url = file_create_url($item->entity->getFileUri());
        $html = array(
          '#type' => 'html_tag',
          '#tag' => 'canvas',
          //'#value' => ,
          '#attributes' => array(
            'class' => array('pdf-thumbnail', 'pdf-canvas'),
            'id' => array('pdf-thumbnail-' . $delta),
            'file' => $file_url,
            'scale' => $this->getSetting('scale'),
            'style' => 'width:' . $this->getSetting('width') . ';height:' . $this->getSetting('height') . ';',
          ),
        );
        $elements[$delta] = array(
          '#markup' => \Drupal::service('renderer')->render($html),
        );
      }
    }
    $elements['#attached']['library'][] = 'pdf/drupal.pdf';
    $elements['#attached']['drupalSettings'] = array(
      'pdf' => array(
        'workerSrc' => 'https://mozilla.github.io/pdf.js/build/pdf.worker.js',
      ),
    );
    return $elements;
  }
}
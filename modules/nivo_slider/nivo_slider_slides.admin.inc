<?php

/**
 * @file
 * Generate configuration form and save settings.
 */

/**
 * Configuration form for slider slides.
 */
function nivo_slider_slide_configuration_form($form, &$form_state) {
  // Get the current settings
  $config = config('nivo_slider.settings');

  // Get all available slides
  $slides = $config->get('slides');

  // Upload
  $form['upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload a new slide image'),
  );

  // Draggable table
  $form['order'] = array(
    '#type' => 'table',
    '#header' => array(
      t('Name'),
      t('Published'),
      t('Delete'),
      t('Weight'),
    ),
    '#empty' => t('There are no slides yet.'),
    '#tabledrag' => array(
      array('order', 'sibling', 'slide-weight'),
    ),
    '#tree' => TRUE,
  );

  // Vertical tab
  $form['images'] = array(
    '#type' => 'vertical_tabs',
    '#title' => t('Slider images'),
    '#tree' => TRUE,
  );

  // Process available slides
  foreach ($slides as $slide => $settings) {
    // Table
    $form['order'][$slide]['#attributes']['class'][] = 'draggable';
    $form['order'][$slide]['#weight'] = $settings['weight'];

    $form['order'][$slide]['title'] = array(
      '#markup' => check_plain($settings['title']),
    );
    $form['order'][$slide]['published'] = array(
      '#type' => 'checkbox',
      '#default_value' => $settings['published'],
    );
    $form['order'][$slide]['delete'] = array(
      '#type' => 'checkbox',
      '#default_value' => $settings['delete'],
    );
    $form['order'][$slide]['weight'] = array(
      '#type' => 'weight',
      '#title' => t('Weight for @title', array('@title' => $settings['title'])),
      '#title_display' => 'invisible',
      '#default_value' => $settings['weight'],
      '#attributes' => array('class' => array('slide-weight')),
    );

    // Vertical Tabs
    $form['images'][$slide] = array(
      '#type' => 'details',
      '#group' => 'images',
      '#title' => t('Image !number: !title', array(
        '!number' => $slide + 1,
        '!title' => isset($settings['title']) ? $settings['title'] : '',
        )
      ),
      '#weight' => $slide,
    );

    // Load the slide's image file
    $file = file_load($settings['fid']);

    // Create a preview image of the slide using an image style if appropriate
    if ($config->get('options.image_style') == FALSE) {
      $variables = array(
        'uri' => $file->uri,
      );
      $image = theme('image', $variables);
    }
    else {
      $variables = array(
        'uri' => $file->uri,
        'style_name' => $config->get('options.image_style_slide'),
      );
      $image = theme('image_style', $variables);
    }

    $form['images'][$slide]['preview'] = array(
      '#markup' =>  $image,
    );
    $form['images'][$slide]['fid'] = array(
      '#type' => 'hidden',
      '#value' => isset($settings['fid']) ? $settings['fid'] : '',
    );
    $form['images'][$slide]['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($settings['title']) ? $settings['title'] : '',
      '#description' => t('The title is used as alternative text for the slide image.'),
    );
    $form['images'][$slide]['description'] = array(
      '#type' => 'text_format',
      '#title' => t('Description'),
      '#default_value' => isset($settings['description']['value']) ? $settings['description']['value'] : '',
      '#format' => isset($settings['description']['format']) ? $settings['description']['format'] : NULL,
      '#description' => t('The description will be displayed with the slide image.'),
    );
    $form['images'][$slide]['url'] = array(
      '#type' => 'textfield',
      '#title' => t('Link slide to URL'),
      '#default_value' => isset($settings['url']) ? $settings['url'] : '',
      '#description' => t('Specify a path or an absolute URL. An example path is %blog for the blog page. An example absolute URL is %url for the Drupal website. %front is the front page.', array('%blog' => 'blog', '%url' => 'http://drupal.org', '%front' => '<front>')),
    );
    $form['images'][$slide]['visibility'] = array(
      '#type' => 'textarea',
      '#title' => t('Show slide on specific pages'),
      '#description' => t("Specify pages by using their paths. Enter one path per line. The '*' character is a wildcard. Example paths are %blog for the blog page and %blog-wildcard for every personal blog. %front is the front page.", array('%blog' => 'blog', '%blog-wildcard' => 'blog/*', '%front' => '<front>')),
      '#default_value' => isset($settings['visibility']) ? $settings['visibility'] : '*',
    );
    $form['images'][$slide]['transition'] = array(
      '#type' => 'select',
      '#title' => t('Transition'),
      '#options' => array(
        '' => t('- Default -'),
        'sliceDown' => t('Slice Down'),
        'sliceDownLeft' => t('Slice Down Left'),
        'sliceUp' => t('Slice Up'),
        'sliceUpLeft' => t('Slice Up Left'),
        'sliceUpDown' => t('Slice Up Down'),
        'sliceUpDownLeft' => t('Slice Up Down Left'),
        'fold' => t('Fold'),
        'fade' => t('Fade'),
        'random' => t('Random'),
        'slideInRight' => t('Slide In Right'),
        'slideInLeft' => t('Slide in Left'),
        'boxRandom' => t('Box Random'),
        'boxRain' => t('Box Rain'),
        'boxRainReverse' => t('Box Rain Reverse'),
        'boxRainGrow' => t('Box Rain Grow'),
        'boxRainGrowReverse' => t('Box Rain Grow Reverse'),
      ),
      '#description' => t('Select a transition. Selecting an option other than %default will force this slide to use the selected transition every time it appears. It overrides all other effect settings.', array('%default' => '- Default -')),
      '#default_value' => isset($settings['transition']) ? $settings['transition'] : '',
    );
  }

  return system_config_form($form, $form_state);
}

/**
 * Form submission handler for nivo_slider_slide_configuration_form().
 */
function nivo_slider_slide_configuration_form_submit($form, &$form_state) {
  // Create an array to hold slides
  $slides = array();

  if (is_array($form_state['values']['order']) && is_array($form_state['values']['images'])) {
    // Merge in order settings
    foreach ($form_state['values']['order'] as $slide => $settings) {
      if (is_numeric($slide)) {
        if (is_array($settings)) {
          $slides[$slide] = isset($slides[$slide]) ? array_merge($slides[$slide], $settings) : $settings;
        }
      }
    }

    // Merge in images settings
    foreach ($form_state['values']['images'] as $slide => $settings) {
      if (is_numeric($slide)) {
        if (is_array($settings)) {
          $slides[$slide] = isset($slides[$slide]) ? array_merge($slides[$slide], $settings) : $settings;
        }
      }
    }
  }

  // Remove any deleted slides
  foreach ($slides as $slide => $settings) {
    // Delete the slide if required
    if ($settings['delete']) {
      unset($slides[$slide]);
    }
  }

  // Update / create translation source for user defined slide strings
  if (function_exists('i18n_string_update')) {
    nivo_slider_locale_refresh($slides);
  }

  // Store slide images in a folder named 'banner'
  $banner_folder = 'public://banner';

  // Create the banner directory if it does not currently exist
  file_prepare_directory($banner_folder, FILE_CREATE_DIRECTORY);

  // Create a new slide if an image was uploaded
  if ($file = file_save_upload('upload', array(), $banner_folder)) {
    // Create a new slide
    $slides[] = array(
      'fid' => $file->fid,
      'title' => '',
      'description' => array(
        'value' => '',
        'format' => filter_fallback_format(),
      ),
      'url' => '',
      'visibility' => '*',
      'transition' => '',
      'weight' => 1,
      'published' => 1,
      'delete' => 0,
    );
  }

  // Sort the slides by weight
  usort($slides, 'drupal_sort_weight');

  // Save the slides
  config('nivo_slider.settings')
    ->set('slides', $slides)
    ->save();
}
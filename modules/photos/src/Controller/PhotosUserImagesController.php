<?php

/**
 * @file
 * Definition of Drupal\photos\PhotosUserImagesController.
 */

namespace Drupal\photos\Controller;

use Drupal\Core\Url;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PhotosUserImagesController {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   */
  public function access(AccountInterface $account) {
    // Check if user can view account photos.
    $uid = \Drupal::routeMatch()->getParameter('user');
    $account = \Drupal::entityManager()->getStorage('user')->load($uid);
    if (!$account || _photos_access('viewUser', $account)) {
      return AccessResult::allowed();
    }
    else {
      return AccessResult::forbidden();
    }
  }

  /**
   * Photos page title.
   */
  public function title() {
    // Generate title.
    $user = \Drupal::currentUser();
    $uid = \Drupal::routeMatch()->getParameter('user');
    if ($uid <> $user->id()) {
      $account = \Drupal::entityManager()->getStorage('user')->load($uid);
      return t('@name\'s Images', array('@name' => $account->getUsername()));
    }
    else {
      return t('My Images');
    }
  }

  /**
   * Returns content for recent images.
   *
   * @return string
   *   A HTML-formatted string with the administrative page content.
   *
   */
  public function contentOverview() {
    // Get current user and account.
    // @todo a lot of duplicate code can be consolidated in these controllers.
    $user = \Drupal::currentUser();
    $uid = \Drupal::routeMatch()->getParameter('user');
    $account = FALSE;
    if ($uid && is_numeric($uid)) {
      $account = \Drupal::entityManager()->getStorage('user')->load($uid);
    }
    if (!$account) {
      throw new NotFoundHttpException();
    }
    $build = array();
    $order = explode('|', \Drupal::config('photos.settings')->get('photos_display_imageorder'));
    $order = _photos_order_value_change($order[0], $order[1]);
    $column = (isset($_GET['field'])) ? \Drupal\Component\Utility\Html::escape($_GET['field']) : 0;
    $sort = (isset($_GET['sort'])) ? \Drupal\Component\Utility\Html::escape($_GET['sort']) : 0;
    $term = _photos_order_value($column, $sort, \Drupal::config('photos.settings')->get('photos_display_viewpager'), $order);
    if ($account->id()) {
      $query = db_select('file_managed', 'f')
        ->extend('Drupal\Core\Database\Query\PagerSelectExtender');
      $query->join('photos_image', 'p', 'p.fid = f.fid');
      $query->join('node_field_data', 'n', 'n.nid = p.pid');
      $query->join('users_field_data', 'u', 'u.uid = f.uid');
      $query->fields('f', array('uri', 'filemime', 'created', 'filename', 'filesize'))
        ->fields('p')
        ->fields('u', array('uid', 'name'));
      $query->addField('n', 'title', 'node_title');
      $query->condition('f.uid', $account->id());
      $query->orderBy($term['order']['column'], $term['order']['sort']);
      $query->limit($term['limit']);
      $query->addTag('node_access');
      $result = $query->execute();

      $slideshow = '';
      $album['links'] = _photos_order_link('photos/user/' . $account->id() . '/image', $account->album['image']['count'], $slideshow, 1);
    }
    $com = \Drupal::config('photos.settings')->get('photos_comment');
    $edit = 0;
    if ($account->id() && $user->id() && $account->id() == $user->id()) {
      $edit = 1;
    }

    $vote = FALSE;
    // @todo fix voting.
    // $vote = variable_get('allowed to vote', 0);

    $style_name = \Drupal::config('photos.settings')->get('photos_display_list_imagesize');
    foreach ($result as $data) {
      $image = photos_get_info(0, $data);
      $image->title = \Drupal\Component\Utility\SafeMarkup::checkPlain($image->title);
      $image->des = \Drupal\Component\Utility\SafeMarkup::checkPlain($image->des);
      $image->view = array(
        '#theme' => 'photos_image_html',
        '#style_name' => $style_name,
        '#image' => $image
      );
      $image->url = Url::fromUri('base:photos/image/' . $image->fid)->toString();

      if ($com) {
        $image->links['comment'] = array(
          '#theme' => 'photos_comment_count',
          '#comcount' => $image->comcount,
          '#url' => $image->url
        );
      }
      if (isset($image->count)) {
        $image->links['count'] = \Drupal::translation()->formatPlural($image->count, '@cou visit', '@cou visits', array('@cou' => $image->count));
      }
      if ($account->id() || !empty($image->uid) && $image->uid <> $account->id()) {
        $account = \Drupal::entityManager()->getStorage('user')->load($image->uid);
      }
      // Get username.
      $name = '';
      if (!empty($image->uid)) {
        $account = \Drupal::entityManager()->getStorage('user')->load($image->uid);
        $name_render_array = array(
          '#theme' => 'username',
          '#account' => $account
        );
        $name = drupal_render($name_render_array);
      }
      $image->links['info'] = t('Uploaded on @time by @name in @title', array(
        '@name' => $name,
        '@time' => \Drupal::service('date.formatter')->format($image->created, 'short'),
        '@title' => \Drupal::l($image->node_title, Url::fromUri('base:photos/album/' . $image->pid))
      ));

      $image->class = array(
        'title_class' => '',
        'des_class' => '',
      );
      $image->id = array(
        'des_edit' => '',
        'title_edit' => ''
      );
      $image->ajax['del_id'] = '';
      if ($edit) {
        $image->ajax['edit_url'] = $image->url . '/update';
        $current_path = \Drupal::service('path.current')->getPath();
        $image->ajax['edit_link'] = \Drupal::l(t('Edit'), Url::fromUri('base:photos/image/' . $image->fid . '/edit'), array(
          'query' => array(
            'destination' => $current_path,
            'pid' => $image->pid,
            'uid' => $image->uid
          ),
          'attributes' => array(
            'class' => array('colorbox-load', 'photos-edit-edit')
          )
        ));

        $image->class = array(
          'title_class' => ' jQueryeditable_edit_title',
          'des_class' => ' jQueryeditable_edit_des',
        );
        $image->id = array(
          'des_edit' => ' id="photos-image-edit-des-' . $image->fid . '"',
          'title_edit' => ' id="photos-image-edit-title-' . $image->fid . '"'
        );
        $image->ajax['del_id'] = 'id="photos_ajax_del_' . $image->fid . '"';
        $image->ajax['del_link'] = \Drupal::l(t('Delete'), Url::fromUri('base:photos/image/' . $image->fid . '/delete'), array(
          'query' => array(
            'destination' => $current_path,
            'pid' => $image->pid,
            'uid' => $image->uid
          ),
          'attributes' => array(
            'class' => array('photos-edit-delete'),
            'alt' => 'photos_ajax_del_' . $image->fid
          )
        ));

        // Set cover link.
        $url_query = drupal_get_destination();
        $cover_url = Url::fromRoute('photos.album.update.cover', array(
          'node' => $image->pid,
          'file' => $image->fid
        ),
        array(
          'query' => $url_query
        ));
        $image->links['cover'] = \Drupal::l(t('Set to Cover'), $cover_url);
      }
      if ($vote) {
        $image->links['vote'] = array(
          '#theme' => 'photos_vote',
          '#fid' => $image->fid
        );
      }
      $album['view'][] = array(
        '#theme' => 'photos_image_view',
        '#image' => $image,
        '#display_type' => 'list'
      );
    }
    if (isset($album['view'][0])) {
      // Set pager.
      $album['pager'] = array(
        '#type' => 'pager'
      );
      $render_album_view = array(
        '#theme' => 'photos_album_view',
        '#album' => $album,
        '#node' => NULL
      );
      $content = drupal_render($render_album_view);
    }
    else {
      if ($account <> FALSE) {
        $content = t('@name has not uploaded any images yet.', array('@name' => $account->name));
      }
      else {
        $content = t('No images have been uploaded yet.');
      }
    }

    return array(
      '#markup' => $content
    );
  }

}

<?php

/**
 * @file
 * template.php
 */

function mdwa01_preprocess_html(&$variables) {
  if ($variables['head_title_array'] && !empty($variables['head_title_array']) && drupal_is_front_page()) {
    $variables['head_title_array']['title'] = t('Home');
    $variables['head_title'] = join(' | ', $variables['head_title_array']);
  }
}

function mdwa01_preprocess_page(&$variables) {
  // Page suggestions
  if (isset($variables['node'])) {
    $suggestion = 'page__' . str_replace('-', '--', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = $suggestion;
  }
  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main_menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
}

function mdwa01_preprocess_node(&$variables) {
  $node = $variables ['node'];
  if (($node->type == 'noticia' || $node->type == 'blog') && $variables ['display_submitted']) {
    $variables ['submitted'] = format_date($node->created, 'medio_sin_hora');
    $variables ['datetime']  = format_date($node->created, 'custom', 'Y-m-d');
  }
}

function mdwa01_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav navbar-right">' .$variables['tree'] . '</ul>';
}

function mdwa01_breadcrumb(&$variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    array_unshift($breadcrumb, l(t('Home'), '<front>'));
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb"><i class="glyphicon glyphicon-home">&nbsp;</i>' . implode(' » ', $breadcrumb) . '</div>';
    return $output;
  }
}

function mdwa01_feed_icon($variables) {
  $text = t('Subscribe to !feed-title', array('!feed-title' => $variables ['title']));
  $icon = '<i class="fa fa-rss"></i>';
  return l($icon, $variables ['url'], array('html' => TRUE, 'attributes' => array('class' => array('feed-icon'), 'title' => $text)));
}

/**
 * Campos
 */
function Xmdwa01_preprocess_field(&$variables) {
    if($variables['element']['#field_name'] == 'field_noticia_foto'){
        foreach($variables['items'] as $key => $item){
            $variables['items'][ $key ]['#item']['attributes']['class'][] = 'img-responsive'; // http://getbootstrap.com/css/#overview-responsive-images
        }
    }
}

/**
 * Noticia: Campos
 */
function mdwa01_field__field_noticia_entradilla__noticia($variables) {
  $output = '<div class="entradilla">';
  foreach ($variables ['items'] as $delta => $item) {
    $output .= drupal_render($item);
  }
  $output .= '</div>';

  return $output;
}

function mdwa01_field__field_tags__noticia($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables ['label_hidden']) {
    $output .= '<span ' . $variables ['title_attributes'] . '>' . $variables ['label'] . '&nbsp;</span>';
  }

  // Render the items.
  $output .= '<span class="field-items"' . $variables ['content_attributes'] . '>';
  $items = array();
  foreach ($variables ['items'] as $delta => $item) {
    $items[] = drupal_render($item);
  }
  $output .= join(", ", $items) . '</span>';

  return $output;
}

function mdwa01_field__field_noticia_foto__noticia($variables) {
  $output = '<figure>';
  foreach ($variables ['items'] as $delta => $item) {
    $output .= drupal_render($item);
    $output .= '<figcaption>' . $item['#item']['title'] . '</figcaption>';
  }
  $output .= '</figure>';
  return $output;
}

/**
 * Blog: Campos
 */
function mdwa01_field__field_tags__blog($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables ['label_hidden']) {
    $output .= '<span ' . $variables ['title_attributes'] . '>' . $variables ['label'] . '&nbsp;</span>';
  }

  // Render the items.
  $output .= '<span class="field-items"' . $variables ['content_attributes'] . '>';
  $items = array();
  foreach ($variables ['items'] as $delta => $item) {
    $items[] = drupal_render($item);
  }
  $output .= join(", ", $items) . '</span>';

  return $output;
}

/**
 * Image Styles
 */
function Xmdwa01_image_style($variables) {
  if ($variables ['style_name'] == 'rectangular_2x1') {
    unset($variables ['width']);
    unset($variables ['height']);
    $variables ['path'] = image_style_url($variables ['style_name'], $variables ['path']);
  }
  return theme('image', $variables);
}

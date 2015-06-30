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

function mdwa01_preprocess_region(&$variables) {
}

function mdwa01_preprocess_page(&$variables) {
  if (isset($variables['node'])) {
    $node = $variables['node'];

    // Banner de página
    /*if ($node->type == 'pagina') {
      $output = '<figure>';
      $banner = field_get_items('node',$node, 'field_pagina_banner');
      foreach ($banner as $delta => $item) {
        $uri = $item['uri'];
        $src = image_style_url('panorama', $uri);
        $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
      }
      $output .= '</figure>';
      $variables['banner'] = $output;
    }*/

    // Banner para Buzón de sugerencias
    /*if ($node->type == 'webform') {
      $menu = menu_get_active_trail();
      if ($menu[1]['link_title'] = t('Customer Service')) {
        $parent_chunks = explode('/', $menu[1]['link_path']); 
        $parent_node = node_load($parent_chunks[1]);
        $banner = field_get_items('node', $parent_node, 'field_pagina_banner');
        $output = '<figure>';
        foreach ($banner as $delta => $item) {
          $uri = $item['uri'];
          $src = image_style_url('panorama', $uri);
          $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
        }
        $output .= '</figure>';
        $variables['banner'] = $output;
      }
    }*/

    // Título de página para noticias y blog, y banner
    /*if ($node->type == 'noticia' || $node->type == 'blog') {
      $variables['section_title'] = t('News');

      $menu = menu_get_active_trail();
      if ($menu[1]['link_title'] = t('News')) {
        $parent_chunks = explode('/', $menu[1]['link_path']); 
        $parent_node = node_load($parent_chunks[1]);
        $banner = field_get_items('node', $parent_node, 'field_pagina_banner');
        $output = '<figure>';
        foreach ($banner as $delta => $item) {
          $uri = $item['uri'];
          $src = image_style_url('panorama', $uri);
          $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
        }
        $output .= '</figure>';
        $variables['banner'] = $output;
      }
    }*/

    // Node type suggestions
    $variables['theme_hook_suggestions'][] = 'page__' . $node->type;
  }

  // Banners
  $menu = menu_get_active_trail();
  if (count($menu) > 1) {
    $parent_chunks = explode('/', $menu[1]['link_path']); 
    if ($parent_node = node_load(end($parent_chunks))) {
      $banner = field_get_items('node', $parent_node, 'field_pagina_banner');
      $output = '<figure>';
      foreach ($banner as $delta => $item) {
        $uri = $item['uri'];
        $src = image_style_url('panorama', $uri);
        $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
      }
      $output .= '</figure>';
      $variables['banner'] = $output;
    }
  }

  // Contact Banner
  if ($variables['theme_hook_suggestions'][0] == 'page__contact') {
    $output = '<figure>';
    $uri = 'public://default_images/Panorama_Donostia_Kontxako.jpg';
    $src = image_style_url('panorama', $uri);
    $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
    $output .= '</figure>';
    $variables['banner'] = $output;
  }

  // Default banner for página
  //if ($node->type == 'pagina' && $node->field_pagina_banner == null) {
  if (!isset($variables['banner'])) {
    $output = '<figure>';
    $uri = 'public://default_images/Panorama_Donostia_Kontxako.jpg';
    $src = image_style_url('panorama', $uri);
    $output .= '<img src="' . $src . '" class="banner" typeof="foaf:Image">';
    $output .= '</figure>';
    $variables['banner'] = $output;
  }

  // Vocabulary page suggestions
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    $variables['theme_hook_suggestions'][] = 'page__vocabulary__' . $term->vocabulary_machine_name;
    if ($term->vocabulary_machine_name == 'tags') {
      $variables['section_title'] = t('News');
    }
  }

  // Check for two columns page
  $active_trail = menu_get_active_trail();
  $two_columns_pages = array('Actualidad', 'Noticias', 'News', 'Contact');
  if (count($active_trail) > 1) {
    $variables['two_columns'] = in_array($active_trail[1]['link_title'], $two_columns_pages);
  }

  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main_menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
}

function mdwa01_process_page(&$variables) {
}

function mdwa01_preprocess_node(&$variables) {
  $node = $variables ['node'];
  if (($node->type == 'noticia' || $node->type == 'blog') && $variables ['display_submitted']) {
    $variables ['submitted'] = format_date($node->created, 'medio_sin_hora');
    $variables ['datetime']  = format_date($node->created, 'custom', 'Y-m-d');
  }
  if ($node->type == 'pagina' && isset($variables['content']['body'])) {
    // Inserto atributo typeof a la imágenes del body insertadas por el usuario.
    $body = $variables['content']['body'][0]['#markup'];
    $variables['content']['body'][0]['#markup'] = str_replace('img ', 'img typeof="foaf:Image "', $body);
  }
}

function mdwa01_preprocess_block(&$variables) {
  if ($variables['block']->region == 'footer_columns') {
    $variables['classes_array'][] = 'col-md-3';
  }
  if ($variables['block']->region == 'ibex35') {
    $variables['classes_array'][] = 'col-xs-12 col-sm-8 col-sm-offset-2';
  }
  if ($variables['block']->region == 'actualidad') {
    $variables['classes_array'][] = 'col-sm-6';
  }
}

function mdwa01_preprocess_webform_form(&$variables) {
  //dpm($variables);
  $variables['theme_hook_suggestions'][] = 'webform_form_' . $variables['nid'];
}

function mdwa01_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav navbar-right">' .$variables['tree'] . '</ul>';
}

function mdwa01_breadcrumb(&$variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    if (preg_match("(Inicio|Home)", $breadcrumb[0])) {
      array_shift($breadcrumb);
    }
    // El breadcrumb del formulario de contacto lo muestra siempre en castellano.
    // Aquí lo traduzco.
    $contact = array("Contact", "Contacto");
    if (in_array(drupal_get_title(), $contact)) {
      array_unshift($breadcrumb, l(t('Contact'), 'contact'));
    }
    $home = '<i class="glyphicon glyphicon-home">&nbsp;</i>' . t('Home');
    array_unshift($breadcrumb, l($home, '<front>', array('html' => TRUE)));
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
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
        foreach($variables['items'] as $key => $item){
            $variables['items'][ $key ]['#item']['attributes']['class'][] = 'img-responsive'; // http://getbootstrap.com/css/#overview-responsive-images
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
 * Equipo: Campos
 */
function mdwa01_field__field_foto__equipo($variables) {
  $output = '<figure>';
  foreach ($variables ['items'] as $delta => $item) {
    /*$variables['classes_array'][] = 'img-responsive';
    dpm($variables);
    unset($item ['#item']['width']);
    unset($item ['#item']['height']);
    $output .= drupal_render($item);*/
    $uri = $item['#item']['uri'];
    $src = image_style_url('large', $uri);
    $output .= '<img src="' . $src . '" class="img-responsive" typeof="foaf:Image">';
  }
  $output .= '</figure>';
  return $output;
}

/**
 * Página: Campos
 */
function mdwa01_field__field_pagina_banner__pagina($variables) {
  $output = '<figure>';
  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item['#item']['uri'];
    $src = image_style_url('large', $uri);
    $output .= '<img src="' . $src . '" class="img-responsive" typeof="foaf:Image">';
  }
  $output .= '</figure>';
  return $output;
}

/**
 * Equipo: Campos
 */
function mdwa01_field__field_equipo_social_links__equipo($variables) {
  $output = '<ul class="social-links list-inline">';
  foreach ($variables ['items'] as $delta => $item) {
    $output .= '<li><a href="' . $item['#element']['url'] . '"';
    foreach ($item['#element']['attributes'] as $id => $att) {
      $output .= ' ' . $id . '="' . $att . '"';
    }
    $output .= '><span class="text-hide">' . $item['#element']['title'] . '</span></a></li>';
  }
  $output .= '</ul>';
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

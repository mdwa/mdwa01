<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div id="posts"
     class="js-masonry"
     data-masonry-options='{
          "columnWidth": 5,
          "gutter": 0,
          "itemSelector": ".post"}'>
<?php foreach ($rows as $id => $row): ?>
<?php 
//dpm ($variables['view']->result[$id]);
$node = node_load($variables['view']->result[$id]->nid);
//$classes_array[$id] = ($node->type == 'noticia') ? "col-sm-12" : "col-sm-6";
$classes_array[$id] = "post col-sm-6";
?>
  <div <?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>



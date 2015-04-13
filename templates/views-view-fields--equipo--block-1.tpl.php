<?php
//dpm($variables);
//dpm($row);
?>
<article class="equipo col-xs-12">
<?php
  if($row->field_field_foto):
    $uri = $row->field_field_foto[0]['raw']['uri'];
    $src = image_style_url('large', $uri);
?>
  <div class="col-xs-6 col-sm-4 col-md-2">
    <img src="<?php print $src; ?>" class="img-responsive" typeof="foaf:Image">
  </div>
  <div class="col-xs-6 col-sm-8 col-md-10">
    <h1><?php print render($row->node_title); ?></h1>
    <p><?php print $variables['fields']['body']->content; ?></p>
  </div>
<?php endif; ?>
</article>

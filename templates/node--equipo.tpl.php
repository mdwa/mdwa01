<?php if($teaser): ?>
<article id="node-<?php print $node->nid; ?>" class="equipo teaser">
  <div class="col-xs-12 col-sm-8 col-sm-offset-4 col-md-10 col-md-offset-2">
    <header>
      <h1>
        <?php print render($title_prefix); ?>
        <?php print $title; ?>
        <?php print render($title_sufix); ?>
      </h1>
    </header>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-2">
    <?php print render($content['field_foto']); ?>
  </div>
  <div class="col-xs-12 col-sm-8 col-md-10">
    <?php hide($content['links']); ?>
    <?php print render($content); ?>
  </div>
</article>
<?php endif; ?>

<?php if($view_mode == "full"): ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> equipo"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
<?php endif; ?>

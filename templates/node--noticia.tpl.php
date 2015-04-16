<?php if ($teaser): ?>
  <article id="node-<?php print $node->nid; ?>" class="noticia teaser">
  <header>
    <h1>
      <?php print render($title_prefix); ?>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
      <?php print render($title_sufix); ?>
    </h1>
    <?php print render($content['field_noticia_entradilla']); ?>
  </header>
  <?php print render($content['field_noticia_foto']); ?>
  <?php print render($content['body']); ?>
  <div class="text-right"><?php print render($content['links']); ?></div>
</article>
<?php endif; ?>


<?php if ($view_mode == "full"): ?>
<article id="node-<?php print $node->nid; ?>" class="noticia full">
  <header>
    <h1>
      <?php print render($title_prefix); ?>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
      <?php print render($title_sufix); ?>
    </h1>
    <?php print render($content['field_noticia_entradilla']); ?>
    <p class="noticia-meta">
    <?php if ($display_submitted): ?>
      <time datetime="<?php print $variables['datetime']; ?>" class="submitted">
       <?php print $submitted; ?>
      </time>
    <?php endif; ?>
    <span> | </span><?php print render($content['field_tags']); ?>
    </p>
  </header>
  <?php hide($content ['sharethis']); ?>
  <?php print render($content); ?>
  <?php print render($content ['sharethis']); ?>
</article>
<?php endif; ?>

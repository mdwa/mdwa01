<?php if ($teaser): ?>
  <article id="node-<?php print $node->nid; ?>" class="faq teaser"<?php print $attributes; ?>>
    <header>
      <?php print render($title_prefix); ?>
      <h1>
        <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
        <?php print render($title_sufix); ?>
      </h1>
    </header>
    <?php print render($content); ?>
  </article>
<?php endif; ?>

<?php if ($view_mode == "full"): ?>
  <article id="node-<?php print $node->nid; ?>" class="faq full panel panel-default">
    <header class="panel-heading" id="heading-faq-<?php print $node->nid; ?>">
      <h1 class="panel-title">
        <a data-toggle="collapse" data-parent="#faq-accordion" href="#faq-<?php print $node->nid; ?>" aria-expanded="true" aria-controls="faq-<?php print $node->nid; ?>">
          <?php print render($title_prefix); ?>
          <?php print $title; ?>
          <?php print render($title_suffix); ?>
        </a>
      </h1>
    </header>
    <div id="faq-<?php print $node->nid; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php print $node->nid; ?>">
      <div class="panel-body">
        <?php hide($content['field_faq_etiquetas']); ?>
        <?php print render($content); ?>
      </div>
    </div>
  </article>
<?php endif; ?>

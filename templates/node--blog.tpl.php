<?php if ($teaser): ?>
  <article id="node-<?php print $node->nid; ?>" class="blog teaser"<?php print $attributes; ?>>
    <header>
      <?php print render($title_prefix); ?>
      <h1>
        <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
        <?php print render($title_sufix); ?>
      </h1>
      <?php if ($display_submitted): ?>
      <p class="blog-meta">
        <?php print t('by'); ?> <span class="author" rel="author"><?php print $name; ?></span>&mdash;<time datetime="<?php print $variables['datetime']; ?>" class="submitted"><?php print $submitted; ?></time></span>
        <br/>
        <?php print render($content['field_tags']); ?>
      </p>
      <?php endif; ?>
    </header>
    <?php print render($content['body']); ?>
    <div class="text-right"><?php print render($content['links']); ?></div>
  </article>
<?php endif; ?>

<?php if ($view_mode == "full"): ?>
  <article id="node-<?php print $node->nid; ?>" class="blog full">
    <header>
      <h1>
        <?php print render($title_prefix); ?>
        <?php print $title; ?>
        <?php print render($title_suffix); ?>
      </h1>
      <?php if ($display_submitted): ?>
      <p class="blog-meta">
        <?php print t('by'); ?> <span class="author" rel="author"><?php print $name; ?></span>&mdash;<time datetime="<?php print $variables['datetime']; ?>" class="submitted"><?php print $submitted; ?></time>
        <br/>
        <?php print render($content['field_tags']); ?>
      </p>
      <?php endif; ?>
    </header>
    <?php hide($content['links']); ?>
    <?php print render($content); ?>
    <?php print render($content['links']); ?>
  </article>
<?php endif; ?>

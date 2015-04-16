<?php if ($teaser): ?>
<article id="node-<?php print $node->nid; ?>" class="blog teaser"<?php print $attributes; ?>>
  <header>
    <h1>
      <?php print render($title_prefix); ?>
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
  <?php hide($content['sharethis']); ?>
  <?php print render($content['body']); ?>
  <div class="text-right"><?php print render($content['links']); ?></div>
</article>
<?php endif; ?>

<?php if ($view_mode == "full"): ?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> blog"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php else: ?>
    <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
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

</article>
<?php endif; ?>

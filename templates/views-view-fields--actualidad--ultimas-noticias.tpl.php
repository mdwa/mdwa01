<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<article class="teaser">
<header>
<span class="entradilla"><?php print $variables['fields']['field_noticia_entradilla']->content; ?></span>
<h1><?php print $variables['fields']['title']->content; ?></h1>
<p class="noticia-meta">
<time datetime="<?php print date("c", $row->node_created); ?>"><?php print format_date($row->node_created,"medio_sin_hora"); ?></time></span>
<br/>
<span><?php print t('Published in');?> <?php print $variables['fields']['field_tags']->content; ?>
</p>
</header>
<?php print $variables['fields']['field_noticia_foto']->content; ?>
<?php print $variables['fields']['body']->content; ?>
</article>

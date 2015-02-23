<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>


<!-- Navigation -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="#page-top">
        <img src="<?php print $logo; ?>" alt="MD Wealth Advisors">
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php print render($primary_nav); ?>
      </div>
      <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>   

<header>
<?php print render($page['header']); ?>
<?php if ($page['featured']): ?>
  <section id="featured">
    <?php print render($page['featured']); ?>
  </section> <!-- /.section, /#featured -->
<?php endif; ?>
</header>


<?php if ($messages): ?>
  <div id="messages"><div class="section clearfix">
    <?php print $messages; ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['highlighted']): ?>
  <div id="highlighted">
    <?php print render($page['highlighted']); ?>
  </div>
<?php endif; ?>

<?php if ($page['before_content']): ?>
  <div id="before-content">
    <?php print render($page['before_content']); ?>
  </div>
<?php endif; ?>

<main class="front">
  <article id="content">
    <a id="main-content"></a>

    <?php if ($breadcrumb): ?>
    <div class="container">
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    </div>
    <?php endif; ?>

    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
    <?php endif; ?>

    <?php print render($page['content']); ?>

    <?php print $feed_icons; ?>

  </article> <!-- /.section, /#content -->
</main> <!-- /#main, /#main-wrapper -->

<?php if ($page['after_content']): ?>
  <div id="after_content">
    <?php print render($page['after_content']); ?>
  </div>
<?php endif; ?>


<?php if ($page['after_content_2'] || $page['after_content_3']): ?>
  <aside id="after_content_container">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <?php print render($page['after_content_2']); ?>
        </div>

        <div class="col-md-6">
          <?php print render($page['after_content_3']); ?>
        </div>

      </div>
    </div>
  </aside>
<?php endif; ?>

<?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
<aside id="triptych">
  <div class="container">
    <div class="row">

      <div class="col-md-4">
        <?php print render($page['triptych_first']); ?>
      </div>

      <div class="col-md-4">
        <?php print render($page['triptych_middle']); ?>
      </div>

      <div class="col-md-4">
        <?php print render($page['triptych_last']); ?>
      </div>

    </div><!-- /#end-row -->
  </div>
</aside> <!-- /#triptych, /#triptych-wrapper -->
<?php endif; ?>

<footer>
  <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div id="footer-columns" class="container">

      <div class="col-md-3">
        <?php print render($page['footer_firstcolumn']); ?>
      </div>

      <div class="col-md-3">
        <?php print render($page['footer_secondcolumn']); ?>
      </div>

      <div class="col-md-3">
        <?php print render($page['footer_thirdcolumn']); ?>
      </div>

      <div class="col-md-3">
        <?php print render($page['footer_fourthcolumn']); ?>
      </div>

    </div> <!-- /#footer-columns -->
  <?php endif; ?>

  <?php if ($page['footer']): ?>
    <div id="footer" class="container-fluid">
      <?php print render($page['footer']); ?>
    </div>
  <?php endif; ?>
</footer> <!-- /#footer -->

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
        <a class="navbar-brand page-scroll" href="<?php print base_path(); ?>">
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
  <h1 id="page-title">Blog</h1>
</header>

<?php if ($messages): ?>
  <div id="messages"><div class="section clearfix">
    <?php print $messages; ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<main>
  <article id="content">
    <?php if ($breadcrumb): ?>
    <div class="container">
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    </div>
    <?php endif; ?>

    <div class="container content">
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <div class="row">
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        </div>
      <?php endif; ?>
      <div class="row">
        <?php if ($page['sidebar_first']): ?>
          <div id="sidebar_first" class="col-md-3">
            <?php print render($page['sidebar_first']); ?>
          </div>
        <?php endif; ?>

        <?php
          $class = FALSE;
          if ($page['sidebar_first'] && $page['sidebar_second']) {
            $class = ' class="col-md-6"';
          } elseif ($page['sidebar_first'] || $page['sidebar_second']) {
            $class = ' class="col-md-9"';
          }
        ?>
        <div<?php if ($class) print $class; ?>>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>


          <?php print render($page['content']); ?>
        </div>

        <?php if ($page['sidebar_second']): ?>
          <div id="sidebar_second" class="col-md-3">
            <?php print render($page['sidebar_second']); ?>
          </div>
        <?php endif; ?>

        <?php print $feed_icons; ?>
      </div>
    </div>

  </article> <!-- /.section, /#content -->
</main> <!-- /#main, /#main-wrapper -->

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
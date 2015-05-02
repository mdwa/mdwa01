<!-- Contact info -->
<?php if ($page['header_info']): ?>
  <section id="header-info">
    <div class="container-fluid">
     <?php print render($page['header_info']); ?>
    </div>
  </section>
<?php endif; ?>

<!-- Navigation -->
<nav class="navbar navbar-default">
  <div class="container">
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

<!-- Main content -->
<main>
  <article id="content" class="pagina">
    <header>
    <?php if ($banner) print $banner; ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print render($title_prefix); ?>
          <i class="glyphicon glyphicon-chevron-left"></i>
          <?php if (isset($section_title) && !empty($section_title)) print $section_title; else print $title; ?>
          <i class="glyphicon glyphicon-chevron-right"></i>
          <?php print render($title_suffix); ?>
        </h1>
      <?php endif; ?>
    </header>

    <?php if ($messages): ?>
      <aside id="messages">
        <div class="container">
         <?php print $messages; ?>
        </div>
      </aside> 
    <?php endif; ?>

    <?php if ($tabs): ?>
      <div class="tabs container">
        <?php print render($tabs); ?>
      </div>
    <?php endif; ?>

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
        <div id="main-content" class="<?php ($variables['two_columns']) ? print 'col-md-9' : print 'col-xs-12'; ?>">
          <?php if (!in_array($variables['title'], array('Actualidad','News'))): ?> 
          <?php print render($page['content']); ?>
          <?php endif; ?>
          <?php if ($page['after_content']): ?>
            <?php print render($page['after_content']); ?>
          <?php endif; ?>
        </div>
        <?php if ($page['related_content']): ?>
          <div id="related_content" class="<?php ($variables['two_columns']) ? print 'col-md-3' : print 'col-xs-12'; ?>">
            <?php print render($page['related_content']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  </article> <!-- /.section, /#content -->
</main> <!-- /#main, /#main-wrapper -->

<footer>
  <?php if ($page['footer_columns']): ?>
    <section id="footer-columns">
      <div class="container">
        <?php print render($page['footer_columns']); ?>
      </div>
    </section> <!-- /#footer-columns -->
  <?php endif; ?>

  <?php if ($page['legal']): ?>
    <section id="legal">
      <div class="container">
        <?php print render($page['legal']); ?>
      </div>
    </section>
  <?php endif; ?>
</footer> <!-- /#footer -->

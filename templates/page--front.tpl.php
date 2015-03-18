<!-- Contact info -->
<?php if ($page['header']): ?>
  <section id="top-info">
    <?php print render($page['header']); ?>
  </section>
<?php endif; ?>

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

<?php if ($page['slider']): ?>
  <?php print render($page['slider']); ?>
<?php endif; ?>

<?php if ($messages): ?>
  <div id="messages">
    <div class="section clearfix">
      <?php print $messages; ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['before_content']): ?>
  <div id="before-content">
    <?php print render($page['before_content']); ?>
  </div>
<?php endif; ?>

<?php if ($page['after_content']): ?>
  <div id="after_content">
    <?php print render($page['after_content']); ?>
  </div>
<?php endif; ?>

<!-- Separador -->
<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" id="bigTriangleColor">
  <path d="M0 0 L50 100 L100 0 Z"/>
</svg>

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
    <div id="footer" class="container">
      <?php print render($page['footer']); ?>
    </div>
  <?php endif; ?>
</footer> <!-- /#footer -->

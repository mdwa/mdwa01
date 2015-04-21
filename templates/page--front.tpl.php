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

<!-- Slider -->
<?php if ($page['slider']): ?>
  <section id="slider">
    <div class="container-fluid">
      <?php print render($page['slider']); ?>
    </div>
  </section>
<?php endif; ?>

<!-- Mensajes -->
<?php if ($messages): ?>
  <section id="messages">
    <div class="container">
      <?php print $messages; ?>
    </div>
  </section> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['featured']): ?>
  <section id="featured">
    <div class="container">
    <?php print render($page['featured']); ?>
    </div>
  </section>
<?php endif; ?> <!-- /#featured -->

<!-- Separador -->
<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" id="bigTriangleColor">
  <path d="M0 0 L50 100 L100 0 Z"/>
</svg>

<?php if ($page['actualidad']): ?>
  <section id="actualidad">
    <div class="container">
      <?php print render($page['actualidad']); ?>
    </div>
  </section>
<?php endif; ?> <!-- /#actualidad -->

<?php if ($page['ibex35']): ?>
  <section id="ibex35">
    <div class="container">
      <?php print render($page['ibex35']); ?>
    </div>
  </section>
<?php endif; ?> <!-- /#ibex35 -->

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

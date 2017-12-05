<?php
use Roots\Sage\Extras;
?>

<footer class="content-info">
  <div class="container-fluid">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 footer-sign-off">
        <?php echo Extras\getOption('footer-sign-off') ?>
      </div>
    </div>
  </div>
</footer>

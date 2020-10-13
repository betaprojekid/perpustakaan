<?php
include_once 'partials/header.php';
include_once 'partials/navbar.php';
include_once 'partials/sidebar.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php
      include_once 'partials/content_header.php';
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <?php
            include "open_pages.php";
          ?>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

<?php
include_once 'partials/footer.php';
?>
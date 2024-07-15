<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header.php") ?>
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
       test
      </div>
    </div>
    <?php 
        $this->load->view("v_pengaturan/v_modalTambahRuangan");
        $this->load->view("_partials/footer.php");
    ?>
  </body>
</html>

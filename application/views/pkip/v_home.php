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
          <?php
            foreach($list_pengumuman as $row){ ?>
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-bullhorn"></i>
                <?= $row['judul'] ?>
              </div>
              <div class="card-body">
                <?= $row['pengumuman'] ?>
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
              </div>
              <div class="card-footer small text-muted">Updated <?= $row['tgl_dibuat'] ?></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PENJADWALAN DOSEN LUAR BIASA</title>
  <?php $this->load->view("_partials/header.php") ?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
  <?php $this->load->view("_partials/js.php") ?>
  <?php $this->load->view("_partials/navbar.php", $this->data) ?>
  <div id="wrapper">
    <?php $this->load->view("_partials/sidebar.php") ?>
    <div id="content-wrapper">
      <div class="container-fluid">
          <!-- <div class="page-header">
              <center><h2 class="entry-title">Telkom University Course Scheduling System</h2></center>
          </div><br>
          <div class="entry-body">
              <h4>Telkom University Course Scheduling System atau TEL-U CUSS adalah sebuah aplikasi 
              berbasis website yang bertujuan untuk ... .</h4>
          </div><br> -->
          <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <center><h3 class="entry-title">Telkom University</h3></center>
                  </div>
                  <div class="card-body" align="justify">
                  <h5></h5>
                  </div>
                </div>
              </div>
            </div>
          <?php
            foreach($list_pengumuman as $row)
            { ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <!--<div class="card-header">
                    <i class="fas fa-bullhorn"></i>
                    <?= $row['judul'] ?>
                  </div>-->
                  <!--<div class="card-body" align="justify">
                    <?= $row['pengumuman'] ?>
                    <?php 
                      if (!empty($row['file'])) { ?>
                        <hr>-->
                        <!--<a href="<?php print base_url('/assets/documents/pengumuman/'.$row['file']) ?>" target="blank  ">
                          <i class="fas fa-file-download"></i>
                          <?= $row['file'] ?>
                        </a>-->
                        <?php
                      }
                    ?>
                  </div>
                  <!--<div class="card-footer small text-muted">Updated <?= $row['tgl_dibuat'] ?></div>-->
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <?php $this->load->view("_partials/footer.php") ?>
</body>



</html>
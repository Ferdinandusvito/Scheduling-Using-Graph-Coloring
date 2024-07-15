<!DOCTYPE html>
<html lang="en">

  <head>
    <title>TA Mahasiswa - Dashboard</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar.php") ?>
    

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              JADWAL SIDANG
            </div>
            <div class="card card-default">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center align-middle" rowspan="2">NO</th>
                    <th class="text-center align-middle" rowspan="2">TOPIK</th>
                    <th class="text-center" colspan="2">PEMBIMBING</th>
                    <th class="text-center" colspan="3">PENGUJI</th>
                    <th class="text-center align-middle" rowspan="2">NAMA</th>
                    <th class="text-center align-middle" rowspan="2">JUDUL</th>
                    <th class="text-center align-middle" rowspan="2">TANGGAL</th>
                    <th class="text-center align-middle" rowspan="2">SHIFT</th>
                    <th class="text-center align-middle" rowspan="2">RUANGAN</th>
                                  </tr>
                                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">3</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;  
                    
                    foreach($data_list_group as $row){ 
                        $count_rows = count($data_list[$row['idta']]);
                      ?>
                    <tr>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $no ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['topik'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pbb1'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pbb2'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pgj1'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pgj2'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pgj3'] ?></td>

                  <?php
                    foreach ($data_list[$row['idta']] as $key => $value) {
                      ?>
                      <td class="align-middle"><?= $value['nama_awal'] ?></td>
                      <td class="align-middle"><?= $value['judul'] ?></td>
                      <td class="align-middle"><?= $value['tanggal_sidang'] ?></td>
                      <td class="align-middle"><?= $value['shift'] ?></td>
                      <td class="align-middle"><?= $value['nama_ruangan'] ?></td>
                      </tr>                 
                  <?php
                    }
                  ?>
                  <?php $no++; } ?>
                </tbody>
              </table>
              </div>
            </div>
        </div>
      </div>
      <?php if( $this->session->flashdata('flash') ) : ?>
      <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="flash">
                Kelompok Mahasiswa <strong> - </strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </button>
            </div>
        </div>
      </div>
      <?php endif; ?>
      <?php if( $this->session->flashdata('flashy') ) : ?>
      <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="flashy">
                Kelompok Mahasiswa <strong> - </strong><?= $this->session->flashdata('flashy'); ?>
                <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      </div>
      <?php endif; ?>
</div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
      <!-- /.content-wrapper -->
    
  </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/mahasiswa/logout"   >Logout</a>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
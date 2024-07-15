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
              Daftar Dosen Penguji
            </div>
            <div class="card card-default">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center align-middle" rowspan="2">NO</th>
                    <th class="text-center align-middle" rowspan="2">Tanggal</th>
                    <th class="text-center align-middle" rowspan="2">DOSEN</th>
                    <th class="text-center" colspan="4">SHIFT</th>
                                  </tr>
                                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">3</td>
                    <td class="text-center">4</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    // var_dump($data_real);exit;
                    // $count = array_count_values($data_real);
                    
                    foreach($daftarpenguji as $row){ 
                        $count_rows = count($daftarpenguji[$row['id_pekansidang']]);
                      // var_dump($count_rows);exit;
                      ?>
                    <tr>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $no ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['tanggal'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['kode_dosen'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['shift1'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['shift2'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['shift3'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['shift4'] ?></td>

                  <?php $no++; } ?>
                </tbody>
              </table>
              </div>
            </div>
            <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
        </div>
      </div>
        <!-- /.container-fluid -->
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
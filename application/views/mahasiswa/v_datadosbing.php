<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
              Daftar Judul Tugas Akhir</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      
                 <thead>
      <tr>
        <th>No</th>
        <th>Nip</th>
        <th>Nidn</th>
        <th>Nama</th>
        <th>Kode Dosen</th>
        <th>Jenis Pembimbing</th>
        <th>Email</th>
        <th>Telp</th>
        <th>Kuota</th>
      </tr>
    </thead>
    <tbody>
      <!-- ISI DATA AKAN MUNCUL DISINI -->
      <?php
      $no = 1; //untuk menampilkan no
      foreach($list_datadosbing as $row){
        echo "
        <tr>
          <td>$no</td>
          <td>$row[nip]</td>
          <td>$row[nidn]</td>
          <td>$row[nama_awal] $row[nama_akhir]</td>
          <td>$row[kode_dosen]</td>
          <td>$row[pembimbing]</td>
          <td>$row[email]</td>
          <td>0$row[telp]</td>
          <td>$row[kuota]</td>
        </tr>
        ";
        $no++;
      }
      ?>
      
    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
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

    <?php $this->load->view("_partials/js.php") ?>

  </body>

</html>

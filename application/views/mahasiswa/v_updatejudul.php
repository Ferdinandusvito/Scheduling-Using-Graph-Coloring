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
              Daftar Judul Tugas Akhir</div>
            <div class="card-body">
              <div class="table-responsive">
                
  <div class="container">
    <h1>Booking Topik</h1>
    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Topik
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="<?= $detail_topik['topik'] ?>" disabled>
          <input type="hidden" name="topik" value="<?= $detail_topik['topik'] ?>" >
        </div>
      </div>


<div class="form-group">
        <label class="control-label col-sm-2">
          IDTA
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $detail_topik['idta'] ?>" disabled> 
          <input type="hidden" name="idta" value="<?= $detail_topik['idta'] ?>" >
          <input type="hidden" name="nip" value="<?= $detail_topik['nip'] ?>" >
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2">
          Bidang
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $detail_topik['nama_bidang'] ?>" disabled> 
          <input type="hidden" name="id_bidang" value="<?= $detail_topik['id_bidang'] ?>" >
        </div>
      </div>


      <!--<div class="form-group">
        <label class="control-label col-sm-2">
          Bidang
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="bidang" value="<?=isset($default['bidang'])? $default['bidang'] : ""?>">
        </div>
      </div>-->
      <div class="form-group">
        <label class="control-label col-sm-2">
          Requirement         
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $detail_topik['requirement'] ?>" disabled>
          <input type="hidden" name="requirement" value="<?= $detail_topik['requirement'] ?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Penerbit         
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $detail_topik['nama_awal'] ?> <?= $detail_topik['nama_akhir'] ?> (<?= $detail_topik['pembimbing'] ?>)" disabled>
          <input type="hidden" name="pbb1" value="<?= $detail_topik['nip'] ?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 1      
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $detail_topik['kode1'] ?>" disabled>
          <input type="hidden" name="pbb1" value="<?= $detail_topik['pbb1'] ?>" >
          <br>
          Pembimbing 2 
          <input type="text" class="form-control"  value="<?= $detail_topik['kode2'] ?>" disabled>
          <input type="hidden" name="pbb2" value="<?= $detail_topik['pbb2'] ?>" >
        </div>
      </div>      
      <div class="form-group">
        <label class="control-label col-sm-2">
          Keterangan        
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  value="<?= $detail_topik['keterangan'] ?>" disabled>
          <input type="hidden" name="keterangan" value="<?= $detail_topik['keterangan'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Kuota        
        </label>
        <div class="col-sm-2">
          <input type="text" class="form-control" value="<?= $detail_topik['kuotatopik'] ?>" disabled>
          <input type="hidden" name="kuotatopik" value="<?= $detail_topik['kuotatopik'] ?>">
          <input type="hidden" name="id_status" value="6">
          <input type="hidden" name="nim" value="<?= $this->session->userdata('nim') ?>">
          <input type="hidden" name="nama_awal" value="<?= $this->session->userdata('nama_awal') ?>">
          <input type="hidden" name="nama_akhir" value="<?= $this->session->userdata('nama_akhir') ?>">
          <input type="hidden" name="email" value="<?= $this->session->userdata('email') ?>">
        </div>
      </div>
      <center>
        <button name="tombol_submit" class="btn btn-primary">
          Book
        </button>
      </center>


    </form>
</div>

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

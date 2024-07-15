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
    <h1>Bimbingan</h1>
    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-10">
          Tanggal 
          <br><font size="1">*Pengisian Tanggal Bimbingan Hanya Bisa di Inputkan Satu Minggu Sebelum Tanggal Pengisian</font>
        </label>
        <div class="col-sm-3">
          <input type="date" name="tanggal" class="form-control" value="">
        </div>
      </div>

<div class="form-group">
        <label class="control-label col-sm-2">
          Topik
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="<?=$list_judul['topik']?>" disabled>
          <input type="hidden" name="idta" value="<?=$list_judul['idta']?>">
          <input type="hidden" name="nim" value="<?= $this->session->userdata('nim') ?>">
        </div>
      </div>

<div class="form-group">
        <label class="control-label col-sm-2">
          Catatan
        </label>
        <div class="col-sm-4">
          <textarea type="text" name="catatan" id="catatan" style="width:600px" value=""></textarea>
        </div>
      </div>

        <div class="form-group">
        <label class="control-label col-sm-2">
        Pembimbing
        </label>
        <div class="col-sm-4">
        <select name="nip" style="width:150px">
        <?php
                    foreach($list_pembimbing as $row){ ?>
        <option value="<?=$row['pbb1']?>"><?=$row['pbb1']?></option>
        <option value="<?=$row['pbb2']?>"><?=$row['pbb2']?></option>
        <?php }
                        ?>          
        </select>
        </div>
        </div>

      <center>
        <button name="tombol_submit" class="btn btn-primary">
          ADD
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

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
              Daftar Topik Tugas Akhir</div>
            <div class="card-body">
              <div class="table-responsive">
                
  <div class="container">
    <h1> Masukan Judul Tugas Akhir</h1>


    <form method="post" class="form-horizontal">
      <div class="form-group">       
        <label class="control-label col-sm-2">
          Nim
        </label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  value="<?= $this->session->userdata('nim') ?>" disabled> 
          <input type="hidden" name="nim" value="<?= $this->session->userdata('nim') ?>" >
        </div>
      </div>
      <div class="form-group">       
        <label class="control-label col-sm-2">
          Nama
        </label>
        <div class="col-sm-6">
          <input type="text" class="form-control"  value="<?= $this->session->userdata('nama_awal') ?>" disabled> 
          <input type="hidden" name="nama" value="<?= $this->session->userdata('nama_awal') ?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Email        
        </label>
        <div class="col-sm-6">
          <input type="text" class="form-control"  value="<?= $this->session->userdata('email') ?>" disabled> 
          <input type="hidden" name="email" value="<?= $this->session->userdata('email') ?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Topik
        </label>
        <div class="col-sm-10">

<?php
echo "<select name='topik' id='idta'>";
if (count($t_topik)) {
    foreach ($t_topik as $list) {
        echo "<option value='". $list['topik'] . "'>" . $list['topik'] . "</option>";
    }
}
echo "</select><br/>";
?>
   <!--       <select name="bidang">
  <option input type="text" value="Rekayasa Komputer" class="form-control" >Rekayasa Komputer</option>
  <option input type="text" value="Machine Learning" class="form-control" >Machine Learning</option>
  <option input type="text" value="Artificial Intelegence" class="form-control" >Artificial Intelegence</option>
  <option input type="text" value="Hardware" class="form-control" >Hardware</option>
</select> -->
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Judul        
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="judul" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">
          Kode Dosen Pembimbing 1  
        </label>
        <div class="col-sm-10">

<?php
echo "<select name='pbb1' id='nip'>";
if (count($t_dosen)) {
    foreach ($t_dosen as $list) {
        echo "<option value='". $list['kode_dosen'] . "'>" . $list['kode_dosen'] . "</option>";
    }
}
echo "</select><br/>";
?>
   <!--       <select name="bidang">
  <option input type="text" value="Rekayasa Komputer" class="form-control" >Rekayasa Komputer</option>
  <option input type="text" value="Machine Learning" class="form-control" >Machine Learning</option>
  <option input type="text" value="Artificial Intelegence" class="form-control" >Artificial Intelegence</option>
  <option input type="text" value="Hardware" class="form-control" >Hardware</option>
</select> -->
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">
          Kode Dosen Pembimbing 2  
        </label>
        <div class="col-sm-10">

<?php
echo "<select name='pbb2' id='nip'>";
if (count($t_dosen)) {
    foreach ($t_dosen as $list) {
        echo "<option value='". $list['kode_dosen'] . "'>" . $list['kode_dosen'] . "</option>";
    }
}
echo "</select><br/>";
?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          <!--Status        -->
        </label>
        <div class="col-sm-10">
          <input type="hidden" class="form-control" name="id_status" value="6">
        </div>
      </div>
      <center>
        <button name="tombol_submit" class="btn btn-primary">
          Simpan
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

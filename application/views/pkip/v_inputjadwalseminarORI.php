<!DOCTYPE html>
<html lang="en">

  <head>

    <title>TA Mahasiswa - Dashboard</title>
    <?php $this->load->view("_partials/header.php", $this->data) ?>

  </head>
  <body id="page-top">

    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form input jadwal seminar</div>
            <div class="card-body">
              <div class="table-responsive">
                
  <div class="container">
    <h1>Terbitkan Jadwal</h1>


    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Judul
        </label>
        <div class="col-sm-4">

<select name="id_judul" class="form-control">
                            <option>- Pilih Judul Seminar -</option>
                            <?php  
                                foreach ($list_judulseminar as $row) { ?>
                                    <option value="<?=$row['id_judul'] ?>"><?= $row['judul'] ?></option>
                            <?php }
                            ?>
                        </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Bidang
        </label>
        <div class="col-sm-4">

<select list="id_bidang" class="form-control">
                            <option>- Pilih Bidang -</option>
                            <?php  
                                foreach ($list_bidang as $row) { ?>
                                    <option value="<?=$row['id_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
                            <?php }
                            ?>
                        </select>
        </div>
      </div>


<div class="form-group">
        <label class="control-label col-sm-8">
          Pengajuan Sebagai *pilih salah satu
        </label>
        <div class="col-sm-4">


<?php 
if($this->session->userdata('pembimbing') == 1 AND $this->session->userdata('kuota') !== 0)
{ ?>
  <input type="radio" name="pbb1" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 1<br>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
  <input type="radio" name="pbb1" value="0"> Hanya Topik<br>
<?php }elseif($this->session->userdata('pembimbing') == 2 AND $this->session->userdata('kuota') !== 0) 
{ ?>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
  <input type="radio" name="pbb2" value=""> Hanya Topik<br>
<?php }else 
{ ?>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
  <input type="radio" name="pbb2" value=""> Hanya Topik<br>
<?php }?>
        </div>
      </div>

<!-- BATAS FINISH JENIS PEMBIMBING-->

      <div class="form-group">
        <label class="control-label col-sm-2">
          Requirement         
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="requirement" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Penerbit Topik         
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $this->session->userdata('nama_awal') ?> <?= $this->session->userdata('nama_akhir') ?> (<?= $this->session->userdata('pembimbing') ?>)" disabled> 
          <input type="hidden" name="nip" value="<?= $this->session->userdata('nip') ?>" >       
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          PBB1        
        </label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="pbb1" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          PBB2        
        </label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="pbb2" value="">
        </div>
      </div>
      <center>
        <button name="btnSimpanTopik" class="btn btn-primary">
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
              <span>Copyright � Your Website 2018</span>
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
              <span aria-hidden="true">�</span>
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

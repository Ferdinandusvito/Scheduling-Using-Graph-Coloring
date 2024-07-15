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
    <h1>Terbitkan Topik</h1>


    <form method="post" class="form-horizontal">
      <div class="form-group">       
        <label class="control-label col-sm-2">
          Topik
        </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="topik" value="">
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Tahun
        </label>
        <div class="col-sm-4">
      <select name="tahun" class="form-control">
                <option value="">Please Select</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2019; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select>
            </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">
          Semester
        </label>
        <div class="col-sm-4">
      <select name="semester" class="form-control">
                <option>- Pilih Semester -</option>
                <option value="1">Semester Ganjil</option>
                <option value="2">Semester Genap</option>
            </select>
            </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2">
          Bidang
        </label>
        <div class="col-sm-4">

<select name="id_bidang" class="form-control">
                            <option>- Pilih Bidang -</option>
                            <?php  
                                foreach ($list_bidang as $row) { ?>
                                    <option value="<?=$row['id_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
                            <?php }
                            ?>
                        </select>
        </div>
      </div>


<!-- JENIS PEMBIMBING 
<div class="form-group">
        <label class="control-label col-sm-8">
          Pengajuan Sebagai 
          <?php 
if($this->session->userdata('kuota') > 0)
{ ?>
  *pilih salah satu

<?php }else 
{ ?>

<?php }?>
        </label>
        <div class="col-sm-4">


<select  class="form-control">
<?php 
if($this->session->userdata('kuota') > 0)
{ ?>
  <input type="radio" name="pbb1" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 1<br>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
<?php }else 
{ ?>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
<?php }?>
        </div>
      </div>
-->


<!-- JENIS PEMBIMBING-->

<div class="form-group">
        <label class="control-label col-sm-8">
          Pengajuan Sebagai 
          <?php 
if($this->session->userdata('pembimbing') == 1 AND $this->session->userdata('kuota') !== 0)
{ ?>
  *pilih salah satu
<?php }elseif($this->session->userdata('pembimbing') == 2 AND $this->session->userdata('kuota') !== 0) 
{ ?>
 
<?php }else 
{ ?>

<?php }?>
        </label>
        <div class="col-sm-4">


<?php 
if($this->session->userdata('pembimbing') == 1 AND $this->session->userdata('kuota') !== 0)
{ ?>
  <input type="radio" name="pbb1" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 1<br>
  <input type="radio" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
<?php }elseif($this->session->userdata('pembimbing') == 2 AND $this->session->userdata('kuota') !== 0) 
{ ?>
  <input type="hidden" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
<?php }else 
{ ?>
  <input type="hidden" name="pbb2" value="<?= $this->session->userdata('nip') ?>"> Pembimbing 2<br>
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
          Keterangan        
        </label>
        <div class="col-sm-10">
          <textarea class="form-control" name="keterangan" value=""></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Kuota Topik    
        </label>
        <div class="col-sm-2">
          <input type="number" min="1" max="5" class="form-control" name="kuotatopik" value="">
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

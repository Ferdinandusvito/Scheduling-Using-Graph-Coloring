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
    <h1>Judul</h1>
    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Topik
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="<?= $list_judul['topik'] ?>" disabled>
          <input type="hidden" name="id_bidang" value="<?= $list_judul['topik'] ?>">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2">
          Nama Bidang
        </label>
        <div class="col-sm-3">
          <input type="text" class="form-control" value="<?= $list_judul['nama_bidang'] ?>" disabled>
           <input type="hidden" name="id_bidang" value="<?= $list_judul['nama_bidang'] ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">
          Input Judul        
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="judul" name="judul" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Nama Mahasiswa         
        </label>
        <div class="col-sm-4">
          <input type="text" class="form-control"  value="<?= $this->session->userdata('nama_awal') ?> <?= $this->session->userdata('nama_akhir') ?>" disabled> 
          <input type="hidden" name="nim" value="<?= $this->session->userdata('nim') ?>" >
        </div>
      </div>


<?php 
if($list_judul['pbb1'] !== '0' AND $list_judul['pbb2'] == '0')
{ ?>

<div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 1      
        </label>
        <div class="col-sm-3">
          <input type="text" class="form-control" value="<?= $list_judul['kode_dosen'] ?>" disabled>
           <input type="hidden" name="pbb1" id="pbb1" value="<?= $list_judul['nip'] ?>">
        </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 2
        </label>
<div class="col-sm-4">

<select  name="pbb2" class="form-control">
<option>- Pilih PBB2 -</option>
                        <?php  
                                foreach ($list_pbb2 as $row) { ?>
                                    <option value="<?=$row['nip']?>" id="pbb2"><?= $row['kode_dosen'] ?></option>
                        <?php }
                        ?>

                        <!-- <option value="<?= $list_judul['pbb2'] ?>"  > Pembimbing 2</option> -->
                        </select></div></div>

<?php }elseif($this->session->userdata('pbb1') == 0 AND $this->session->userdata('pbb2') !== 0) 
{ ?>
<div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 1
        </label>
<div class="col-sm-4">

<select  name="pbb1" class="form-control">
<option>- Pilih PBB1 -</option>
                        <?php  
                                foreach ($list_pbb1 as $row) { ?>
                                    <option value="<?=$row['nip']?>" id="pbb1"><?= $row['kode_dosen'] ?></option>
                        <?php }
                        ?>

                        <!-- <option value="<?= $list_judul['pbb2'] ?>"  > Pembimbing 2</option> -->
                        </select></div></div>

<div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 2      
        </label>
        <div class="col-sm-3">
          <input type="text" class="form-control" value="<?= $list_judul['kode_dosen'] ?>" disabled>
           <input type="hidden" name="pbb2" value="<?= $list_judul['nip'] ?>">
        </div>
</div>


<?php }else 
{ ?>
 <div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 1
        </label>
<div class="col-sm-4">

<select  name="pbb1" class="form-control">
<option>- Pilih PBB1 -</option>
                        <?php  
                                foreach ($list_pbb1 as $row) { ?>
                                    <option value="<?=$row['nip']?>" id="pbb1"><?= $row['kode_dosen'] ?></option>
                        <?php }
                        ?>

                        <!-- <option value="<?= $list_judul['pbb2'] ?>"  > Pembimbing 2</option> -->
                        </select></div></div>

<div class="form-group">
        <label class="control-label col-sm-2">
          Pembimbing 2
        </label>
<div class="col-sm-4">

<select  name="pbb2" class="form-control">
<option>- Pilih PBB2 -</option>
                        <?php  
                                foreach ($list_pbb2 as $row) { ?>
                                    <option value="<?=$row['nip']?>" id="pbb2"><?= $row['kode_dosen'] ?></option>
                        <?php }
                        ?>

                        <!-- <option value="<?= $list_judul['pbb2'] ?>"  > Pembimbing 2</option> -->
                        </select></div></div>
<?php }?>
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
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-reject', function () {
          var href = $(this).attr('data-link');
          var form = `<textarea class="form-control" name="alasan_tolak" placeholder="Berikan Alasan"></textarea>`;
          $.confirm({
            title: 'Tolak Pengajuan?',
            content: form,
            type: 'red',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });
      
      $(document).ready(function(){
        $(document).on('click', '#do-confirm', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Setujui Pengajuan?',
            content: 'Yakin akan menyetujui pengajuan?',
            type: 'green',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });

      $(document).ready(function(){
        $(document).on('click', '#do-finish', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Nyatakan Selesai?',
            content: 'Yakin akan menyatakan pengabdian masyarakat selesai?',
            type: 'green',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });
    </script>
  </body>

</html>

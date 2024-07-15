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
    <h1>Mahasiswa Pengambil Topik</h1>


    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2">
          TOPIK TUGAS AKHIR        
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="<?= $list_judulseminar['topik'] ?>" disabled>
          <input type="hidden" name="idta" value="<?= $list_judulseminar['idta'] ?>" >
          <input type="hidden" name="id_status" value="54" >
          <input type="hidden" name="judul" value="<?= $list_judulseminar['judul'] ?>" >
          <input type="hidden" name="topik" value="<?= $list_judulseminar['topik'] ?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-5">
          LIST NAMA MAHASISWA PENGAMBIL TOPIK       
        </label>
        <div class="col-sm-10">
          <?php 
                          $no = 1;
                          foreach ($list_mahasiswata as $row) {
                            echo $no.'. '.$row['nama_awal'].' '.$row['nama_akhir'].'<br>'; 
                            $no++;
                          }
                        ?>
        </div>
      </div>


      <center>
        <button name="btnSimpanJadwal" class="btn btn-primary">
          Back
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
      $(document).on('change', '#tanggal', function () {
        var ruangan     = $('#ruangan').val()
        var tanggal  = $(this).val()
        if (tanggal) {
          $.ajax({
              url : '<?= base_url('pkip/validasiRuangan/') ?>'+tanggal,
              type : 'get',
              success : function (response) {
                console.log(response)
                $('#ruangan').empty();
                if(response){
                    $.each(response, function(key, value){
                        $('#ruangan').append(`<option value=${value.id_slot}>${value.ruangan} (${value.jam_mulai} - ${value.jam_selesai})`);
                    });
                }else {
                    $('#ruangan').empty();
                }
              console.log(response)
            }
          })
        }
      })
    </script>
  </body>

</html>

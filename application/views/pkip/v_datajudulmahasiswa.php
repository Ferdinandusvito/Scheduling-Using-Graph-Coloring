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
              Daftar Judul Siap Seminar</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
    <th rowspan="2">NO</th>
    <th rowspan="2">AKSI</th>
    <th rowspan="2">PENERBIT</th>
    <th rowspan="2">TOPIK</th>
    <th colspan="2"><center>PEMBIMBING</center></th>
    <th rowspan="2">STATUS</th>
    <th rowspan="2">NAMA</th>
    <th rowspan="2">NIM</th>
    <th rowspan="2">JUDUL</th>
  </tr>
  <tr>
    <td ><center><b>PBB1</b></center></td>
    <td ><center><b>PBB2</b></center></td>
  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    // var_dump($data_real);exit;
                    // $count = array_count_values($data_real);
                    
                    foreach($data_list_group as $row){ 
                        $count_rows = count($data_list[$row['idta']]);
                      // var_dump($count_rows);exit;
                      ?>
                    <tr>
                    <td rowspan="<?= $count_rows ?>"><?= $no ?></td>
                    <td rowspan="<?= $count_rows ?>">  
                    <center>
                        <center>
                          <?php
                        if ($row['status'] == "Seminar") {?>
                          <button data-link="<?php echo base_url('/pkip/inputjadwalseminar/'.$row['idta']) ?>" type="button" id="do-confirm" class="btn btn-sm btn-success" name="tombol_inputjadwalseminar"><i class="fas fa-check"></i> SEMINARKAN</button>
                        <?php } elseif ($row['status'] == "Belum Seminar") { ?>
                          <button data-link="<?php echo base_url('/mahasiswa/inputjudul/'.$row['idta']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-success" name="tombol_inputjudul"><i class="fas fa-check"></i> Seminarkan</button>
                        <?php } else {
                          echo "Lulus";
                        }
                      ?></center>
                    </center>
                        </td>
                    <td rowspan="<?= $count_rows ?>"><?= $row['nip'] ?></td>
                    <td rowspan="<?= $count_rows ?>"><?= $row['topik'] ?></td>
                    <td rowspan="<?= $count_rows ?>"><center><?= $row['pbb1'] ?></center></td>
                    <td rowspan="<?= $count_rows ?>"><center><?= $row['pbb2'] ?></center></td>
                    <td rowspan="<?= $count_rows ?>"><?= $row['status'] ?></td>
                  <?php
                    foreach ($data_list[$row['idta']] as $key => $value) {
                      ?>
                      <td><?= $value['nama_awal'] ?> <?= $value['nama_akhir'] ?></td>
                      <td><?= $value['nim'] ?></td>
                      <td><?= $value['judul'] ?></td>
                      </tr>
                  <?php
                    }
                  ?>

                  <?php $no++; } ?>

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
              <span>Copyright ? Your Website 2018</span>
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
              <span aria-hidden="true">?/span>
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
            title: 'Input Judul',
            content: 'Apakah anda ingin menginput jadwal Seminar?',
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

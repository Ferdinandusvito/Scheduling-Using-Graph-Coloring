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
      <?php $this->load->view("_partials/sidebar_mhs.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Status Tugas Akhir</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      
                 <thead>
      <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Topik</th>
        <th>Judul</th>
        <th>PBB1</th>
        <th>PBB2</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
                    <?php
                    $no = 1;
                    foreach($list_judul as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['topik'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['pbb1'] ?></td>
                        <td><?= $row['pbb2'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                          <center><?php
                        if($this->session->userdata('id_status') == 6 ) { ?>
                          <button data-link="<?php echo base_url('/mahasiswa/inputjudul/'.$row['idta']) ?>" type="button" id="do-reject"class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> DROP TOPIK</button>
                        <?php }elseif ($this->session->userdata('id_status') == 7 ) { ?>
                          <button data-link="<?php echo base_url('/mahasiswa/inputjudul/'.$row['idta']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-success" name="tombol_inputjudul"><i class="fas fa-check"></i> INPUT JUDUL</button>
                          <button data-link="<?php echo base_url('/mahasiswa/inputjudul/'.$row['idta']) ?>" type="button" id="do-reject"class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> DROP TOPIK</button>
                        <?php } else {
                          echo "";
                        }
                      ?></center>
                        </td>
                      </tr>
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
            title: 'Input Judul',
            content: 'Apakah anda ingin menginput judul?',
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

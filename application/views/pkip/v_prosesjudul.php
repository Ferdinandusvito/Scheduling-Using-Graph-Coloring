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
                <form action="<?= base_url('pkip/daftarprosesjudul') ?>" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-8">
                        Cari berdasarkan
                    </div>
                    <div class="form-group col-md-1">
                      <select id="" class="form-control" name="semester">
                        <option value="">Semester</option>
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <select id="" name="nip" class="form-control">
                        <option value="">Dosen</option>
                        <?php 
                          foreach ($load_dosen as $load_dosen) { ?>
                            <option value="<?= $load_dosen['nip'] ?>"><?= $load_dosen['kode_dosen'] ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <select id="inputState" class="form-control" name="tahun">
                        <option value="">Tahun</option>
                        <?php
                          $thn_skr = date('Y');
                          for ($x = $thn_skr; $x >= 1940; $x--) { ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <button class="btn btn-info btn-block" type="submit" name="btnFilter">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>PENERBIT</th>
                    <th>TOPIK</th>
                    <th>JUDUL</th>
                    <th>PBB1</th>
                    <th>PBB2</th>
                    <th>STATUS</th>
                    <th>SEMESTER</th>
                    <th>TAHUN</th>
                    <th>Proposal TA</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($list_prosesjudul as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['topik'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['kode1'] ?></td>
                        <td><?= $row['kode2'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td>
                        <a href="<?php print site_url('/assets/documents/proposal/'.$row['proposal']) ?>" target="blank">
                        <?= $row['proposal'] ?>
                        </a>
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

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Pengajuan Barang</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">

    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar_lbrn.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">


        <!-- Breadcrumbs-->
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar Pengajuan Barang</div>
            <div class="card-body">
              <div class="card mb-3">
                      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Pengaju</th>
                                        <th>NIP</th>
                                        <th>Lab</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Nama Barang</th>
                                        <th>Spek</th>
                                        <th>Vol</th>
                                        <th>Jumlah Datang</th>
                                        <th>Status</th>
                                        <th>Cek</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pengajuan_barang as $pengajuan_barang): ?>
                                    <tr>
                                        <td width="150">
                                            <?php echo $pengajuan_barang->nama_dosen ?>
                                        </td>
                                        <td>
                                          <?php echo $pengajuan_barang->nip ?>
                                        </td>
                                        <td>
                                            <?php echo $pengajuan_barang->nama_laboratorium?>
                                        </td>
                                        <td>
                                            <?php echo $pengajuan_barang->tanggal_pengajuan ?>
                                        </td>
                                        <td>
                                          <?php echo $pengajuan_barang->nama_barang ?>
                                        </td>
                                        <td>
                                            <?php echo $pengajuan_barang->spek?>
                                        </td>
                                        <td>
                                            <?php echo $pengajuan_barang->vol ?>
                                        </td>
                                        <td>
                                            <?php echo $pengajuan_barang->vol_datang ?>
                                            </th>                                      
                                        <td>
                                            <?php echo substr($pengajuan_barang->nama_status, 0, 120) ?></td>   
                                                                                    <td>
                                            <?php echo substr($pengajuan_barang->nama_cek, 0, 120) ?></td> 
                                        <td>
                                            <?php echo $pengajuan_barang->keterangan ?>
                                        </td>
                                        </td>
                                    </tr>
                                  </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
</html>
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
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dosen/logout"   >Logout</a>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
  </body>

</html>

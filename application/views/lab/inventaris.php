<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Laboratorium</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">

    <?php $this->load->view("_partials/navbar.php",$this->data) ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar_lab.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <div class="row">
              <div class="col-md-10"></div>
              <div class="col-md-2">
                  </div>
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar Inventaris Barang</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                                <thead>
                                <thead>
                                    <tr>
                                        <th>Nomor Inventaris</th>
                                        <th>Nama Barang</th>
                                        <th>Merk</th>
                                        <th>Seri</th>
                                        <th>Jumlah Barang</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Laboratorium</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($barang as $barang): ?>
                                    <tr>
                                        <td width="150">
                                            <?php echo $barang->nomor_inventaris ?>
                                        </td>
                                        <td>
                                          <?php echo $barang->nama_barang ?>
                                        </td>
                                        <td>
                                            <?php echo $barang->merk ?>
                                        </td>
                                        <td>
                                            <?php echo $barang->seri ?>
                                        </td>
                                         <td>
                                            <?php echo $barang->jumlah_barang ?>
                                        </td>
                                        <td>
                                            <?php echo $barang->tanggal_pembelian ?>
                                        </td>
                                       <td>
                                            <?php echo substr($barang->nama_laboratorium, 0, 120) ?>...</td>
                                        <td>
                                            <?php echo substr($barang->nama_kondisi, 0, 120) ?>...</td>
                                        <td>
                                            <?php echo substr($barang->nama_status, 0, 120) ?>...</td>    
                                       
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
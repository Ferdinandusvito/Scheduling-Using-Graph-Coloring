<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lab</title>
<?php $this->load->view("_partials/header.php") ?>

  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php") ?>
    <div id="wrapper">

       <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar_lbrn.php") ?>

     
          <!-- Breadcrumbs-->
              <html>
<div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo base_url('laboran/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                        <th>Action</th>
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
                                        <td width="250">
                                            <a href="<?php echo base_url('laboran/edit/'.$barang->id_inventaris) ?>"
                                             class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="deleteConfirm('<?php echo base_url('') ?>')"
                                             href='<?php echo base_url('laboran/hapus/'.$barang->id_inventaris) ?>' class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
            <a href="<?php echo base_url('/index.php/laboran/c_laboran/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>

  </body>

</html>
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
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('index.php/laboran/inventaris/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="name">Nomor Inventaris*</label>
                <input class="form-control <?php echo form_error('nomor_invnentaris') ? 'is-invalid':'' ?>"
                 type="text" name="nomor_inventaris" placeholder="nomor inventaris" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>

                <label for="name">Nama Barang*</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="nama_barang" placeholder="nama barang" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="price">Merk*</label>
                <input class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>"
                 type="text" name="merk" placeholder="Merk" />
                <div class="invalid-feedback">
                  <?php echo form_error('merk') ?>
                </div>
              </div>


              <div class="form-group">
                <label for="name">Seri</label>
                <input class="form-control <?php echo form_error('seri') ? 'is-invalid':'' ?>"
                 type="text" name="seri" placeholder="Seri" />
                <div class="invalid-feedback">
                  <?php echo form_error('seri') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Tanggal Pembelian</label>
                <input class="form-control <?php echo form_error('seri') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_pembelian" placeholder="Tanggal" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_pembelian') ?>
                </div>
              </div>



              <div class="form-group">
                <label for="name">Jumlah Barang</label>
                <input class="form-control <?php echo form_error('jumlah_barang') ? 'is-invalid':'' ?>"
                 type="number" name="jumlah_barang" placeholder="Jumlah" />
                <div class="invalid-feedback">
                  <?php echo form_error('jumlah_barang') ?>
                </div>
              </div>


             <div class="form-group">
        <label class="control-label col-m-3">
          Laboratorium
        </label>
        <div class="col-sm-10">
              <?php
        echo "<select name='id_laboratorium' id='id_laboratorium'>";
        if (count($laboratorium)) {
           foreach ($laboratorium as $list) {
        echo "<option value='". $list['id_laboratorium'] . "'>" . $list['nama_laboratorium'] . "</option>";
        }
      }
    echo "</select><br/>";
      ?>
          Kondisi 
        </label>
        <div class="col-sm-10">
              <?php
        echo "<select name='id_kondisi' id='id_kondisi'>";
        if (count($kondisi_barang)) {
           foreach ($kondisi_barang as $list) {
        echo "<option value='". $list['id_kondisi'] . "'>" . $list['nama_kondisi'] . "</option>";
        }
      }
    echo "</select><br/>";
      ?>

             <div class="form-group">
        <label class="control-label col-m-3">
        Status
        </label>
        <div class="col-sm-10">
              <?php
        echo "<select name='id_status' id='id_status'>";
        if (count($status_barang)) {
           foreach ($status_barang as $list) {
        echo "<option value='". $list['id_status'] . "'>" . $list['nama_status'] . "</option>";
        }
      }
    echo "</select><br/>";
      ?>

            <button name="tombol_submit" class="btn btn-primary">
             simpan
            </button>
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>


        </div>
        <!-- /.container-fluid -->
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
            <a href="<?php echo base_url('admin/c_admin/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

  <?php $this->load->view("_partials/js.php") ?>

  </body>

</html>
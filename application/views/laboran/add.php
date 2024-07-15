<!DOCTYPE html>
<html lang="en">

 <head>
    <title>Pengajuan Barang</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">

    <?php $this->load->view("_partials/navbar.php",$this->data) ?>

    <div id="wrapper">

       <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar_lbrn.php") ?>
      
      
      <div id="content-wrapper">

        <div class="container-fluid">


               <!-- Breadcrumbs-->
              <html>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('laboran') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Nomor Inventaris*</label>
                <input class="form-control <?php echo form_error('nomor_invnentaris') ? 'is-invalid':'' ?>"
                 type="text" name="nomor_inventaris" placeholder="nomor inventaris" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>
                
                <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Nama Barang*</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="nama_barang" placeholder="nama barang" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="price">Merk*</label>
                <input class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>"
                 type="text" name="merk" placeholder="Merk" />
                <div class="invalid-feedback">
                  <?php echo form_error('merk') ?>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Seri*</label>
                <input class="form-control <?php echo form_error('seri') ? 'is-invalid':'' ?>"
                 type="text" name="seri" placeholder="Seri" />
                <div class="invalid-feedback">
                  <?php echo form_error('seri') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Tahun Pembelian*</label>
                <input class="form-control <?php echo form_error('tanggal_pembelian') ? 'is-invalid':'' ?>"
                 type="year" name="tanggal_pembelian" placeholder="Tahun" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_pembelian') ?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Tanggal Cek*</label>
                <input class="form-control <?php echo form_error('tanggal_cek') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_cek" placeholder="Tangggal Cek" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_cek') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Jumlah Barang*</label>
                <input class="form-control <?php echo form_error('jumlah_barang') ? 'is-invalid':'' ?>"
                 type="number" name="jumlah_barang" placeholder="Jumlah" />
                <div class="invalid-feedback">
                  <?php echo form_error('jumlah_barang') ?>
                </div>
              </div>


         <div class="form-group">
                <label class="control-label col-sm-4">
         Laboratorium*
        <select name="id_laboratorium" id="" class="form-control" required>
                            <option value="">- Pilih Lab -</option>
                            <?php
                                foreach($laboratorium as $row){
                                    $selected_cat = $row['id_laboratorium'] == $barang->id_laboratorium ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_laboratorium']."' ".$selected_cat.">".$row['nama_laboratorium']."</option>";
                                }
                            ?>
                        </select>
                        
            
          Kondisi* 
        <select name="id_kondisi" id="" class="form-control" required>
                            <option value="">- Pilih Kondisi -</option>
                            <?php
                                foreach($kondisi_barang as $row){
                                    $selected_cat = $row['id_kondisi'] == $barang->id_kondisi ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_kondisi']."' ".$selected_cat.">".$row['nama_kondisi']."</option>";
                                }
                            ?>
                        </select>
          
        Status*
        <select name="id_status" id="" class="form-control" required>
                            <option value="">- Pilih Status -</option>
                            <?php
                                foreach($status_barang as $row){
                                    $selected_cat = $row['id_status'] == $barang->id_status ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_status']."' ".$selected_cat.">".$row['nama_status']."</option>";
                                }
                            ?>
                        </select>
                        
                        
                        <div class="form-group">
                <label for="name">Keterangan</label>
                <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
                 type="textarea" name="keterangan" placeholder="Keterangan" style="resize:none;width:430px;height:100px;" /> </textarea>
             <div class="invalid-feedback">
                  <?php echo form_error('keterangan') ?>
                </div>
              </div>
            <button name="tombol_submit" class="btn btn-primary">
             simpan
            </button>
            </form>

          </div>

          <div class="card-footer small text-muted">
            * Wajib diisi
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
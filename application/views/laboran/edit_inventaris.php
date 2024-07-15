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
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>
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
            <a href="<?php echo base_url('laboran/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <form action="<?php base_url('laboran/edit_inventaris') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $barang->id_inventaris?>" />

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Nomor Inventaris*</label>
                <input class="form-control <?php echo form_error('nomor_inventaris') ? 'is-invalid':'' ?>"
                 type="text" name="nomor_inventaris" placeholder="nomor inventaris" value="<?php echo $barang->nomor_inventaris?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nomor_inventaris') ?>
                </div>
              </div>
                
                <div class="form-group">
                <label class="control-label col-sm-4">
                <label for="name">Nama Barang*</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="nama_barang" placeholder="nama barang" value="<?php echo $barang->nama_barang?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-4">
              <div class="form-group">
                <label for="price">Merk*</label>
                <input class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>"
                 type="text" name="merk" placeholder="Merk" value="<?php echo $barang->merk?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('merk') ?>
                </div>
              </div>

                
              <div class="form-group">
                <label for="name">Seri*</label>
                <input class="form-control <?php echo form_error('seri') ? 'is-invalid':'' ?>"
                 type="text" name="seri" placeholder="Seri" value="<?php echo $barang->seri?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('seri') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Tahun Pembelian*</label>
                <input class="form-control <?php echo form_error('tanggal_pembelian') ? 'is-invalid':'' ?>"
                 type="year" name="tanggal_pembelian" placeholder="Tahun" value="<?php echo $barang->tanggal_pembelian?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_pembelian') ?>
                </div>
              </div>
              
                            <div class="form-group">
                <label for="name">Tanggal Cek*</label>
                <input class="form-control <?php echo form_error('tanggal_cek') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_cek" placeholder="Tanggal Cek" value="<?php echo $barang->tanggal_cek?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_cek') ?>
                </div>
              </div>


              <div class="form-group">
                <label for="name">Jumlah Barang*</label>
                <input class="form-control <?php echo form_error('jumlah_barang') ? 'is-invalid':'' ?>"
                 type="number" name="jumlah_barang" placeholder="Jumlah" value="<?php echo $barang->jumlah_barang?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('jumlah_barang') ?>
                </div>
              </div>



 Laboratorium
        <input class="form-control <?php echo form_error('id_laboratorium') ? 'is-invalid':'' ?>"
                 type="hidden" name="id_laboratorium" value="<?php echo $barang->id_laboratorium?>"/>
        <select name="" id="" class="form-control" disabled="disabled"  required>
                            <option value="">- Pilih Lab -</option>
                            <?php
                                foreach($laboratorium as $row){
                                    $selected_cat = $row['id_laboratorium'] == $barang->id_laboratorium ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_laboratorium']."' ".$selected_cat.">".$row['nama_laboratorium']."</option>";
                                }
                            ?>
                        </select>
          Kondisi*
          <select name="id_kondisi" id="" class="form-control" >
                            <option value="">- Pilih Kondisi -</option>
                            <?php
                                foreach($kondisi_barang as $row){
                                    $selected_cat = $row['id_kondisi'] == $barang->id_kondisi ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_kondisi']."' ".$selected_cat.">".$row['nama_kondisi']."</option>";
                                }
                            ?>
                        </select>
                         </td>
                </tr>
            Status*
            <select name="id_status" id="" class="form-control" >
                            <option value="">- Pilih Status -</option>
                            <?php
                                foreach($status_barang as $row){
                                    $selected_cat = $row['id_status'] == $barang->id_status ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_status']."' ".$selected_cat.">".$row['nama_status']."</option>";
                                }
                            ?>
                        </select>
                         </td>
                </tr>
                
                  <div class="form-group">
                <label for="name">Keterangan</label>
                <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
                type="textarea" name="keterangan" placeholder="Keterangan" value="<?php echo $barang->keterangan?>" style="resize:none;width:430px;height:100px;" /> </textarea>
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

</html>>
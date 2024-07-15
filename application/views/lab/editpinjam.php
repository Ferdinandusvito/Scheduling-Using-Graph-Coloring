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
      <?php $this->load->view("_partials/sidebar.php") ?>

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
            <a href="<?php echo base_url('lab/peminjaman') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            
               <form action="" method="post" enctype="multipart/form-data" >
          <div class="form-group">
                <label class="control-label col-sm-4">
            <label for="name">Nama Mahasiswa</label>
                <input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>"
                 type="hidden" name="nama_mahasiswa" value="<?php echo $peminjaman->nama_mahasiswa?>"/>
                <input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $peminjaman->nama_mahasiswa?>" disabled="disabled" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_mahasiswa')  ?>
                </div>
              </div>

              <div class="card-body">
            <div class="form-group">
                <label class="control-label col-sm-4">
            <label for="name">NIM</label>
              <input class="form-control <?php echo form_error('nim') ? 'is-invalid':'' ?>"
                 type="hidden" name="nim" value="<?php echo $peminjaman->nim?>"/>
                <input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $peminjaman->nim?>" disabled="disabled" />
                <div class="invalid-feedback">
                  <?php echo form_error('nim')  ?>
                </div>
              </div>
 <div class="form-group">
                <label class="control-label col-sm-4">
 Laboratorium
        <input class="form-control <?php echo form_error('id_laboratorium') ? 'is-invalid':'' ?>"
                 type="hidden" name="id_laboratorium" value="<?php echo $peminjaman->id_laboratorium?>"/>
        <select name="id_laborotarium" id="" class="form-control" disabled="disabled">
     
                            <option value="">- Pilih Lab -</option>
                            <?php
                                foreach($laboratorium as $row){
                                    $selected_cat = $row['id_laboratorium'] == $peminjaman->id_laboratorium ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_laboratorium']."' ".$selected_cat.">".$row['nama_laboratorium']."</option>";
                                }
                            ?>
                          </select>
                          <label for="name">Nama Barang</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="hidden" name="nama_barang" value="<?php echo $peminjaman->nama_barang?>"/>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $peminjaman->nama_barang?>" disabled="disabled" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang')  ?>
                </div>
              </div>

 <div class="form-group">
                <label class="control-label col-sm-4">
              <div class="form-group">
            <label for="name">Spesifikasi</label>
                <input class="form-control <?php echo form_error('spek') ? 'is-invalid':'' ?>"
                 type="hidden" name="spek" value="<?php echo $peminjaman->spek?>" >
                <input class="form-control <?php echo form_error('spek') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $peminjaman->spek?>" disabled="disabled">
                <div class="invalid-feedback">
                  <?php echo form_error('spek')  ?>
                </div>
              </div>

              <div class="form-group">
            <label for="name">Vol</label>
                <input class="form-control <?php echo form_error('vol') ? 'is-invalid':'' ?>"
                 type="hidden" name="vol"  value="<?php echo $peminjaman->vol?>"/>
                <input class="form-control <?php echo form_error('vol') ? 'is-invalid':'' ?>"
                 type="number" name=""  value="<?php echo $peminjaman->vol?>" disabled="disabled"/>
                <div class="invalid-feedback">
                  <?php echo form_error('vol')  ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Tanggal Peminjaman</label>
                <input class="form-control <?php echo form_error('tanggal_peminjaman') ? 'is-invalid':'' ?>"
                 type="hidden" name="tanggal_peminjaman"  value="<?php echo $peminjaman->tanggal_peminjaman?>"/>
                <input class="form-control <?php echo form_error('peminjaman') ? 'is-invalid':'' ?>"
                 type="date" name=""  value="<?php echo $peminjaman->tanggal_peminjaman?>" disabled="disabled"/>
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_peminjaman') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Tanggal Pengembalian</label>
               <input class="form-control <?php echo form_error('vol') ? 'is-invalid':'' ?>"
                 type="hidden" name="tanggal_kembali"  value="<?php echo $peminjaman->tanggal_kembali?>"/>
                <input class="form-control <?php echo form_error('tanggal_kembali') ? 'is-invalid':'' ?>"
                 type="date" name=""  value="<?php echo $peminjaman->tanggal_kembali?>" disabled="disabled"/>
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_kembali') ?>
                </div>
              </div>   

              <div class="form-group">
                <label for="name">Tanggal Pengembalian Update</label>
                <input class="form-control <?php echo form_error('tanggal_update') ? 'is-invalid':'' ?>"
                 type="date" name="tanggal_update"  value="<?php echo $peminjaman->tanggal_update?>"/>
                  <?php echo form_error('tanggal_update')  ?>
                </div>
              </div>       
              
              <div class="form-group">
                <label class="control-label col-sm-4">
                       <tr>
                        <td class="td-width">Unggah Form Pengajuan Sah</td>
                        <td class="td-padding1">
                          <input type="hidden" name="file_peminjaman" value="<?php echo $peminjaman->file_peminjaman?>">
                          <a href="<?= base_url('./assets/documents/laporan_peminjaman/'.$peminjaman->file_peminjaman) ?>" target="blank"><?php echo $peminjaman->file_peminjaman?></a>
                          
                        </td>
                      </tr>
                      </div>
                      <div class="form-group">
                <label class="control-label col-sm-4">
                      Status
               <select name="id_pinjam" id="" class="form-control"  required>
                            <option value="">- Status -</option>
                            <?php
                                foreach($cek_pinjam as $row){
                                    $selected_cat = $row['id_pinjam'] == $peminjaman->id_pinjam ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_pinjam']."' ".$selected_cat.">".$row['nama_pinjam']."</option>";
                                }
                            ?>
                          </select>
                          </div> 

                    
                     
              <button name="tombol_submit" class="btn btn-primary">
             simpan
            </button>
            </form>

            </form>

          </div>

        </div>
</html>
  
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

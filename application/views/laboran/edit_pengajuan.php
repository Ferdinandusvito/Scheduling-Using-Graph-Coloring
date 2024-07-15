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

                   <html>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('dosen/pengajuan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

             <form action="" method="post" enctype="multipart/form-data" >
            <div class="form-group">
            <label for="name">Nama Pengaju</label>
                <input class="form-control <?php echo form_error('nama_dosen') ? 'is-invalid':'' ?>"
                 type="hidden" name="nama_dosen" value="<?php echo $pengajuan_barang->nama_dosen?>"/>
                 <input type="text" name="" value="<?php echo $pengajuan_barang->nama_dosen?>" disabled="disabled">
                <div class="invalid-feedback">
                  <?php echo form_error('nama_dosen')  ?>
                </div>
              </div>


              <div class="card-body">
            <div class="form-group">
            <label for="name">NIP</label>
                <input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>"
                 type="hidden" name="nip" value="<?php echo $pengajuan_barang->nip?>"/>
                 <input type="text" name=""  value="<?php echo $pengajuan_barang->nip?>" disabled="disabled" >
                <div class="disabled">
                  <?php echo form_error('nip') ?>
                </div>
              </div>

    Laboratorium
        <input class="form-control <?php echo form_error('id_laboratorium') ? 'is-invalid':'' ?>"
                 type="hidden" name="id_laboratorium" value="<?php echo $pengajuan_barang->id_laboratorium?>"/>
        <select name="" id="" class="form-control" disabled="disabled"  required>
                            <option value="">- Pilih Lab -</option>
                            <?php
                                foreach($laboratorium as $row){
                                    $selected_cat = $row['id_laboratorium'] == $pengajuan_barang->id_laboratorium ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_laboratorium']."' ".$selected_cat.">".$row['nama_laboratorium']."</option>";
                                }
                            ?>
                        </select>
              <div class="form-group">
                <label for="name">Tanggal Pengajuan</label>
                <input class="form-control <?php echo form_error('tanggal_pengajuan') ? 'is-invalid':'' ?>"
                 type="hidden" name="tanggal_pengajuan" placeholder="" value="<?php echo $pengajuan_barang->tanggal_pengajuan?>" />
                <input class="form-control <?php echo form_error('tanggal_pengajuan') ? 'is-invalid':'' ?>"
                 type="date" name="" placeholder="" value="<?php echo $pengajuan_barang->tanggal_pengajuan?>" disabled="disabled" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_pengajuan') ?>
                </div>
              </div>

                    
                      <tr>
                        <td class="td-width">Ungggah Form Pengajuan Sah</td>
                        <td class="td-padding1">
                          <input type="hidden" name="file" value="<?php echo $pengajuan_barang->file?>">
                          <a href="<?= base_url('./assets/documents/laporan_pengajuan/'.$pengajuan_barang->file) ?>" target="blank"><?php echo $pengajuan_barang->file?></a>
                          
                        </td>
                      </tr>
                    </div>

                    <div class="form-group">
            <label for="name">Nama Barang</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="hidden" name="nama_barang" value="<?php echo $pengajuan_barang->nama_barang?>"/>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $pengajuan_barang->nama_barang?>" disabled="disabled" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang')  ?>
                </div>
              </div>

              <div class="form-group">
            <label for="name">Spesifikasi</label>
                <input class="form-control <?php echo form_error('spek') ? 'is-invalid':'' ?>"
                 type="hidden" name="spek" value="<?php echo $pengajuan_barang->spek?>" >
                <input class="form-control <?php echo form_error('spek') ? 'is-invalid':'' ?>"
                 type="text" name="" value="<?php echo $pengajuan_barang->spek?>" disabled="disabled">
                <div class="invalid-feedback">
                  <?php echo form_error('spek')  ?>
                </div>
              </div>

              <div class="form-group">
            <label for="name">Vol</label>
                <input class="form-control <?php echo form_error('vol') ? 'is-invalid':'' ?>"
                 type="hidden" name="vol"  value="<?php echo $pengajuan_barang->vol?>"/>
                <input class="form-control <?php echo form_error('vol') ? 'is-invalid':'' ?>"
                 type="number" name=""  value="<?php echo $pengajuan_barang->vol?>" disabled="disabled"/>
                <div class="invalid-feedback">
                  <?php echo form_error('vol')  ?>
                </div>
              </div>

              <div class="form-group">
            <label for="name">Vol</label>
                <input class="form-control <?php echo form_error('vol_datang') ? 'is-invalid':'' ?>"
                 type="hidden" name="vol_datang"  value="<?php echo $pengajuan_barang->vol_datang?>"/>
                <input class="form-control <?php echo form_error('vol_datang') ? 'is-invalid':'' ?>"
                 type="number" name=""  value="<?php echo $pengajuan_barang->vol_datang?>" disabled="disabled"/>
                <div class="invalid-feedback">
                  <?php echo form_error('vol_datang')  ?>
                </div>
              </div>


  Status
   <input class="form-control <?php echo form_error('id_status') ? 'is-invalid':'' ?>"
                 type="hidden" name="id_status" value="<?php echo $pengajuan_barang->id_status?>"/>
        <select name="id_status" id="" class="form-control" disable="disabled" >
                            <option value="">- Pilih Status -</option>
                            <?php
                                foreach($status_pengajuan as $row){
                                    $selected_cat = $row['id_status'] == $pengajuan_barang->id_status ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_status']."' ".$selected_cat.">".$row['nama_status']."</option>";
                                }
                            ?>
                        </select>
                         </td>
                </tr>



        Cek
         <input class="form-control <?php echo form_error('id_cek') ? 'is-invalid':'' ?>"
                 type="hidden" name="id_cek" value="<?php echo $pengajuan_barang->id_cek?>"/>
        <select name="id_cek" id="" class="form-control" disabled="disabled" >
                            <option value="">- Dosen Pembina Mengisi -</option>
                            <?php
                                foreach($cek_barang as $row){
                                    $selected_cat = $row['id_cek'] == $pengajuan_barang->id_cek ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_cek']."' ".$selected_cat.">".$row['nama_cek']."</option>";
                                }
                            ?>
                        </select>
                         </td>
                </tr>

              <button name="tombol_submit" class="btn btn-primary">
             Update
            </button>
            </form>

            </form>

          </div>

        </div>
</html>


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

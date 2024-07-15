<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Mata Kuliah</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div class="datadata">
      <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_admin.php") ?>
          <div id="content-wrapper">
            <div class="container-fluid">
              <div class="card mb-3">
                <div class="card-header">
                      <i class="fas fa-table"></i>
                      Ubah Data Mata Kuliah
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                          <input type="hidden" class="form-control" id="<?php echo $dataMatkul['id_matkul']; ?>" name="id_matkul" value="<?= $dataMatkul['id_matkul'] ?>">  
                                          <div class="form-group">
                                              <label for="nama_matkul">Nama Mata Kuliah</label>
                                              <input type="text" class="form-control" id="<?php echo $dataMatkul['nama_matkul']; ?>" name="nama_matkul" placeholder="Nama Mata Kuliah" value="<?= $dataMatkul['nama_matkul'] ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="kode_matkul">Kode Mata Kuliah</label>
                                              <input type="text" class="form-control" id="<?php echo $dataMatkul['kode_matkul']; ?>" name="kode_matkul" placeholder="Kode Mata Kuliah" value="<?= $dataMatkul['kode_matkul'] ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="kode_matkul">SKS</label>
                                              <input type="text" class="form-control" id="<?php echo $dataMatkul['sks']; ?>" name="sks" placeholder="Jumlah SKS" value="<?= $dataMatkul['sks'] ?>">
                                          </div>
                                          <button type="submit" class="btn btn-dark mt-3" name="updateMatkul">Submit</button>
                                      </form>
                                    </table>
                                  </div>
                                </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>

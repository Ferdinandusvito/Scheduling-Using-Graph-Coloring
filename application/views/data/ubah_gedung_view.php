<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Gedung</title>
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
                      Ubah Data Gedung
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                            <div class="form-group">
                                                <label for="nama_gedung">Masukkan Nama Gedung</label>
                                                <input type="text" class="form-control" id="<?php echo $dataGedung['nama_gedung']; ?>" name="nama_gedung" placeholder="Nama Gedung" value="<?php echo $dataGedung['nama_gedung']; ?>">
                                                <input type="hidden" class="form-control" id="<?php echo $dataGedung['id_gedung']; ?>" name="id_gedung" placeholder="ID Gedung" value="<?php echo $dataGedung['id_gedung']; ?>">
                                            </div>
                                            <button type="submit" name="updateGedung" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </table>
                                  </div>
                                </div>
                    </div>
              </div>
              <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Ruangan
                        </div>
                        <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA GEDUNG</th>
                                                    <th scope="col">NAMA RUANGAN</th>
                                                    <th scope="col">KAPASISTAS</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_ruangangedung)) { ?>
                                                    <?php foreach ($list_ruangangedung as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_gedung']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_ruangan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['kapasitas']; ?>
                                                            </td>
                                                            <td>
                                                            <a href="<?= base_url('/data_controllers/exploreRuangan/' . $value['id_ruangan']) ?>" class='btn btn-sm btn-dark'> Explore</a>
                                                            <a href="<?= base_url('/data_controllers/hapusRuangan/' . $value['id_ruangan']) ?>" class='btn btn-sm btn-danger'> Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                <?php } ?>
                                            </tbody>
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

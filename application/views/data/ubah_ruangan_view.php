<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Ruangan</title>
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
                          Ubah Data Ruangan
                    </div>
                        <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                          <div class="form-group">
                                              <label for="nama_ruangan">Nama Ruangan</label>
                                              <input type="text" class="form-control" id="<?php echo $dataRuangan['nama_ruangan']; ?>" name="nama_ruangan" placeholder="Masukkan Nama Ruangan" value="<?php echo $dataRuangan['nama_ruangan']; ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="id_gedung">Lokasi Gedung</label>
                                            <select class="form-control" id="id_gedung" name="id_gedung">
                                                <option value=""> - Pilih Gedung - </option>
                                                <?php foreach ($list_gedung as $list_gedung) { ?>
                                                    <option value="<?php echo $list_gedung['id_gedung']; ?>" <?php echo ($list_gedung['id_gedung'] == $dataRuangan['id_gedung']) ? 'selected' : ''; ?>><?php echo $list_gedung['nama_gedung']; ?> </option>
                                                <?php } ?>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="kapasitas">Kapasitas (Orang)</label>
                                              <input type="number" class="form-control" id="<?php echo $dataRuangan['kapasitas']; ?>" name="kapasitas" placeholder="Masukkan Kapasitas Kuangan" value="<?php echo $dataRuangan['kapasitas']; ?>">
                                          </div>
                                          <button type="submit" name="updateRuangan" class="btn btn-primary">Simpan</button>
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

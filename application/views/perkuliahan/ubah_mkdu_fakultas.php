<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Mata Kuliah Dasar Umum Jurusan</title>
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
                      Ubah Data Mata Kuliah Dasar Umum Jurusan
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                        <div class="form-group">
                                            <label for="id_fakultas">Nama Fakultas</label>
                                            <input type="text" class="form-control" name="fakultas" placeholder="Masukkan Kapasitas Kuangan" value="<?php echo $dataMKDU['nama_fakultas']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jurusan">Nama Program Studi</label>
                                            <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Kapasitas Kuangan" value="<?php echo $dataMKDU['nama_jurusan']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <input type="text" class="form-control" name="angkatan" placeholder="Masukkan Kapasitas Kuangan" value="<?php echo $dataMKDU['angkatan']; ?>" disabled>
                                        </div>
                                        <label for="kode_matkul">Nama Mata Kuliah</label>
                                        <?php if (!empty($list_matkul)) { ?>
                                            <?php foreach ($list_matkul as $row => $value) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="id_matkul[]" value="<?= $value['id_matkul']; ?>" <?php echo ($value['id_matkul'] == $dataMKDU['id_matkul']) ? 'checked' : ''; ?>>
                                                    <?php echo $value['nama_matkul']; ?>
                                                </div>
                                            <?php }
                                            ?>
                                        <?php } ?><br><br>
                                          <button type="submit" class="btn btn-dark mt-3" name="simpanMKDU">Simpan</button>
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

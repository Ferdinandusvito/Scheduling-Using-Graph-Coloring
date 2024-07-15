<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Jam</title>
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
                      Ubah Data Jam
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" class="form-horizontal" method="post">
                                        <div class="form-group">
                                            <label>
                                                Nama Jam
                                            </label>
                                            <div>
                                                <input type="text" name="nama_jam" class="form-control" value="<?= $dataJam['nama_jam'] ?>" required>
                                                <input type="hidden" name="kode_jam" class="form-control" value="<?= $dataJam['kode_jam'] ?>" required>
                                            </div>
                                        </div>
                                        <button type="submit" name="updateJam" class="btn btn-primary">Simpan</button>
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

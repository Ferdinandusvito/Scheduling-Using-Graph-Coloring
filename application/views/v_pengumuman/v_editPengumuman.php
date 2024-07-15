<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Tel - U CUSS | Edit Pengumuman</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>


    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_admin.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Edit Pengumuman</h1><hr><br>
            <form method="post" class="form-horizontal" action="">
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Judul
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" value="<?= $list_pengumuman['judul'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Isi Pengumuman
                    </label>
                    <div class="col-sm-10">
                        <textarea name="pengumuman" id="" cols="30" rows="10" class="form-control"><?= $list_pengumuman['pengumuman'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        File Penunjang (optional)
                    </label>
                    <div class="col-sm-10">
                        <input type="file" name="" id="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button name="ubahPengumuman" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

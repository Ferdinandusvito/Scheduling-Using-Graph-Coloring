<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header.php") ?>
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Ubah Kategori Kegiatan</h1><hr>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">
                        Nama Kategori
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="kategori" value="<?= $list_kategori['kategori'] ?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <button name="btn_ubahKategori" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

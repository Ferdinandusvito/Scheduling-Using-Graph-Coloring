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
            <h1>Edit Bidang</h1><hr><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="bidang">Nama Bidang</label>
                    <input type="text" id="bidang" name="nama_bidang" class="form-control col-md-4" value="<?= $dataBidang['nama_bidang'] ?>">
                </div>
                <button type="submit" name="updateBidang" class="btn btn-primary">Simpan</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

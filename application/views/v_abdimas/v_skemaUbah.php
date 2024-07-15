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
            <h1>Ubah Skema Abdimas</h1><hr><br>
            <form action="" class="form-horizontal" method="post">
                <div class="form-group">
                    <label>
                        Nama Skema
                    </label>
                    <div>
                        <input type="text" name="skema" class="form-control" value="<?= $dataSkema['skema'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Link
                    </label>
                    <div>
                        <input type="text" name="link" class="form-control" value="<?= $dataSkema['link'] ?>">
                    </div>
                </div>
                <button type="submit" name="simpanSkema" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("_partials/footer.php")
    ?>
  </body>
</html>

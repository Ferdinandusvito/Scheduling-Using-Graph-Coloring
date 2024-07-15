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
            <h1>Edit Data Laboratorium</h1><hr><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_laboratorium">Nama Laboratorium</label>
                    <input type="hidden" name="id_laboratorium" value="<?= $dataLab['id_laboratorium'] ?>">
                    <input type="text" name="nama_laboratorium" class="form-control col-md-5" value="<?= $dataLab['nama_laboratorium'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_kordas">Nama Koordinator Asisten</label>
                    <input type="text" id="nama_kordas" name="nama_kordas" class="form-control col-md-5" value="<?= $dataLab['nama_kordas'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control col-md-5" value="<?= $dataLab['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password Lama</label>
                    <input type="text" class="form-control col-md-5" value="<?= $dataLab['password'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="text" name="password" class="form-control col-md-5">
                </div>
                <button type="submit" name="updateLab" class="btn btn-primary">Simpan</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

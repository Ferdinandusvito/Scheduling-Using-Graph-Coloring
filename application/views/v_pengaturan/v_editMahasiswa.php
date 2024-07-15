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
            <h1>Edit Data Mahasiswa</h1><hr><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="hidden" name="nim" value="<?= $dataMahasiswa['nim'] ?>">
                    <?php 
                      if ($this->session->userdata('user_role') == 3) { ?>
                        <input type="text" class="form-control col-md-4" value="<?= $dataMahasiswa['nim'] ?>" disabled>
                        <?php
                      }else { ?>
                        <input type="text" id="nim" name="nim" class="form-control col-md-4" value="<?= $dataMahasiswa['nim'] ?>" required>
                        <?php
                      }
                    ?>
                </div>
                <div class="form-group">
                    <label for="nama_awal">Nama Awal</label>
                    <input type="text" id="nama_awal" name="nama_awal_mhs" class="form-control col-md-5" value="<?= $dataMahasiswa['nama_awal'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_akhir">Nama Akhir</label>
                    <input type="text" id="nama_akhir" name="nama_akhir_mhs" class="form-control col-md-5" value="<?= $dataMahasiswa['nama_akhir'] ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="radio" name="jenis_kelamin_mhs" value="Laki-laki" required> Laki-Laki
                    <input type="radio" name="jenis_kelamin_mhs" value="Perempuan" required> Perempuan
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="form-control col-md-3" value="<?= $dataMahasiswa['kelas'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="telp">No Telpon</label>
                    <input type="text" id="telp" name="telp_mhs" class="form-control col-md-3" value="<?= $dataMahasiswa['telp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <select id="inputState" class="form-control col-md-2" name="angkatan" required>
                        <option value="">Tahun</option>
                        <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 1940; $x--) {
                            $selected_cat = ($x == $dataMahasiswa['angkatan']) ? 'selected="selected"' : '';
                            echo "<option value = '".$x."' ".$selected_cat.">".$x."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tak">TAK</label>
                    <input type="text" id="tak" name="tak" class="form-control col-md-1" value="<?= $dataMahasiswa['tak'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email_mhs" class="form-control col-md-4" value="<?= $dataMahasiswa['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username_mhs" class="form-control  col-md-4" value="<?= $dataMahasiswa['username'] ?>" required>
                </div>
                <button type="submit" name="updateMhs" class="btn btn-primary">Simpan</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

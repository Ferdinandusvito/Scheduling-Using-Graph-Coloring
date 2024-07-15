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
            <h1>Edit Data Dosen</h1><hr><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control col-md-4" value="<?= $dataDosen['nip'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" id="nidn" name="nidn" class="form-control col-md-4" value="<?= $dataDosen['nidn'] ?>">
                </div>
                <div class="form-group">
                    <label for="nama_awal">Nama Awal</label>
                    <input type="text" id="nama_awal" name="nama_awal" class="form-control col-md-5" value="<?= $dataDosen['nama_awal'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_akhir">Nama Akhir</label>
                    <input type="text" id="nama_akhir" name="nama_akhir" class="form-control col-md-5" value="<?= $dataDosen['nama_akhir'] ?>">
                </div>
                <div class="form-group">
                    <label for="kode_dosen">Kode Dosen</label>
                    <input type="text" id="kode_dosen" name="kode_dosen" class="form-control col-md-2" value="<?= $dataDosen['kode_dosen'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $dataDosen['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-group">
                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" required> Prempuan
                    </div>
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="text" id="telp" name="telp" class="form-control col-md-3" value="<?= $dataDosen['telp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="blog">Blog</label>
                    <input type="text" id="blog" name="blog" class="form-control col-md-5" value="<?= $dataDosen['blog'] ?>">
                </div>
                <div class="form-group">
                    <label for="id_bidang">Bidang</label>
                    <select name="id_bidang" id="bidang" class="form-control col-md-5" required>
                        <option value="">- Pilih Bidang -</option>
                        <?php
                                foreach($dataBidang as $row){
                                    $selectedBidang = ($row['id_bidang'] == $dataDosen['id_bidang']) ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_bidang']."' ".$selectedBidang.">".$row['nama_bidang']."</option>";
                                }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jab_fungsional">Jabatan Fungsional</label>
                    <select name="jab_fungsional" id="" class="form-control col-md-5">
                        <option value="">- Pilih Jabatan Fungsional -</option>
                        <?php 
                            foreach ($dataJabatan as $dataJabatan) {
                                $selected_jab = ($dataJabatan['id_jabatan'] == $dataDosen['jab_fungsional']) ? 'selected="selected"' : '';
                                echo "<option value = '".$dataJabatan['id_jabatan']."' ".$selected_jab.">".$dataJabatan['jabatan']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jab_struktural">Jabatan Struktural</label>
                    <input type="text" id="jab_struktural" name="jab_struktural" class="form-control" value="<?= $dataDosen['jab_struktural'] ?>">
                </div>
                <div class="form-group">
                    <label for="jab_pangkat">Pangkat</label>
                    <input type="text" id="jab_pangkat" name="jab_pangkat" class="form-control" value="<?= $dataDosen['jab_pangkat'] ?>">
                </div>
                <div class="form-group">
                    <label for="jab_golongan">Golongan</label>
                    <input type="text" id="jab_golongan" name="jab_golongan" class="form-control" value="<?= $dataDosen['jab_golongan'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $dataDosen['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= $dataDosen['username'] ?>" required>
                </div>
                <button type="submit" name="updateDosen" class="btn btn-primary">Simpan</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

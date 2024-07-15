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
            <h1>Pengaturan</h1><hr><br>
            <?php if ($this->session->flashdata('alert')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert'); ?>
                </div>
            <?php } ?>
            <table class="table-detail">
                <tr>
                    <td>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                            <b>Ubah Password</b>
                        </button>
                    </td>
                </tr>
            </table>
            <br>
            <?php 
                if ($this->session->userdata('user_role') == 3) { ?>
                    <form action="" method="post">
                        <table class="table-detail">
                            <tr>
                                <td class="td-width">NIM</td>
                                <td class="td-padding1">
                                    <input type="text" id="nim" name="nim" class="form-control" value="<?= $dataMhs['nim'] ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Nama Awal</td>
                                <td class="td-padding1">
                                    <input type="text" id="nama_awal_mhs" name="nama_awal_mhs" class="form-control" value="<?= $dataMhs['nama_awal'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Nama Akhir</td>
                                <td class="td-padding1">
                                    <input type="text" id="nama_akhir_mhs" name="nama_akhir_mhs" class="form-control" value="<?= $dataMhs['nama_akhir'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Jenis Kelamin</td>
                                <td class="td-padding1">
                                    <input type="radio" name="jenis_kelamin_mhs" value="Laki-laki" required> Laki-Laki
                                    <input type="radio" name="jenis_kelamin_mhs" value="Perempuan" required> Perempuan
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Kelas</td>
                                <td class="td-padding1">
                                    <input type="text" id="kelas" name="kelas" class="form-control" value="<?= $dataMhs['kelas'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">No Telpon</td>
                                <td class="td-padding1">
                                    <input type="text" id="telp_mhs" name="telp_mhs" class="form-control" value="<?= $dataMhs['telp'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Angkatan</td>
                                <td class="td-padding1">
                                    <select id="inputState" class="form-control" name="angkatan" required>
                                        <option value="">Tahun</option>
                                        <?php
                                        $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 1940; $x--) {
                                            $selected_cat = ($x == $dataMhs['angkatan']) ? 'selected="selected"' : '';
                                            echo "<option value = '".$x."' ".$selected_cat.">".$x."</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Username</td>
                                <td class="td-padding1">
                                    <input type="text" id="username_mhs" name="username_mhs" class="form-control" value="<?= $dataMhs['username'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Email</td>
                                <td class="td-padding1">
                                    <input type="email" id="email_mhs" name="email_mhs" class="form-control" value="<?= $dataMhs['email'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">TAK</td>
                                <td class="td-padding1">
                                    <input type="text" id="tak" name="tak" class="form-control" value="<?= $dataMhs['tak'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width"></td>
                                <td class="td-padding1">
                                    <button type="submit" name="updateMhs" class="btn btn-sm btn-primary">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }elseif ($this->session->userdata('user_role') == 8) { ?>
                    <form action="" method="post">
                        <table class="table-detail">
                            <tr>
                                <td class="td-width">Nama Laboratorium</td>
                                <td class="td-padding1">
                                    <input type="text" id="nama_laboratorium" name="nama_laboratorium" class="form-control" value="<?= $dataLab['nama_laboratorium'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Nama Koordinator Asisten</td>
                                <td class="td-padding1">
                                    <input type="text" id="nama_kordas" name="nama_kordas" class="form-control" value="<?= $dataLab['nama_kordas'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Username</td>
                                <td class="td-padding1">
                                    <input type="text" id="username" name="username" class="form-control" value="<?= $dataLab['username'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width"></td>
                                <td class="td-padding1">
                                    <button type="submit" name="updateLab" class="btn btn-sm btn-primary">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }else { ?>
                    <form action="" method="post">
                        <table class="table-detail">
                            <tr>
                                <td class="td-width">NIP</td>
                                <td class="td-padding1">
                                    <input type="text" id="nip" name="nip" class="form-control" value="<?= $dataDosen['nip'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">NIDN</td>
                                <td class="td-padding1">
                                    <input type="text" id="nidn" name="nidn" class="form-control" value="<?= $dataDosen['nidn'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Nama Depan</td>
                                <td class="td-padding1">
                                    <input type="text" class="form-control" name="nama_awal" value="<?= $dataDosen['nama_awal'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Nama Belakang</td>
                                <td class="td-padding1">
                                    <input type="text" class="form-control" name="nama_akhir" value="<?= $dataDosen['nama_akhir'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Kode Dosen</td>
                                <td class="td-padding1">
                                    <input type="text" name="kode_dosen" class="form-control"  value="<?= $dataDosen['kode_dosen'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Alamat</td>
                                <td class="td-padding1">
                                    <textarea name="alamat" id="" cols="50" rows="3" class="form-control" required>
                                        <?= $dataDosen['alamat'] ?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Jenis Kelamin</td>
                                <td class="td-padding1">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">No Telp</td>
                                <td class="td-padding1">
                                    <input type="text" name="telp" class="form-control" value="<?= $dataDosen['telp'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Blog</td>
                                <td class="td-padding1">
                                    <input type="text" name="blog" class="form-control" value="<?= $dataDosen['blog'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Bidang</td>
                                <td class="td-padding1">
                                    <select name="id_bidang" id="" class="form-control" required>
                                        <option value="">- Pilih Bidang -</option>
                                        <?php
                                            foreach($dataBidang as $row){
                                                $selected_cat = ($row['id_bidang'] == $dataDosen['id_bidang']) ? 'selected="selected"' : '';
                                                echo "<option value = '".$row['id_bidang']."' ".$selected_cat.">".$row['nama_bidang']."</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Jabatan Fungsional</td>
                                <td class="td-padding1">
                                    <input type="hidden" name="jab_fungsional" value="<?= $dataDosen['id_jabatan'] ?>">
                                    <select name="" id="" class="form-control" disabled>
                                        <option value="">- Pilih Jabatan Fungsional -</option>
                                        <?php 
                                            foreach ($dataJabatan as $dataJabatan) { 
                                                $selected_jab = ($dataJabatan['id_jabatan'] == $dataDosen['id_jabatan']) ? 'selected="selected"' : '';
                                                echo "<option value = '".$dataJabatan['id_jabatan']."' ".$selected_jab.">".$dataJabatan['jabatan']."</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Jabatan Struktural</td>
                                <td class="td-padding1">
                                    <input type="text" name="jab_struktural" class="form-control" value="<?= $dataDosen['jab_struktural'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Pangkat</td>
                                <td class="td-padding1">
                                    <input type="text" name="jab_pangkat" class="form-control" value="<?= $dataDosen['jab_pangkat'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Golongan</td>
                                <td class="td-padding1">
                                    <input type="text" name="jab_golongan" class="form-control" value="<?= $dataDosen['jab_golongan'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Username</td>
                                <td class="td-padding1">
                                    <input type="text" name="username" class="form-control" value="<?= $dataDosen['username'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">Email</td>
                                <td class="td-padding1">
                                    <input type="text" name="email" class="form-control" value="<?= $dataDosen['email'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width"></td>
                                <td class="td-padding1">
                                    <button type="submit" name="updateDosen" class="btn btn-sm btn-primary">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('v_pengaturan/v_modalUbahPassword') ?>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
        $(document).ready(function(){
            function cekValidasi(){
                var passBaruConfirm = $('#passBaruConfirm').val()
                var passBaru = $('#passBaru').val()
                var passLamaInput = $('#passLamaInput').val()
                if (passBaruConfirm && passBaru && passLamaInput) {
                    $('#btn-simpan').attr('disabled', false)
                }else{
                    $('#btn-simpan').attr('disabled', 'disabled')
                }
            }
            $(document).on('keyup', '#passBaruConfirm',function(){
                var passBaru        = $('#passBaru').val()
                var passBaruConfirm = $(this).val()
                if (passBaruConfirm) {
                    if (passBaru !== passBaruConfirm) {
                        cekValidasi()
                        $(this).addClass('is-invalid')
                        $('#btn-simpan').attr('disabled', 'disabled')
                    }else{
                        $(this).removeClass('is-invalid')
                        $('#btn-simpan').attr('disabled', false)
                        cekValidasi()
                    }
                }else{
                    $(this).removeClass('is-invalid')
                    $('#btn-simpan').attr('disabled', 'disabled')
                    cekValidasi()
                }
                cekValidasi()
            })
            $(document).on('keyup', '#passLamaInput',function(){
                var passLama      = $('#passLama').val()
                var passLamaInput = $(this).val()
                if (passLamaInput) {
                    $.ajax({
                        url     : '<?= base_url('Pengaturan/md5Generate') ?>/'+passLama+'/'+passLamaInput,
                        type    : 'get',
                        success : function (res) {
                            if (res.error) {
                                cekValidasi()
                                $('#passLamaInput').addClass('is-invalid')
                                $('#btn-simpan').attr('disabled', 'disabled')
                            }else{
                                $('#passLamaInput').removeClass('is-invalid')
                                $('#btn-simpan').attr('disabled', false)
                                cekValidasi()
                            }
                        }
                    })
                }else{
                    $('#passLamaInput').removeClass('is-invalid')
                    $('#btn-simpan').attr('disabled', 'disabled')
                    cekValidasi()
                }
                cekValidasi()
            })
            $('#btn-simpan').attr('disabled', 'disabled')
        })
    </script>
  </body>
</html>

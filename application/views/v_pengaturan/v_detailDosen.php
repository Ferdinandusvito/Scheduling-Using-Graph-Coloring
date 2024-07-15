<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header.php"); ?>
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php", $this->data); ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar.php"); ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Detail Data Dosen</h1><hr><br>
            <table class="table-detail">
              <tr>
                  <td class="td-width">NIP</td>
                  <td class="td-padding1">: <?= $dataDosen['nip']?></td>
              </tr>
              <tr>
                  <td class="td-width">NIDN</td>
                  <td class="td-padding1">: 
                    <?php 
                        if (!empty($dataDosen['nidn'])) {
                            echo $dataDosen['nidn'];
                        }else {
                            echo "Tidak memiliki NIDN";
                        }
                    ?>
                  </td>
              </tr>
              <tr>
                  <td class="td-width">Nama</td>
                  <td class="td-padding1">: <?= $dataDosen['nama_awal'].' '.$dataDosen['nama_akhir'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Kode Dosen</td>
                  <td class="td-padding1">: <?= $dataDosen['kode_dosen'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Alamat</td>
                  <td class="td-padding1">: <?= $dataDosen['alamat'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Jenis Kelamin</td>
                  <td class="td-padding1">: <?= $dataDosen['jenis_kelamin'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">No Telp</td>
                  <td class="td-padding1">: <?= $dataDosen['telp'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Blog</td>
                  <td class="td-padding1">: <?= $dataDosen['blog'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Bidang</td>
                  <td class="td-padding1">: <?= $dataDosen['nama_bidang'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Username</td>
                  <td class="td-padding1">: <?= $dataDosen['username'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Password</td>
                  <td class="td-padding1">: <?= $dataDosen['password'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Email</td>
                  <td class="td-padding1">: <?= $dataDosen['email'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Pembimbing</td>
                  <td class="td-padding1">: <?= $dataDosen['pembimbing'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Jabatan Fungsional</td>
                  <td class="td-padding1">: <?= $dataDosen['jabatan'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Jabatan Struktural</td>
                  <td class="td-padding1">: <?= $dataDosen['jab_struktural'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Pangkat</td>
                  <td class="td-padding1">: <?= $dataDosen['jab_pangkat'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Golongan</td>
                  <td class="td-padding1">: <?= $dataDosen['jab_golongan'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Kuota</td>
                  <td class="td-padding1">: <?= $dataDosen['kuota'] ?></td>
              </tr>
              <tr>
                    <td class="td-width"></td>
                    <td class="td-padding1">
                    <?php 
                      if ($this->session->userdata("user_role") == 1) { ?>
                        <a href="<?= base_url('/Pengaturan/editKuotaDosen/'.$dataDosen['nip']) ?>" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                            Ubah
                        </a>
                        <?php
                      }else { ?>
                        <a href="<?= base_url('/Pengaturan/editDosen/'.$dataDosen['nip']) ?>" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                            Ubah
                        </a>
                        <?php
                      }
                    ?>
                    <button data-link="<?= base_url('/Pengaturan/hapusDosen/'.$dataDosen['nip']) ?>" type="button" id="do-confirm" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i>
                        Hapus
                    </button>
                  </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php"); ?>
    <?php $this->load->view("_partials/js.php"); ?>
    
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-confirm', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Pengguna?',
            content: 'Yakin akan menghapus data pengguna?',
            type: 'red',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });
      
    </script>
  </body>
</html>

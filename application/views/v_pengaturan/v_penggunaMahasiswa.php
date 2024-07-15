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
            <h1>Data Pengguna</h1><hr><br>
            <?php if ($this->session->flashdata('alert')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert'); ?>
                </div>
            <?php } ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?= base_url('Pengaturan/penggunaDosen') ?>" class="btn btn-secondary">Dosen</a>
                <a href="" class="btn btn-secondary active">Mahasiswa</a>
                <a href="<?= base_url('Pengaturan/penggunaLab') ?>" class="btn btn-secondary">Laboratorium</a>
            </div><br><br>
            <?php 
              if ($this->session->userdata("user_role") == 4) { ?>
                <a href="<?php print base_url('/assets/documents/sample-mhs.xls') ?>" class="btn btn-sm btn-success btn-skema" target="blank">
                    <i class="fas fa-file-excel"></i> 
                    Download Template Excel
                </a>
                <button type="button" class="btn btn-success btn-skema btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-file-upload"></i> 
                    Upload Excel
                </button>
                <button type="button" class="btn btn-success btn-sm btn-skema" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="fas fa-plus"></i> 
                    Tambah Mahasiswa
                </button>
                <?php
              }
            ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <?php 
                      if ($this->session->userdata("user_role") == 4) {
                        echo "<th>Action</th>";
                      }
                    ?>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($dataMHS as $row){ ?>
                      <tr>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['nama_awal'].' '.$row['nama_akhir'] ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['username'] ?></td>
                        <?php 
                          if ($this->session->userdata("user_role") == 4) { ?>
                            <td>
                              <center>
                                <a href="<?= base_url('/Pengaturan/editMahasiswa/'.$row['nim']) ?>" class="btn btn-info btn-sm">
                                  <i class="far fa-edit"></i>
                                </a>
                                <button data-link="<?= base_url('/Pengaturan/hapusMahasiswa/'.$row['nim']) ?>" type="button" id="do-confirm" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </center>
                            </td>
                            <?php
                          }
                        ?>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("v_pengaturan/v_modalUploadMHS");
      $this->load->view("v_pengaturan/v_modalTambahMHS");
      $this->load->view("_partials/footer.php");
    ?>
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

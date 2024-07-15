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
                <a href="<?= base_url('Pengaturan/penggunaMahasiswa') ?>" class="btn btn-secondary">Mahasiswa</a>
                <a href="" class="btn btn-secondary active">Laboratorium</a>
            </div><br><br>
            <?php 
              if ($this->session->userdata("user_role") == 4) { ?>
                <button type="button" class="btn btn-success btn-sm btn-skema" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="fas fa-plus"></i> 
                    Tambah Laboratorium
                </button>
                <?php
              }
            ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Laboratorium</th>
                    <th>Nama Kordas</th>
                    <th>Username</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($dataLab as $row){ ?>
                      <tr>
                        <td><?= $row['nama_laboratorium'] ?></td>
                        <td><?= $row['nama_kordas']; ?></td>
                        <td><?= $row['username'] ?></td>
                        <td>
                          <center>
                            <?php 
                              if ($this->session->userdata("user_role") == 4) { ?>
                                <a href="<?= base_url('/Pengaturan/editLab/'.$row['id_laboratorium']) ?>" class="btn btn-info btn-sm">
                                  <i class="far fa-edit"></i>
                                </a>
                                <button data-link="<?= base_url('/Pengaturan/hapusLab/'.$row['id_laboratorium']) ?>" type="button" id="do-confirm" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                                <?php
                              }
                            ?>
                            
                          </center>
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("v_pengaturan/v_modalTambahLab");
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

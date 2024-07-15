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
            <h1>Ruangan Seminar</h1><hr>
            <?php if ($this->session->flashdata('alert_danger')) {?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('alert_danger'); ?>
              </div>
            <?php } elseif ($this->session->flashdata('alert_success')) { ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('alert_success'); ?>
              </div>
            <?php } ?>
            <button type="button" class="btn btn-sm btn-primary btn-skema" data-toggle="modal" data-target="#modalTambahBidang">
                <i class="fas fa-plus"></i> Tambah Ruangan
            </button>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($listRuangan as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['ruangan'] ?></td>
                        <td><?= $row['jam_mulai'] ?></td>
                        <td><?= $row['jam_selesai'] ?></td>
                        <td>
                        <a href='<?= base_url('/pengaturan/ubahRuangan/'.$row['id_slot']) ?>' class='btn btn-sm btn-success'>
                            <i class='far fa-edit'></i> 
                            Ubah
                        </a>
                        <button data-link="<?php echo base_url('/pengaturan/hapusRuangan/'.$row['id_slot']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger">
                            <i class="far fa-trash-alt"></i> 
                            Hapus
                        </button>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
        $this->load->view("v_pengaturan/v_modalTambahRuangan");
        $this->load->view("_partials/footer.php");
    ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus bidang?',
            content: 'Yakin akan menghapus bidang?',
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

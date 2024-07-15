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
            <h1>Bidang Keahlian</h1><hr>
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
                <i class="fas fa-plus"></i> Tambah Bidang
            </button>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Bidang</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($dataBidang as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nama_bidang'] ?></td>
                        <td>
                        <a href='<?= base_url('/pengaturan/editBidang/'.$row['id_bidang']) ?>' class='btn btn-sm btn-success'>
                            <i class='far fa-edit'></i> 
                            Ubah
                        </a>
                        <button data-link="<?php echo base_url('/pengaturan/hapusBidang/'.$row['id_bidang']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger">
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
        $this->load->view("v_pengaturan/v_modalTambahBidang");
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

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
            <h1>Skema Penelitian</h1><hr><br>
            <?php if ($this->session->flashdata('alert')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert'); ?>
                </div>
            <?php } ?>
            <button type="button" class="btn btn-sm btn-primary btn-skema" data-toggle="modal" data-target="#modalTambahSkema">
                <i class="fas fa-plus"></i> Tambah Skema Abdimas
            </button> 
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Skema</th>
                    <th>Link</th>
                    <th>Nama Skema</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($listSkema as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['skema'] ?></td>
                        <td><?= $row['link'] ?></td>
                        <td>
                          <center>
                            <a href='<?= base_url('/Penelitian/skemaUbah/'.$row['id_skema']) ?>' class='btn btn-sm btn-success'><i class="fas fa-edit"></i> Ubah</i></a>
                            <button data-link="<?= base_url('/Penelitian/skemaHapus/'.$row['id_skema']) ?>" type="button" id="do-delete" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> 
                                Hapus
                            </button>
                          </center>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("v_penelitian/v_modalSkemaTambah");
      $this->load->view("_partials/footer.php");
    ?>
     <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Skema?',
            content: 'Yakin akan menghapus skema penelitian?',
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

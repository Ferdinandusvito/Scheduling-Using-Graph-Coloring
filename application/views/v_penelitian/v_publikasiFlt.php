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
            <?php
              $user_role = $this->session->userdata("user_role");
            ?>
            <div class="mb-3">
            <h1>Publikasi</h1><hr><br>
            <?php if ($this->session->flashdata('alert_success')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_success'); ?>
                </div>
            <?php } ?>

            <?php 
              if ($user_role == 2) { ?>
                <a href="<?php print site_url('/assets/documents/sample-xls.xls') ?>" class="btn btn-sm btn-success btn-skema">
                    <i class="fas fa-file-excel"></i> 
                    Download Template Excel
                </a>
                <button type="button" class="btn btn-success btn-skema btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-file-upload"></i> 
                    Upload Excel
                </button>
                <button type="button" class="btn btn-success btn-sm btn-skema" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="fas fa-plus"></i> 
                    Input Publikasi
                </button>
                <?php
              }
            ?>
            <?php 
              if ($user_role == 1 || $user_role == 4) { ?>
                <form action="<?= base_url('Publikasi/flt') ?>" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-8">
                        Cari berdasarkan
                    </div>
                    <div class="form-group col-md-2">
                      <select id="" name="nip" class="form-control">
                        <option value="">- Pilih Kode Dosen -</option>
                        <?php 
                          foreach ($load_dosen as $load_dosen) { ?>
                            <option value="<?= $load_dosen['nip'] ?>"><?= $load_dosen['kode_dosen'] ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <select id="inputState" class="form-control" name="year">
                        <option value="">Tahun</option>
                        <?php
                          $thn_skr = date('Y');
                          for ($x = $thn_skr; $x >= 1940; $x--) { ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-1">
                      <button class="btn btn-info btn-block" type="submit" name="btnFilter">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                <?php
              }
            ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <?php
                      if ($user_role == 1 || $user_role == 4) { ?>
                        <th>Kode Dosen</th>
                        <?php
                      }
                    ?>
                    <th>Document Title</th>
                    <th>Authors</th>
                    <th>Year</th>
                    <th>Affiliation</th>
                    <th>Source</th>
                    <th>City</th>
                    <?php
                      if ($user_role == 2) { ?>
                        <th>Action</th>
                        <?php
                      }
                    ?>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // var_dump($dataPublikasi);exit;
                    foreach($dataPublikasi as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <?php
                          if ($user_role == 1 || $user_role == 4) { ?>
                            <td><?= $row['kode_dosen'] ?></td>
                            <?php
                          }
                        ?>
                        <td><?= $row['document_title'] ?></td>
                        <td><?= $row['authors'] ?></td>
                        <td><?= $row['year'] ?></td>
                        <td><?= $row['affiliation'] ?></td>
                        <td><?= $row['source'] ?></td>
                        <td><?= $row['city'] ?></td>
                          <?php
                            if ($user_role == 2) { ?>
                              <td>
                                <center>
                                  <button data-link="<?= base_url('/Publikasi/hapusPublikasi/'.$row['id_publikasi']) ?>" type="button" id="do-delete" class="btn btn-sm btn-danger btn-skema"><i class="fas fa-trash-alt"></i> Hapus</button>
                                  <a href='<?= base_url('/Publikasi/ubahPublikasi/'.$row['id_publikasi']) ?>' class='btn btn-sm btn-success'><i class="fas fa-edit"></i> Ubah</a>
                                </center>
                              </td>
                              <?php
                            }
                          ?>
                      </tr>
                    <?php $no++; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("v_penelitian/v_modalUpload");
      $this->load->view("v_penelitian/v_modalInputPublikasi");
      $this->load->view("_partials/footer.php");
    ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Publikasi?',
            content: 'Yakin akan menghapus publikasi?',
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

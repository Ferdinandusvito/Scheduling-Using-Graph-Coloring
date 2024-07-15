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
            <div class="row">
                <div class="col-12">
                    <div class="col-md-12 alert-container">
          
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Pilih Kelompok yang dijadwalkan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">Nama Pembimbing</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $temp = 1;
                                    foreach($gotit as $row){ ?>
                                    <tr>
                                    <th scope="row"><?php echo $temp;
                                    $temp++; ?></th>
                                    <td><?php echo $row['judul']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <?php 
                                    echo '<td>' . $row['nama_pbb1'] . '</td>';
                                    ?>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td>
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active wawaw">
                                            <input class="my-checkbox" type="checkbox" autocomplete="off" value="<?php echo $row['tanggal']; ?>" checked> Jadwalkan
                                        </label>
                                    </div>
                                    </td>
                                    </tr>
                                    <?php } ?>                 
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-flex-start">
                                <button class="btn btn-primary checkbut mr-3">Submit</button>
                                <button class="btn btn-secondary resetbut">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>

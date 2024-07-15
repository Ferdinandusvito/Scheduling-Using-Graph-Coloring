<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Detail Fakultas</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="datadata">
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view("_partials/sidebar_admin.php") ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                          <i class="fas fa-table"></i>
                          Ubah Profil Fakultas
                    </div>
                        <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                        <form action="" method="post">
                                            <input type="hidden" class="form-control" id="<?php echo $dataFakultas['id_fakultas']; ?>" name="id_fakultas" value="<?= $dataFakultas['id_fakultas'] ?>">
                                            <div class="form-group">
                                                <label for="id_fakultas">Nama Fakultas</label>
                                                <input type="text" class="form-control" id="<?php echo $dataFakultas['nama_fakultas']; ?>" name="nama_fakultas" value="<?= $dataFakultas['nama_fakultas'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_jurusan">Kode Fakultas</label>
                                                <input type="text" class="form-control" id="<?php echo $dataFakultas['kode_fakultas']; ?>" name="kode_fakultas" value="<?= $dataFakultas['kode_fakultas'] ?>">
                                            </div>
                                            <label for="kode_fakultas">Lokasi Gedung</label>
                                            <!-- <?php if (!empty($list_gedung)) { ?>
                                                <?php foreach ($list_gedung as $row => $value) { ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="id_gedung[]" value="<?= $value['id_gedung']; ?>" <?php echo ($value['id_gedung'] == $dataLokasiGedung['id_gedung']) ? 'checked' : ''; ?>>
                                                        <?php echo $value['nama_gedung']; ?>
                                                    </div>
                                                <?php }
                                                ?>
                                            <?php } ?> -->
                                            <br><br>
                                            <button type="submit" class="btn btn-dark mt-3" name="updateFakultas">Ubah Data</button>
                                        </form>
                                    </table>
                                  </div>
                                </div>
                          </div>
              </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table"></i>
                                Daftar Program Studi
                            </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA PROGRAM STUDI</th>
                                                    <th scope="col">KODE PROGRAM STUDI</th>
                                                    <th scope="col">ANGKATAN</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_jurusanfakultas)) { ?>
                                                    <?php foreach ($list_jurusanfakultas as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['kode_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['angkatan']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('/fakultas_controllers/exploreJurusan/' . $value['id_jurusan']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                                <a href="<?= base_url('/fakultas_controllers/hapusJurusan/' . $value['id_jurusan']) ?>" class='btn btn-sm btn-danger'>Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
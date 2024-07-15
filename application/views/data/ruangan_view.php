<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Gedung dan Ruangan</title>
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

                    <!-- DataTables Example -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Ruangan
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA GEDUNG</th>
                                                <th scope="col">NAMA RUANGAN</th>
                                                <th scope="col">KAPASISTAS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_ruangan)) { ?>
                                                <?php foreach ($list_ruangan as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['nama_gedung']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nama_ruangan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['kapasitas']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/data_controllers/exploreRuangan/' . $value['id_ruangan']) ?>" class='btn btn-sm btn-dark'> Explore</a>
                                                            <a href="<?= base_url('/data_controllers/hapusRuangan/' . $value['id_ruangan']) ?>" class='btn btn-sm btn-danger'> Delete</a>
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


                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Gedung
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID GEDUNG</th>
                                                <th scope="col">NAMA GEDUNG</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_gedung)) { ?>
                                                <?php foreach ($list_gedung as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id_gedung']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nama_gedung']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/data_controllers/exploreGedung/' . $value['id_gedung']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                            <a href="<?= base_url('/data_controllers/hapusGedung/' . $value['id_gedung']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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

                    <a href="<?php print base_url('/assets/documents/template_xls/template_tambah_gedung.xls') ?>" class="btn btn-sm btn-success btn-skema" target="blank">
                        <i class="fas fa-file-excel"></i>
                        Download Template Tambah Gedung
                    </a>
                    <a href="<?php print base_url('/assets/documents/template_xls/template_tambah_ruang.xls') ?>" class="btn btn-sm btn-success btn-skema" target="blank">
                        <i class="fas fa-file-excel"></i>
                        Download Template Tambah Ruangan
                    </a>

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Tambah Gedung</h5>
                                        <form action="<?= base_url('Ruangan_controllers/tambahGedung') ?>" method="post">
                                            <div class="form-group">
                                                <label for="nama_gedung">Nama Gedung</label>
                                                <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" placeholder="Nama Gedung">
                                            </div>
                                            <br /><br /><br /><br /><br /><br /><br />
                                            <button type="submit" class="btn btn-dark mt-3" name="tambahGedung">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Ruangan</h5>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_ruangan">Nama Ruangan</label>
                                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Masukkan Nama Ruangan">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_gedung">Lokasi Gedung</label>
                                            <select class="form-control" id="id_gedung" name="id_gedung">
                                                <option value=""> - Pilih Gedung - </option>
                                                <?php foreach ($list_gedung as $list_gedung) { ?>
                                                    <option value="<?php echo $list_gedung['id_gedung']; ?>"><?php echo $list_gedung['nama_gedung']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kapasitas">Kapasitas (Orang)</label>
                                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas Kuangan">
                                        </div>
                                        <button type="submit" class="btn btn-dark mt-3" name="tambahRuangan">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 align="center">Upload Data Gedung</h3>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('Excel_import_controllers/import_gedung') ?>">
                                            <p><label>Pilih File Data Excel</label>
                                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>

                                            <input type="submit" name="import" value="Import" class="btn btn-info" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 align="center">Upload Data Ruangan</h3>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('Excel_import_controllers/import_ruangan') ?>">
                                            <p><label>Pilih File Data Excel</label>
                                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>

                                            <input type="submit" name="import" value="Import" class="btn btn-info" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Sticky Footer -->
                <!-- <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2018</span>
                    </div>
                </div>
            </footer> -->
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/mahasiswa/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
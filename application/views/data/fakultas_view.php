<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Fakultas</title>
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
                Daftar Fakultas
            </div>
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA FAKULTAS</th>
                                    <th scope="col">KODE FAKULTAS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($list_fakultas)) { ?>
                                    <?php foreach ($list_fakultas as $row => $value) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $value['nama_fakultas']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['kode_fakultas']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/fakultas_controllers/exploreFakultas/' . $value['id_fakultas']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                <a href="<?= base_url('/fakultas_controllers/hapusFakultas/' . $value['id_fakultas']) ?>" class='btn btn-sm btn-danger'>Delete</a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
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
                                                    <th scope="col">FAKULTAS</th>
                                                    <th scope="col">PROGRAM STUDI</th>
                                                    <th scope="col">KODE PROGRAM STUDI</th>
                                                    <th scope="col">ANGKATAN</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_jurusan)) { ?>
                                                    <?php foreach ($list_jurusan as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_fakultas']; ?>
                                                            </td>
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
                <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-default">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Fakultas</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama_fakultas">Nama Fakultas</label>
                                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Nama Fakultas">
                            </div>
                            <div class="form-group">
                                <label for="kode_fakultas">Kode Fakultas</label>
                                <input type="text" class="form-control" id="kode_fakultas" name="kode_fakultas" placeholder="Kode Fakultas">
                            </div>
                            <div class="form-group">
                                <!-- <label for="id_gedung">Lokasi Gedung</label>
                                <select class="form-control" id="id_gedung" name="id_gedung">
                                    <option value=""> - Pilih Gedung - </option>
                                    <?php foreach ($list_gedung as $list_gedung) { ?>
                                        <option value="<?php echo $list_gedung['id_gedung']; ?>"><?php echo $list_gedung['nama_gedung']; ?> </option>
                                    <?php } ?>
                                </select> -->
                                <br>
                                <label for="nama_gedung">Lokasi Gedung </label>
                                    <?php if (!empty($list_gedung2)) { ?>
                                        <?php foreach ($list_gedung2 as $row => $value) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="id_gedung[]" value="<?= $value['id_gedung']; ?>">
                                                <?php echo $value['nama_gedung']; ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-dark mt-3" name="tambahFakultas">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-default">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Program Studi</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama_jurusan">Nama Program Studi</label>
                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Nama Program Studi">
                            </div>
                            <div class="form-group">
                                <label for="kode_jurusan">Kode Program Studi</label>
                                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" placeholder="Kode Program Studi">
                            </div>
                            <div class="form-group">
                                <label for="id_fakultas">Asal Fakultas</label>
                                <select class="form-control" id="id_fakultas" name="id_fakultas">
                                    <option value=""> - Pilih Fakultas - </option>
                                    <?php foreach ($list_fakultas as $list_fakultas) { ?>
                                        <option value="<?php echo $list_fakultas['id_fakultas']; ?>"><?php echo $list_fakultas['nama_fakultas']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_jurusan">Tahun Angkatan</label>
                                <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Tahun Angkatan">
                            </div>
                            <button type="submit" class="btn btn-dark mt-3" name="tambahJurusan">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- /.container-fluid -->
    </div>
</div>
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
</body>

</html>
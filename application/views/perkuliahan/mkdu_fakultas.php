<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Mata Kuliah Dasar Umum Fakultas</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="datadata">
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view("_partials/sidebar.php") ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- DataTables Example -->
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Mata Kuliah Dasar Umum Jurusan
                        </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA FAKULTAS</th>
                                                    <th scope="col">NAMA PROGRAM STUDI</th>
                                                    <th scope="col">ANGKATAN</th>
                                                    <th scope="col">NAMA MATA KULIAH</th>
                                                    <th scope="col">KODE MATA KULIAH</th>
                                                    <th scope="col">SKS</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_mkdu)) { ?>
                                                    <?php foreach ($list_mkdu as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_fakultas']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['angkatan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_matkul']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['kode_matkul']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['sks']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('/perkuliahan_controllers/exploreMKDU_jurusan/' . $value['id_perkuliahan']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                                <a href="<?= base_url('/perkuliahan_controllers/hapusMKDU_jurusan/' . $value['id_perkuliahan']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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
                    <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Mata Kuliah Dasar Umum</h5>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="id_fakultas">Nama Fakultas</label>
                                            <select class="form-control" id="fakultas_tmkdu" name="id_fakultas">
                                                <option value=""> - Pilih Fakultas - </option>
                                                <?php foreach ($list_fakultas as $list_fakultas) { ?>
                                                    <option value="<?php echo $list_fakultas['id_fakultas']; ?>"><?php echo $list_fakultas['nama_fakultas']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_fakultas">Nama Program Studi</label>
                                            <select class="form-control" id="jurusan_tmkdu" name="id_jurusan">
                                                <option value=""> - Pilih Program Studi - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <select class="form-control" id="angkatan_tmkdu" name="angkatan">
                                                <option value=""> - Pilih Tahun Angkatan - </option>
                                            </select>
                                        </div>
                                        <label for="kode_matkul">Nama Mata Kuliah</label>
                                        <?php if (!empty($list_matkul)) { ?>
                                            <?php foreach ($list_matkul as $row => $value) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="id_matkul[]" value="<?= $value['id_matkul']; ?>">
                                                    <?php echo $value['nama_matkul']; ?>
                                                </div>
                                            <?php }
                                            ?>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-dark mt-3" name="tambahMkdu">tambah</button>
                                    </form>
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
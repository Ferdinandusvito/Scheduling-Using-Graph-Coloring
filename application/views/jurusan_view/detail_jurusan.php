<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Detail Program Studi</title>
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
                            Profil Program Studi
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="id_fakultas">Nama Fakultas</label>
                                        <select class="form-control" id="id_fakultas" name="id_fakultas">
                                            <option value="<?= $jurusanByID['nama_jurusan'] ?>" selected> <?= $jurusanByID['nama_fakultas'] ?> </option>
                                            <?php foreach ($list_fakultas as $list_fakultas) { ?>
                                                <option value="<?php echo $list_fakultas['id_fakultas']; ?>"><?php echo $list_fakultas['nama_fakultas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jurusan">Nama Program Studi</label>
                                        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?= $jurusanByID['nama_jurusan'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jurusan">Tahun Angkatan</label>
                                        <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?= $jurusanByID['angkatan'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-dark mt-3" name="editJurusan">Ubah Data</button>
                                </form>
                            </div>
                            <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Kelas
                        </div>
                        <div class="card card-default">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA KELAS</th>
                                                <th scope="col">DOSEN WALI</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($kelasJurusan)) { ?>
                                                <?php foreach ($kelasJurusan as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['nama_kelas']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['dosen_wali']; ?>
                                                        </td>
                                                        <td>
                                                            <!-- <a href="<?= base_url('/fakultas_controllers/exploreKelas/' . $value['id_kelas']) ?>" class='btn btn-sm btn-dark'>Explore</a> -->
                                                            <a href="<?= base_url('/fakultas_controllers/hapuskelas/' . $value['id_kelas']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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

                    <a href="<?php print base_url('/assets/documents/template_xls/template_tambah_kelas.xls') ?>" class="btn btn-sm btn-success btn-skema" target="blank">
                        <i class="fas fa-file-excel"></i>
                        Download Template Tambah Kelas
                    </a>

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Kelas</h5>
                                    <form action="<?= base_url('Data_controllers/tambahKelas') ?>" method="post">
                                        <input type="hidden" name="id_jurusan" value="<?php echo $jurusanByID['id_jurusan']; ?>">
                                        <div class="form-group">
                                            <label for="nama_jurusan">Nama Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jurusan">Kode Dosen Wali</label>
                                            <input type="text" class="form-control" id="dosen_wali" name="dosen_wali" placeholder="Kode Dosen Wali">
                                        </div>

                                        <button type="submit" class="btn btn-dark mt-3" name="tambahKelas">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="container">
                                        <br />
                                        <h3 align="center">Upload Data Kelas</h3>

                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('Excel_import_controllers/import_kelas') ?> ">
                                            <br>
                                            <p><label>Pilih File Data Excel</label>
                                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                                            <br />
                                            <input type="submit" name="import" value="Import" class="btn btn-info" />
                                        </form>
                                        <br />
                                        <div class="table-responsive" id="kelas">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<!-- <script>
    $(document).ready(function() {

        load_data();

        function load_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>fakultas_controllers/fetch",
                method: "POST",
                success: function(data) {
                    $('#customer_data').html(data);
                }
            })
        }

        $('#import_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>fakultas_controllers/import",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });

    });
</script> -->
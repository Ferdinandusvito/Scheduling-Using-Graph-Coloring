<!DOCTYPE html>
<html lang="en">

<head>
    <title>TA Mahasiswa - Dashbo</title>
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
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $my_profile['nama_depan'] . " " . $my_profile['nama_belakang'] ?></h5>
                            <!-- <p class="card-text"></p> -->
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $my_profile['nip'] ?></li>
                            <li class="list-group-item"><?= $my_profile['kode_dosen'] ?></li>
                        </ul>
                    </div>
                    <br>

                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Mata Kuliah Yang Di Ampu
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA MATA KULIAH</th>
                                                <th scope="col">KODE MATA KULIAH</th>
                                                <th scope="col">SKS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($matkul_ajarku)) { ?>
                                                <?php foreach ($matkul_ajarku as $row => $value) { ?>
                                                    <tr>
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
                                                            
                                                            <a href="<?= base_url('/perkuliahan_controllers/hapusMatkul_ajarku/' . $value['id_mengajar']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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
                            Daftar Mata Kuliah
                        </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="" method="post">
                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NAMA MATA KULIAH</th>
                                                        <th scope="col">KODE MATA KULIAH</th>
                                                        <th scope="col">SKS</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($list_matkul)) { ?>
                                                        <?php foreach ($list_matkul as $row => $value) { ?>
                                                            <tr>
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
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="id_matkul[]" value="<?= $value['id_matkul']; ?>">
                                                                        <!-- <?php echo $value['nama_matkul']; ?> -->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table> <br>
                                            <button type="submit" class="btn btn-dark float-right" name="ambilMatkul">Ambil Mata Kuliah</button>
                                        </form>
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
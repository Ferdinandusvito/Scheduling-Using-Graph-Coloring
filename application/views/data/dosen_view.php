<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Dosen</title>
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
                            Daftar Dosen
                        </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA</th>
                                                    <th scope="col">NIP</th>
                                                    <th scope="col">KODE DOSEN</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_dosen)) { ?>
                                                    <?php foreach ($list_dosen as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_depan']; ?> <?php echo $value['nama_belakang']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nip']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['kode_dosen']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('/dosen_controllers/exploreDosen/' . $value['nip']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                                <a href="<?= base_url('/dosen_controllers/hapusDosen/' . $value['nip']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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
                        
                        <br>

                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table"></i>
                                Daftar Dosen Baru
                            </div>
                                <div class="card card-default">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NAMA</th>
                                                        <th scope="col">NIP</th>
                                                        <th scope="col">KODE DOSEN</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($list_dosenbaru)) { ?>
                                                        <?php foreach ($list_dosenbaru as $row => $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $value['nama_depan']; ?> <?php echo $value['nama_belakang']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['nip']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['kode_dosen']; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= base_url('/dosen_controllers/accDosen/' . $value['nip']) ?>" class='btn btn-sm btn-dark col-sm-3'>Acc</a>
                                                                    <a href="<?= base_url('/dosen_controllers/hapusDosen/' . $value['nip']) ?>" class='btn btn-sm btn-danger col-sm-3'>Reject</a>
                                                                    
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
        </div>
    </div>
</body>

</html>
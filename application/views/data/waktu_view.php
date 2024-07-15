<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Waktu</title>
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
                            Data Hari
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">KODE HARI</th>
                                                <th scope="col">NAMA HARI</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_hari)) { ?>
                                                <?php foreach ($list_hari as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id_hari']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nama_hari']; ?>
                                                        </td>
                                                        <td> 
                                                            <a href="<?= base_url('/data_controllers/exploreHari1/' . $value['id_hari']) ?>" class='btn btn-sm btn-dark'> Explore</a>
                                                            <a href="<?= base_url('/data_controllers/hapusHari1/' . $value['id_hari']) ?>" class='btn btn-sm btn-danger'> Delete</a>
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
                            Data Jam
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">KODE JAM</th>
                                                <th scope="col">NAMA JAM</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_jam)) { ?>
                                                <?php foreach ($list_jam as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['kode_jam']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nama_jam']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/data_controllers/exploreJam1/' . $value['kode_jam']) ?>" class='btn btn-sm btn-dark'> Explore</a>
                                                            <a href="<?= base_url('/data_controllers/hapusJam1/' . $value['kode_jam']) ?>" class='btn btn-sm btn-danger'> Delete</a>
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


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Hari</h5>
                                    <form action="<?= base_url('Data_controllers/tambahHari') ?>" method="post">
                                        <div class="form-group">
                                            <label for="kode_jam">Kode Hari</label>
                                            <input type="text" class="form-control" id="id_hari" name="id_hari" placeholder="Kode Hari">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jam">Nama Hari</label>
                                            <input type="text" class="form-control" id="nama_hari" name="nama_hari" placeholder="Nama Hari">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-dark mt-3" name="tambahHari">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Jam</h5>
                                    <form action="<?= base_url('Data_controllers/tambahJam') ?>" method="post">
                                        <div class="form-group">
                                            <label for="kode_jam">Kode Jam</label>
                                            <input type="text" class="form-control" id="kode_jam" name="kode_jam" placeholder="Kode Jam">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jam">Nama Jam</label>
                                            <input type="text" class="form-control" id="nama_jam" name="nama_jam" placeholder="Nama Jam">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-dark mt-3" name="tambahJam">Submit</button>
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
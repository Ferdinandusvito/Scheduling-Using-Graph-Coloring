<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Mata Kuliah</title>
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
                            Daftar Mata Kuliah
                        </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
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
                                                                <a href="<?= base_url('/perkuliahan_controllers/exploreMatkul/' . $value['id_matkul']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                                <a href="<?= base_url('/perkuliahan_controllers/hapusMatkul/' . $value['id_matkul']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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
                                    <h5 class="card-title">Tambah Mata Kuliah</h5>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_matkul">Nama Mata Kuliah</label>
                                            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Nama Mata Kuliah">
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_matkul">Kode Mata Kuliah</label>
                                            <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" placeholder="Kode Mata Kuliah">
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_matkul">SKS</label>
                                            <input type="text" class="form-control" id="sks" name="sks" placeholder="Jumlah SKS">
                                        </div>
                                        <button type="submit" class="btn btn-dark mt-3" name="tambahMatkul">Submit</button>
                                    </form>
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
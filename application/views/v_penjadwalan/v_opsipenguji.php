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
                <div class="mb-3">
                    <h1>Opsi Penguji</h1><hr>
                </div>
                <table class="table">
                    <thead>
                         <tr>
                        <th scope="col">IDTA</th>
                        <th scope="col">TOPIK</th>
                        <th scope="col">JUDUL</th>
                        <th scope="col">Pembimbing 1</th>
                        <th scope="col">Pembimbing 2</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( !empty($datata)){ ?>
                        <?php foreach ($datata as $row => $value ) { ?>
                        <tr>
                            <td>
                                <?php echo $value['idta']; ?>
                            </td>
                            <td>
                                <?php echo $value['topik']; ?>
                            </td>
                            <td>
                                <?php echo $value['judul']; ?>
                            </td>
                            <td>
                                <?php echo $value['pbb1']; ?>
                            </td>
                            <td>
                                <?php echo $value['pbb2']; ?>
                            </td>
                        </tr>
                        <?php } 
                        ?>
                    <?php } ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <h2> Penguji 1 </h2>
                         <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bidang Topik</th>
                        <th scope="col">Value</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( !empty($calonpenguji1)){ ?>
                        <?php foreach ($calonpenguji1 as $row ) { ?>
                        <tr>
                            <td>
                                <?php echo $row['nip']; ?>
                            </td>
                            <td>
                                <?php echo $row['kode_dosen']; ?>
                            </td>
                            <td>
                                <?php echo $row['bidang_dosen']; ?>
                            </td>
                            <td>
                                <?php echo $row['value_bidang1']; ?>
                            </td>
                            <td>
                                <?php echo $row['id_jabatan']; ?>
                            </td>
                            <td>
                                <? if ($row = NULL) {
                                echo 'Tidak Tersedia Penguji';
                                } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <h2> Penguji 2 </h2>
                         <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bidang Topik</th>
                        <th scope="col">Value</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( !empty($calonpenguji2)){ ?>
                        <?php foreach ($calonpenguji2 as $row) { ?>
                        <tr> 
                            <td>
                                <?php echo $row['nip']; ?>
                            </td>
                            <td>
                                <?php echo $row['kode_dosen']; ?>
                            </td>
                            <td>
                                <?php echo $row['id_bidang2']; ?>
                            </td>
                            <td>
                                <?php echo $row['value_bidang2']; ?>
                            </td>
                            <td>
                                <?php echo $row['id_jabatan']; ?>
                            </td>
                            <td>
                                <? if ($row = NULL) {
                                echo 'Tidak Tersedia Penguji';
                                } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <h2> Penguji 3 </h2>
                         <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bidang Topik</th>
                        <th scope="col">Value</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( !empty($calonpenguji3)){ ?>
                        <?php foreach ($calonpenguji3 as $row) { ?>
                        <tr> 
                            <td>
                                <?php echo $row['nip']; ?>
                            </td>
                            <td>
                                <?php echo $row['kode_dosen']; ?>
                            </td>
                            <td>
                                <?php echo $row['id_bidang2']; ?>
                            </td>
                            <td>
                                <?php echo $row['value_bidang2']; ?>
                            </td>
                            <td>
                                <?php echo $row['id_jabatan']; ?>
                            </td>
                            <td>
                                <? if ($row = NULL) {
                                echo 'Tidak Tersedia Penguji';
                                } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <td>
                <a href="<?= base_url('Penjadwalan/linear_programmingfinal/')?>" class='btn btn-sm btn-success'>Jadwalkan</a>
                <!-- <a  value="<?php echo $value['idta']; ?>" href="<?= site_url('penjadwalan/linear_programmingfinal/'. $value['idta']); ?>" class='btn btn-sm btn-success'>JADWALKAN</a> -->
                <!-- <form action="<?= base_url('/penjadwalan/addpreference/')?>" method="post">
                    <input type="hidden" value="<?php echo htmlspecialchars(json_encode($calonpenguji1));?>">
                    <button type="submit" value="Submit">Submit</button>
                </form> -->
                </td>
                </tr>     
            </div>
        </div>
    </body>
</html>




<!-- 
                    <a href="<?= base_url('/penjadwalan/addpreference/')?>" class='btn btn-sm btn-success'>Add Preferences</a> -->
                    <!-- <a href="<?= base_url('/penjadwalan/addpreference?calonpenguji1=' . http_build_query($calonpenguji1). "&calonpenguji2=".http_build_query($calonpenguji2). "&calonpenguji3=".http_build_query($calonpenguji3))?>" class='btn btn-sm btn-success'>Add Preferences</a> -->
                                    <!-- <a href="<?= base_url('/penjadwalan/addpreference/')?>" class='btn btn-sm btn-success'>Add Preferences</a> -->
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
                <a href="<?= base_url('/penjadwalan/addpreference/'.$idta)?>" class='btn btn-sm btn-success'>Add Preferences</a>
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
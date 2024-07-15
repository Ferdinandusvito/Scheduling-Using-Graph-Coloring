<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Preferensi Jadwal Dosen</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="mb-3">
                    <br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Pilih Preferensi Jadwal Mengajar
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="Preferensi_controllers/create" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">06:30:00</th>
                                                    <th scope="col">07:30:00</th>
                                                    <th scope="col">08:30:00</th>
                                                    <th scope="col">09:30:00</th>
                                                    <th scope="col">10:30:00</th>
                                                    <th scope="col">11:30:00</th>
                                                    <th scope="col">12:30:00</th>
                                                    <th scope="col">13:30:00</th>
                                                    <th scope="col">14:30:00</th>
                                                    <th scope="col">15:30:00</th>
                                                    <th scope="col">16:30:00</th>
                                                    <th scope="col">17:30:00</th>
                                                    <th scope="col">18:30:00</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal as $key => $jadwal) : ?>
                                                    <tr>
                                                        <td>
                                                            <!-- $query = $this->db->query("YOUR QUERY"); -->
                                                            <?php echo $jadwal['nama_hari'] ?>
                                                            <input type="hidden" id="custId" name="nama_hari[]" value="<?php echo $jadwal['id_hari'] ?>">
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="shift1<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift1'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="shift2<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift2'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="shift3<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift3'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="shift4<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift4'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2" name="shift5<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift5'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="6" id="defaultCheck2" name="shift6<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift6'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="7" id="defaultCheck2" name="shift7<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift7'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="8" id="defaultCheck2" name="shift8<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift8'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="9" id="defaultCheck2" name="shift9<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift9'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="10" id="defaultCheck2" name="shift10<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift10'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="11" id="defaultCheck2" name="shift11<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift11'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="12" id="defaultCheck2" name="shift12<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift12'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="13" id="defaultCheck2" name="shift13<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi[$key]['shift13'] == 1 ? 'checked' : ''; ?>>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="mb-3">
                    <br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Preferensi Jadwal Mengajar
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="preferensi/create" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">06:30:00</th>
                                                    <th scope="col">07:30:00</th>
                                                    <th scope="col">08:30:00</th>
                                                    <th scope="col">09:30:00</th>
                                                    <th scope="col">10:30:00</th>
                                                    <th scope="col">11:30:00</th>
                                                    <th scope="col">12:30:00</th>
                                                    <th scope="col">13:30:00</th>
                                                    <th scope="col">14:30:00</th>
                                                    <th scope="col">15:30:00</th>
                                                    <th scope="col">16:30:00</th>
                                                    <th scope="col">17:30:00</th>
                                                    <th scope="col">18:30:00</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php reset($jadwal) ?>
                                                <?php foreach ($jadwal2 as $key => $jadwal) : ?>
                                                    <tr>
                                                        <td>
                                                            <!-- $query = $this->db->query("YOUR QUERY"); -->
                                                            <?php echo $jadwal['nama_hari'] ?>
                                                            <input type="hidden" id="custId" name="nama_hari[]" value="<?php echo $jadwal['id_hari'] ?>">
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="shift1<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift1'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="shift2<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift2'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="shift3<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift3'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="shift4<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift4'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2" name="shift5<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift5'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="6" id="defaultCheck2" name="shift6<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift6'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="7" id="defaultCheck2" name="shift7<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift7'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="8" id="defaultCheck2" name="shift8<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift8'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="9" id="defaultCheck2" name="shift9<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift9'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="10" id="defaultCheck2" name="shift10<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift10'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="11" id="defaultCheck2" name="shift11<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift11'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="12" id="defaultCheck2" name="shift12<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift12'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="13" id="defaultCheck2" name="shift13<?php echo $jadwal['id_hari'] ?>" <?php echo $preferensi2[$key]['shift13'] == 1 ? 'checked' : ''; ?> disabled>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <?php $this->load->view("_partials/footer.php") ?>
</body>

</html>
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
                    <h1>Pilih Preferensi Jadwal Anda</h1><hr>
                    <form action="preferensi/create" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Shift1</th>
                                <th scope="col">Shift2</th>
                                <th scope="col">Shift3</th>
                                <th scope="col">Shift4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $jadwal as $jadwal ): ?>
                                <tr>
                                <th scope="row">nomer</th>
                                <td>
                                <!-- $query = $this->db->query("YOUR QUERY"); -->
                                    <?php echo $jadwal['tanggal'] ?> 
                                    <input type="hidden" id="custId" name="tanggal[]" value="<?php echo $jadwal['id_pekansidang'] ?>">
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="shift1<?php echo $jadwal['id_pekansidang'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="shift2<?php echo $jadwal['id_pekansidang'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="shift3<?php echo $jadwal['id_pekansidang'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="shift4<?php echo $jadwal['id_pekansidang'] ?>">
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
    </body>
</html>
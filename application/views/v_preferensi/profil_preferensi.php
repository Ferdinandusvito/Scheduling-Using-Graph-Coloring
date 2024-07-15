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
                    <h1>Profil Preferensi</h1><hr>
                </div>
                <table class="table">
                    <thead>
                         <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Shift1</th>
                        <th scope="col">Shift2</th>
                        <th scope="col">Shift3</th>
                        <th scope="col">Shift4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baru_jadwaldosen as $row) { ?>
                        <tr> 
                            <td>
                                <?php echo $row['nip']; ?>
                            </td>
                            <td>
                                <?php echo $row['tanggal']; ?>
                            </td>
                            <td>
                                <?php echo $row['shift1']; ?>
                            </td>
                            <td>
                                <?php echo $row['shift2']; ?>
                            </td>
                            <td>
                                <?php echo $row['shift3']; ?>
                            </td>
                            <td>
                                <?php echo $row['shift4']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
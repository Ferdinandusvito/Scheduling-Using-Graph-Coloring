<?php
include'functions.php';
$datarow = $db->get_row("SELECT * FROM tb_url");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Fakultas</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  <style type="text/css">
    .form-horizontal .control-label {
      text-align: left;
    }
  </style>
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
      
      <div class="content-wrapper">
        <section class="content container-fluid">
          <?php
          if(file_exists($mod.'.php'))
            include $mod.'.php';
          else
            include 'home.php';
          ?>

        </section>
      </div>
      <footer class="main-footer">
        <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span><strong>Telkom University - Course Scheduling System &copy; 2020 All rights reserved.</span>
                </div>
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
          </ul>
        </aside>
        <div class="control-sidebar-bg"></div>
      </div>
      
      <script src="../assets/adminlte/bower/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="../assets/adminlte/bower/datatables/js/jquery.dataTables.min.js"></script>
      <script src="../assets/adminlte/bower/datatables/js/dataTables.bootstrap.js"></script>
      <script src="../assets/adminlte/bower/chart.js/Chart.js"></script>
      <script src="../assets/adminlte/bower/fastclick/lib/fastclick.js"></script>
      <script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
      <script src="../assets/adminlte/dist/js/demo.js"></script>
    </strong>
  </body>
  </html>

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
            <h1>Monitoring Tugas Akhir</h1><hr><br>
            <?php if ($this->session->flashdata('alert_setuju')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_setuju'); ?>
                </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-chart-bar"></i>
                    Grafik Pengajuan Topik Tugas Akhir</div>
                  <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="20"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10"></div>
              <div class="col-md-2">
                <button type="button" href="" class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">
                <i class="fas fa-file-excel"></i>
                Export Data to Excel
                </button>
              </div>
            </div>
            <?php $this->load->view('pkip/ModalExportTugasakhir') ?>
            <br>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>TOPIK</th>
                    <th>TAHUN</th>
                    <th>PENERBIT</th>
                    <th>SEMESTER</th>
                    <th>BIDANG</th>
                    <!--<th>Action</th>-->
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($datatugasakhir as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['topik'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td><?= $row['bidang'] ?></td>
                        <!--<td>-->
                        <!--  <center>-->
                        <!--    <a href='<?= base_url('/pkip/penelitianDetail/'.$row['idta']) ?>' class='btn btn-sm btn-primary'>Detail</i></a>-->
                        <!--  </center>-->
                        <!--</td>-->
                      </tr>
                    <?php $no++; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function() {
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        $.ajax({
          url : '<?= base_url('pkip/countTopik') ?>',
          type : 'get',
          success : function (response) {
            var dataKode = []
            var dataCount = []
            $.each(response, function(key, value){
              dataKode.push(value.kode_dosen)
              dataCount.push(value.jmlTopik)
            })
            var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: dataKode,
                datasets: [{
                  label: "Jumlah Topik",
                  backgroundColor: "rgba(2,117,216,1)",
                  borderColor: "rgba(2,117,216,1)",
                  data: dataCount,
                }],
              },
              options: {
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'month'
                    },
                    gridLines: {
                      display: false
                    },
                    ticks: {
                      maxTicksLimit: 0
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      min: 0,
                      max: 100,
                      maxTicksLimit: 0
                    },
                    gridLines: {
                      display: true
                    }
                  }],
                },
                legend: {
                  display: false
                }
              }
            });
          }
        })
      })
      // Set new default font family and font color to mimic Bootstrap's default styling
      
    </script>
  </body>
</html>

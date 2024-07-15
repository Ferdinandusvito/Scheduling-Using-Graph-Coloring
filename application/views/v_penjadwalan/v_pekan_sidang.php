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
                    <h1>Generate Penjadwalan</h1><hr>
                </div>
                    <div class="row">
                        <div class="col">
                            <div class="alert-container">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="card-body">
                                    <!-- <form action="<?php echo base_url('penjadwalan/create');?>" method="post">
                                        <label for="exampleInputEmail1">Pilih jangka waktu yang diinginkan</label>
                                        <input type="text" name="daterange" value="" />
                                        <div id="apaan">

                                        </div>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
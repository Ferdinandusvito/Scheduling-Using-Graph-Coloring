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
                    <h1>Profil </h1><hr>
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="jadwalRes" width="100%" cellspacing="0">
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  
                </div>
              </div>
          </div>
          <div class="float-md-right">
           
          </div>
        </div>
      </div>
                </div>
            </div>
        </div>
    </body>
</html>
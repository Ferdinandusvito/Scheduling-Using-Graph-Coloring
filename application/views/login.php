<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/header.php") ?>
  <title>PENJADWALAN DOSEN LUAR BIASA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/telkom_university.png') ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main_main.css') ?>">

  	<?php if ($this->session->flashdata('alert_gagal')) { ?>
		<div class="alert alert-danger wrap-input100 validate-input m-b-16">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo $this->session->flashdata('alert_gagal'); ?>
		</div>
	<?php } ?>
	<?php if ($this->session->flashdata('alert')) {?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('alert'); ?>
        </div>
    <?php } ?>
	
	<!-- Navbar 2 -->
	<!-- <div class="pos-f-t">
		
		<nav class="navbar navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="login">Tel-U CUSS</a>
			<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" id="navbarTogglerDemo03">
				<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
					<input class="form-control mr-sm-2" type="text" name="username" placeholder="Username">
					<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
					<button class="btn btn-light my-2 my-sm-0" type="submit" class="login100-form-btn">Login</button>
				</form>
			</div>
		</nav>
		<div class="collapse" id="navbarToggleExternalContent">
			<div class="bg-dark p-4">
				<center>
					<img src="<?= base_url('assets/img/user-icon.png') ?>" alt="" style="border-radius:100px; height:100px; margin:20px;">
					</center>
					<div class="dropdown"></div>
						<form class="card card-default" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
							<input class="form-control" type="text" name="username" placeholder="Username">
							<input class="form-control" type="password" name="password" placeholder="Password">
							<br>
							<button class="btn btn-dark" type="submit" class="login100-form-btn">Login</button>
						</form>
					</div>
			</div>
		</div>
	</div> -->
	
<!-- Navbar 1 -->
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<a class="navbar-brand mr-1" href="<?php echo site_url('login') ?>">Penjadwalan Dosen Luar Biasa</a>
		
		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
		</button>
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<center>
					<img src="<?= base_url('assets/img/user-icon.png') ?>" alt="" style="border-radius:100px; height:100px; margin:20px;">
					</center>
					<div class="dropdown"></div>
						<form class="card card-default" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
							<input class="form-control" type="text" name="username" placeholder="Username">
							<input class="form-control" type="password" name="password" placeholder="Password">
							<br>
							<button class="btn btn-dark" type="submit" class="login100-form-btn">Login</button>
						</form>
					</div>
				</div>
			</li>
		</ul>

		<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" id="navbarTogglerDemo03">
			<form class="form-inline my-2 my-lg-0" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
				<input class="form-control mr-sm-2" type="text" name="username" placeholder="Username">
				<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
				<button class="btn btn-light my-2 my-sm-0" type="submit" class="login100-form-btn">Login</button>
			</form>
		</div>

	</nav>
</head>

<body>

<div class="datadata">
	<div class="right"><br><br>
		<div class="right-tittle">Create Account</div>
		<div class="right-subtittle">Make Your Own Account</div>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="nama_depan">Nama Depan</label>
							<input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="nama_belakang">Nama Belakang</label>
							<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang">
						</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-9 mb-3">
								<label for="nip">NIP</label>
								<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required>
							</div>
							<div class="col-md-3 mb-3">
								<label for="kode_dosen">Kode Dosen</label>
								<input type="text" class="form-control" id="kode_dosen" name="kode_dosen" placeholder="Kode Dosen" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12 mb-3">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin</label>
							<div class="form-group">
								<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" required=""> Laki-Laki
								<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" required=""> Prempuan
							</div>
                    	</div>
						<!-- <label for="nama_depan">Jenis Kelamin</label>
						<div class="form-check ml-4">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Laki - Laki
								</label>
						</div>
						<div class="form-check ml-4">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
								<label class="form-check-label" for="exampleRadios2">
									Perempuan
								</label>
						</div> -->
						<button class="btn btn-dark mt-2" type="submit" name="buatAkun">Buat Akun</button>
					</form>	
                </div>
            </div>
        </div>
	</div>

	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/js/main.js') ?>"></script>
	
	<div id="footer">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
			<span><strong>Telkom University - Penjadwalan Dosen Luar Biasa</span>
			</div>
		</div>
	</div>
</body>

</html>
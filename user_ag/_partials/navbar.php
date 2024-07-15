
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="<?php echo site_url('home') ?>">Tel - U CUSS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    </button>

   <!-- Navbar Search -->
   <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
        
    </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <center>
                <img src="<?= base_url('assets/img/user-icon.png') ?>" alt="" style="border-radius:100px; height:100px; margin:20px;">
                <span class="hidden-xs"><b><?php if($this->session->userdata('level')=='Admin'):?>
                      <?=$this->session->userdata('user')?>
                      <?php else:?>
                        <?=$this->session->userdata('nama_depan')?>
                        <?=$this->session->userdata('nama_belakang')?>
                      <?php endif;?></b>
                </span>
                <div class="dropdown-divider"></div>
                <?php 
                    if ($this->session->userdata('user_role') == 4 ) {

                    }else { ?>
                        <a class="dropdown-item" href="<?= base_url('/Pengaturan') ?>">Pengaturan</a>
                        <?php
                    }
                ?>
                <a class="dropdown-item" href="<?= base_url('login/logout') ?>">Keluar</a>
                </center>
            </div>
        </li>
    </ul>
</nav>


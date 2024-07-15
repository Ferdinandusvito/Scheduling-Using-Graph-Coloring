<?php
if ($this->session->userdata("id_status") == 0) {
    $this->load->view("_partials/sidebar_admin.php");
} else if ($this->session->userdata("id_status") == 2) {
    $this->load->view("_partials/sidebar_dsn.php");
}

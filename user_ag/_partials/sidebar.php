<?php
if ($this->session->userdata("user_role") == 0) {
    $this->load->view("_partials/sidebar_admin.php");
} else {
    $this->load->view("_partials/sidebar_dsn.php");
}

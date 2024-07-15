<?php 
    class Account extends MY_Controller
    {
        function setUserRole($user_role_id){
            $setRoleId = ['user_role' => $user_role_id];
            $this->session->set_userdata($setRoleId);

            redirect(base_url('home'));
        }





    }
    
?>
<?php

class MY_Controller extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		if (empty($this->session->userdata('username'))) {
			redirect(base_url("login"));
		}
		$this->load->model('m_akun');
		$this->data['getUserRole'] = $this->m_akun->getUserRole();

		// $this->load->view('_partials/sidebar.php', $data);

	}
	
	public function db_connect($persistent = FALSE)
    {
    
        $this->options[PDO::ATTR_PERSISTENT] = $persistent;
    
        // Added code start
        $this->options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        // Added code end
        return new PDO($this->dsn, $this->username, $this->password, $this->options);
        
    }


}

?>

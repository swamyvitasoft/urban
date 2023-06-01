<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
	   $this->session->unset_userdata('logged_in');
	   $this->session->sess_destroy();
	   redirect(admin_url('login'),'refresh');	
	}
	
}

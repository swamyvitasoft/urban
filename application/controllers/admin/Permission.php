<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Permission extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
        $this->load->model('adminpanel');
								}
	public function index()
	{
		$this->load_body();
	}
	public function load_body()
	{
		$unlock = $this->input->post('unlock');
		$scan_code = $this->input->post('scan_code');
		if(!empty($unlock) && !empty($scan_code)) {
			$unlocked = md5($unlock);
			$this->input->set_cookie('unlocked', $unlocked, 900);
			require_once APPPATH.'third_party/googleLib/GoogleAuthenticator.php';
            $gauth = new GoogleAuthenticator();
        	$checkResult = $gauth->verifyCode('UQ6NGC4QA6CLIIAD', $scan_code, 2);
			if($unlocked == 'be2280f69a5199998055f035523feedf' && $checkResult) 
			{
				$message = array(
					"title" => "Settings",
					"message" => "Successfully Unlocked",
					"status" => "success",
				);
				$this->session->set_flashdata('alertMessage', $message);
				echo TRUE;
			}
			else
				echo 'Password and Authenticator did not match!';
		}
		else {
			redirect(admin_url());
		}
	}
}

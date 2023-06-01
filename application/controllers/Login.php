<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->model('get');
	}
	public function index()
	{
		//$_POST = json_decode(file_get_contents('php://input'), true);
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|numeric|min_length[10]|max_length[10]');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['status'] = "500";
        	$data['message'] = "error";
            if(form_error('email') != '')
                $data['data'][] = array('error' => form_error('email','',''));
            if(form_error('password') != '')
			    $data['data'][] = array('error' => form_error('password','',''));
		}
		else
		{
            $where = array('email'=> $this->input->post('email'), 'password' => md5($this->input->post('password')), 'login_status' => '1');
            $result = $this->get->table('app_users', $where);
            if($result != false)
            {
                $data['status'] = "200";
                if($result[0]->email_verify == '0')
                {
                    $data['message'] = "verify";
                    $data['data']['message'] = "Please check your registered email and verify your account...";
                    $data['data']['alert'] = "Success";
                    $data['data']['color'] = "green";
                    $data['data']['button'] = "Close";
                }
                else
                {
                    $data['message'] = "success";
                    $data['data'] = $result;
                }
            }
            else
            {
                $data['status'] = "500";
                $data['message'] = "error";
                $data['data'][] = array('error' => 'Email and password did not match!');
            }
        }
        $encode = json_encode($data);
    	echo $encode;
	}
	public function verify()
	{
        if($this->uri->segment(3) && ($this->uri->segment(3) != ''))
        {
            $where = array('password' => $this->uri->segment(3), 'login_status' => '1');
            $result = $this->get->table('app_users', $where);
            if($result != false)
            {
                $this->get->update('app_users', array('email_verify' => '1', 'modified_at' => date('Y-m-d H:i:s')), $where);
                $res['site'] = $this->site->settings();
                $res['data'] = $result;
                $this->load->view('verify',$res);
            }
            else
            {
                $res['site'] = $this->site->settings();
                $this->load->view('failed',$res);
            }
        }
        else
            redirect(base_url());
    }
}

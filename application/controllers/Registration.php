<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->model('get');
	}
	public function index()
	{
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[app_users.email]|callback_email_check');
        //$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]|is_unique[app_users.mobile]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
            $email = $this->input->post('email');
            $where = array('email' => $email, 'mobile'=> $this->input->post('mobile'), 'login_status' => '1');
            $res = $this->get->table('app_users', $where);
            if($res != false)
            {
                $data['status'] = "200";
                $data['message'] = "verify";
                if($res[0]->email_verify == '0')
                    $data['data']['message'] = "Please check your registered email and verify your account...";
                else
                    $data['data']['message'] = "User details exist!";
                $data['data']['alert'] = "Success";
                $data['data']['color'] = "green";
                $data['data']['button'] = "Close";
            }
            else
            {
                $data['status'] = "500";
                $data['message'] = "error";
                if(form_error('name') != '')
                    $data['data'][] = array('error' => form_error('name','',''));
                if(form_error('email') != '')
                    $data['data'][] = array('error' => form_error('email','',''));
                if(form_error('mobile') != '')
                    $data['data'][] = array('error' => form_error('mobile','',''));
                if(form_error('employee_id') != '')
                    $data['data'][] = array('error' => form_error('employee_id','',''));
            }
		}
		else
		{
            $insert = array('name'=> $this->input->post('name'), 'email'=> $this->input->post('email'), 'mobile'=> $this->input->post('mobile'), 'password' => md5($this->input->post('mobile')), 'employee_id'=> $this->input->post('employee_id'), 'created_at' => date('Y-m-d H:i:s'), 'email_verify' => '1');
            $result = $this->get->insert('app_users', $insert);
            if($result != false)
            {
                // $res['site'] = $this->site->settings();
                // $res['data'] = $insert;
                // $res['code'] = $insert['password'];
                // $from = $res['site'][0]->sentmail;
                // $subject = "Please verify your email address";
                // $body = $this->load->view('emails/verify.php',$res,TRUE);
                // $mail = sendmail($res['site'][0]->title, $from, $insert['email'], $subject, $body);
                // if($mail === 'true')
                // {
                //     $data['status'] = "200";
                //     $data['message'] = "success";
                //     $data['data'] = $insert;
                // }
                // else{
                //     $data['status'] = "500";
                //     $data['message'] = "error";
                //     $data['data'][] = array('error' => 'Mail not sent');
                // }

                $data['status'] = "200";
                $data['message'] = "verify";
                $data['data']['message'] = "Successfully Registered. Please Login Your Account";
                $data['data']['alert'] = "Success";
                $data['data']['color'] = "green";
                $data['data']['button'] = "Close";
            }
            else
            {
                $data['status'] = "500";
                $data['message'] = "error";
                $data['data'][] = array('error' => 'Please try again!');
            }
        }
        $encode = json_encode($data);
    	echo $encode;
	}
    function email_check($email)
    {

        $cemail = explode("@",$email);
        if ((isset($cemail[1])) && ($cemail[1] == 'innovasolutions.com'))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('email_check', 'Please enter your company email(example@innovasolutions.com).');
            return FALSE;
        }
    }
}

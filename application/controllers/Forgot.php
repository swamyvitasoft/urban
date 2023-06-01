<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forgot extends CI_Controller {
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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['status'] = "500";
        	$data['message'] = "error";
            $data['data'][] = array('error' => form_error('email','',''));
		}
		else
		{
            $where = array('email'=> $this->input->post('email'), 'login_status' => '1');
            $result = $this->get->table('app_users', $where);
            if($result != false)
            {
                $randomkey = hash('sha256', time().rand(1000,9999));
				$this->get->update('app_users',array('forgot_key' => $randomkey),$where);
				$res['forgot_key'] = $randomkey;
				$res['id'] = base64_encode($result[0]->user_id);
				$res['site'] = $this->site->settings();
                $res['data'] = $result;
				$subject = 'Your '.$res['site'][0]->title.' Password';
				$body = $this->load->view('emails/send-password.php',$res,TRUE);
                $mail = sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $where['email'], $subject, $body);
                if($mail === 'true')
                {
                    $data['status'] = "200";
                    $data['message'] = "verify";
                    $data['data']['message'] = "Please check your registered email";
                    $data['data']['alert'] = "Success";
                    $data['data']['color'] = "green";
                    $data['data']['button'] = "Close";
                }
                else
                {
                    $data['status'] = "500";
                    $data['message'] = "error";
                    $data['data'][] = array('error' => 'Mail not sent');
                }
                //$data['data'] = $mail;
            }
            else
            {
                $data['status'] = "500";
                $data['message'] = "error";
                $data['data'][] = array('error' => 'Please Enter valid Email');
            }
        }
        $encode = json_encode($data);
    	echo $encode;
	}
	public function password()
	{
    }
}

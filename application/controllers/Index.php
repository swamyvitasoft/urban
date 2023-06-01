<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
        $this->load->model('get');
	}
	public function index()
	{
        $data['site'] = $this->site->settings();
        $data['title'] = "Best Food Suppliers for Corporate in Hyderabad";
        $this->load->view('front-end',$data);
	}
    public function email()
    {
        $where = array('email' => 'rudra.pranay@gmail.com');
        $result = $this->get->table('app_users', $where);
        if($result != false)
        {
                $res['site'] = $this->site->settings();
                $res['data'] = array('name' => $result[0]->name, 'email' => $result[0]->email);
                $res['code'] = $result[0]->password;
                $from = $res['site'][0]->sentmail;
                $subject = "Please verify your email address";
                $body = $this->load->view('emails/verify.php',$res,TRUE);
                //echo $body; exit();
                $mail = sendmail($res['site'][0]->title, $from, $res['data']['email'], $subject, $body);
                if($mail === 'true')
                {
                }
                echo $mail;
        }
    }
}

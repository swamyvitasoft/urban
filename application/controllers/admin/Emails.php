<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Emails extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
        $this->load->model('get');
	}
	public function index()
	{
	    if(isset($_POST['to']) && $_POST['to'] != '')
	    {
	        $to = $_POST['to'];
	        $subject = $_POST['subject'];
	        $body = $_POST['body'];
	        if(is_array($body))
	            $res = $body;
	        $res['site'] = $this->site->settings();
	        if(isset($_POST['page']) && $_POST['page'] != '' && $_POST['page'] != null && is_array($body))
	        {
	            $page = $_POST['page'];
	            $body = $this->load->view('emails/'.$page, $res, TRUE);
	        }
	        sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $to, $subject, $body);
	    }
	}
}

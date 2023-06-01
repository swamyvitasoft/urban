<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
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
        $this->form_validation->set_rules('id', 'Id', 'trim|required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        //$this->form_validation->set_rules('phone', 'Mobile No.', 'trim|required|numeric|min_length[10]|max_length[10]|is_unique[app_users.mobile]');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['status'] = "500";
        	$data['message'] = "error";
            if(form_error('id') != '')
                $data['data'][] = array('error' => form_error('id','',''));
            if(form_error('name') != '')
                $data['data'][] = array('error' => form_error('name','',''));
            if(form_error('phone') != '')
			    $data['data'][] = array('error' => form_error('phone','',''));
		}
		else
		{
            $where = array('user_id'=> $this->input->post('id'), 'login_status' => '1');
            //$update = array('name'=> $this->input->post('name'), 'mobile'=> $this->input->post('phone'), 'modified_at' => date('Y-m-d H:i:s'));
            $update = array('name'=> $this->input->post('name'), 'modified_at' => date('Y-m-d H:i:s'));
            $result = $this->get->update('app_users', $update, $where);
            if($result != false)
            {
                $data['status'] = "200";
                $data['message'] = "success";
                $data['data'] = $update;
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
}

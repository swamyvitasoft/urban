<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
        $this->load->model('usersModel');
        $this->load->library("pagination");
        $this->load->model('adminpanel');
        $this->load->model('alert');
		if($this->session->userdata('logged_in')['role'] == 'superadmin')
			return true;
		else
			redirect(admin_url());
								}
	public function index()
	{
		$this->load_header();
		$this->load_body();
		$this->load_footer();
	}
	public function load_header()
	{
        $data['site']=$this->site->settings();
		$data['userdata']=$this->auth_user->checkLogin();
		$data['tables']=$this->adminpanel->tables();
        $data['ct']=$this->adminpanel->createtable();
		$data['title']="Management";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function load_body()
	{
		$config = array();
		$config["admin_url"] = admin_url() . "users/index/";
		$result['total_count']=count($this->usersModel->visit_count());
        $config["total_rows"] = $result['total_count'];
        $config["per_page"] = 10000;
		$result["start_page"] = $config["per_page"];
		$config['num_links'] = $result['total_count'];
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt; Previous';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['usersDetails'] = $this->usersModel->usersDetails($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
			if($data["links"]!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
    		}
		$this->load->view(ADMIN . 'users',$data);
	}
	public function Add()
	{
		$this->load_header(); 
		$data['ctables'] = $this->usersModel->menus();
		if(isset($_POST['submit']))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->form_validation->set_rules('name', 'First Name', 'required');
			$this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone No.', 'trim|required|regex_match[/^[0-9]{10}$/]|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			//$this->form_validation->set_rules('master-options','Atleast one permission','required');
			if ($this->form_validation->run() == FALSE)
			{	
				$data['error'] = validation_errors();
			}
			else
			{
				$password = md5($this->input->post('password'));
				$firstname = $this->input->post('name');
				$middlename = ($this->input->post('mname') != "")? ' '.$this->input->post('mname'):'';
				$lastname = ($this->input->post('lname') != "")? ' '.$this->input->post('lname'):'';
				$fullname = $firstname.$middlename.$lastname;
				$add = isset($_POST['add'])?$_POST['add']:[];
				$edit = isset($_POST['edit'])?$_POST['edit']:[];
				$delete = isset($_POST['delete'])?$_POST['delete']:[];
				$view = isset($_POST['view'])?$_POST['view']:[];
				$perm = array_merge($add,$edit,$delete,$view);
				$arrayAdminData = array(
						'fullname' => $fullname,
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'role' => $this->input->post('role'),
						'pass' => $password,
						'permissions' => json_encode($perm)
						); 	
				$insertUsersDetails = $this->usersModel->insertUsersDetails($arrayAdminData);
				if($insertUsersDetails == true)
				{
					$message = array(
						"title" => $fullname,
						"message" => "Successfully Saved.",
						"status" => "success",
					);
					$this->session->set_flashdata('alertMessage', $message);
					redirect(admin_url().'users/add');
				}
				else
				{
					$data['error'] = "<script>$(document).ready(function() { $.toast({heading: '".$this->input->post('email')."',text: 'User already exist!',position: 'top-right',loaderBg: '#ff6849',icon: 'error',hideAfter: 3500,stack: 6 })})</script>";	
				} 
			}
		}
		$data['title'] = "Add";
		$this->load->view(ADMIN . 'usersAdd',$data);
		$this->load_footer();
	}
	public function Edit()
	{
	    $data['ctables'] = $this->usersModel->menus();
		if(!empty($this->uri->segment(4)))
		{
			$data['getAdmin'] = $this->usersModel->getAdmin($this->uri->segment(4));
			if($data['getAdmin'] != false)
			{
				$data['password'] = '';
				if(isset($_POST['update']))
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
					$this->form_validation->set_rules('name', 'Full Name', 'required');
					$this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email');
					$this->form_validation->set_rules('phone', 'Phone No.', 'trim|required|regex_match[/^[0-9]{10}$/]|max_length[10]|min_length[10]');
					$this->form_validation->set_rules('role', 'Role', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					if ($this->form_validation->run() == FALSE)
					{	
						$data['error'] = validation_errors();
					}
					else
					{
        				$password = md5($this->input->post('password'));
        				$firstname = $this->input->post('name');
        				$middlename = ($this->input->post('mname') != "")? ' '.$this->input->post('mname'):'';
        				$lastname = ($this->input->post('lname') != "")? ' '.$this->input->post('lname'):'';
        				$fullname = $firstname.$middlename.$lastname;
        				$add = isset($_POST['add'])?$_POST['add']:[];
        				$edit = isset($_POST['edit'])?$_POST['edit']:[];
        				$delete = isset($_POST['delete'])?$_POST['delete']:[];
        				$view = isset($_POST['view'])?$_POST['view']:[];
        				$perm = array_merge($add,$edit,$delete,$view);
        				$arrayAdminData = array(
        						'fullname' => $fullname,
        						'email' => $this->input->post('email'),
        						'phone' => $this->input->post('phone'),
        						'gender' => $this->input->post('gender'),
        						'role' => $this->input->post('role'),
        						'pass' => $password,
        						'permissions' => json_encode($perm)
        						); 	
						$updateAdminDetails = $this->usersModel->updateAdminDetails($arrayAdminData);
						if($updateAdminDetails == true)
						{
							$message = array(
								"title" => $this->input->post('name'),
								"message" => "Successfully Updated.",
								"status" => "success",
							);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url().'users/edit/'.$this->uri->segment(4));
						}
						else
						{
							$data['error'] = "<script>$(document).ready(function() { $.toast({heading: '".$this->input->post('email')."',text: 'User already exist!',position: 'top-right',loaderBg: '#ff6849',icon: 'error',hideAfter: 3500,stack: 6 })})</script>";
						}
					}
				}
				$this->load_header();
				$data['title'] = "Edit";
				$this->load->view(ADMIN . 'usersEdit',$data);
				$this->load_footer();
			}
			else
				redirect(admin_url().'users');
		}
		else
			redirect(admin_url().'users');
	}
	public function Delete()
	{
		if(!empty($this->uri->segment(4)))
		{
			$data['getAdmin'] = $this->usersModel->getAdmin($this->uri->segment(4));
			if($data['getAdmin'] != false)
			{
				$deleteManager = $this->usersModel->deleteAdmin($this->uri->segment(4));
				$message = array(
					"title" => "",
					"message" => "Successfully Deleted.",
					"status" => "success",
				);
				$this->session->set_flashdata('alertMessage', $message);
				redirect(admin_url().'users');
			}
			else
				redirect(admin_url().'users');
		}
		else
			redirect(admin_url().'users');
	}
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

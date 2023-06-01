<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
		$this->load->model('adminpanel');
		$this->load->library('authentication');
        $this->load->model('alert');
								}
	public function index()
	{
	    $data['site']=$this->site->settings();
	    $this->email->from('admin@'.$_SERVER['SERVER_NAME'], $data['site'][0]->title);
        $subject = $data['site'][0]->title;
    	$this->email->to('rudra.pranay@gmail.com');
    	$this->email->subject($subject); 
    	$body = 'URL: http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    	$this->email->message($body);  
		$this->email->send();
		$this->load_header();
		if($this->authentication->permissions() == TRUE)
			$this->load_body();
		else
			$this->load->view(ADMIN . 'unlock');
		$this->load_footer();
	}
	public function load_header()
	{
        $data['site']=$this->site->settings();
		$data['userdata']=$this->auth_user->checkLogin();
		$data['tables']=$this->adminpanel->tables();
        $data['ct']=$this->adminpanel->createtable();
		$data['title']="Settings";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function load_body()
	{
		$data['settings'] = $this->adminpanel->settings();
		if($this->session->flashdata('alertMessage') && $this->session->flashdata('alertMessage')['title'] == 'Settings')
			$data['message'] = ' ';
		else
			$data['message'] = '';
		if($this->session->flashdata('alertMessage') && $this->session->flashdata('alertMessage')['title'] == 'Css')
			$data['css_message'] = ' ';
		else
			$data['css_message'] = '';
		if($this->session->flashdata('alertMessage') && $this->session->flashdata('alertMessage')['title'] == 'Js')
			$data['js_message'] = ' ';
		else
			$data['js_message'] = '';
		$data['tab']="active";
		if($data['settings'] == TRUE)
		{
            $data['ipaddress'] = $this->ipaddress();
			$data['title'] = "Settings";
			$this->load->view(ADMIN . 'settings',$data);
		}
		else
		{
			$data['title']="Settings";
			$this->load->view(ADMIN . 'nodata',$data);
		}
	}
    public function Update()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			if(isset($_POST['settings']))
			{
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->form_validation->set_rules('sitename', 'Site Name', 'required');
				$this->form_validation->set_rules('infomail', 'Site Email Id', 'required');
				$this->form_validation->set_rules('left', 'Footer Left', 'required');
				$this->form_validation->set_rules('right', 'Footer Right', 'required');
				if(isset($_POST['maintenance']) && $_POST['maintenance'] == 1)
				    $this->form_validation->set_rules('ipaddress', 'IP Address', 'required');
				if ($this->form_validation->run() == FALSE)
					{	
						$data['succ']="";
						$data['title']="Settings";
						$data['tab']="active";
						$data['settings'] = $this->adminpanel->settings();
						$data['message']="";
						$data['css_message'] = "";
						$data['js_message'] = "";
						$data['ipaddress'] = $this->ipaddress();
						$this->load->view(ADMIN . 'settings',$data);
					}
				else{
						$config['upload_path'] = 'uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$updatedata = array(
							'title' => $this->input->post('sitename'),
							'sentmail' => $this->input->post('infomail'),
							'footer_left' => $this->input->post('left'),
							'footer_right' => $this->input->post('right'),
							'display' => $this->input->post('display'),
							'button' => $this->input->post('button'),
							'maintenance' => $this->input->post('maintenance'),
							'ipaddress' => $this->input->post('ipaddress'),
							'display_errors' => $this->input->post('errors'),
						);
						if($this->upload->do_upload('userfile'))
						{
							$logodata = $this->upload->data();
							$updatedata['logo'] = $logodata['file_name'];
						}
						if($this->upload->do_upload('favi'))
						{
							$logodata = $this->upload->data();
							$updatedata['favicon'] = $logodata['file_name'];
						}
						if($this->upload->do_upload('loginbg'))
						{
							$logodata = $this->upload->data();
							$updatedata['loginbg'] = $logodata['file_name'];
						}
						$result = $this->adminpanel->update($updatedata);
						if ($result == TRUE) {
							$data['settings'] = $this->adminpanel->settings();
							$data['title']="Settings";
							$data['tab']="active";
							$message = array(
								"title" => "Settings",
								"message" => "Successfully Updated.",
								"status" => "success",
							);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url().'settings');
						}
						else{
							$data['settings'] = $this->adminpanel->settings();
							$data['message']="<div class='alert alert-danger'>Required all fields</div>";
							$data['title']="Settings";
							$data['tab']="active";
							$data['ipaddress'] = $this->ipaddress();
							$this->load->view(ADMIN . 'settings',$data);
						}
					}
				}
			else
			{
				$this->load_body();
			}
		}
		else
			$this->load->view(ADMIN . 'unlock');
        $this->load_footer();
	}
    public function Css()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			if(isset($_POST['css']))
			{
				$css = array(
					'c_links' => $this->input->post('css_links'),
					'css' => $this->input->post('custom_css')
							);
				$result = $this->adminpanel->update_css($css);
				if ($result == TRUE) {
					$data['settings'] = $this->adminpanel->settings();
					$data['title']="Settings";
					$data['tab']="active";
					$message = array(
						"title" => "Css",
						"message" => "Successfully Saved.",
						"status" => "success",
					);
					$this->session->set_flashdata('alertMessage', $message);
					redirect(admin_url().'settings');
				}
				else
				{
					$data['settings'] = $this->adminpanel->settings();
					$data['error']="<div class='alert alert-danger'>Required all fields</div>";
					$data['title']="Settings";
					$data['tab']="active";
					$data['ipaddress'] = $this->ipaddress();
					$this->load->view(ADMIN . 'settings',$data);
				}
			}
			else
				$this->load_body();
		}
		else
			$this->load->view(ADMIN . 'unlock');
			$this->load_footer();
		}
		 public function Js()
		{
			$this->load_header();
			if($this->authentication->permissions() == TRUE)
			{
				if(isset($_POST['js']))
				{
					$js = array(
						'j_links' => $this->input->post('js_links'),
						'js' => $this->input->post('custom_js')
					);
					$result = $this->adminpanel->update_js($js);
					if ($result == TRUE) {
						$data['settings'] = $this->adminpanel->settings();
						$data['title']="Settings";
						$data['tab']="active";
						$message = array(
							"title" => "Js",
							"message" => "Successfully Saved.",
							"status" => "success",
						);
						$this->session->set_flashdata('alertMessage', $message);
						redirect(admin_url().'settings');
					}
					else
					{
						$data['settings'] = $this->adminpanel->settings();
						$data['error']="<div class='alert alert-danger'>Required all fields</div>";
						$data['title']="Settings";
						$data['tab']="active";
						$data['ipaddress'] = $this->ipaddress();
						$this->load->view(ADMIN . 'settings',$data);
					}
				}
				else
					$this->load_body();
		}
		else
			$this->load->view(ADMIN . 'unlock');
		$this->load_footer();
	}
	public function theme()
	{
		if(isset($_POST['theme']))
		{
			$theme = array("theme" => $this->input->post('theme'));
			$updateTheme = $this->adminpanel->update_theme($theme);
			if($updateTheme == true)
			{
				echo 'true';
			}
			else
				echo 'false';
		}
		else
			return false;
	}
	public function menu()
	{
		if(isset($_POST['header']) || isset($_POST['sidebar']) || isset($_POST['close']))
		{
			$header = isset($_POST['header'])? $this->input->post('header') : '';
			$sidebar = isset($_POST['sidebar'])? ' '.$this->input->post('sidebar') : '';
			$close = isset($_POST['close'])? ' '.$this->input->post('close') : '';
			$menu = array("menu" => $header.$sidebar.$close);
			$updateSiteMenu = $this->adminpanel->update_menu($menu);
			if($updateSiteMenu == true)
			{
				echo 'true';
			}
			else
				echo 'false';
		}
		else
		{
			$header = '';
			$sidebar = '';
			$close = '';
			$menu = array("menu" => $header.$sidebar.$close);
			$updateSiteMenu = $this->adminpanel->update_menu($menu);
			if($updateSiteMenu == true)
			{
				echo 'true';
			}
			else
				echo 'false';
		}
	}
	function ipaddress()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
	}
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

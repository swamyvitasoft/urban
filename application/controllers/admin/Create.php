<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Create extends CI_Controller {
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
		$data['title']="Manage Tables";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function load_body()
	{
        $this->load->view(ADMIN . 'create');
	}
	public function Add()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			$data['tables'] = $this->adminpanel->get_tables();
			if(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit']))
			{
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->form_validation->set_rules('tntitle', 'Title', 'required');
				$this->form_validation->set_rules('ctname', 'Table Name', 'required');
				if ($this->form_validation->run() == FALSE)
					{	
						$data['succ']="";
					}
				else{
						$permissions = array(
							'count' => $this->input->post('ctcount'),
							'count_menu' => $this->input->post('ctmcount'),
							'display' => $this->input->post('ctdisplay'),
							'title' => $this->input->post('cttitle'),
							'add' => $this->input->post('ctadd'),
							'edit' => $this->input->post('ctedit'),
							'view' => $this->input->post('ctview'),
							'remove' => $this->input->post('ctremove'),
							'csv' => $this->input->post('ctcsv'),
							'print' => $this->input->post('ctprint'),
							'search' => $this->input->post('ctsearch'),
							'numbers' => $this->input->post('ctnumbers'),
							'pagination' => $this->input->post('ctpagination'),
							'limitlist' => $this->input->post('ctlimitlist'),
							'sortable' => $this->input->post('ctsortable'),
						);
						$tablename = $this->input->post('ctname');
						$insert = array(
							'cttitle' => $this->input->post('tntitle'),
							'table_name' => $this->input->post('ctname'),
							'table_type' => $this->input->post('cttype'),
							'icon' => $this->input->post('cticon'),
							'bg_color' => $this->input->post('ctcolor'),
							//'menu_order' => $this->input->post('menuorder'),
							'permissions' => json_encode($permissions)
						);
						$data['insert']=$this->adminpanel->insert($insert);
						if($data['insert'] == true)
						{
							$message = array(
										"title" => $insert['cttitle']." Table",
										"message" => "Successfully Created.",
										"status" => "success",
									);
							$this->session->set_flashdata('alertMessage', $message);
							if(isset($_POST['ctsubmit']))
								redirect(admin_url().'create');
							if(isset($_POST['ctsubmit_new']))
								redirect(admin_url().'create/add');
							if(isset($_POST['ctsubmit_edit']))
								redirect(admin_url().'create/edit/'.$tablename);
						}
						else
						{
							$data['succ'] = "<div class='alert alert-warning'>Table Name('".$this->input->post('ctname')."') Already Exist.</div>";
						}
				}
				$this->load->view(ADMIN . 'create_add',$data);
			}
			else
			$this->load->view(ADMIN . 'create_add',$data);
		}
		else
			$this->load->view(ADMIN . 'unlock');
        $this->load_footer();
	}
	public function Manage()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			$tname = lcfirst($this->uri->segment(4));
			if(!empty($tname)){
			if(isset($_POST['ctsubmit']))
				{
				$ctln = $this->input->post('ctln');
				$ctcln = $this->input->post('ctcln');
				$ctrqd = $this->input->post('ctrqd');
				$cthdn = $this->input->post('cthidden');
				$ctptrn = $this->input->post('ctptrn');
				$order = $this->input->post('order');
				$by = $this->input->post('by');
				$p = count($this->input->post('ctln'));
				$pp = "";$rf = "";$hide = "";$ptrn = "";
				for($i=0;$i<$p;$i++)
				{
					if(!empty($ctcln[$i]))
						$pp .= '"'.$ctln[$i].'":"'.ucfirst($ctcln[$i]).'",';
					else
						$pp .= '"'.$ctln[$i].'":"'.ucfirst($ctln[$i]).'",';
						$rf .= '"'.$ctln[$i].'":"'.$ctrqd[$i].'",';
						$hide .= '"'.$ctln[$i].'":"'.$cthdn[$i].'",';
						$ptrn .= '"'.$ctln[$i].'":"'.$ctptrn[$i].'",';
					
				}
					$qw = "{".substr($pp,0,-1)."}";
					$req = "{".substr($rf,0,-1)."}";
					$hidden = "{".substr($hide,0,-1)."}";
					$pattern = "{".substr($ptrn,0,-1)."}";
					$orderBy = '{"'.$order.'":"'.$by.'"}';
							$update = array(
								'pattern' => $pattern,
								'rename_column' => $qw,
								'required_fields' => $req,
								'hidden' => $hidden,
								'order_by' => $orderBy
							);
							$data['update']=$this->adminpanel->createtable_manage_update($tname,$update);
							if($data['update'] == true)
							{
								$data['ct']=$this->adminpanel->createtable_edit($tname);
								$data['manage'] = $this->adminpanel->manage($tname);
								$data['succ'] = "";
								$message = array(
									"title" => '"'.$tname.'" Table',
									"message" => "Successfully Updated.",
									"status" => "success",
								);
								$this->session->set_flashdata('alertMessage', $message);
								redirect(admin_url().'create/manage/'.$tname);
							}
							else
							{
								$data['ct']=$this->adminpanel->createtable_edit($tname);
								$data['manage'] = $this->adminpanel->manage($tname);
								$data['succ'] = "";
								$message = array(
									"title" => '"'.$tname.'" Table',
									"message" => "Name already entered.",
									"status" => "error",
								);
								$this->session->set_flashdata('alertMessage', $message);
								redirect(admin_url().'create/manage/'.$tname);
							}
				}
				else
				{
					$data['ct']=$this->adminpanel->createtable_edit($tname);
					$data['manage'] = $this->adminpanel->manage($tname);
					$this->load->view(ADMIN . 'create_manage',$data);
				}
			}
			else
			{
				$data['title']="Page Not Found";
				$this->load->view(ADMIN . 'error404',$data);
			}
		}
		else
			$this->load->view(ADMIN . 'unlock');
        $this->load_footer();
	}
	public function Edit()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			$tname = lcfirst($this->uri->segment(4));
			$data['tables'] = $this->adminpanel->get_tables();
			if(!empty($tname)){
			$data['ct']=$this->adminpanel->createtable_edit($tname);
			if($data['ct'] == true)
			{
				if(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit']))
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
					$this->form_validation->set_rules('tntitle', 'Title', 'required');
					$this->form_validation->set_rules('ctname', 'Table Name', 'required');
					if ($this->form_validation->run() == FALSE)
						{	
							$data['succ']="";
						}
					else{
							$permissions = array(
								'count' => $this->input->post('ctcount'),
								'count_menu' => $this->input->post('ctmcount'),
								'display' => $this->input->post('ctdisplay'),
								'title' => $this->input->post('cttitle'),
								'add' => $this->input->post('ctadd'),
								'edit' => $this->input->post('ctedit'),
								'view' => $this->input->post('ctview'),
								'remove' => $this->input->post('ctremove'),
								'csv' => $this->input->post('ctcsv'),
								'print' => $this->input->post('ctprint'),
								'search' => $this->input->post('ctsearch'),
								'numbers' => $this->input->post('ctnumbers'),
								'pagination' => $this->input->post('ctpagination'),
								'limitlist' => $this->input->post('ctlimitlist'),
								'sortable' => $this->input->post('ctsortable'),
								'list' => $this->input->post('ctlist')
							);
							$update = array(
								'cttitle' => $this->input->post('tntitle'),
								'table_name' => $this->input->post('ctname'),
								'icon' => $this->input->post('cticon'),
								'bg_color' => $this->input->post('ctcolor'),
								//'menu_order' => $this->input->post('menuorder'),
								'permissions' => json_encode($permissions)
							);
							$id = $this->input->post('ctid');
							$data['update']=$this->adminpanel->createtable_edit_update($id,$update);
							if($data['update'] == true)
							{
								$data['ct']=$this->adminpanel->createtable_edit($tname);
								$message = array(
										"title" => $update['cttitle']." Table",
										"message" => "Successfully Updated.",
										"status" => "success",
									);
								$this->session->set_flashdata('alertMessage', $message);
								if(isset($_POST['ctsubmit']))
									redirect(admin_url().'create');
								if(isset($_POST['ctsubmit_new']))
									redirect(admin_url().'create/add');
								if(isset($_POST['ctsubmit_edit']))
									redirect(admin_url().'create/edit/'.$tname);
								/* {
								$data['permissions'] = json_decode($data['ct'][0]->permissions);
								$this->load->view(ADMIN . 'create_edit',$data);
								} */
							}
							else
							{
								$data['ct']=$this->adminpanel->createtable_edit($tname);
								$data['succ'] = "<div class='alert alert-warning'>Table Name('".$this->input->post('ctname')."') Already Exist.</div>";
								$data['permissions'] = json_decode($data['ct'][0]->permissions);
								$this->load->view(ADMIN . 'create_edit',$data);
							}
					}
				}
				else
				{
					$data['ct']=$this->adminpanel->createtable_edit($tname);
					$data['permissions'] = json_decode($data['ct'][0]->permissions);
					$this->load->view(ADMIN . 'create_edit',$data);
				}
			} 
			else
				redirect(admin_url().'create');
			
			}
			else
			{
				$data['title']="Page Not Found";
				$this->load->view(ADMIN . 'error404',$data);
			}
		}
		else
			$this->load->view(ADMIN . 'unlock');
        $this->load_footer();
	}
	public function Delete()
	{
		$tname = lcfirst($this->uri->segment(4));
		if(!empty($tname))
		{
			$delete = $this->adminpanel->delete($tname);
			$message = array(
					"title" => "",
					"message" => "Successfully Deleted.",
					"status" => "success",
			);
			$this->session->set_flashdata('alertMessage', $message);
			redirect(admin_url().'create');
		}
		else
			redirect(admin_url().'create');
	}
	public function previousdata()
	{
		if(isset($_POST['colname']))
		{
			$previousdata = $this->adminpanel->previousdata();
			if($previousdata == true)
			{
				echo $previousdata;
			}
			else
			{
				$empty = array('name' => 'false');
				echo json_encode($empty);
			}
		}
		else
			return false;
	}
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

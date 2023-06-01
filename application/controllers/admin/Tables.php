<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tables extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
		$this->load->model('createtables');
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
		$data['title']="Table";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function load_body()
	{
        $data['tables'] = $this->db->list_tables();
        $this->load->view(ADMIN . 'table',$data);
	}
	public function Add()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			if(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit']))
			{
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->form_validation->set_rules('tablename', 'Table Name', 'required');
				if ($this->form_validation->run() == FALSE)
					{	
						$data['succ']="";
					}
				else{
						$data['create']=$this->createtables->tablecreate();
						if($data['create'] == true)
						{
							$tablename = $this->input->post('tablename');
							$message = array(
									"title" => '"'.$tablename.'" Table',
									"message" => "Successfully Created.",
									"status" => "success",
								);
							$this->session->set_flashdata('alertMessage', $message);
							if(isset($_POST['ctsubmit']))
								redirect(admin_url().'tables');
							if(isset($_POST['ctsubmit_new']))
								redirect(admin_url().'tables/add');
							if(isset($_POST['ctsubmit_edit']))
								redirect(admin_url().'tables/edit/'.$tablename);
						}
						else
							$data['succ'] = "<div class='alert alert-warning'>Table Name('".$this->input->post('tablename')."') Already Exists.</div>";
					}
			
			}
			else
				$data['succ']="";
			$this->load->view(ADMIN . 'table_add',$data);
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
			$data['tname'] = $tname;
			if(!empty($tname) && $this->db->table_exists($tname)){
				if(isset($_POST['ctsubmit']))
					{
						$this->load->library('form_validation');
						$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
						$this->form_validation->set_rules('column[]', 'Column Name', 'required');
						$this->form_validation->set_rules('rename[]', 'Rename', 'required');
						$this->form_validation->set_rules('type[]', 'Type', 'required');
						//$this->form_validation->set_rules('default[]', 'Default', 'required');
						if ($this->form_validation->run() == FALSE)
							{	
							}
						else{
								$data['edit']=$this->createtables->edit_column();
								if($data['edit'] == true)
								{
									$message = array(
										"title" => '"'.$tname.'" Table',
										"message" => "Successfully Updated.",
										"status" => "success",
									);
									$this->session->set_flashdata('alertMessage', $message);
									redirect(admin_url().'tables/manage/'.$tname);
								}
								else
								{
									$message = array(
										"title" => '"'.$tname.'" Table',
										"message" => "Column(s) Name Are Already Exists.",
										"status" => "error",
									);
									$this->session->set_flashdata('alertMessage', $message);
									redirect(admin_url().'tables/manage/'.$tname);
								}
							}
					}
				$data['colums'] = $this->db->field_data($tname);
				$this->load->view(ADMIN . 'table_manage',$data);
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
	public function Columns()
	{
        $this->load_header();
		if($this->authentication->permissions() == TRUE)
		{
			$tname = lcfirst($this->uri->segment(4));
			$data['tname'] = $tname;
			if(!empty($tname) && $this->db->table_exists($tname)){
				if(isset($_POST['ctsubmit']))
					{
						$this->load->library('form_validation');
						$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
						$this->form_validation->set_rules('column', 'Column Name', 'required');
						$this->form_validation->set_rules('position', 'After/Beginning', 'required');
						$this->form_validation->set_rules('type', 'Type', 'required');
						//$this->form_validation->set_rules('default', 'Default', 'required');
						if ($this->form_validation->run() == FALSE)
							{	
								$data['succ']="";
							}
						else{
								$data['addcolumn']=$this->createtables->add_column();
								if($data['addcolumn'] == true)
								{
									$data['succ'] = "";
									$message = array(
											"title" => '"'.$_POST['column'].'" Column',
											"message" => "Successfully Added.",
											"status" => "success",
										);
									$this->session->set_flashdata('alertMessage', $message);
									redirect(admin_url().'tables/columns/'.$tname);
								}
								else
								{
									$data['succ'] = "";
									$message = array(
											"title" => '"'.$_POST['column'].'" Column',
											"message" => "Already Exists",
											"status" => "warning",
										);
									$this->session->set_flashdata('alertMessage', $message);
									redirect(admin_url().'tables/columns/'.$tname);
								}
							}
					}
				$data['colums'] = $this->db->list_fields($tname);
				$this->load->view(ADMIN . 'table_columns',$data);
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
			$data['tname'] = $tname;
			if(!empty($tname) && $this->db->table_exists($tname)){
				if(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit']))
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
					$this->form_validation->set_rules('tablename', 'Table Name', 'required');
					if ($this->form_validation->run() == FALSE)
						{	
							$data['succ']="";
						}
					else{
							$data['edit']=$this->createtables->tableedit();
							if($data['edit'] == true)
							{
								$tablename = $this->input->post('tablename');
								$message = array(
									"title" => '"'.$tablename.'" Table',
									"message" => "Successfully Updated.",
									"status" => "success",
								);
								$this->session->set_flashdata('alertMessage', $message);
								if(isset($_POST['ctsubmit']))
								redirect(admin_url().'tables');
								if(isset($_POST['ctsubmit_new']))
								redirect(admin_url().'tables/add');
								if(isset($_POST['ctsubmit_edit']))
								redirect(admin_url().'tables/edit/'.$tablename);
							}
							else
								$data['succ'] = "<div class='alert alert-warning'>Table Name('".$this->input->post('tablename')."') Already Exists.</div>";
						}
				
				}
				else
					$data['succ']="";
				
			$this->load->view(ADMIN . 'table_edit',$data);
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
	public function Rename()
	{
        $tname = $this->input->post('tablename');
		if(!empty($tname) && $this->db->table_exists($tname)){
			if(isset($_POST['columnname']))
			{
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->form_validation->set_rules('columnname', 'Column Name', 'required');
				$this->form_validation->set_rules('rename', 'Rename Name', 'required');
				if ($this->form_validation->run() == FALSE)
					{	
						echo validation_errors();
					}
				else{
						$data['rename']=$this->createtables->rename_column();
							if($data['rename'] == true)
							{
								$message = array(
									"title" => '"'.$_POST['columnname'].'" Column',
									"message" => "Successfully Renamed.",
									"status" => "success",
								);
								$this->session->set_flashdata('alertMessage', $message);
								echo TRUE;
							}
							else
								echo "Column Name('".$this->input->post('columnname')."') Already Exists.";
					}
			}
		}
		else
		{
			$this->load_header();
			$data['title']="Page Not Found";
            $this->load->view(ADMIN . 'error404',$data);
			$this->load_footer();
		}
	}
	public function Delete()
	{
		$tname = lcfirst($this->uri->segment(4));
		if(!empty($tname))
		{
			$delete = $this->createtables->tabledelete($tname);
			$message = array(
				"title" => '"'.$tname.'" Table',
				"message" => "Successfully Deleted.",
				"status" => "success",
			);
			$this->session->set_flashdata('alertMessage', $message);
			redirect(admin_url().'tables');
		}
		else
			redirect(admin_url().'tables');
	}
	public function Columndelete($tname , $column)
	{
		$tname = lcfirst($this->uri->segment(4));
		if(!empty($tname))
		{
			$delete = $this->createtables->columndelete($tname , $column);
			if($delete == true)
			{
				$message = array(
						"title" => '"'.$column.'" Column',
						"message" => "Successfully Deleted.",
						"status" => "success",
					);
				$this->session->set_flashdata('alertMessage', $message);
				redirect(admin_url().'tables/manage/'.$tname);
			}
			else
				redirect(admin_url().'tables');
		}
		else
			redirect(admin_url().'tables');
	}
	public function Export()
	{
		$this->load->dbutil();
		$dbs = $this->db->list_tables();
		$strtables = '';
		//print_r($dbs);
		foreach($dbs as $db) {
			$strtables .= "'".$db."',";
		}
		$dbtables = substr($strtables,0,-1);
		//print_r($dbtables);
		$prefs = array(                   
			'format'        => 'txt',                       
			'filename'      => 'database.sql',                         
		);
		//print_r($prefs);
		$backup = $this->dbutil->backup($prefs);
		//print_r($backup);
		write_file('Exports/database.sql', $backup);
		$this->load->helper('download');
		force_download('database.sql', $backup);
	}
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

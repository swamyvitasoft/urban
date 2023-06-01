<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bulk extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
        $this->load->model('adminpanel');
        $this->load->model('get');
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
		$data['title']="Bulk Upload";
		$this->load->view(ADMIN . 'include/header',$data);
	}
	public function load_body()
	{
		$data['title']="Bulk Upload";
		$this->load->view(ADMIN . 'bulk',$data);
	}
	protected function rules_bulkupload() {
		$rules = array(
			array(
				'field' => 'file',
				'label' => 'File',
				'rules' => 'trim|xss_clean|max_length[200]|callback_bulk_upload'
			)
		);
		return $rules;
	}
	public function bulk_upload() {
		$new_file = '';
		$messTitle = "Card(s) Bulk";
		if($_FILES["file"]['name'] !="") {
			$file_name = $_FILES["file"]['name'];
			$random = rand(1, 10000000000000000);
            $makeRandom = 'cards_'.date('Y_m_d_H_i_s');
			$file_name_rename = $makeRandom;
            $explode = explode('.', $file_name);
            if(count($explode) >= 2) {
	            $new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "uploads/bulk";
				$config['allowed_types'] = "csv";
				$config['file_name'] = $new_file;
				$config['max_size'] = '10240';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload("file")) {
					$this->form_validation->set_message("bulk_upload", $this->upload->display_errors());
					$message = array(
                		"title" => $messTitle,
                		"message" => $this->upload->display_errors(),
                		"status" => "error",
                	);
        			$this->session->set_flashdata('alertMessage', $message);
	     			return FALSE;
				} else {
					$this->upload_data['file'] =  $this->upload->data();
					return TRUE;
				}
			} else { 
				$this->form_validation->set_message("bulk_upload", "Invalid file");
				$message = array(
            		"title" => $messTitle,
            		"message" => "Invalid file",
            		"status" => "error",
            	);
    			$this->session->set_flashdata('alertMessage', $message);
	     		return FALSE;
			}
		} else {
			$this->form_validation->set_message("bulk_upload", "The file is required.");
			$message = array(
        		"title" => $messTitle,
        		"message" => "The file is required.",
        		"status" => "error",
        	);
			$this->session->set_flashdata('alertMessage', $message);
			return FALSE;
		}
	}
	public function cards()
	{
		$messTitle = "Card(s) Bulk";
		$login_id = $this->session->userdata('logged_in')['id'];
		$login_name = $this->session->userdata('logged_in')['name'];
		$login_role = $this->session->userdata('logged_in')['role'];
		if($login_role == 'superadmin' || $login_role == 'admin')
		{
			if(!empty($_FILES['file']['name']))
			{
			    $this->load->library('form_validation');
				$rules = $this->rules_bulkupload(); 
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) { 
					$message = array(
        				"title" => $messTitle,
        				"message" => form_error('file'),
        				"status" => "error",
        			);
					redirect(admin_url("bulk"));
				} 
				else 
				{
					$file = $_FILES['file']['tmp_name'];
					$handle = fopen($file, "r");
					$arrResult = array();
					if ($handle) {
						while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {
							$arrResult[] = $row;
						}
						fclose($handle);
					}
					$titles = array_shift($arrResult);
					$keys = array('ddn', 'house_no', 'area_in_odia', 'area_in_english', 'area', 'street_no', 'unit', 'qr_code_link');
                    $final = array();
					foreach ($arrResult as $key => $value) {
						$final[] = array_combine($keys, $value);
					}
					$rw = 2; 
					$valid_ddn = false;
					$valid_house_no = false;
					$valid_area_in_odia = false;
					$valid_area_in_english = false; 
					$valid_area = false;
					$valid_street_no = false;
					$valid_unit = false;
					$valid_qr_code_link = false;
					foreach ($final as $csv_tr) {
						if($csv_tr['ddn'] != '')
						{
							$valid_ddn =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "DDN `(" . $csv_tr['ddn'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['house_no'] != '')
						{
							$valid_house_no =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "House No. `(" . $csv_tr['class'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['area_in_odia'] != '')
						{
							$valid_area_in_odia =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "Area in odia `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['area_in_english'] != '')
						{
							$valid_area_in_english =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "Area in english `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['area'] != '')
						{
							$valid_area =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "Area `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['street_no'] != '')
						{
							$valid_street_no =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "Street No. `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['unit'] != '')
						{
							$valid_unit =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "Unit `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						if($csv_tr['qr_code_link'] != '')
						{
							$valid_qr_code_link =  true;
						}
						else
						{
						    $message = array(
        						"title" => $messTitle,
        						"message" => "QR code link `(" . $csv_tr['section'] . ")` field is required line no. " . $rw,
        						"status" => "error",
        					);
							$this->session->set_flashdata('alertMessage', $message);
							redirect(admin_url("bulk"));
						}
						$rw++;
					}
					if($valid_ddn == true && $valid_house_no == true && $valid_area_in_odia == true && $valid_area_in_english == true && $valid_area == true && $valid_street_no == true && $valid_unit == true && $valid_qr_code_link == true)
					{ 
						$cards = array(); 
						foreach ($final as $csv_tr) 
						{
							$cards["ddn"] = trim($csv_tr['ddn']);
							$cards["house_no"] = trim($csv_tr['house_no']);
							$cards["area_in_odia"] = trim($csv_tr['area_in_odia']);
							$cards["area_in_english"] = trim($csv_tr['area_in_english']);
							$cards["area"] = trim($csv_tr['area']);
							$cards["street_no"] = ($csv_tr['street_no'] == '0')?'000':trim($csv_tr['street_no']);
							$cards["unit"] = ($csv_tr['unit'] == '0')?'000':trim($csv_tr['unit']);
							$cards["qr_code_link"] = trim($csv_tr['qr_code_link']);
							$cards["createdDate"] = date("Y-m-d h:i:s");
							//$cards["modifiedDate"] = date("Y-m-d h:i:s");
							$cards["create_userID"] = $login_id;
							$cards["create_username"] = $login_name;
							$cards["create_usertype"] = $login_role;
							$this->get->insert('cards',$cards);
							$studentID = $this->db->insert_id();
						}
						$message = array(
        					"title" => $messTitle,
        					"message" => "Successfully Inserted",
        					"status" => "success",
        				);
						$this->session->set_flashdata('alertMessage', $message);
						redirect(admin_url("cms/cards")); 
					}
				}
				
			}	
			else
			{
				$message = array(
        			"title" => $messTitle,
        			"message" => "The file is required.",
        			"status" => "error",
        		);
				$this->session->set_flashdata('alertMessage', $message);
				redirect(admin_url("bulk"));
			}
		}
		else{
			$message = array(
        		"title" => $messTitle,
        		"message" => "Something went wrong!",
        		"status" => "error",
            );
			$this->session->set_flashdata('alertMessage', $message);
			redirect(admin_url("bulk"));
		}
	}	
	public function delete()
	{
		if(isset($_POST) && !empty($_POST['id']) && $_POST['id'])
		{
			foreach($_POST['id'] as $id)
			{
				$this->db->trans_start();
				$this->db->query('UPDATE `cards` SET `isActive` = 0 WHERE id IN  ("'.$id.'")');
				$this->db->trans_complete();
			}
			$message = array(
				"title" => "Successfully Deleted!",
				"message" => "",
				"status" => "success",
				);
			$this->session->set_flashdata('alertMessage', $message);
			redirect(admin_url('cms/cards'),'refresh');
		}
		else
			redirect(admin_url('cms/cards'));
	}
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}

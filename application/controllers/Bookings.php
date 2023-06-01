<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bookings extends CI_Controller {
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
        if(isset($_POST['booking_id']))
            $this->form_validation->set_rules('booking_id', 'Booking Id', 'trim|numeric|required');
        $this->form_validation->set_rules('user_id', 'User Id', 'trim|numeric|required');
        $this->form_validation->set_rules('branch_id', 'Branch Id', 'trim|required|numeric');
        $this->form_validation->set_rules('date', 'Booking Date', 'trim|required');
        // $this->form_validation->set_rules('type', 'Booking Type', 'trim|required'); lunch_slots
        if(isset($_POST['booking_id']) && isset($_POST['lunch_status']))
            $this->form_validation->set_rules('lunch_status', 'Lunch Status', 'trim|required');
        if(isset($_POST['booking_id']) && isset($_POST['dinner_status']))
            $this->form_validation->set_rules('dinner_status', 'Dinner Status', 'trim|required');
        if(isset($_POST['booking_id']) && isset($_POST['slot']))
            $this->form_validation->set_rules('slot', 'Slot', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['status'] = "500";
        	$data['message'] = "error";
            if(isset($_POST['booking_id']) && (form_error('booking_id') != ''))
                $data['data'][] = array('error' => form_error('booking_id','',''));
            if(form_error('user_id') != '')
                $data['data'][] = array('error' => form_error('user_id','',''));
            if(form_error('branch_id') != '')
                $data['data'][] = array('error' => form_error('branch_id','',''));
            if(form_error('date') != '')
			    $data['data'][] = array('error' => form_error('date','',''));
            // if(form_error('type') != '')
			//     $data['data'][] = array('error' => form_error('type','',''));
            if(isset($_POST['booking_id']) && (form_error('lunch_status') != ''))
                $data['data'][] = array('error' => form_error('lunch_status','',''));
            if(isset($_POST['booking_id']) && (form_error('dinner_status') != ''))
                $data['data'][] = array('error' => form_error('dinner_status','',''));
            if(isset($_POST['booking_id']) && (form_error('slot') != ''))
                $data['data'][] = array('error' => form_error('slot','',''));
		}
		else
		{
            $created_by = $this->input->post('user_id').'_user';
            $insert = array('user_id' => $this->input->post('user_id'), 'branch_id' => $this->input->post('branch_id'), 'booking_date' => date('Y-m-d', strtotime($this->input->post('date'))));
            if(isset($_POST['lunch_status']))
            {
                $insert['lunch_status'] = $this->input->post('lunch_status');
                if((isset($_POST['dinner_status'])) && ($this->input->post('dinner_status') == '2'))
                    $insert['lunch_status'] = '0';
            }
            if(isset($_POST['dinner_status']))
            {
                $insert['dinner_status'] = $this->input->post('dinner_status');
                if((isset($_POST['lunch_status'])) && ($this->input->post('lunch_status') == '2'))
                    $insert['dinner_status'] = '0';
            }
            if(isset($_POST['slot']))
            {
                $insert['slot'] = $this->input->post('slot');
            }
            if(isset($_POST['booking_id']))
            {
                $insert['updated_by'] = $created_by;
                $insert['modified_at'] = date('Y-m-d H:i:s');
                $where = array('id' => $this->input->post('booking_id'));
                $result = $this->get->update('bookings', $insert, $where);
            }
            else
            {
                $insert['booked_by'] = $created_by;
                $insert['created_at'] = date('Y-m-d H:i:s');
                $result = $this->get->insert('bookings', $insert);
            }
            if($result)
            {
                $data['status'] = "200";
                $data['message'] = "success";
                $data['data'] = $insert;
            }
            else
            {
                $data['status'] = "500";
                $data['message'] = "error";
                $data['data'][] = array('error' => $this->db->error());
            }
        }
        $encode = json_encode($data);
    	echo $encode;
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
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
        $this->form_validation->set_rules('user_id', 'User Id', 'trim|numeric|required');
        $this->form_validation->set_rules('branch_id', 'Branch Id', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE)
		{	
            $data['status'] = "500";
        	$data['message'] = "error";
            if(form_error('user_id') != '')
                $data['data'][] = array('error' => form_error('user_id','',''));
            if(form_error('branch_id') != '')
                $data['data'][] = array('error' => form_error('branch_id','',''));
		}
		else
		{
            $data['status'] = "200";
            $data['message'] = "success";
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d', strtotime('+31 days'));
            $weekOfdays = array();
            $data['data'] = $weekOfdays;
            $where = array('user_id' => $this->input->post('user_id'), 'branch_id' => $this->input->post('branch_id'), 'booking_date >=' => $from_date, 'booking_date <=' => $to_date, 'status' => '1');
            $results = $this->get->table('bookings', $where);
            $branches = $this->get->table('branches', array('id' => $this->input->post('branch_id'), 'status' => '1'));
            $dates = array();
            for($i =1; $i <= 31; $i++)
            {
                if($i == 1)
                    $from_date = $from_date;
                else
                    $from_date = date('Y-m-d', strtotime('+1 day', strtotime($from_date)));
                if((date('l', strtotime($from_date)) != 'Saturday') && (date('l', strtotime($from_date)) != 'Sunday'))
                    $weekOfdays[] = date('Y-m-d', strtotime($from_date));
            }
            if($branches != false)
            {
                foreach($weekOfdays as $week)
                {
                    $lunch_status = ($results != false)?pluck($results,'lunch_status','booking_date'):'';
                    $dinner_status = ($results != false)?pluck($results,'dinner_status','booking_date'):'';
                    $slot_status = ($results != false)?pluck($results,'slot','booking_date'):'';
                    $booking_id = ($results != false)?pluck($results,'id','booking_date'):'';
                    // $lunch = ($branches[0]->lunch == '0')?0:((!empty($lunch_status[$week])?$lunch_status[$week]:1));
                    // $dinner = ($branches[0]->dinner == '0')?0:((!empty($dinner_status[$week])?$dinner_status[$week]:1));

                    $where = array('user_id' => $this->input->post('user_id'), 'branch_id !=' => $this->input->post('branch_id'), 'booking_date' => $week, 'lunch_status !=' => '3', 'dinner_status !=' => '3', 'status' => '1');
                    $booked = ($this->get->table('bookings', $where) != false)?1:0;

                    $lunch = ($branches[0]->lunch == '0')?0:((!empty($lunch_status[$week])?$lunch_status[$week]:(((!empty($dinner_status[$week])) && (($dinner_status[$week] == '2') || ($dinner_status[$week] == '4')))?0:(($booked == 0)?1:0))));
                    $lunch_slots = (($lunch != '0') && !empty($branches[0]->lunch_slots))?$this->get->whereIn('slots',array('type' => 'Lunch', 'status' => '1', 'count >=' => 'IFNULL((SELECT COUNT(`slot`) FROM `bookings` WHERE `branch_id`= "'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`), 0)'),'id',explode(',',$branches[0]->lunch_slots),'','','','id,from_time,to_time,count,IFNULL((SELECT `slot` FROM `bookings` WHERE `user_id`="'.$this->input->post('user_id').'" AND `branch_id`="'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`),0) as `booked`, IFNULL((SELECT COUNT(`slot`) FROM `bookings` WHERE `branch_id`= "'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`), 0) as `booked_count`'):array();
                    
                    //$dq = $this->db->last_query();

                    $dinner = ($branches[0]->dinner == '0')?0:((!empty($dinner_status[$week])?$dinner_status[$week]:(((!empty($lunch_status[$week])) && (($lunch_status[$week] == '2') || ($lunch_status[$week] == '4')))?0:(($booked == 0)?1:0))));
                    $dinner_slots = (($dinner != '0') && !empty($branches[0]->dinner_slots))?$this->get->whereIn('slots',array('type' => 'Dinner', 'status' => '1', 'count >=' => 'IFNULL((SELECT COUNT(`slot`) FROM `bookings` WHERE `branch_id`= "'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`), 0)'),'id',explode(',',$branches[0]->dinner_slots),'','','','id,from_time,to_time,count,IFNULL((SELECT `slot` FROM `bookings` WHERE `user_id`="'.$this->input->post('user_id').'" AND `branch_id`="'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`),0) as `booked`, IFNULL((SELECT COUNT(`slot`) FROM `bookings` WHERE `branch_id`= "'.$this->input->post('branch_id').'" AND DATE(`booking_date`) = "'.$week.'" AND `status` = "1" AND `slot` = `slots`.`id`), 0) as `booked_count`'):array();
                    
                    $booking_id = !empty($booking_id[$week])?$booking_id[$week]:'0';
                    $slot = !empty($slot_status[$week])?$slot_status[$week]:'0';
                    $dates[] = array('user_id' => $this->input->post('user_id'), 'branch_id' => $this->input->post('branch_id'), 'booking_date' => $week, 'lunch' => $lunch, 'lunch_slots' => $lunch_slots, 'dinner' => $dinner, 'dinner_slots' => $dinner_slots, 'booking_id' => $booking_id, 'booked' => $booked, 'slot' => $slot);
                }
            }
            $data['data'] = $dates;
        }
        $encode = json_encode($data);
    	echo $encode;
	}
}

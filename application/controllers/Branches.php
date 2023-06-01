<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Branches extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->model('get');
	}
	public function index()
	{
        $where = array('status' => '1');
        $results = $this->get->table('branches', $where);
        if($results != false)
        {
            $branches = array();
            $data['status'] = "200";
            $data['message'] = "success";
            foreach($results as $result)
            {
                $branches[] = array(
                    'id' => $result->id,
                    'location' => $result->location,
                    'longitude' => $result->longitude,
                    'latitude' => $result->latitude,
                    'lunch' => $result->lunch,
                    'lunch_slots' => !empty($result->lunch_slots)?$this->get->whereIn('slots',array('type' => 'Lunch', 'status' => '1'),'id',explode(',',$result->lunch_slots),'','','','id,from_time,to_time,count'):array(),
                    'dinner' => $result->dinner,
                    'dinner_slots' => !empty($result->dinner_slots)?$this->get->whereIn('slots',array('type' => 'Dinner', 'status' => '1'),'id',explode(',',$result->dinner_slots),'','','','id,from_time,to_time,count'):array(),
                    'radius' => $result->radius,
                );
            }
            $data['data'] = $branches;
        }
        else
        {
            $data['status'] = "500";
            $data['message'] = "error";
            $data['data'][] = array('error' => 'No Data Found');
        }
        $encode = json_encode($data);
    	echo $encode;
	}
}

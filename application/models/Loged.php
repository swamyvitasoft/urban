<?php 
class Loged extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function login($data) {
	    $email = $data['email'];
	    $pass = md5($data['pass']);
		$this->db->select('sno,fullname,email,role,pass');
		$this->db->from('admin');
		$this->db->where('email',$email);
		$this->db->where('pass',$pass);
		$this->db->where('status','active');
		$query = $this->db->get();
        if($query->num_rows() == 1)
    	{
			$token = urldecode($data['tokenid']);
		    $update = array('web_token' => $token);
			$this->db->where('email',$email);
			$this->db->where('pass',$pass);
			$this->db->where('status','active');
		    $this->db->update('admin',$update);
			return $query->result();
		}
    	else
    	{
    		return false;
    	}
	}
	function app($data) {
	    $phone = $data['phone'];
	    $pass = md5($data['pass']);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('phone',$phone);
		$this->db->where('password',$pass);
		$this->db->where('isActive','1');
		$query = $this->db->get();
        if($query->num_rows() == 1)
    	{
			$token = urldecode($data['tokenid']);
		    $update = array('web_token' => $token);
			$this->db->where('phone',$phone);
			$this->db->where('password',$pass);
			$this->db->where('isActive','1');
		    $this->db->update('users',$update);
			return $query->result();
		}
    	else
    	{
    		return false;
    	}
	}
    function update($table,$data,$where = NULL){
        if($where != NULL)
            $this->db->where($where);
		$query = $this->db->update($table,$data);
		return true;
    }
}

?>
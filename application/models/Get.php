<?php class Get extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function management() {
		$this->db->from("admin");
		$this->db->where("status","active");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function table($table,$where = NULL,$like = NULL,$orderby = NULL,$limit = 0,$start = NULL,$group = NULL) {
		$this->db->from($table);
		if($where != NULL)
		    $this->db->where($where);
		if($like != NULL)
		    $this->db->like($like);
		if($table == 'naac' && $orderby != NULL)
		{
		    //$this->db->order_by(length($orderby),'asc');
		    $this->db->order_by($orderby,'asc');
		}
		if($orderby != NULL)
		    $this->db->order_by($orderby,'desc');
		if($limit != NULL)
		     $this->db->limit($limit, $start);
		if($group != NULL)
		     $this->db->group_by($group);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function joinTable($table,$select = NULL,$where = NULL,$join = NULL,$join2 = NULL,$like = NULL,$orderby = NULL,$limit = 0,$start = NULL) {
	    if($select != NULL)
	        $this->db->select($select);
		$this->db->from($table);
		if($where != NULL)
		    $this->db->where($where);
		if($join != NULL)
		    $this->db->join($join['table'],$join['condition']);
		if($join2 != NULL)
		    $this->db->join($join2['table'],$join2['condition']);
		if($like != NULL)
		    $this->db->like($like);
		if($orderby != NULL)
		    $this->db->order_by($orderby,'desc');
		if($limit != NULL)
		     $this->db->limit($limit, $start);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function updateTableDetails($table,$data) {
		$email = $data['emailid'];
		$id = $this->uri->segment(3);
        $this->db->from($table);
		$this->db->where('emailid',$email);
		$this->db->where_not_in('id',$id);
		$this->db->where('isActive','1');
		$query = $this->db->get();
		if ($query->num_rows() == 0)
		{
			$this->db->where('id', $id);
			$query = $this->db->update($table,$data);
			return true;
		}
		else
		{
			return false;
		}
	}
	function updateInsertTableDetails($table,$data,$where = NULL,$create = NULL,$modify = NULL) {
        $this->db->from($table);
        if($where != NULL)
		    $this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
            $updated_id = $query->row()->sno;
            $this->db->where($where);
			if($modify != NULL)
			    $data[$modify] = date('Y-m-d H:i:s');
			$query = $this->db->update($table,$data);
			return $updated_id;
		}
		else
		{
			if($create != NULL)
			    $data[$create] = date('Y-m-d H:i:s');
			$query = $this->db->insert($table,$data);
			return $this->db->insert_id();
		}
	}
	function check_unique_field($table,$id, $where) {
        $this->db->where($where);
        if($id != NULL) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($table)->num_rows();
    }
    function insert($table,$data){
        $query = $this->db->insert($table,$data);
		return $this->db->insert_id();
    }
    function insert_batch($table,$data){
        $query = $this->db->insert_batch($table,$data);
		return true;
    }
    function update($table,$data,$where = NULL){
        if($where != NULL)
            $this->db->where($where);
		$query = $this->db->update($table,$data);
		return true;
    }
    function like(){
        $this->db->like('title', $query);
        $res = $this->db->get('film');
    }
    function updateWhereIn($table,$data,$where = NULL,$field = NULL,$where_in = NULL){
        if($where != NULL)
            $this->db->where($where);
        if($where_in != NULL)
            $this->db->where_in($field,$where_in);
		$query = $this->db->update($table,$data);
		return true;
    }
    function visit($table,$where = NULL,$limit, $start, $orderby = NULL) {
		if($where != NULL)
		    $this->db->where($where);
		$this->db->order_by($orderby,'desc');
		$query = $this->db->get($table, $limit, $start);
		if($query->num_rows() > 0)
		{
			$results = $query->result();
			return $results;
		}
		else
		{
			return false;
		}
	}
	function checkandupdate($table,$where = NULL,$data) {
        $this->db->from($table);
		if($where != NULL)
		    $this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() == 0)
		{
		    $this->db->where($where);
			$query = $this->db->update($table,$data);
			return true;
		}
		else
		{
			return false;
		}
	}
	function whereIn($table,$where = NULL,$column = NULL,$where_in = NULL,$like = NULL,$orderby = NULL,$limit = NULL,$select = NULL) {
		$this->db->from($table);
		if($select != NULL)
		    $this->db->select($select);
		if($where != NULL)
		    $this->db->where($where);
		if($where_in != NULL)
		    $this->db->where_in($column,$where_in);
		if($like != NULL)
		{
		    $i = 1;
		    $this->db->group_start();
	        foreach($like as $key => $lke)
		    {
		        if($i == 1)
		            $this->db->like($key,$lke);
	            else
		            $this->db->or_like($key,$lke);
	            $i++;
	        }
	        $this->db->group_end();
		}
		if($orderby != NULL)
		{
			if(is_array($orderby))
			{
				foreach($orderby as $key => $val)
		    	$this->db->order_by($key,$val);
			}
			else
		    	$this->db->order_by($orderby,'desc');
		}
		if($limit != NULL)
		    $this->db->limit($limit);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function query($query) {
	    $query = $this->db->query($query);
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function whereNotIn($table,$where = NULL,$column = NULL,$where_in = NULL,$like = NULL,$orderby = NULL,$limit = NULL) {
		$this->db->from($table);
		if($where != NULL)
		    $this->db->where($where);
		if($where_in != NULL)
		    $this->db->where_not_in($column,$where_in);
		if($like != NULL)
		{
		    $i = 1;
		    $this->db->group_start();
	        foreach($like as $key => $lke)
		    {
		        if($i == 1)
		            $this->db->like($key,$lke);
	            else
		            $this->db->or_like($key,$lke);
	            $i++;
	        }
	        $this->db->group_end();
		}
		if($orderby != NULL)
		    $this->db->order_by($orderby);
		if($limit != NULL)
		    $this->db->limit($limit);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function leftJoin($table1,$table2 = NULL,$where = NULL,$joinwhere,$select = '*',$like = NULL,$orderby = NULL,$limit = NULL,$start = NULL,$wherein = NULL,$find_in_set = NULL) {
	    $this->db->select($select);
		$this->db->from($table1);
		if($where != NULL)
		    $this->db->where($where);
		if($like != NULL)
		{
		    $i = 1;
		    $this->db->group_start();
	        foreach($like as $key => $lke)
		    {
		        if($i == 1)
		            $this->db->like($key,$lke);
	            else
		            $this->db->or_like($key,$lke);
	            $i++;
	        }
	        $this->db->group_end();
		}
		if($orderby != NULL)
		{
			foreach($orderby as $key => $val)
		    	$this->db->order_by($key,$val);
		}
		if($table2 != NULL)
		    $this->db->join($table2, $joinwhere, 'left');
		if($limit != NULL && $start != NULL)
		    $this->db->limit($limit, $start);
		elseif($limit != NULL)
			$this->db->limit($limit);
		if($wherein != NULL && is_array($wherein))
		    $this->db->where_in($wherein[0], $wherein[1]);
		if($find_in_set != NULL && is_array($find_in_set))
		{
		    foreach($find_in_set[1] as $values)
		        $this->db->where("FIND_IN_SET('$values',$find_in_set[0]) !=", 0);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
	function leftJoin3($table1,$table2 = NULL,$table3 = NULL,$where = NULL,$joinwhere,$joinwhere3,$select = '*',$like = NULL,$orderby = NULL) {
	    $this->db->select($select);
		$this->db->from($table1);
		if($where != NULL)
		    $this->db->where($where);
		if($like != NULL)
		{
		    $i = 1;
		    $this->db->group_start();
	        foreach($like as $key => $lke)
		    {
		        if($i == 1)
		            $this->db->like($key,$lke);
	            else
		            $this->db->or_like($key,$lke);
	            $i++;
	        }
	        $this->db->group_end();
		}
		if($orderby != NULL)
		    $this->db->order_by($orderby,'desc');
		if($table2 != NULL)
		    $this->db->join($table2, $joinwhere, 'left');
		if($table3 != NULL)
		    $this->db->join($table3, $joinwhere3, 'left');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		    $result = $query->result();
			return $result;
        }
        else
		{
			return false;
		}
	}
    function delete($table,$where){
        $this->db->delete($table, $where); 
        return true;
    }
	function delete_batch($table,$key,$arrays) {
		if(count($arrays)) {
			$this->db->where_in($key, $arrays);
			$this->db->delete($table);
			return true;
		} else {
			return false;
		}
	}
    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => $this->lang->line('y'),
            'm' => $this->lang->line('m'),
            'w' => $this->lang->line('w'),
            'd' => $this->lang->line('d'),
            'h' => $this->lang->line('h'),
            'i' => $this->lang->line('m'),
            's' => $this->lang->line('se'),
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? "'".$this->lang->line('s') : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' '.$this->lang->line('ago') : $this->lang->line('just_now');
    }
	function activeInactive($table,$data,$where = NULL,$create = NULL,$modify = NULL) {
        $this->db->from($table);
        if($where != NULL)
		    $this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
            $data['status'] = ($query->row()->status == 1)?0:1;
            $this->db->where($where);
			if($modify != NULL)
			    $data[$modify] = date('Y-m-d H:i:s');
			$query = $this->db->update($table,$data);
			return $data['status'];
		}
		else
		{
			if($create != NULL)
			    $data[$create] = date('Y-m-d H:i:s');
			$query = $this->db->insert($table,$data);
			return $this->db->insert_id();
		}
	}
}

?>
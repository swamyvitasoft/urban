<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Manage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
		$this->load->model('types');
        $this->load->model('adminpanel');
								}
	public function index()
	{
		$this->load_body();
	}
	public function load_body()
	{
        $type = $this->input->post('ct_type');
		if($type != 'relation' && $type != 'relation_depend' && $type != 'join' && $type != 'highlight' && $type != 'highlight_row' && $type != 'map' )
		{
			$data['type'] = $this->types->type($type);
			if($data['type'] == TRUE)
			{
				echo $data['type'][0]->tcondition;
				echo $data['type'][0]->tformat;
			}
			else
			{
			}
		}
		else if($type == 'relation_depend')
		{
			$tables = $this->adminpanel->get_tables();
			echo '<div class="col-md-6 m-b-20"><select class="form-control tablename" name="tablename" id="tablename" data-depend="depend">';
			foreach($tables as $table) { if($table != "change_type" && $table != "admin_sessions" && $table != "create_table" && $table != "css" && $table != "js" && $table != "settings" && $table != "type") {
			echo '<option value="'.$table.'" >'.$table.'</option>';} }
			echo '</select></div><div class="table_div"></div>';
		}
		else if($type == 'relation')
		{
			$tables = $this->adminpanel->get_tables();
			echo '<div class="col-md-6 m-b-20"><select class="form-control tablename" name="tablename" id="tablename" data-depend="non">';
			foreach($tables as $table) { if($table != "change_type" && $table != "admin_sessions" && $table != "create_table" && $table != "css" && $table != "js" && $table != "settings" && $table != "type") {
			echo '<option value="'.$table.'" >'.$table.'</option>';} }
			echo '</select></div><div class="table_div"></div>';
		}
		else if($type == 'join')
		{
			$tables = $this->adminpanel->get_tables();
			echo '<div class="col-md-6 m-b-20"><select class="form-control tablename" name="tablename" id="tablename" data-depend="join">';
			foreach($tables as $table) { if($table != "admin" && $table != "change_type" && $table != "admin_sessions" && $table != "create_table" && $table != "css" && $table != "js" && $table != "settings" && $table != "type" && $table != "menu") {
			echo '<option value="'.$table.'" >'.$table.'</option>';} }
			echo '</select></div><div class="table_div"></div>';
		}
		else if($type == 'highlight' || $type == 'highlight_row')
		{
			echo '<div class="col-sm-2 m-b-20"><input class="form-control" name="condition" placeholder=">=" required ></div>';
			echo '<div class="col-sm-2 m-b-20"><input class="form-control" name="valuename" placeholder="40" required ></div>';
			echo '<div class="col-sm-3 m-b-20"><input class="form-control colorpicker" id="colorpicker" name="colorcode" placeholder="Color Code" required ></div>';
			echo '<script>$(".colorpicker").asColorPicker()</script>';
		}
		else if($type == 'map')
		{
			echo '<div class="col-sm-6 m-b-20"><input class="form-control" name="latitude" placeholder="Latitude" required ></div>';
			echo '<div class="col-sm-6 m-b-20"><input class="form-control" name="longitude" placeholder="Longitude" required ></div>';
		}
	}
    public function Gettablecolums()
	{
		$tname = $this->input->post('tablename');
		$depend = $this->input->post('depend');
		$colnames = $this->adminpanel->manage($tname);
		echo '<div class="row">';
		if($depend == 'join')
			echo '<div class="col-md-12 m-b-20"><select class="form-control" name="valuename" id="valuename">';
		else
			echo '<div class="col-md-3 m-b-20"><select class="form-control" name="valuename" id="valuename">';
		foreach($colnames as $colname) {
		echo '<option value="'.$colname.'" >'.$colname.'</option>'; }
		echo '</select></div>';
		if($depend == 'non' || $depend == 'depend')
		{
			echo '<div class="col-md-3 m-b-20"><select class="form-control" name="displayname" id="displayname">';
			foreach($colnames as $colname) {
			echo '<option value="'.$colname.'" >'.$colname.'</option>'; }
			echo '</select></div>';
			echo '<div class="col-md-3 m-b-20"><select class="form-control" name="typename" id="typename">';
			foreach($colnames as $colname) {
			echo '<option value="'.$colname.'" >'.$colname.'</option>'; }
			echo '</select></div>';
			echo '<div class="col-md-3 m-b-20"><input type="text" class="form-control" name="typevalue" id="typevalue"></div>';
		}
		if($depend == 'depend')
		{
			echo '<div class="col-md-6 m-b-20"><select class="form-control" name="dependvaluename" id="dependvaluename">';
			foreach($colnames as $colname) {
			echo '<option value="'.$colname.'" >'.$colname.'</option>'; }
			echo '</select></div>';
			$ptname = $this->input->post('ptname');
			$pcolnames = $this->adminpanel->manage($ptname);
			echo '<div class="col-md-6 m-b-20"><select class="form-control" name="dependcolname" id="dependcolname">';
			foreach($pcolnames as $pcolname) {
			echo '<option value="'.$pcolname.'" >'.$pcolname.'</option>'; }
			echo '</select></div>';
		}
		echo '</div>';
	}
    public function Submit()
	{
        if(isset($_POST['ct_submit']))
        {
            if($_POST['type'] == 'image')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'any' => '',
                'width' => $this->input->post('ct_width'),
                'height' => $this->input->post('ct_height'),
                'crop' => $this->input->post('icrop')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'thumbs')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'any' => '',
                'small' => $this->input->post('small'),
				'middle' => $this->input->post('middle'),
				'big' => $this->input->post('big')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'remote_image')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'any' => '',
                'links' => $this->input->post('links')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'file')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'any' => '',
                'frename' => $this->input->post('frename')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'password')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'pencrypt' => $this->input->post('pencrypt')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'select')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'stype' => $this->input->post('stype'),
                's_selected' => $this->input->post('s_selected'),
                's_options' => $this->input->post('s_options')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'datetime')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
                'dtype' => $this->input->post('dtype'),
                'd_any' => ''
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'textarea')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'int')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'none')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'text')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'timestamp')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'relation')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
				'tablename' => $this->input->post('tablename'),
				'valuename' => $this->input->post('valuename'),
				'displayname' => $this->input->post('displayname'),
				'typename' => $this->input->post('typename'),
				'typevalue' => $this->input->post('typevalue')
				
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'relation_depend')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
				'tablename' => $this->input->post('tablename'),
				'valuename' => $this->input->post('valuename'),
				'displayname' => $this->input->post('displayname'),
				'typename' => $this->input->post('typename'),
				'typevalue' => $this->input->post('typevalue'),
				'dependvaluename' => $this->input->post('dependvaluename'),
				'dependcolname' => $this->input->post('dependcolname')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'join')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
				'tablename' => $this->input->post('tablename'),
				'valuename' => $this->input->post('valuename')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'highlight' || $_POST['type'] == 'highlight_row')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
				'condition' => $this->input->post('condition'),
				'valuename' => $this->input->post('valuename'),
				'color' => $this->input->post('colorcode')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            if($_POST['type'] == 'map')
            {
                $array = array(
                'col_name' => $this->input->post('col_name'),
                'type' => $this->input->post('type'),
				'point' => 'point',
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude')
                );
                $insert = array(
                 'tid' => $this->input->post('ct_submit'),
                 'colname' => $this->input->post('col_name'),
                 'changetype' => json_encode($array)
                ); 
            }
            
            $data['change_type'] = $this->adminpanel->changetype($insert);
                if($data['change_type'] == true)
                {
                    echo '<div class="alert alert-success" align="left">Successfully Saved</div>';
                }
        }
            
	}
}

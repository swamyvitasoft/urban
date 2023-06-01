<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_Imagecheck {
	var $CI;
    public function __construct()
    {
        $this->CI =&get_instance();
    }
    public function index($imageUrl,$img)
    {
		if(is_array(getimagesize($imageUrl))){
			return $imageUrl;
		} else {
			return base_url('uploads/'.$img);
		}
    }
    public function person($imageUrl)
    {
		if(is_array(getimagesize($imageUrl))){
			return $imageUrl;
		} else {
			return base_url('uploads/300x300.png');
		}
    }
}
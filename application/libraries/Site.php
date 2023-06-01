<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Site {
		var $CI;
        public function __construct()
        {
            $this->CI =&get_instance();
            $settings = $this->settings();
            if($settings != false)
                ini_set('display_errors', $settings[0]->display_errors);
            $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->CI->output->set_header('Pragma: no-cache');
        }
        public function settings()
        {
			$this->CI->db->select('s.theme, s.button, s.title, s.logo, s.favicon, s.loginbg, s.menu, s.sentmail, s.footer_left, s.footer_right, s.display, s.maintenance, s.ipaddress, s.display_errors, c.c_links, c.css, j.j_links, j.js');
			$this->CI->db->from('settings as s, css as c, js as j');
			$query = $this->CI->db->get();
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
        }
        public function maintenance()
        {
			$site = $this->checkipaddress();
			if($site == true)
			{
			    return true;
			}
    		else
    		{
    		    redirect(admin_url('maintenance'),'refresh');
    		}
        }
        public function checkipaddress()
        {
            $this->CI->db->select('maintenance, ipaddress');
			$this->CI->db->from('settings');
			$this->CI->db->where('maintenance','0');
			$query = $this->CI->db->get();
			if ($query->num_rows() == 1)
			{
			    return true;
			}
			else
			{
    			$ipaddress = $this->ipaddress();
    			$this->CI->db->select('maintenance, ipaddress');
    			$this->CI->db->from('settings');
    			$condition = "FIND_IN_SET('".$ipaddress."', ipaddress)";  
    			$this->CI->db->where($condition);
    			$this->CI->db->where('maintenance','1');
    			$query = $this->CI->db->get();
    			if ($query->num_rows() == 1)
    			{
    				return true;
    			}
    			else
    			{
    				return false;
    			}
			}
        }
    	public function ipaddress()
    	{
    		$client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];
            if ( filter_var($client, FILTER_VALIDATE_IP) ) {
                $ip = $client;
            } elseif ( filter_var($forward, FILTER_VALIDATE_IP) ) {
                $ip = $forward;
            } else {
                $ip = ( $remote == "::1" ? "127.0.0.1" : $remote );
            }
            return $ip;
    	}
        private function _dbRole($where = NULL)
        {
            if($where != NULL)
                $this->CI->db->where($where);
			$this->CI->db->from('role');
			$query = $this->CI->db->get();
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
        }
        public function browser()
        {
            $u_agent  = $_SERVER['HTTP_USER_AGENT'];
            $bname    = 'Unknown';
            $platform = 'Unknown';

            if ( preg_match('/linux/i', $u_agent) ) {
                $platform = 'linux';
            } elseif ( preg_match('/macintosh|mac os x/i', $u_agent) ) {
                $platform = 'mac';
            } elseif ( preg_match('/windows|win32/i', $u_agent) ) {
                $platform = 'windows';
            }

            if ( preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent) ) {
                $bname = 'Internet Explorer';
                $ub    = "MSIE";
            } elseif ( preg_match('/Firefox/i', $u_agent) ) {
                $bname = 'Mozilla Firefox';
                $ub    = "Firefox";
            } elseif ( preg_match('/Chrome/i', $u_agent) ) {
                $bname = 'Google Chrome';
                $ub    = "Chrome";
            } elseif ( preg_match('/Safari/i', $u_agent) ) {
                $bname = 'Apple Safari';
                $ub    = "Safari";
            } elseif ( preg_match('/Opera/i', $u_agent) ) {
                $bname = 'Opera';
                $ub    = "Opera";
            } elseif ( preg_match('/Netscape/i', $u_agent) ) {
                $bname = 'Netscape';
                $ub    = "Netscape";
            }

            $known   = [ 'Version', $ub, 'other' ];
            $pattern = '#(?<browser>' . join('|', $known) .
                ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
            if ( !preg_match_all($pattern, $u_agent, $matches) ) {
                // we have no matching number just continue
            }

            $i = inicompute($matches['browser']);
            if ( $i != 1 ) {
                if ( strripos($u_agent, "Version") < strripos($u_agent, $ub) ) {
                    $version = $matches['version'][0];
                } else {
                    $version = $matches['version'][1];
                }
            } else {
                $version = $matches['version'][0];
            }

            if ( $version == null || $version == "" ) {
                $version = "?";
            }

            return (object)[
                'userAgent' => $u_agent,
                'name'      => $bname,
                'version'   => $version,
                'platform'  => $platform,
                'pattern'   => $pattern
            ];
        }
}
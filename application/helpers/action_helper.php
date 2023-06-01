<?php
function escapeString($val) {
    $t = & get_instance();
    $driver = $t->db->dbdriver;

    if( $driver == 'mysql') {
        $val = mysql_real_escape_string($val);
    } elseif($driver == 'mysqli') {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
    }

    return $val;
}
function inicompute( $array ) {
    if($array != false)
    {
        if ( is_object($array) ) {
            if ( count(get_object_vars($array)) ) {
                return count(get_object_vars($array));
            }
            return 0;
        } elseif ( is_array($array) ) {
            if ( count($array) ) {
                return count($array);
            }
            return 0;
        } elseif ( is_string($array) ) {
            return 1;
        } elseif ( is_null($array) ) {
            return 0;
        } elseif ( is_int($array) ) {
            return (int) $array;
        } else {
            return count($array);
        }
    }
    else
        return false;
}
function pluck($array, $value, $key=NULL) {
    $returnArray = array();
    if(count($array)) {
        foreach ($array as $item) {
            if($key != NULL) {
                $returnArray[$item->$key] = strtolower($value) == 'obj' ? $item : $item->$value;
            } else {
                $returnArray[] = $item->$value;
            }
        }
    }
    return $returnArray;
}
function pluck_multi_array($arrays, $val, $key = NULL) {
    $retArray = array();
    if(count($arrays)) {
        $i = 0;
        foreach ($arrays as $array) {
            if(!empty($key)) {
                if(strtolower($val) == 'obj') {
                    $retArray[$array->$key][] = $array;
                } else {
                    $retArray[$array->$key][] = $array->$val;
                }
            } else {
                if(strtolower($val) == 'obj') {
                    $retArray[$i][] = $array;
                } else {
                    $retArray[$i][] = $array->$val;
                }
                $i++;
            }
        }
    }
    return $retArray;
}
function pluck_bind($array, $value, $concatFirst, $concatLast, $key=NULL) {
    $returnArray = array();
    if(count($array)) {
        foreach ($array as $item) {
            if($key != NULL) {
                $returnArray[$item->$key] = $concatFirst.$item->$value.$concatLast;
            } else {
                if($value!=NULL) {
                    $returnArray[] = $concatFirst.$item->$value.$concatLast;
                } else {
                    $returnArray[] = $concatFirst.$item.$concatLast;
                }
            }
        }
    }
    return $returnArray;
}
function namesorting($string, $len = 14) {
    $return = $string;
    if(isset($string) && $len) {
        if(strlen($string) >  $len) {
            $return = substr($string, 0,$len-2).'..';
        } else {
            $return = $string;
        }
    }
    return $return;
}
function array_of_object($array) {
    foreach($array as $key => $object)
    {
        $return[] = (object)array('id' => $key, 'name' => $object);
    }
    return $return;
}
function count_all_results($table = NULL) {
    $return = 0;
    if($table != '')
    {
        $t = & get_instance();
        $t->load->model('get');
        $where = array('status' => 1);
        $res = $t->get->table($table, $where);
        if($res != false)
            $return = count($res);
    }
    return $return;
}
function get($table, $where = NULL,$like = NULL,$orderby = NULL,$limit = NULL,$start = NULL) {
    $return = false;
    $t = & get_instance();
    $t->load->model('get');
    $res = $t->get->table($table, $where,$like,$orderby,$limit,$start);
    return $res;
}
function countries() {
    $countries = array(
    	"Afghanistan",
    	"Albania",
    	"Algeria",
    	"American Samoa",
    	"Andorra",
    	"Angola",
    	"Anguilla",
    	"Antarctica",
    	"Antigua and Barbuda",
    	"Argentina",
    	"Armenia",
    	"Aruba",
    	"Australia",
    	"Austria",
    	"Azerbaijan",
    	"Bahamas (the)",
    	"Bahrain",
    	"Bangladesh",
    	"Barbados",
    	"Belarus",
    	"Belgium",
    	"Belize",
    	"Benin",
    	"Bermuda",
    	"Bhutan",
    	"Bolivia (Plurinational State of)",
    	"Bonaire, Sint Eustatius and Saba",
    	"Bosnia and Herzegovina",
    	"Botswana",
    	"Bouvet Island",
    	"Brazil",
    	"British Indian Ocean Territory (the)",
    	"Brunei Darussalam",
    	"Bulgaria",
    	"Burkina Faso",
    	"Burundi",
    	"Cabo Verde",
    	"Cambodia",
    	"Cameroon",
    	"Canada",
    	"Cayman Islands (the)",
    	"Central African Republic (the)",
    	"Chad",
    	"Chile",
    	"China",
    	"Christmas Island",
    	"Cocos (Keeling) Islands (the)",
    	"Colombia",
    	"Comoros (the)",
    	"Congo (the Democratic Republic of the)",
    	"Congo (the)",
    	"Cook Islands (the)",
    	"Costa Rica",
    	"Croatia",
    	"Cuba",
    	"Curaçao",
    	"Cyprus",
    	"Czechia",
    	"Côte d'Ivoire",
    	"Denmark",
    	"Djibouti",
    	"Dominica",
    	"Dominican Republic (the)",
    	"Ecuador",
    	"Egypt",
    	"El Salvador",
    	"Equatorial Guinea",
    	"Eritrea",
    	"Estonia",
    	"Eswatini",
    	"Ethiopia",
    	"Falkland Islands (the) [Malvinas]",
    	"Faroe Islands (the)",
    	"Fiji",
    	"Finland",
    	"France",
    	"French Guiana",
    	"French Polynesia",
    	"French Southern Territories (the)",
    	"Gabon",
    	"Gambia (the)",
    	"Georgia",
    	"Germany",
    	"Ghana",
    	"Gibraltar",
    	"Greece",
    	"Greenland",
    	"Grenada",
    	"Guadeloupe",
    	"Guam",
    	"Guatemala",
    	"Guernsey",
    	"Guinea",
    	"Guinea-Bissau",
    	"Guyana",
    	"Haiti",
    	"Heard Island and McDonald Islands",
    	"Holy See (the)",
    	"Honduras",
    	"Hong Kong",
    	"Hungary",
    	"Iceland",
    	"India",
    	"Indonesia",
    	"Iran (Islamic Republic of)",
    	"Iraq",
    	"Ireland",
    	"Isle of Man",
    	"Israel",
    	"Italy",
    	"Jamaica",
    	"Japan",
    	"Jersey",
    	"Jordan",
    	"Kazakhstan",
    	"Kenya",
    	"Kiribati",
    	"Korea (the Democratic People's Republic of)",
    	"Korea (the Republic of)",
    	"Kuwait",
    	"Kyrgyzstan",
    	"Lao People's Democratic Republic (the)",
    	"Latvia",
    	"Lebanon",
    	"Lesotho",
    	"Liberia",
    	"Libya",
    	"Liechtenstein",
    	"Lithuania",
    	"Luxembourg",
    	"Macao",
    	"Madagascar",
    	"Malawi",
    	"Malaysia",
    	"Maldives",
    	"Mali",
    	"Malta",
    	"Marshall Islands (the)",
    	"Martinique",
    	"Mauritania",
    	"Mauritius",
    	"Mayotte",
    	"Mexico",
    	"Micronesia (Federated States of)",
    	"Moldova (the Republic of)",
    	"Monaco",
    	"Mongolia",
    	"Montenegro",
    	"Montserrat",
    	"Morocco",
    	"Mozambique",
    	"Myanmar",
    	"Namibia",
    	"Nauru",
    	"Nepal",
    	"Netherlands (the)",
    	"New Caledonia",
    	"New Zealand",
    	"Nicaragua",
    	"Niger (the)",
    	"Nigeria",
    	"Niue",
    	"Norfolk Island",
    	"Northern Mariana Islands (the)",
    	"Norway",
    	"Oman",
    	"Pakistan",
    	"Palau",
    	"Palestine, State of",
    	"Panama",
    	"Papua New Guinea",
    	"Paraguay",
    	"Peru",
    	"Philippines (the)",
    	"Pitcairn",
    	"Poland",
    	"Portugal",
    	"Puerto Rico",
    	"Qatar",
    	"Republic of North Macedonia",
    	"Romania",
    	"Russian Federation (the)",
    	"Rwanda",
    	"Réunion",
    	"Saint Barthélemy",
    	"Saint Helena, Ascension and Tristan da Cunha",
    	"Saint Kitts and Nevis",
    	"Saint Lucia",
    	"Saint Martin (French part)",
    	"Saint Pierre and Miquelon",
    	"Saint Vincent and the Grenadines",
    	"Samoa",
    	"San Marino",
    	"Sao Tome and Principe",
    	"Saudi Arabia",
    	"Senegal",
    	"Serbia",
    	"Seychelles",
    	"Sierra Leone",
    	"Singapore",
    	"Sint Maarten (Dutch part)",
    	"Slovakia",
    	"Slovenia",
    	"Solomon Islands",
    	"Somalia",
    	"South Africa",
    	"South Georgia and the South Sandwich Islands",
    	"South Sudan",
    	"Spain",
    	"Sri Lanka",
    	"Sudan (the)",
    	"Suriname",
    	"Svalbard and Jan Mayen",
    	"Sweden",
    	"Switzerland",
    	"Syrian Arab Republic",
    	"Taiwan",
    	"Tajikistan",
    	"Tanzania, United Republic of",
    	"Thailand",
    	"Timor-Leste",
    	"Togo",
    	"Tokelau",
    	"Tonga",
    	"Trinidad and Tobago",
    	"Tunisia",
    	"Turkey",
    	"Turkmenistan",
    	"Turks and Caicos Islands (the)",
    	"Tuvalu",
    	"Uganda",
    	"Ukraine",
    	"United Arab Emirates (the)",
    	"United Kingdom of Great Britain and Northern Ireland (the)",
    	"United States Minor Outlying Islands (the)",
    	"United States of America (the)",
    	"Uruguay",
    	"Uzbekistan",
    	"Vanuatu",
    	"Venezuela (Bolivarian Republic of)",
    	"Viet Nam",
    	"Virgin Islands (British)",
    	"Virgin Islands (U.S.)",
    	"Wallis and Futuna",
    	"Western Sahara",
    	"Yemen",
    	"Zambia",
    	"Zimbabwe",
    	"Åland Islands"
    );
    return $countries;
}
function sendmail($title = null, $from = null, $to = null, $subject = null, $body = null )
{
    $t = & get_instance();
    $t->load->library('email');
    $t->email->set_mailtype("html");
    if (!empty($to)) {
        $emailsetting = get('emailsetting');
        if($emailsetting != false)
        {
            $emailsetting = pluck($emailsetting,'value','fieldoption');
            $emailsetting = (object)$emailsetting;
            if ( $emailsetting->email_engine == 'smtp' ) {
                $config = [
                    'protocol'    => 'smtp',
                    'smtp_host'   => $emailsetting->smtp_server,
                    'smtp_port'   => $emailsetting->smtp_port,
                    'smtp_user'   => $emailsetting->smtp_username,
                    'smtp_pass'   => $emailsetting->smtp_password,
                    'smtp_crypto' => $emailsetting->smtp_security,
                    'mailtype'    => 'html',
                    'charset'     => 'utf-8'
                ];
                $t->email->initialize($config);
                $t->email->set_newline("\r\n");
            }
            $t->email->from($from, $title);
            $t->email->to($to);
            $t->email->subject($subject);
            $t->email->message($body);
            if ($t->email->send())
                return 'true';
            else
                return $t->email->print_debugger();
        }
    }
}
function time_elapsed_string($datetime) {
    $pdate = date("Y-m-d H:i:s");
    $first_date  = new DateTime($datetime);
    $second_date = new DateTime($pdate);
    $difference  = $first_date->diff($second_date);
    if ( $difference->y >= 1 ) {
        $format = 'Y-m-d H:i:s';
        $date   = DateTime::createFromFormat($format, $datetime);
        return $date->format('M d Y');
    } elseif ( $difference->m == 1 && $difference->m != 0 ) {
        return $difference->m . " month ago";
    } elseif ( $difference->m <= 12 && $difference->m != 0 ) {
        return $difference->m . " months ago";
    } elseif ( $difference->d == 1 && $difference->d != 0 ) {
        return "Yesterday";
    } elseif ( $difference->d <= 31 && $difference->d != 0 ) {
        return $difference->d . " days ago";
    } else {
        if ( $difference->h == 1 && $difference->h != 0 ) {
            return $difference->h . " hr ago";
        } else {
            if ( $difference->h <= 24 && $difference->h != 0 ) {
                return $difference->h . " hrs ago";
            } elseif ( $difference->i <= 60 && $difference->i != 0 ) {
                return $difference->i . " mins ago";
            } elseif ( $difference->s <= 10 ) {
                return "Just Now";
            } elseif ( $difference->s <= 60 && $difference->s != 0 ) {
                return $difference->s . " sec ago";
            }
        }
    }
}
function captcha(){
    $t = & get_instance();
    $t->load->helper('captcha');
    $config = array(
        'img_path'      => 'uploads/captcha_images/',
        'img_url'       => base_url('uploads/captcha_images/'),
        'font_path'     => 'system/fonts/texb.ttf',
        'img_width'     => '200',
        'img_height'    => 42,
        'word_length'   => 6,
        'font_size'     => 18,
        'colors'        => array(
           'background'     => array(168, 168, 249),
           'border'         => array(168, 168, 249),
           'text'           => array(0, 0, 0),
           'grid'           => array(0, 0, 255)
        )
    );
    $captcha = create_captcha($config);
    return $captcha;
}
function resize($file,$w=714,$h=420) {
    $t = & get_instance();
	$t->load->library('image_lib');
    $config['image_library'] = 'gd2';
    $config['source_image']='uploads/'.$file;
    $config['create_thumb']=FALSE;
    $config['maintain_ratio']=TRUE;
    $config['width']=$w;
    $config['height']=$h;
	$config['new_image'] = 'uploads/small/'.$file;
	$t->image_lib->clear();
    $t->image_lib->initialize($config);
    $t->image_lib->resize();
} 
function upload_files($title, $files, $type = NULL)
{
    $t = & get_instance();
    $config = array(
        'upload_path' => 'uploads/',
        'max_size' => 1024*20,
        'overwrite' => 0,                       
    );
    if($type != NULL)
        $config['allowed_types'] = $type;
    else
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
    $t->load->library('upload', $config);
    $images = array();
    if(is_array($files['name']))
    {
        foreach ($files['name'] as $key => $image) {
            if(!empty($files['name'][$key]))
            {
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];
                $temp = explode(".", $image);
                $fileName = $title .'_'. rand(99, 9999). round(microtime(true)) . '.' . end($temp);
                $config['file_name'] = $fileName;
                $t->upload->initialize($config);
                if ($t->upload->do_upload('images[]')) {
                    $upload_data = $t->upload->data();
                    $images[] = $upload_data['file_name'];
                } else {
                    return false;
                }
            }
            else
                $images[] = '';
        }
    }
    else
    {
        $_FILES['images[]']['name']= $files['name'];
        $_FILES['images[]']['type']= $files['type'];
        $_FILES['images[]']['tmp_name']= $files['tmp_name'];
        $_FILES['images[]']['error']= $files['error'];
        $_FILES['images[]']['size']= $files['size'];
        $temp = explode(".", $files['name']);
        $fileName = $title .'_'. rand(99, 9999). round(microtime(true)) . '.' . end($temp);
        $config['file_name'] = $fileName;
        $t->upload->initialize($config);
        if ($t->upload->do_upload('images[]')) {
            $upload_data = $t->upload->data();
            $images[] = $upload_data['file_name'];
        } else {
            return false;
        }
    }
    return $images;
}
function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {
    $dates = [];
    $current = strtotime( $first );
    $last = strtotime( $last );
    while( $current <= $last ) {
        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
    }
    return $dates;
}

function currency() {
    return '₹';
}
function browser($browser) {
    if($browser != NULL) {
        switch ($browser) {
            case 'Google Chrome':
                return base_url('app-assets/images/icons/google-chrome.png');
                break;
            case 'Mozilla Firefox':
                return base_url('app-assets/images/icons/mozila-firefox.png');
                break;
            case 'Apple Safari':
                return base_url('app-assets/images/icons/apple-safari.png');
                break;
            case 'Internet Explorer':
                return base_url('app-assets/images/icons/internet-explorer.png');
                break;
            case 'Opera':
                return base_url('app-assets/images/icons/opera.png');
                break;
            default:
                return base_url('app-assets/images/icons/internet.png');
        }
    } else {
        return base_url('app-assets/images/icons/internet.png');
    }
}
function location($ipaddress) {
    $apiURL = 'https://freegeoip.app/json/'.$ipaddress;
    $ch = curl_init($apiURL); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $apiResponse = curl_exec($ch); 
    if($apiResponse === FALSE) { 
        $msg = curl_error($ch); 
        curl_close($ch); 
        return ''; 
    } 
    curl_close($ch); 
    $ipData = json_decode($apiResponse, true);
    return !empty($ipData)?$ipData['region_name'].'('.$ipData['country_name'].')':''; 
}
function person($imageUrl)
{
	if($imageUrl != NULL) {
    	if(file_exists(FCPATH.'uploads/'.$imageUrl)) {
    		return base_url('uploads/'.$imageUrl);
    	} else {
    		return base_url('uploads/300x300.png');
    	}
    } else {
        return base_url('uploads/300x300.png');
    }
}
function profilepic($imageUrl)
{
	if($imageUrl != NULL) {
		if(file_exists(FCPATH.'uploads/'.$imageUrl)) {
			return base_url('uploads/small/'.$imageUrl);
		} else {
			return base_url('uploads/small/300x300.png');
		}
    } else {
        return base_url('uploads/small/300x300.png');
    }
}
function pic($imageUrl)
{
	if($imageUrl != NULL) {
		if(file_exists(FCPATH.'uploads/'.$imageUrl)) {
			return base_url('uploads/'.$imageUrl);
		} else {
			return base_url('uploads/no-image.jpeg');
		}
    } else {
        return base_url('uploads/no-image.jpeg');
    }
}
function today_to_lastweek() {
    $date = new DateTime(date('Y-m-d', strtotime('-7 days')));
    for($days = 7; $days--;) { 
        $day[] = $date->modify('+1 days')->format('d');
    }
    return $day;
}
function months($m = 'M') {
    for($i = 1; $i <= date('m'); $i++) { 
        $month[] = date($m, strtotime(date('Y-'.$i.'-01')));
    }
    return $month;
}
function pagination($base_url, $total_rows, $per_page = '12', $uri_segment = '3') {
    $t = & get_instance();
    $config = array();
    $config["base_url"] = $base_url;
    $config["total_rows"] = $total_rows;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $uri_segment;
    $config["full_tag_open"] = '<ul class="pagination rounded-active justify-content-center mb-0">';
    $config["full_tag_close"] = '</ul>';
    $config["first_tag_open"] = '<li class="page-item">';
    $config["first_tag_close"] = '</li>';
    $config["first_url"] = '';
    $config["first_link"] = '<i class="far fa-angle-double-left"></i>';
    $config["last_tag_open"] = '<li class="page-item">';
    $config["last_tag_close"] = '</li>';
    $config["last_link"] = '<i class="far fa-angle-double-right"></i>';
    $config["next_link"] = '<i class="far fa-angle-right"></i>';
    $config["prev_link"] = '<i class="far fa-angle-left"></i>';
    $config["prev_tag_open"] = '<li class="page-item">';
    $config["prev_tag_close"] = '</li>';
    $config["next_tag_open"] = '<li class="page-item">';
    $config["next_tag_close"] = '</li>';
    $config["cur_tag_open"] = '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
    $config["cur_tag_close"] = '</a></li>';
    $config["num_tag_open"] = '<li class="page-item">';
    $config["num_tag_close"] = '</li>';
    $config['attributes'] = array('class' => 'page-link');
    $config['reuse_query_string'] = true;
    $t->load->library('pagination');
    $t->pagination->initialize($config);
    return $t->pagination->create_links();
}
function remove_http($url) {
   $disallowed = array('http://', 'https://', 'www.');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}
function encode($id) {
    $id_str = (string) $id;
    $offset = rand(0, 9);
    $encoded = chr(79 + $offset);
    for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
        $encoded .= chr(65 + $id_str[$i] + $offset);
    }
    return strtolower($encoded);
}
function decode($encoded) {
    $encoded = strtoupper($encoded);
    $offset = ord($encoded[0]) - 79;
    $encoded = substr($encoded, 1);
    for ($i = 0, $len = strlen($encoded); $i < $len; ++$i) {
        $encoded[$i] = ord($encoded[$i]) - $offset - 65;
    }
    return (int) $encoded;
}
function curl_get($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    return $result;
}
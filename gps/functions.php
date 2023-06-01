<?php
function publish_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function unpublish_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $gps)
{
    // get random field from $postdata
    $postdata_prepared = array_keys($postdata->to_array());
    shuffle($postdata_prepared);
    $random_field = array_shift($postdata_prepared);
    // set error message
    $gps->set_exception($random_field, 'This is a test error', 'error');
}

function test_column_callback($value, $fieldname, $primary, $row, $gps)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $gps)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $gps->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function movetop($gps)
{
    if ($gps->get('primary') !== false)
    {
        $primary = (int)$gps->get('primary');
        $db = GPS_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($gps)
{
    if ($gps->get('primary') !== false)
    {
        $primary = (int)$gps->get('primary');
        $db = GPS_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}

function show_description($value, $fieldname, $primary_key, $row, $gps)
{
    $result = '';
    if ($value == '1')
    {
        $result = '<i class="fa fa-check" />' . 'OK';
    }
    elseif ($value == '2')
    {
        $result = '<i class="fa fa-circle-o" />' . 'Pending';
    }
    return $result;
}

function custom_field($value, $fieldname, $primary_key, $row, $gps)
{
    return '<input type="text" readonly class="gps-input" name="' . $gps->fieldname_encode($fieldname) . '" value="' . $value .
        '" />';
}
function unset_val($postdata)
{
    $postdata->del('Paid');
}

function format_phone($new_phone)
{
    $new_phone = preg_replace("/[^0-9]/", "", $new_phone);

    if (strlen($new_phone) == 7)
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $new_phone);
    elseif (strlen($new_phone) == 10)
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $new_phone);
    else
        return $new_phone;
}

function before_list_example($list, $gps)
{
    var_dump($list);
}

function after_update_test($pd, $pm, $xc)
{
    $xc->search = 0;
}

function after_upload_test($field, &$filename, $file_path, $upload_config)
{
    $filename = 'bla-bla-bla';
}
function checkPhone($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $db = gps_db::get_instance();
    //$table = $gps->get_var('table');
    $phone = $db->escape($postdata->get('phone'));
    $query = 'SELECT phone FROM `users` WHERE phone = '.$phone.' AND isActive = 1';
    $db->query($query);
    $result = $db->result();
    $count = count($result);
    if ($count > 0) {
        $gps->set_exception('phone', 'This phone no. is already in use','error');
        echo "<script>jQuery.toast({
    			heading: 'This phone no. is already in use',
    			text: '',
    			position: 'top-right',
    			loaderBg: '#ff6849',
    			icon: 'error',
    			hideAfter: 3500,
    			stack: 6
    		})</script>";
    }
    created_date($postdata, $gps);
}
function checkUpdatePhone($postdata, $primary, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $db = gps_db::get_instance();
    $phone = $db->escape($postdata->get('phone'));
    $query = 'SELECT phone FROM `users` WHERE phone = '.$phone.' AND id != '.$primary.' AND isActive = 1';
    $db->query($query);
    $result = $db->result();
    $count = count($result);
    if ($count > 0) {
        $gps->set_exception('phone', 'This phone no. is already in use','error');
        echo "<script>jQuery.toast({
    			heading: 'This phone no. is already in use',
    			text: '',
    			position: 'top-right',
    			loaderBg: '#ff6849',
    			icon: 'error',
    			hideAfter: 3500,
    			stack: 6
    		})</script>";
    }
    modify_date($postdata, $gps);
}
function uniqueId($postdata)
{
    date_default_timezone_set("Asia/Kolkata");
    $sybl = str_split('!@#$%^&*'); 
    $alpha = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); 
    $num = str_split('0123456789'); 
    shuffle($sybl); 
    $randsybl = '';
    foreach (array_rand($sybl, 2) as $k) $randsybl .= $sybl[$k];
    shuffle($alpha); 
    $randalpha = '';
    foreach (array_rand($alpha, 3) as $k) $randalpha .= $alpha[$k];
    shuffle($num); 
    $randnum = '';
    foreach (array_rand($num, 3) as $k) $randnum .= $num[$k];
    $unique = $randsybl.$randalpha.$randnum;
    $empId = str_shuffle($unique);
    $postdata->set('login_id', $empId);
    $postdata->set('pass', md5($empId));
}
function created_date($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('created_date', date('Y-m-d H:i:s'));
}
function modify_date($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('modified_date', date('Y-m-d H:i:s'));
}
function created_at($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('created_at', date('Y-m-d H:i:s'));
}
function modified_at($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('modified_at', date('Y-m-d H:i:s'));
}
function user_notification_insert($postdata, $gps)
{
    $db = GPS_db::get_instance();
    $userID = $postdata->get('userID');
    $title = strip_tags($postdata->get('title'));
    $message = strip_tags($postdata->get('message'));
    if($title != '')
    {
        //user_notification($userID,$title,$message);
    }
    created_date($postdata, $gps);
}
function user_notification_update($postdata, $gps)
{
    $db = GPS_db::get_instance();
    $userID = $postdata->get('userID');
    $title = strip_tags($postdata->get('title'));
    $message = strip_tags($postdata->get('message'));
    if($title != '')
    {
        //user_notification($userID,$title,$message);
    }
    modify_date($postdata, $gps);
}
function user_notification($userID,$title,$message){
        $db = GPS_db::get_instance();
        if($userID == '0')
            $sql = 'SELECT `web_token`,`id` FROM `users`  WHERE  `web_token` != "" AND `isActive` = "1" limit 1000 ';
        else
            $sql = 'SELECT `web_token`,`id` FROM `users`  WHERE `id` = "'.$userID.'" AND `web_token` != "" AND `isActive` = "1" limit 1000 ';
		$db->query($sql);
		$results = $db->result();
		$count = count($results);
		if($count > 0)
		{
    		$badge = '1'; 
    		$img = '';
    		$uniqTokens = array();
    		$msg = array
    		(
    			'body'=> ($message != '')?$message:'',
        		'title'=> $title,
                'badge' => $badge,
                'sound' => 'default',
        		'largeIcon'=> $img
    		);
			$tokens = array();
			foreach($results as $result)
			{
				$tokens[] = $result['web_token'];
			}
			$uniqTokens = array_unique($tokens);
			if($uniqTokens != '')
			{
				$fields = array
				(
					'registration_ids' => $uniqTokens,
					'notification'	=> $msg
				);
				$headers = array
				(
					'Authorization: key=' .GPS_config::$fcm_access_key,
					'Content-Type: application/json'
				);	
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
				$result = curl_exec($ch );
				curl_close( $ch );
			}	
		}
}
function delete_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `isActive` = b\'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function delete_user_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `status` = \'inactive\' WHERE sno = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function delete_post_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `status` = \'0\' WHERE sno = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function url($postdata, $gps)
{
    $db = gps_db::get_instance();
    $url = $postdata->get('url');
    if(!empty($url))
        $postdata->set('url', 'https://'.$url);
}

function blocked_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $title = $gps->get('title');
        $query = 'UPDATE '.$gps->get('table').' SET `block` = \'1\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
        echo '<script type="text/javascript">jQuery.toast({
        		heading: "Successfully Blocked",
        		text: "'.$title.'",
        		position: "top-right",
        		loaderBg: "#ff6849",
        		icon: "success",
        		hideAfter: 3500,
        		stack: 6
        	})</script>';
    }
}
function unblocked_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $title = $gps->get('title');
        $query = 'UPDATE '.$gps->get('table').' SET `block` = \'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
        echo '<script type="text/javascript">jQuery.toast({
        		heading: "Successfully Unblocked",
        		text: "'.$title.'",
        		position: "top-right",
        		loaderBg: "#ff6849",
        		icon: "success",
        		hideAfter: 3500,
        		stack: 6
        	})</script>';
    }
}
function empty_checkbox($value, $fieldname, $primary_key, $row, $gps)
{
    return '<input type="checkbox" class="gps-input" name="id[]" value="'.$value.'" />';
}

function curl_post($to = null, $subject = null, $body = null, $page = null)
{
    $post = array(
        'to' => $to,
        'subject' => $subject,
        'body' => $body,
        'page' => $page,
        );
    $ch = curl_init();
    $base_url = GPS_config::$base_url;
    curl_setopt($ch, CURLOPT_URL, $base_url."admin/emails");
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "to=$to&subject=$subject&body=$body&page=$page");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    return $server_output;
}

function login_status($postdata, $gps)
{
    $base_url = GPS_config::$base_url;
    $created_date = $postdata->get('created_date');
    $login_status = $postdata->get('login_status');
    if ($login_status == 'approve') {
        $name = $postdata->get('name');
        $to = $postdata->get('email');
        $rand = rand(9999,999999);
        $password = md5($rand);
        //$postdata->set('password', $password);
        $subject = 'You have successfully registered with us.';
        //$body = array('name' => $name, 'password' => $rand);
        //$page = 'register.php';
        //$body = 'Your login information:<br/>Website URL: '.$base_url.'<br/>Email: '.$to.'<br/>Password: '.$rand;
        $body = 'Your login information:<br/>Website URL: '.$base_url.'<br/>Email: '.$to;
        $curl = curl_post($to,$subject,$body);
    }
    if($created_date == '')
        created_date($postdata, $gps);
    else
        modify_date($postdata, $gps);
}

function food_status($postdata, $gps)
{
    $db = GPS_db::get_instance();
    $slot = $postdata->get('slot');
    $sql = 'SELECT `type` FROM `slots`  WHERE `id` = "'.$slot.'" AND `status` = "1"';
	$db->query($sql);
	$results = $db->result();
	$count = count($results);
	if($count > 0)
	{
        $type = $results[0]['type'];
        if($type == 'Lunch')
        {
            $postdata->set('lunch_status', '2');
            $postdata->set('dinner_status', '0');
        }
        elseif($type == 'Dinner')
        {
            $postdata->set('dinner_status', '2');
            $postdata->set('lunch_status', '0');
        }
    }
}

function lunch_status($value, $fieldname, $primary_key, $row, $gps)
{
    switch ($value) {
    case "0":
        return "Not available";
        break;
    case "1":
        return "Available";
        break;
    case "2":
        return "Booked by user";
        break;
    case "3":
        return "Cancelled";
        break;
    default:
        return "Not available";
    }
}
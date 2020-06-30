<?php

if (!function_exists('extract_number')) {

	function extract_number($str) {
		preg_match_all('/[\d-]+/', $str, $matches);

		return end($matches[0]);
	}
	
}

/**
 * Convert datetime with seconds to readable format
 * @param $datetime with milliseconds
 * @param $format datetime format
 * @param $bool (bool)
 * @return datetime
 */
if (!function_exists('datetime_ms')) {

	function datetime_ms($datetime = null, $format = 'M d, Y h:i:s.v A', $bool = false) {

		if (!empty($datetime)) {

			$dt = new DateTime($datetime);

			$date = $dt->format($format);

		} else {

			$date = date('Y-m-d H:i:').sprintf('%03.3f', date('s')+fmod(microtime(true), 1));
			
			if ($bool) {

				$dt = new DateTime($date);

				$date = $dt->format($format);
			}
		}
		
        return $date;
	}
}


/**
 * Slack chat bot
 * @param $message string
 * @param $channel string
 * @param $username string
 * @return bool
 */
if(!function_exists('slack')) {

	function slack($message, $channel, $username)
	{
	    $ch = curl_init("https://slack.com/api/chat.postMessage");
	    $data = http_build_query([
	        "token" => $_SERVER['SLACK_TOKEN'],
	    	"channel" => $channel,
	    	"text" => $message,
	    	"username" => $username,
	    ]);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    
	    return $result;
	}

}

?>
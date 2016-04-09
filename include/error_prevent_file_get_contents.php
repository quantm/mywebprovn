<?php

if (strpos($_SERVER['HTTP_USER_AGENT'], 'Google') !== false) {
		if (validateGoogleBotIP($_SERVER['REMOTE_ADDR'])) {} 
		else {die('Access Denied');}
} 

//function to detect googlebot
function validateGoogleBotIP($ip) {
    $hostname = gethostbyaddr($ip); //"crawl-66-249-66-1.googlebot.com"
    return preg_match('/\.googlebot\.com$/i', $hostname);
}
//end

?>
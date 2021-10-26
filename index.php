<?php
set_time_limit(0);
date_default_timezone_set('UTC');
require __DIR__.'/vendor/autoload.php';



/////// CONFIG ///////

require 'config.php';

$debug = true;
$truncatedDebug = true;

//////////////////////







function download_img_from_url($imgurl , $photopath) {
	
		$fileName = "$photopath";
		$fileUrl  = "$img_url";
		$ch = curl_init($fileUrl); 
		$fp = fopen($fileName, 'wb'); 
		curl_setopt($ch, CURLOPT_FILE, $fp); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_exec($ch); 
		curl_close($ch); 
		fclose($fp);
	
}

download_img_from_url($img_url, $photoFilename);


$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}
try {
   
   


$metadata = ['caption' => "$image_description"];
$ig->timeline->uploadPhoto($photoFilename, $metadata);
 echo "Upload Done!"  ;
   
   
   
   
   
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
?>
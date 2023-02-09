<?php
require '../vendor/autoload.php';
use Curl\Curl;
$curl = new Curl();
$curl->setHeader('Host','jrustonapps.net'); 
$curl->setHeader('user-agent','okhttp/3.14.9'); 
$curl->setHeader('app-request-time','1675695817'); 
$curl->setHeader('app-user-id','MEAA-71176A2D-FD07-4DCF-88E9-614CD0799B67'); 
$curl->get('https://jrustonapps.net/app-apis/earthquakes/get-recent.php');
$res = $curl->response;
$re = str_replace(["<--STARTOFCONTENT-->","<--ENDOFCONTENT-->"],'',$res);
$rec = json_decode($re)->earthquakes;
foreach ($rec as $rc){
	$rt[] = array("id"=>$rc->id,"time"=>$rc->time,"latitude"=>$rc->latitude,"longitude"=>$rc->longitude,"country"=>$rc->country,"depth"=>$rc->depth,"place"=>$rc->place,"continent"=>$rc->continent,"mag"=>$rc->mag,"location"=>$rc->location);
	}
	
	$tr = json_encode($rt,128|64|256);
	echo $tr;
	
if ($curl->error) {
    echo 'Error: ' . $curl->errorMessage . "\n";
    $curl->diagnose();
}
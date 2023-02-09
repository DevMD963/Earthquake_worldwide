<?php
require '../vendor/autoload.php';
class info {
public function inf() :self {
(new \Curl\Curl())->setHeader('Host','jrustonapps.net'); 
(new \Curl\Curl())->setHeader('user-agent','okhttp/3.14.9'); 
(new \Curl\Curl())->setHeader('app-request-time','1675695817'); 
(new \Curl\Curl())->setHeader('app-user-id','MEAA-71176A2D-FD07-4DCF-88E9-614CD0799B67'); 
(new \Curl\Curl())->get('https://jrustonapps.net/app-apis/earthquakes/get-recent.php');
$res = (new \Curl\Curl())->response;
$re = str_replace(["<--STARTOFCONTENT-->","<--ENDOFCONTENT-->"],'',$res);
return $re;
/**$rec = json_decode($re)->earthquakes;
print_r($rec);**/
}
   }
$renco = new info;
echo $renco->inf();

/**foreach ($rec as $rc){
	$rt[] = array("id"=>$rc->id,"time"=>$rc->time,"latitude"=>$rc->latitude,"longitude"=>$rc->longitude,"country"=>$rc->country,"depth"=>$rc->depth,"place"=>$rc->place,"continent"=>$rc->continent,"mag"=>$rc->mag,"location"=>$rc->location);
	}
	
	$tr = json_encode($rt,128|64|256);
	echo $tr;**/
	
	
if ((new \Curl\Curl())->error) {
    echo 'Error: ' . (new \Curl\Curl())->errorMessage . "\n";
    (new \Curl\Curl())->diagnose();
}
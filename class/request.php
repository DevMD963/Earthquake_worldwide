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
$re = str_replace(['<--STARTOFCONTENT-->','<--ENDOFCONTENT-->'],$res);
echo $re;
/**class database extends \YhyaSyrian\Sql\SyDb {
    public function addData(string $result) :self {
        $this->insert('results',['result'=>$result,'date'=>date('Y-n-d')]);
        return $this;
    }
}**/

if ($curl->error) {
    echo 'Error: ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
    echo $curl->response;
}
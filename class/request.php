<?php
use Curl\Curl;

class request
{
	public function api(): ?string
	{
		$curl = new Curl();
		$curl->setHeader('Host', 'jrustonapps.net');
		$curl->setHeader('user-agent', 'okhttp/3.14.9');
		$curl->setHeader('app-request-time', '1675695817');
		$curl->setHeader('app-user-id', 'MEAA-71176A2D-FD07-4DCF-88E9-614CD0799B67');
		$curl->get('https://jrustonapps.net/app-apis/earthquakes/get-recent.php');
		$res = $curl->response;
		$re = str_replace(["<--STARTOFCONTENT-->", "<--ENDOFCONTENT-->"], '', $res);
		if ($curl->error) {
			echo $curl->diagnose();
		}
		return $re;
	}

	public function all(): ?array
	{
		$api = $this->api();
		if (empty($api)) {
			return [];
		}
		$rec = json_decode($api)->earthquakes;
		$results = [];
		foreach ($rec as $rc) {
			$results[] = array("id" => $rc->id, "time" => $rc->time, "latitude" => $rc->latitude, "longitude" => $rc->longitude, "country" => $rc->country, "depth" => $rc->depth, "place" => $rc->place, "continent" => $rc->continent, "mag" => $rc->mag, "location" => $rc->location);
		}
		return $results;
	}

	public function arabic(): ?array
	{
		$api = $this->api();
		if (empty($api)) {
			return [];
		}
		$rec = json_decode($api)->earthquakes;
		$ar = array('EG', 'SA', 'JO', 'SY', 'SD', 'QA', 'BH', 'KW', 'OM', 'AE', 'MA', 'TN', 'YE', 'LY', 'DZ', 'LB', 'TR');
		$results = [];
		foreach ($rec as $rc) {
			if (in_array($rc->country, $ar)) {
				$results[] = array("id" => $rc->id, "time" => $rc->time, "latitude" => $rc->latitude, "longitude" => $rc->longitude, "country" => $rc->country, "depth" => $rc->depth, "place" => $rc->place, "continent" => $rc->continent, "mag" => $rc->mag, "location" => $rc->location);
			}
		}
		return $results;
	}
}

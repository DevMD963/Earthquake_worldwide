<?php
class info {
	public function all(){
		$earth = file_get_contents('https://earthquake-update.com/earthqu.php');
echo $earth;
		}
		
		public function arabic(){
		$earth = file_get_contents('https://earthquake-update.com/earthqu_ar.php');
echo $earth;
		}
		
}
<?php
class database extends \YhyaSyrian\Sql\SyDb {
    public function addData(string $result) :self {
        $this->insert('results',['result'=>$result,'date'=>date('Y-n-d')]);
        return $this;
    }
    public function isTrue(string $result) :bool {
        return ($this->select('results',['result'=>$result]) == 0);
    }
}
<?php
require 'config.php';
$database = new database(Host:hostDataBase,User:userDataBase,Pass:passDataBase,DB:nameDataBase);
$database->setTimeConnect(30); //  Set Time Such As Second
(new bot(readline("Enter Your Token:")))->start($database,(new request()));
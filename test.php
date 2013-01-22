<?php

include('config/config.php');
require_once('library/Lighter/Loader.php');
\Lighter\Loader::register();

$config['database.database'] = 'employees';

$database = new \Lighter\Database;

$employees = $database->query('select emp_no, last_name from employees limit 5');
while ($employee = $employees->fetch()){
	echo $employee->emp_no."\t".$employee->last_name."\n";
	$employee->get($employee->emp_no);
	var_dump($employee); die();
}

<?php

namespace Lighter\Database;

class Record {
	
	private $connection;
	private $result;
	private $properties;
	
	public function __construct(
		  $connection=null
		, $result=null
		, $properties=null
		) {
		
		$this->connection = $connection;
		$this->result = $result;
		
		if (is_null($properties)) {
			$this->properties = array();
		} else {
			$this->properties = $properties;
		}
	}
	
	public function put() {
		
	}
	
	public function get() {
		
	}
	
	public function set() {
		
	}
	
	public function del() {
		
	}
	
	public function __get($name) {
		
		$method = 'get'.ucfirst($name);
		if (method_exists($this, $method)) {
			return call_user_func(array($this, $method));
		}
		
		if (isset($this->properties[$name])) {
			return $this->properties[$name];
		}
		
		throw new \Exception("Undefined property. '$name'");
	}
	
	public function __set($name, $value) {
		
	}
}

<?php

namespace Lighter\Database;

class Record {
	
	private $database;
	private $recordset;
	private $properties;
	
	public function __construct(
		  \Lighter\Database $database = null
		, \Lighter\Database\Recordset $recordset = null
		, $properties = null
		) {
			
		if (is_null($database)) {
			$this->database = new \Lighter\Database;
		} else {
			$this->database = $database;
		}
		
		$this->recordset = $recordset;
		
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
		
		$method = 'set'.ucfirst($name);
		if (method_exists($this, $method)) {
			return call_user_func(array($this, $method), $value);
		}
		
		if (isset($this->properties[$name])) {
			$this->properties[$name] = $value;
			return true;
		}
		
		throw new \Exception("Undefined property. '$name'");
	}
}

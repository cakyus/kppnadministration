<?php

namespace Lighter\Database;

class Recordset {
	
	private $database;
	private $result;
	
	public function __construct(
		  \Lighter\Database $database = null
		, $result = null
		) {
		
		if (is_null($database)) {
			$this->database = new \Lighter\Database;
		} else {
			$this->database = $database;
		}
		
		$this->result = $result;
	}
	
	/**
	 * Fetches a result row
	 * 
	 * @return \Lighter\Database\Record|boolean
	 **/
	
	public function fetch() {
		
		if (!$properties = \mysql_fetch_assoc($this->result)) {
			return false;
		}
		
		return new \Lighter\Database\Record(
			  $this->database
			, $this
			, $properties
			);
	}
}

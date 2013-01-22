<?php

namespace Lighter\Database;

class Recordset {
	
	private $connection;
	private $result;
	
	public function __construct($connection=null, $result=null) {
		$this->connection = $connection;
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
			  $this->connection
			, $this->result
			, $properties
			);
	}
}

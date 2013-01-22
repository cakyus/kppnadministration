<?php

namespace Lighter;

class Database {
	
	public $connection;
	
	public function __construct() {
		
		$config = new Config;
		
		if (!$this->connection = \mysql_connect(
			  $config['database.hostname']
			, $config['database.username']
			, $config['database.password']
			)) {
			throw new \Exception("Can\'t connect to database");
		}
		
		if (!\mysql_select_db($config['database.database'], $this->connection)) {
			throw new \Exception("Can\'t open database");
		}
	}
	
	/**
	 * Executes a result-less query
	 * 
	 * @return boolean
	 **/
	
	public function exec($sql) {
		return mysql_query($sql, $this->connection);
	}
	
	/**
	 * Executes an SQL query
	 * 
	 * @return \Lighter\Database\Recordset|boolean
	 **/
	
	public function query($sql) {
		
		if (!$result = mysql_query($sql, $this->connection)) {
			return false;
		}
		
		return new \Lighter\Database\Recordset($this->connection, $result);
	}
	
	/**
	 * Returns a string that has been properly escaped
	 * 
	 * @return string
	 **/
	
	public function escape($string) {
		return \mysql_real_escape_string($string, $this->connection);
	}
	
	
	/**
	 * Returns the number of database rows that were changed
	 * 
	 * @return integer
	 **/
	
	public function changes() {
		return \mysql_affected_rows($this->connection);
	}
	
	/**
	 * Returns the row ID of the most recent INSERT into the database
	 * 
	 * @return integer
	 **/
	
	public function lastInsertRowID() {
		return \mysql_insert_id($this->connection);
	}
	
	/**
	 * Returns the numeric result code of the most recent failed request
	 * 
	 * @return integer
	 **/
	
	public function lastErrorNumber() {
		return \mysql_errno($this->connection);
	}
	
	/**
	 * Returns text describing the most recent failed request
	 * 
	 * @return string
	 **/

	public function lastErrorMessage() {
		return \mysql_error($this->connection);
	}
	
	
	/**
	 * Returns the database library version
	 **/
	
	public function version() {
		return \mysql_get_server_info($this->connection);
	}
}

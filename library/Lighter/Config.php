<?php

namespace Lighter;

class Config extends \ArrayObject {
	
	public function __construct() {
		global $config;
		parent::__construct($config);
	}
	
}

<?php
/**
* 
*/
require_once dirname(__FILE__) .'/../fixtures/class-service-container.php';

class ServiceContainerTest extends WP_UnitTestCase
{
	private $_container;

	public function setUp()	{
		$this->_container=new Service_Container;
	}

	public function tearDown() {
		unset($this->_container);
	}

	public function testHasService() {
		
	}
}
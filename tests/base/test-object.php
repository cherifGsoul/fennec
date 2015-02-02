<?php
/**
* 
*/

require_once dirname(__FILE__) . '/class-new-object.php';

class ObjectTest extends WP_UnitTestCase
{
	
	protected $object; 

	public function setUp()
	{
		$this->object=new New_Object;
	}

	public function tearDown() {
		$this->object=null;
	}

	public function testGetter()
	{
		$this->assertSame('Initial',$this->object->prop);
		$this->assertInstanceOf('New_Object',$this->object->object);
		try {
			$this->object->another_property;
		} catch (Exception $e) {
			$this->assertInstanceOf('Undefined_Property_Exception',$e);
			$this->assertSame('Property "New_Object.another_property" is not defined',$e->getMessage());
		}
	}

	public function testSetter() {
		$this->object->prop='New value';
		$this->assertSame('New value',$this->object->prop);

		try {
			$this->object->object=new New_Object;
		} catch (Exception $e) {
			$this->assertInstanceOf('Read_Only_Exception',$e);
			$this->assertSame('Property "New_Object.object" is read only',$e->getMessage());
		}

		try {
			$this->object->new_prop='New Prop';
		} catch (Exception $e) {
			$this->assertInstanceOf('Undefined_Property_Exception',$e);
			$this->assertSame('Property "New_Object.new_prop" is not defined',$e->getMessage());
		}
	}

	public function testIsset(){
		$this->assertTrue(isset($this->object->prop));
		$this->assertFalse(empty($this->object->prop));
		$this->assertTrue(isset($this->object->object));
	}

	public function testUnset() {
		unset($this->object->prop);
		$this->assertFalse(isset($this->object->prop));
	}

	public function testHasProperty() {
		$this->assertTrue($this->object->has_property('prop'));
		$this->assertTrue($this->object->has_property('object'));
		$this->assertFalse($this->object->has_property('another_prop'));
	}

	public function testCanGetProperty() {
		$this->assertTrue($this->object->can_get_property('prop'));
		$this->assertTrue($this->object->can_get_property('object'));
		$this->assertFalse($this->object->can_get_property('another_prop'));
	}

	public function testCanSetProperty() {
		$this->assertTrue($this->object->can_set_property('prop'));
		$this->assertTrue($this->object->can_set_property('object'));
		$this->assertFalse($this->object->can_set_property('another_prop'));
	}

}
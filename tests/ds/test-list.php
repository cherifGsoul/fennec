<?php
/**
* 
*/
/**
* 
*/
class List_Item
{
	public $data='data';
}

class ListTest extends WP_UnitTestCase
{
	protected $list;
	
	public function setUp()
	{
		$this->list=new Fennec_List;
	}

	public function tearDown() {
		$this->list=null;
	}

	public function testInstantiate(){
		$ar=array('a','b','c');
		$list=new Fennec_List($ar);
		$this->assertEquals(3,$list->get_count());
	}
}
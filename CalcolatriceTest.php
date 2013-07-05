<?php

include_once 'Contact.php';
use npget\Contact;

class CalcolatriceTest extends PHPUnit_Framework_TestCase
{

	public function testTrue ()
	{
		$this->assertTrue(true);
	}
	

	public function testClient ()
	{
		$client = new Contact();
		$this->assertFalse( $client->insertdb());	
	
						
	}

}

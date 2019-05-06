<?php

require 'User.php';
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

	protected $user;
	
	public function testIsValid()
	{
		$user = new User("Amandine", "Ripoll","amandine-ripoll@blabla.fr", 23);
		$this->assertEquals(1, $user->isValid());
	}	

	public function testFirstname()
	{
		$user = new User("", "Ripoll", "amandine-ripoll@blabla.fr", 23);
		$this->assertEquals(0, $user->isValid());
	}

	public function testLastname()
	{
		$user = new User("Amandine", "", "amandine-ripoll@blabla.fr", 23);
		$this->assertEquals(0, $user->isValid());
	}

	public function testEmail()
	{
		$user = new User("Am", "Ripoll", "amandablar",  23);
		$this->assertEquals(0, $user->isValid());
	}

	public function testAge()
	{
		$user = new User("Am", "Ripoll", "amandine-ripoll@blabla.fr", 12);
		$this->assertEquals(0, $user->isValid());
	}

}

<?php

require 'Exchange.php';
require 'UserTest.php';
require 'ProductTest.php';


require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ExchangeTest extends TestCase {


    public function testIsValid()
	{
        $usertest = new UserTest();
        $producttest = new ProductTest();

		$exchange = new Exchange($usertest->userMock(1),$producttest->productMock(1),$usertest->userMock(1),"2019-05-15","2019-06-17");
		$this->assertEquals(1, $exchange->isValid(), "Echange invalide");
    }	
    
    public function testInvalidDate(){

        $usertest = new UserTest();
        $producttest = new ProductTest();

        $exchange = new Exchange($usertest->userMock(1),$producttest->productMock(1),$usertest->userMock(1),"2019-05-15","2019-06-17");
        $this->assertEquals(1, $exchange->isValid(), "Date invalide");
    }

    public function exchangeMock($valid){
        $exchangemock = $this->createMock(Exchange::class);
        $exchangemock->method('isValid')
        ->willReturn($valid);
        return $exchangemock;
    }
}
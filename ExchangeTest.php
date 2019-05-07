<?php

require 'Exchange.php';
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ExchangeTest extends TestCase {

    public function testIsValid()
	{
        $receiver = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $owner = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();

        $receiver->method('isValid')
        ->willReturn(1);

        $owner->method('isValid')
        ->willReturn(1);

        $product->method('isValid')
        ->willReturn(1);

		$exchange = new Exchange($receiver,$product,$owner,"2019-05-15","2019-06-17");
		$this->assertEquals(1, $exchange->isValid(), "Echange invalide");
    }	
    
    public function testInvalidDate(){

        $receiver = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $owner = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();

        $receiver->method('isValid')
        ->willReturn(1);

        $owner->method('isValid')
        ->willReturn(1);

        $product->method('isValid')
        ->willReturn(1);

        $exchange = new Exchange($receiver,$product,$owner,"2019-05-15","2019-06-17");
        $this->assertEquals(1, $exchange->isValid(), "Date invalide");
    }
}
<?php

require 'Exchange.php';
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class DBConnectionTest extends TestCase {

    public function testSaveProduct(){ 
        $DB = new DBConnection();
        $DB->saveProduct(Product::productMock(1))->expectException('Not implemented');
    }

    public function testSaveUser(){ 
        DBConnection::saveUser()->expectException('Not implemented');
    }

    public function testSaveExchange(){ 
        DBConnection::saveExchange()->expectException('Not implemented');
    }
}
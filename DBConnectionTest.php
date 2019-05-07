<?php

require 'Exchange.php';
require './vendor/autoload.php';
include 'ProductTest.php';

use PHPUnit\Framework\TestCase;

class DBConnectionTest extends TestCase {

    public function testSaveProduct(){ 
        $DB = new DBConnection();
        $productmock = new ProductTest;
        try   {
            $DB->saveProduct($productmock->productMock(1));
        }   
        catch  (Exception $e)  {
            $this->assertEquals('Not implemented', $e, "Exception invalide");
        }
        $this -> fail ( 'Exception was not raised' ) ; 
    }

    public function testSaveUser(){ 
        $DB = new DBConnection();
        $usermock = new UserTest;
        try   {
            $DB->saveUser($usermock->userMock(1));
        }   
        catch   ( Exception   $e )   {
            $this->assertEquals('Not implemented', $e, "Exception invalide");
        }
        $this -> fail ( 'Exception was not raised' ) ; 
    }

    public function testSaveExchange(){ 
        $DB = new DBConnection();
        $exchangemock = new ExchangeTest;
        try   {
            $DB->saveExchange($exchangemock->exchangeMock(1));
        }   
        catch   ( Exception   $e )   {
            $this->assertEquals('Not implemented', $e, "Exception invalide");
        }
        $this -> fail ( 'Exception was not raised' ) ; 
    }
}
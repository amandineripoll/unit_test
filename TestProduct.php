<?php


use PHPUnit\Framework\TestCase;
require 'Entity/User.php';
require 'Entity/Product.php';

class ProductTest extends TestCase
{
    protected $product;

    protected function setUp(): void
    {
        $user = new User("benjamin", "kazmierczak", "test@test.fr", 23);

        $this->product = new Product("object", $user);
    }

    public function testIsValid() {
        $this->assertEquals(true, $this->product->isValid());
    }


    public function testInvalid() {
        $this->product->setName("");
        $this->assertEquals(false, $this->product->isValid());
    }

    public function testInvalidOwner() {
        $this->product->getUser()->setAge(1);
        $this->assertEquals(false, $this->product->isValid());
    }

}
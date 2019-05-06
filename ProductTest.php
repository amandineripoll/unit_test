<?php

require 'Product.php';
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase
{
    protected $product;
    protected $user;

    public function testIsValid() {
        $user = new User("Amandine", "Ripoll","amandine-ripoll@blabla.fr", 23);
        $product = new Product("chaise", $user);
        $this->assertEquals(1, $product->isValid(), "Produit invalide");
    }

    public function testInvalidProductName() {
        $user = new User("Amandine", "Ripoll","amandine-ripoll@blabla.fr", 23);
        $product = new Product("", $user);
        $this->assertEquals(0, $product->isValid(), "Nom invalide");
    }

    public function testInvalidOwnerAge() {
        $user = new User("Amandine", "Ripoll","amandine-ripoll@blabla.fr", 10);
        $product = new Product("Chaise", $user);
        $this->assertEquals(0, $product->isValid(), "Age invalide");
    }

    public function testInvalidOwnerEmail() {
        $user = new User("Amandine", "Ripoll","amandine-r.fr", 16);
        $product = new Product("Chaise", $user);
        $this->assertEquals(0, $product->isValid(), "Email invalide");
    }

}